<?php

use Illuminate\Database\Seeder;
use App\Team;
use App\Player;
use App\Match;
use App\Point;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		for($i = 1; $i <= 10; $i++){
			$team = new Team;
			$team->name = 'Team '.$i;
			$team->save();

			for($j = 1; $j <= 11; $j++){
				$player = new Player;
				$player->team_id = $team->id;
				$player->first_name = 'Player '.$team->id.'-'.$j;
				$player->save();				
			}
		}


		for($i = 1; $i <= 5; $i++){
			$teamA = App\Team::inRandomOrder()->take(1)->first();
			$teamB = App\Team::inRandomOrder()->limit(1)->where('id', '!=', $teamA->id)->first();
	//dd($teamA->id);
	//dd($teamB->id);
			$teamArr = [];
			array_push($teamArr, $teamA->id);
			array_push($teamArr, $teamB->id);
			//dd($teamArr);
			$match = new Match;
			$match->team_A = $teamA->id;
			$match->team_B = $teamB->id;
			$match->winner = $teamArr[mt_rand(0, 1)];
			$match->save();		

			//dd($match);		
		}

	}
}
