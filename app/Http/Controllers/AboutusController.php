<?php

namespace App\Http\Controllers;

use App\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    /*show all Work Experience in a list in admin panel*/
	public function fetch(Request $request) {

		$aboutus_details = Aboutus::first();

		return view('admin/manage-aboutus', compact('aboutus_details'));
	}


	/*here we update Work Experience*/
	public function update(Request $request) {

		$request->validate([
			'title' => 'required|max:500',
			'description' => 'required',
		], [
			'title.required' => 'Title is required',
			'description.required' => 'Description is required',
		]);

		$input = Aboutus::where('id', $request->edit_id)
			->update([
				'title' => $request->title,
				'description' => $request->description,
			]);

		if ($request->image) {

			$aboutus_details = Aboutus::first();

			if($aboutus_details['image']){
				
   				unlink("C:/xampp/htdocs/myjob_laravel/".$aboutus_details['image']);

			}

			$profile_filePath = $request->file('image')->store('website-about-us');

			$profile_pic_file_path = '/storage/app/' . $profile_filePath;

			Aboutus::where('id', $request->edit_id)->update(['image' => $profile_pic_file_path]);
		}

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/about-us')->with('success', 'About-us updated successfully...');

	}
}
