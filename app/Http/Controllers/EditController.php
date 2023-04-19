<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Services\FirebaseService;

use Illuminate\Support\Facades\Validator;


class EditController extends Controller
{
    public function customer($key){
        $uid = Session::get('uid');
        $user = app('firebase.auth')->getUser($uid);

        $database = FirebaseService::connect();
        $ref = $database->getReference('trial/'.$key);
        $ref = $ref->getValue();
        
        return view('edit',compact('ref','user','key'));
    }


    protected function validator(array $data) {
        return Validator::make($data, [
           'firstName' => ['required', 'string', 'max:255'],
           'lastName' => ['required', 'string', 'max:255'],
        ]);
     }
      public function update(Request $request,$upd){
  
        $this->validator($request->all())->validate();
       
        $database = FirebaseService::connect();
        $ref = $database->getReference('trial/'.$upd);
        $ref->set([
  
         'firstName' => $request->input('firstName'),
         'lastName' => $request->input('lastName'),
  
        ]);
        return redirect()->route('home');
  
      }


      public function delete($upd){
         
        $database = FirebaseService::connect();
        $ref = $database->getReference('trial/'.$upd);
        $ref->remove();

        return redirect()->route('home');

  
      }
}
