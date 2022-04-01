<?php

namespace App\Http\Controllers;

use App\Candidate_details;
use App\Employer_detail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;

//use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function verification_account(Request $request){
		
		$usres = User::where('id',$request->id)
		->where('user_verification_code',$request->code)
		->update([
			'status' => '1',
		]);
		
		$companys = Employer_detail::where('employer_id',$request->id)
		->update([
			'status' => '1',
		]);

		if($usres){
			return redirect('/login')->with('verified_account', 'Thanks, your account successfully verified.');
		} else {
			return redirect('/login')->with('failer', 'Something is wrong, your account is not verified...');
		}
		
		//return $request->job_status;
		
	}
	
	
	public function index(Request $request) {

		$request->validate([
			'user_name' => 'required',
			'password' => 'required',
		], [
			'user_name.required' => 'User Name is required',
			'password.required' => 'Password is required',
		]);

		DB::enableQueryLog(); //for print sql query

		//$password = Hash::make($request->password);
		$password = $request->password;

		$results = User::where('email', '=', $request->user_name)
		//->orWhere('mobile_number', '=', $request->user_name)
			->where('password', '=', $password)
			->where('status', '=', '1')
			->where('is_deleted', '=', '0')
			->select('id', 'name', 'email', 'mobile_number', 'user_type')
			->get();

		$wordCount = $results->count();
		//dd($wordCount);

		/*for print sql query, start here */
		//$quries = DB::getQueryLog();
		//dd($quries);
		/*for print sql query, end here */

		if ($wordCount > 0) {

			Session::put('login_user_data', $results);

			return redirect('/jobs');

			//dd($results);
		} else {
			//dd('wrong');
			return back()->with('failer', 'Username or password is wrong....');
		}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$request->validate([
			'name' => 'required|max:50|regex:/^[\pL\s]+$/u',
			'mobile_number' => 'required|digits:10|numeric',
			'password' => 'required|min:5',
			'confirm_password' => 'required|same:password',
			'privacy_policy' => 'required',
		], [
			'name.required' => 'Name is required',
			'mobile_number.required' => 'Mobile number is required',
			'password.required' => 'Password is required',
			'privacy_policy.required' => 'Accept our term and conditions',
		]);

		$email = !empty($request->email) ? $request->email : $request->mobile_number;

		//$password = Hash::make($request->password);
		$password = $request->password;

		$input = User::insert([
			'name' => $request->name,
			'email' => $email,
			'mobile_number' => $request->mobile_number,
			'password' => $password,
			'status' => '1',
			'privacy_policy' => $request->privacy_policy,
			'user_type' => $request->user_type,
		]);
		$last_id = DB::getPdo()->lastInsertId();
		//dd($last_id);

		$candidates = Candidate_details::insert([
			'name' => $request->name,
			'email' => $email,
			'mobile_number' => $request->mobile_number,
			'status' => '1',
			'user_id' => $last_id,
		]);

		return back()->with('success', 'User created successfully.');

	}

	public function store_employer(Request $request) {

		$request->validate([
			'name_emp' => 'required|max:50|regex:/^[\pL\s]+$/u',
			'mobile_number_emp' => 'required|digits:10|numeric',
			'email_emp' => 'required|max:50|email',
			'password_emp' => 'required|min:5',
			'confirm_password_emp' => 'required|same:password_emp',
			'privacy_policy_emp' => 'required',
		], [
			'name_emp.required' => 'Name is required',
			'mobile_number_emp.required' => 'Mobile number is required',
			'email_emp.required' => 'Email is required',
			'password_emp.required' => 'Password is required',
			'privacy_policy_emp.required' => 'Accept our term and conditions',
		]);

		//print_r($request);die;
		$user_verification_code = sha1(time());
		//$password_emp = Hash::make($request->password_emp);
		$password_emp = $request->password_emp;

		$input = User::insert([
			'name' => $request->name_emp,
			'email' => $request->email_emp,
			'mobile_number' => $request->mobile_number_emp,
			'password' => $password_emp,
			'status' => '0',
			'privacy_policy' => $request->privacy_policy_emp,
			'user_type' => $request->user_type,
			'user_verification_code' => $user_verification_code,
		]);

		$last_id = DB::getPdo()->lastInsertId();
		//dd($last_id);

		$employers = Employer_detail::insert([
			'company_name' => $request->name_emp,
			'email' => $request->email_emp,
			'mobile_number' => $request->mobile_number_emp,
			'status' => '0',
			'employer_id' => $last_id,
		]);

		if ($input) {

			//dd($request);

			$employer_name = $request->name_emp;
			$employer_email = $request->email_emp;

			$data = array('employer_name' => $employer_name, 'employer_email' => $employer_email, 'employer_id' => $last_id, 'user_verification_code' => $user_verification_code);

			Mail::send('account-verification-mail', $data, function ($message) use ($employer_name, $employer_email) {
				$message->to($employer_email)
					->subject("Account Verification By MeraJob");
			});

			return back()->with('success', 'Please check your email for account verification.');
		}

		return back()->with('success', 'Something went wrong...');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

	public function logout() {

		//session_unset();
		Session::flush();
		return redirect('/login');

	}
}
