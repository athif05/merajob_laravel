<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate_details extends Model {

	protected $fillable = [
		'name', 'email', 'mobile_number', 'alternate_number', 'permanent_address', 'current_address', 'job_title', 'job_keywords', 'city_id', 'job_categories_id', 'job_locations_id', 'skills', 'english_required_id', 'working_or_not',
	];
}
