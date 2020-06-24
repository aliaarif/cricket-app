<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public function players()
	{
		return $this->hasMany('App\Player');
	}

	public function matches()
	{
		return $this->hasMany('App\Match', 'winner');
	}



	public function matchesAsTeamA()
	{
		return $this->hasMany('App\Match', 'team_A');
	}

	public function matchesAsTeamB()
	{
		return $this->hasMany('App\Match', 'team_B');
	}

	

}
