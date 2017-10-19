<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Mail;
use Session;

class PagesController extends Controller
{
   public function getIndex(){
	   # process variable data or params
	   # talk to the model
	   # receive from the model
	   # compile or process received data if needed
	   # pass that data to the correct view
	   $posts = Post::orderBy('created_at','desc')->limit(5)->get();
	   return view('pages.welcome')->withPosts($posts);
   }
   public function getAbout(){
	$first = 'Grigoriy';
	$last = 'Markelov';
	$myname = $first . ' ' . $last;
	$myemail = 'markeloff.g@yandex.ru';
	$data = [];
	$data['myemail'] = $myemail;
	$data['myname'] = $myname;
	return view('pages.about')->withData($data);
   }
   public function getContact(){
	$myemail = 'markeloff.g@yandex.ru';
	return view('pages.contact')->withMyemail($myemail);
   }
   public function postContact(Request $request){
           $this->validate($request, ['email' => 'required|email',
                                      'subject' => 'min:3',
                                      'message' => 'min:10']);

           $data = array(
                'email' => $request->email,
                'subject' => $request->subject,
                'aMessage' => $request->message
           );

           Mail::send('emails.contact', $data, function($messageObj) use ($data) {
                   $messageObj->from($data['email']);
                   $messageObj->to('grigorijmarkelov@gmail.com');
                   $messageObj->subject($data['subject']);    
           }); 

           Session::flash('success','Your email was sent.');

           return redirect()->route('home');
   }
}
