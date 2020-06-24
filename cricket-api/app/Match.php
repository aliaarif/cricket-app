<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	public function teams()
	{
		return $this->hasMany('App\Team');
	}


	public function teamA()
	{
		return $this->belongsTo('App\Team', 'team_A', 'id');
	}

	public function teamB()
	{
		return $this->belongsTo('App\Team', 'team_B', 'id');
	}
}
