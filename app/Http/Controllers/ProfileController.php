<?php

namespace App\Http\Controllers;

use App\Mail\sendMsgs;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function __construct()
    {
        return $this->middleware("auth");
    }
    // load prfile edit form
    public function edit() {
        $user = Auth::user();
        return view("profile.edit",compact("user"));
    }

    // update profile data
    public function update(Request $request){
        $request->validate([
            "name" => "bail|required|string|max:60",
            "email" => "bail|required|email|max:190|unique:users,email,". Auth::id(),
            "Cpassword" => "bail|required"
        ]);

        if(!Hash::check($request->Cpassword, Auth::user()->password)){
            return back()->withInput()->with("ProfileEditPasswordNotMatchedError","Incorect Password");
        }

        $update = Auth::user()->update(["name"=>$request->name,"email"=>$request->email]);
        if($update) {
            return back()->with("profileEditSuccess","Profile Information Updated");
        }
    }

    // changed password
    public function updatePassword(Request $request) {
        $request->validate([
            "old_password" => "bail|required|max:60|string",
            "new_password" => "bail|required|min:8|max:60|string|different:old_password|confirmed",
            "new_password_confirmation" => "required",
        ],[
            "old_password.required" => "Old password field can not be empty",
            "old_password.string" => "Invalid input for old password",
            "new_password.required" => "New password field can not be empty",
            "new_password.min" => "New password should be mininum 8 charachters",
            "new_password.string" => "Invalid input for new password",
            "new_password.different" => "Your new password should not be same as old password"
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password)){
            return back()->withInput()->with("ChangedPasswordNotMatchedError","Incorect Password");
        }

        $update = Auth::user()->update(["password"=>Hash::make($request->new_password)]);
        if($update) {
            return back()->with("ChangePasswordSuccess","Password Changed!");
        }
    }




    // test send Email
    public function sendMail() {
        $name = "Mustamandi";
        $message = "Eid Mubarak";

        // $data = [
        //     "name" => $name,
        //     "email" => $email,
        //     "content" => $message
        // ];
        // Mail::send("mail.contact",$data,function($msg) use ($subject){
        //     $msg->to("aemal_shirzai@yahoo.com","Aemal Yaooo")->subject($subject);
        // });
        $colleagues = [
            [ "email" => "aemal_shirzai@yahoo.com", "name" => "Aemal Yahoo" ],
            [ "email" => "aemalshirzai2016@gmail.com", "name" => "Aemal Gmail" ],
        ];
        
        foreach($colleagues as $colleague){
            $subject = "Congratulations ". $colleague['name'];
            Mail::to($colleague['email'])->send(new sendMsgs($name,$message,$subject));
        }
    }

}
