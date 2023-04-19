<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\FirebaseService;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      // FirebaseAuth.getInstance().getCurrentUser();
      try {
        $uid = Session::get('uid');
        $user = app('firebase.auth')->getUser($uid);
        
        $database = FirebaseService::connect();
        $ref = $database->getReference('trial');
        $ref = $ref->getValue();
        return view('home',compact('ref','user'));
      } catch (\Exception $e) {
        return $e;
      }

    }

    public function customer()
    {
      $database = FirebaseService::connect();
        $ref = $database->getReference('customer');
        $ref = $ref->getValue();
      return view('customers',compact('ref'));
    }


    protected function validator(array $data) {
      return Validator::make($data, [
         'firstName' => ['required', 'string', 'max:255'],
         'lastName' => ['required', 'string', 'max:255'],
      ]);
   }
    public function create(Request $request){

      $this->validator($request->all())->validate();
      $fName = $request->input('firstName');
      $lName = $request->input('lastName');
      $name = $fName." ".$lName;
      $database = FirebaseService::connect();
      $ref = $database->getReference('trial/'.$name);
      $ref->set([

       'firstName' => $request->input('firstName'),
       'lastName' => $request->input('lastName'),

      ]);
      return redirect()->route('home');

    }
}
