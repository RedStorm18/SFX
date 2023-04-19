<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\FirebaseException;
use App\Services\FirebaseService;
class RegController extends Controller
{
    use RegistersUsers;
    protected $auth;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public function __construct(FirebaseAuth $auth) {
       $this->auth = $auth;
    }
    //CREATE USER
    protected function validates(array $data) {
        return Validator::make($data, [
           'firstName' => ['required', 'string', 'max:255'],
           'lastName' => ['required', 'string', 'max:255'],
           'sex' => ['required'],
           'number' => ['required', 'numeric', 'digits:11'],
           'email' => ['required', 'string', 'email', 'max:255'],
           'password' => ['required', 'string', 'min:8', 'max:12', 'confirmed'],
        ]);
     }
     protected function customer(Request $request) {
        
          $this->validates($request->all())->validate();
          $fName = $request->input('firstName');
          $lName = $request->input('lastName');
          $name = $fName." ".$lName;
          $userProperties = [
             'email' => $request->input('email'),
             'emailVerified' => false,
             'password' => $request->input('password'),
             'displayName' => $name,
             'disabled' => false,
          ];
          $createdUser = $this->auth->createUser($userProperties);
  
           $database = FirebaseService::connect();
        $ids = $database->getReference('customer')->getValue();
        if($ids== null){
         $count = 1;
        }
        else{
         $count = count($ids);
        }
         $date = date("mdy");
         if($count < 10){
            $count+=1;
           $index = $date."00".$count;
         }
         if($count > 10 && $count < 100 ){
            $count+=1;
            $index = $date."0".$count;
         }
         if($count > 100 ){
            $count+=1;
           $index = $date.$count;
         }
      
         $ref = $database->getReference('customer/'.$index);
         $ref->set([
  
          'email' => $request->input('email'),
      'firstName' => $request->input('firstName'),
          'lastName' => $request->input('lastName'),
          'number' => $request->input('number'),
          'sex' => $request->input('sex'),
          'cID' => $index,
         
  
         ]);
  
          return redirect()->route('customer');
        
   }
}
