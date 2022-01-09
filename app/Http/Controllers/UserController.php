<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    //
    public function login(Request $request){
        $user=User::where(['email'=>$request->email])->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return 'return username or password is incorrect';
        }
        else{
            $request->session()->put('user',$user);
            return redirect('/home');
        }
    }
    public function register(Request $request){

        $input['email'] = $request->email;

// Must not already exist in the `email` column of `users` table
$rules = array('email' => 'unique:users,email');

$validator = Validator::make($input, $rules);

if ($validator->fails()) {
    $erroMessage='email already in the system please use another email';
    
    return view('/register',['errorMessage'=>$erroMessage]);
}
else {
    // Register the new user .
    $user=new User;
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=Hash::make($request->password);
    $user->save();
    return redirect('/login');

}





    }

}
