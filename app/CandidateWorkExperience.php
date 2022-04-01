<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateWorkExperience extends Model {
	protected $fillable = [
		'user_id', 'organization_name', 'designation_name', 'date_from', 'date_to', 'describe_role',
	];
}
