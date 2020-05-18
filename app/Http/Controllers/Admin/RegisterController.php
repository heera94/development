<?php

namespace App\Http\Controllers\Admin;
use App\Helpers\AppMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
Use App\Model\Userdetails;

class RegisterController extends Controller
{ 
    public function saveRegister(Request $request)
    { 
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'password' => 'confirmed|required|min:8',
            'city'=> 'required',
            'dob' => 'required',
            'email' => 'required|email|max:150|unique:users,email,NULL,id,deleted_at,NULL',
        ]);
         
           
        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
            $user->email = $request->email;
            $user->save();

            $id = User::where('email',$request->email)->select
            ('id')->first()->id;
            $otp= mt_rand(100000,999999);
            $details = new Userdetails();
            $details->user_id = $id;
            $details->otp = $otp;
            $details->dob= $request->dob;
            $details->city = $request->city;
            $details->save();
        
          
        
        $otp = Userdetails::where('user_id',$id)->select('otp')->first()->otp;
         

            AppMail::sendMail([
            
                'mailClass' => 'Otpmail',
                'mailTo' => $request->email,
                'mailData' => [
            
                    'otp' => $otp
                ]
            ]);
    
            return view('auth.confirm-otp');
     
            } else{
                 
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Both the passwords should be same and should have min 8 characters');
            return redirect('/register');
            
           
        }
        }
         public function verifyOtp(Request $request)
         {

            $validator = Validator::make($request->all(), [
               'otp' => 'required|max:6|numeric'
            ]);
             
            if ($validator->passes()) {

            $otpenter=$request->otp;
                
            $otp=1;
     
            if ($otpenter==$otp) 
              {
               return view('auth.passwords.success');
              }
              else
              {
                $request->session()->flash('message.level', 'danger');
                $request->session()->flash('message.content', 'Please enter a valid otp');
                return redirect('/verify-otp');
              }
            }
        
         }
        
                 
        }

    
    
