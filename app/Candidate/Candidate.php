<?php

namespace App\Candidate;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{	
	protected $table = 'candidates';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'department_id','designation_id','date_of_birth','date_of_join','father_name','email','cold_calling_status','commitment_status','joining_bonus','recruiter_name','requirement_details','source_of_hiring','location','travel_accomodation','created_by','updated_by','requirement_lead_id', 'consultant_lead_id', 'technical_lead_id', 'candidate_accomodation', 'assigned_consultant_work', 'requirement_type'
    ];

    public function can_docs(){
        return $this->hasMany('App\Candidate\CandidateDocument','candidate_id');
    }

    public function candidate_tasks(){
    	return $this->hasMany('App\Task','candidate_id');
    }

    public function lead(){
        return $this->hasOne('App\Lead', 'id', 'lead_id');
    }

    public function resume(){
        return $this->hasOne('App\Candidate\CandidateResume', 'candidate_id');
    }
}
