<?php

namespace App\Http\Controllers;

use App\ContactEmail;
use Illuminate\Http\Request;
use Mail;

class ContactEmailController extends Controller {

	public function store(Request $request) {

	$msg_line='';
	
		$request->validate([
			'name' => 'required|max:50|regex:/^[\pL\s]+$/u',
			'email' => 'required|max:50|email',
			//'subject' => 'required|max:100',
			'message' => 'required|max:500',
		], [
			'name.required' => 'Name is required',
			'email.required' => 'Email is required',
			//'subject.required' => 'Subject is required',
			'message.required' => 'Message is required',
		]);

		$input = ContactEmail::insert([
			'name' => $request->name,
			'email' => $request->email,
			//'subject' => $request->subject,
			'subject' => 'subject',
			'message' => $request->message,
		]);
		
		$msg_line=$request->subject;
		$name=$request->name;
		
		$data=array('name'=>$request->name, 'email'=>$request->email, 'candidate_message'=>$request->message);
				
		$admin_email='athif.hussain05@gmail.com';
		
		Mail::send('contact_us_mail',$data, function($message) use ($name, $admin_email) {
			$message->from('merajob@gmail.com', 'MeraJob')
			->to($admin_email)
			->subject("MeraJob Contact Us");
		});
				
		return back()->with('success', 'Email send successfully.');
	}
}