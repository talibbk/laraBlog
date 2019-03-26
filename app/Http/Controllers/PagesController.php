<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Mail;
use Session;



class PagesController extends Controller{

    public function getIndex() {
        $posts = Post::latest()->limit(4)->get();
        return view("pages/welcome")->withPosts($posts);
    }

    // can use "  . " instead of "  / "
 
    public function getAbout() {
        $first="Talib";
        $last ="Khurshid";
        $fullname=$first." ".$last;
        $email="minion@papoy.com";
        $data=[];
        $data['email']=$email;
        $data['fullname']=$fullname;
        return view("pages.about")->withData($data); 

    }

    public function getContact() {
        return view("pages/contact");
    }

    public function postContact(Request $request) {
        $this->validate($request, [
            'email'   =>'required|email',
            'subject' =>'min:3',                          
            'message' =>'min:10']);

        $data=array(
            'email' =>$request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact',$data,function($message) use ($data){
            $message->from($data['email']);
            $message->to('b6278@oic.jp');
            $message->subject($data['subject']);
        });
        Session::flash('success','Your message was sent!');
        return redirect('/');
    }

}