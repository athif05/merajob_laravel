<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /*show all Role in a list in admin panel*/
	public function fetch(Request $request) {

		$roles = Role::orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/role-lists', compact('roles'));
	}

	/*here we edit Role from admin panel*/
	public function editRole($id) {

		$role_details = Role::where('id', $id)
			->first();

		return view('admin/edit-role', compact('role_details'));

	}


	/*here we update Role*/
	public function updateRole(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Name is required',
		]);

		$input = Role::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
			]);

		return redirect('admin/manage-role')->with('success', 'Role updated successfully...');

	}


	/* this function is call when we update Role status by admin */
	public function updateStatus(Request $request) {

		$input = Role::where('id', $request->role_id)
			->update([
				'status' => $request->role_status,
			]);

		return $request->role_status;

	}


	/*here we delete Role from admin*/
	public function deleteRole(Request $request) {

		$input = Role::where('id', $request->role_id)
			->update([
				'is_deleted' => $request->role_del_status,
			]);

		return $request->role_del_status;

	}


	/*add a new Role in admin panel*/
	public function addNewRole() {

		return view('admin/add-new-role');
	}


	/*here we save new role */
	public function saveNewRole(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'Name is required',
		]);

		$input = Role::insert([
			'name' => $request->name,
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'Role added successfully...');

	}
}
