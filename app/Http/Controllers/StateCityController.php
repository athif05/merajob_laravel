<?php

namespace App\Http\Controllers;

use App\Cities;
use App\States;
use Illuminate\Http\Request;

class StateCityController extends Controller {

	public function getCity(Request $request) {

		$data['cities'] = Cities::where("state_id", $request->state_ids)
			->get(["id", "name"]);

		return response()->json($data);
	}

	/*show all states in a list in admin panel*/
	public function fetchStates(Request $request) {

		$states = States::where('countries_id', '101')
			->orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/manage-states', compact('states'));
	}

	/*add a new state in admin panel*/
	public function addNewState() {
		return view('admin/add-new-state');
	}

	/*here we update state*/
	public function saveNewState(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'State name is required',
		]);

		$input = States::insert([
			'name' => $request->name,
			'countries_id' => '101',
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'New state name added successfully...');
		//return redirect('admin/states')->with('success', 'State name updated successfully...');

	}

	/*here we edit state from admin panel*/
	public function editState($id) {

		$state_details = States::where('id', $id)
			->first();

		return view('admin/edit-state', compact('state_details'));

	}

	/*here we update state*/
	public function updateState(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
		], [
			'name.required' => 'State name is required',
		]);

		$input = States::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
			]);

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/states')->with('success', 'State name updated successfully...');

	}
	

	/* this function is call when we update state status by admin */
	public function updateStateStatus(Request $request) {

		$input = States::where('id', $request->state_id)
			->update([
				'status' => $request->state_status,
			]);

		return $request->state_status;

	}

	/*here we delete state from admin*/
	public function deleteState(Request $request) {

		$input = States::where('id', $request->state_id)
			->update([
				'is_deleted' => $request->state_del_status,
			]);

		return $request->state_del_status;

	}
	
	/*show all cities in a list in admin panel*/
	public function fetchCities(Request $request) {

		$cities = Cities::where('country_id', '101')
			->orderBy('name', 'ASC')
			->paginate(10);

		return view('admin/manage-cities', compact('cities'));
	}
	
	/*add a new city in admin panel*/
	public function addNewCity() {
		
		$states = States::where('countries_id', '101')
			->orderBy('name', 'ASC')
			->get();
			
		return view('admin/add-new-city', compact('states'));
	}
	
	/*here we save new city*/
	public function saveNewCity(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
			'state_id' => 'required',
		], [
			'name.required' => 'City name is required',
			'state_id.required' => 'State name is required',
		]);

		$input = Cities::insert([
			'name' => $request->name,
			'state_id' => $request->state_id,
			'country_id' => '101',
			'is_deleted' => '0',
			'status' => '1',
		]);

		return back()->with('success', 'New city name added successfully...');

	}
	
	/*here we edit city from admin panel*/
	public function editCity($id) {

		$city_details = Cities::where('id', $id)
			->first();
			
		$states = States::where('countries_id', '101')
			->orderBy('name', 'ASC')
			->get();

		return view('admin/edit-city', compact('city_details','states'));

	}
	
	/*here we update city*/
	public function updateCity(Request $request) {

		$request->validate([
			'name' => 'required|max:100',
			'state_id' => 'required',
		], [
			'name.required' => 'City name is required',
			'state_id.required' => 'State name is required',
		]);

		$input = Cities::where('id', $request->edit_id)
			->update([
				'name' => $request->name,
				'state_id' => $request->state_id,
			]);

		return redirect('admin/cities')->with('success', 'City name updated successfully...');

	}
	
	/* this function is call when we update city status by admin */
	public function updateCityStatus(Request $request) {

		$input = Cities::where('id', $request->city_id)
			->update([
				'status' => $request->city_status,
			]);

		return $request->city_status;

	}
	
	/*here we delete city from admin*/
	public function deleteCity(Request $request) {

		$input = Cities::where('id', $request->city_id)
			->update([
				'is_deleted' => $request->city_del_status,
			]);

		return $request->city_del_status;

	}
	
	
}
