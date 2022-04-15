<?php

namespace App\Http\Controllers;

use App\Author;
use App\Blog;
use App\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /*show all Blog in a list in admin panel*/
	public function fetch(Request $request) {

		$blogs = Blog::orderBy('blogs.id', 'DESC')
			->leftJoin('authors', 'authors.id', '=', 'blogs.author_id')
			->leftJoin('blog_categories', 'blog_categories.id', '=', 'blogs.blog_category_id')
			->select('blogs.id as id', 'blogs.title', 'blogs.description', 'blogs.image', 'blogs.is_deleted', 'blogs.status', 'authors.name as author_name','blog_categories.name as blog_category_name')
			->paginate(10);

		return view('admin/blog-lists', compact('blogs'));
	}

	/*here we edit Blog from admin panel*/
	public function editBlog($id) {

		$authors = Author::where('is_deleted', '0')
			->where('status', '1')
			->orderBy('name', 'ASC')
			->get();

		$blogCategories = BlogCategory::where('is_deleted', '0')
			->where('status', '1')
			->orderBy('name', 'ASC')
			->get();

		$blog_details = Blog::where('id', $id)
			->first();

		return view('admin/edit-blog', compact('authors','blogCategories','blog_details'));

	}


	/*here we update Blog*/
	public function updateBlog(Request $request) {

		$request->validate([
			'title' => 'required|max:100',
			'description' => 'required',			
			'author_id' => 'required',
			'blog_category_id' => 'required',
		], [
			'title.required' => 'Title is required',
			'description.required' => 'Description is required',
			'author_id.required' => 'Author name is required',
			'blog_category_id.required' => 'Blog category name is required',
		]);

		$input = Blog::where('id', $request->edit_id)
			->update([
				'title' => $request->title,
				'description' => $request->description,
				'author_id' => $request->author_id,
				'blog_category_id' => $request->blog_category_id,
			]);

		if ($request->image) {

			$blog_details = Blog::where('id', $request->edit_id)
			->first();

			if($blog_details['image']){
				
   				unlink("C:/xampp/htdocs/myjob_laravel/".$blog_details['image']);

			}

			$profile_filePath = $request->file('image')->store('blogs');

			$profile_pic_file_path = '/storage/app/' . $profile_filePath;

			Blog::where('id', $request->edit_id)->update(['image' => $profile_pic_file_path]);
		}

		//return back()->with('success', 'State name updated successfully...');
		return redirect('admin/blog-lists')->with('success', 'Blog updated successfully...');

	}


	/* this function is call when we update Blog status by admin */
	public function updateStatus(Request $request) {

		$input = Blog::where('id', $request->blog_id)
			->update([
				'status' => $request->blog_status,
			]);

		return $request->blog_status;

	}


	/*here we delete Blog from admin*/
	public function deleteBlog(Request $request) {

		$input = Blog::where('id', $request->blog_id)
			->update([
				'is_deleted' => $request->blog_del_status,
			]);

		return $request->blog_del_status;

	}


	/*add a new Blog in admin panel*/
	public function addNewBlog() {

		$blogCategories = BlogCategory::where('is_deleted', '0')
			->where('status', '1')
			->orderBy('name', 'ASC')
			->get();

		$authors = Author::where('is_deleted', '0')
			->where('status', '1')
			->orderBy('name', 'ASC')
			->get();

		return view('admin/add-new-blog', compact('blogCategories','authors'));
	}


	/*here we Blog Author state*/
	public function saveNewBlog(Request $request) {

		$request->validate([
			'title' => 'required|max:100',
			'description' => 'required',			
			'author_id' => 'required',
			'blog_category_id' => 'required',
		], [
			'title.required' => 'Title is required',
			'description.required' => 'Description is required',
			'author_id.required' => 'Author name is required',
			'blog_category_id.required' => 'Blog category name is required',
		]);

		$input = Blog::insert([
			'title' => $request->title,
			'description' => $request->description,
			'author_id' => $request->author_id,
			'blog_category_id' => $request->blog_category_id,
			'is_deleted' => '0',
			'status' => '1',
		]);
		$last_id = DB::getPdo()->lastInsertId();

		if ($request->image) {

			/*$aboutus_details = Aboutus::first();

			if($aboutus_details['image']){
				
   				unlink("C:/xampp/htdocs/myjob_laravel/".$aboutus_details['image']);

			}*/

			$profile_filePath = $request->file('image')->store('blogs');

			$profile_pic_file_path = '/storage/app/' . $profile_filePath;

			Blog::where('id', $last_id)->update(['image' => $profile_pic_file_path]);
		}

		return back()->with('success', 'Blog added successfully...');
		//return redirect('admin/states')->with('success', 'State name updated successfully...');

	}
}
