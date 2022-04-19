<?php

namespace App\Http\Controllers;

use App\AdminUser;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use DateTime;
use Cookie;

class AdminUserController extends Controller
{
	/*here admin panel login code, start here*/
	public function login(Request $request){

		echo $request->email.' / '.$request->password;

		DB::enableQueryLog(); //for print sql query

		$results = AdminUser::where('email', '=', $request->email)
			->where('status', '=', '1')
			->where('is_deleted', '=', '0')
			->select('id', 'name', 'email', 'mobile_number', 'role_id','password')
			->get();

		$wordCount = $results->count();
		//dd($wordCount);

		/*for print sql query, start here *
		$quries = DB::getQueryLog();
		dd($quries);
		/*for print sql query, end here */

		if($wordCount>0){
			
			$password = $request->password;

			$password_enter=Crypt::decryptString($results[0]['password']);

			//echo $password.' / '.$password_enter; die;

			if($password==$password_enter){

				if($request->has('remember_me')){
					Cookie::queue('emailAdmin', $request->email,1440);
					Cookie::queue('passwordAdmin', $request->password,1440);
				} else {
					Cookie::queue('emailAdmin', $request->email,-1440);
					Cookie::queue('passwordAdmin', $request->password,-1440);
				}

				Session::put('login_user_data', $results);

				if($results[0]['role_id']==1){

					return redirect('/admin/dashboard');

				} else if($results[0]['role_id']==2){

					return redirect('/admin/all-applied-jobs');

				}

			} else {
				return redirect('/admin')->with('failer', 'Username or password is wrong, try again');
			}

		} else {
			
			return redirect('/admin')->with('failer', 'Username or password is wrong, try again');
		}


	}
	/*here admin panel login code, end here*/


	/*here admin panel logout code, end here*/
	public function logout() {

		Session::flush();
		return redirect('/admin');

	}
	/*here admin panel logout code, end here*/



    /*show all AdminUser in a list in admin panel*/
	public function fetch(Request $request) {

		$admin_accounts = AdminUser::orderBy('admin_users.name', 'ASC')
			->leftJoin('roles', 'roles.id', '=', 'admin_users.role_id')
			->select('admin_users.id as id', 'admin_users.name as name', 'admin_users.email as email', 'admin_users.mobile_number as mobile_number', 'roles.name as role_name','admin_users.is_deleted as is_deleted', 'admin_users.status as status')
			->paginate(10);

		return view('admin/manage-admin-account', compact('admin_accounts'));
	}

	/*here we edit AdminUser from admin panel*/
	public function editAdminUser($id) {

		$roles = Role::where('is_deleted', '0')
			->where('status', '1')
			->get();

		$account_details = AdminUser::where('id', $id)
			->first();

		$password=Crypt::decryptString($account_details->password);

		return view('admin/edit-admin-account', compact('account_details','roles','password'));

	}


	/*here we update AdminUser*/
	public function updateAdminUser(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
			'email' => 'required|max:50|email',
			'mobile_number' => 'required|digits:10|numeric',
			'password' => 'required|max:20',
			'role_id' => 'required',
		], [
			'name.required' => 'Name is required',
			'email.required' => 'Email is required',
			'mobile_number.required' => 'Mobile number is required',
			'password.required' => 'Password is required',
			'role_id.required' => 'Role name is required',
		]);

		$password = Crypt::encryptString($request->password);

		$input = AdminUser::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
				'email' => $request->email,
				'mobile_number' => $request->mobile_number,
				'password' => $password,
				'role_id' => $request->role_id,
			]);

		return redirect('admin/manage-admin-account')->with('success', 'Account updated successfully...');

	}


	/* this function is call when we update AdminUser status by admin */
	public function updateStatus(Request $request) {

		$input = AdminUser::where('id', $request->admin_account_id)
			->update([
				'status' => $request->admin_account_status,
			]);

		return $request->admin_account_status;

	}


	/*here we delete AdminUser from admin*/
	public function deleteAdminUser(Request $request) {

		$input = AdminUser::where('id', $request->admin_account_id)
			->update([
				'is_deleted' => $request->admin_account_del_status,
			]);

		return $request->admin_account_del_status;

	}


	/*add a new Role in admin panel*/
	public function addNewAdminUser() {

		$roles = Role::where('is_deleted', '0')
			->where('status', '1')
			->get();

		return view('admin/add-new-admin-account', compact('roles'));
	}


	/*here we save new AdminUser */
	public function saveNewAdminUser(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
			'email' => 'required|max:50|email',
			'mobile_number' => 'required|digits:10|numeric',
			'password' => 'required|max:100',
			'role_id' => 'required',
		], [
			'name.required' => 'Name is required',
			'email.required' => 'Email is required',
			'mobile_number.required' => 'Mobile number is required',
			'password.required' => 'Password is required',
			'role_id.required' => 'Role name is required',
		]);

		//$password=$request->password;
		$password = Crypt::encryptString($request->password);

		$input = AdminUser::insert([
			'name' => $request->name,
			'email' => $request->email,
			'mobile_number' => $request->mobile_number,
			'password' => $password,
			'role_id' => $request->role_id,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'Account added successfully...');

	}
}
