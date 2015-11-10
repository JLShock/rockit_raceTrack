<?php

namespace App\Http\Controllers;

use PDO;
Use Request;

class RaceController extends Controller {

	public function getRaces(){

		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare('SELECT * from races');
			$statement->execute();
			$races = $statement->fetchALL();

			return view("races",["races"=>$races]);

		} catch(PDOEXception $e){
			die($e->getmessage());
		}

	}

	public function getRaceDetails($raceId) {
		
		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare('SELECT * from races where raceId='.$raceId);
			$statement->execute();
			$race = $statement->fetch();

		return view("racedetails",["race"=>$race, "raceId" => $raceId]);
		 
		} catch(PDOEXception $e) {
			die($e->getmessage());
		}

	}

	public function getRaceRacers($raceId) {
		
		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare("SELECT * from racers as r,raceRacers as rr where r.racerId=rr.racerID and rr.raceId=$raceId");
			$statement->execute();
			$races = $statement->fetchAll ();

		return view("theracers",["races"=>$races, "raceId" => $raceId]);
		 
		} catch(PDOEXception $e) {
			die($e->getmessage());
		}

	}

	public function addRaceView() {

		return view('addrace');

	}

	public function addNewRace() {

		// Validate Input
		$raceName = Request::input('raceName', '');
		$length = Request::input('length', 0);
		$location = Request::input('location', '');
		$startDate = Request::input('startDate', 0);

		$db = new PDO ('mysql:host=localhost;dbname=race;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = " INSERT into races(raceName,location,length,startDate) values(:raceName,:location,:length,:startDate)";
		$statement = $db->prepare($sql);
		$statement->execute(["raceName"=>$raceName, "length"=>$length, "location"=>$location, "startDate"=>$startDate]);

		return redirect('/races');
	}

	public function removeRace() {
		$raceId = 0;

		echo "Removed!";

		if(isset($_POST['raceId'])){
			$raceId = $_POST['raceId'];
		}
		$db = new PDO ('mysql:host=localhost;dbname=race;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE from Races where raceId = :raceId";
		$statement = $db->prepare($sql);
		$statement->execute(["raceId"=>$raceId]);
		
		$sql = "DELETE from raceRaces where raceId = :raceId";
		$statement = $db->prepare($sql);
		$statement->execute(["raceId"=>$raceId]);

		return redirect('/races');

	}

	public function editRaceView($raceId) {

		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare('SELECT * from races where raceId='.$raceId);
			$statement->execute();
			$race = $statement->fetch();

			return view("editrace",["race"=>$race]);
		 
		} catch(PDOEXception $e) {
			die($e->getmessage());
		}

	}

	public function updateRace($raceId) {

		// Validate Input
		$raceName = Request::input('raceName', '');
		$length = Request::input('length', 0);
		$location = Request::input('location', '');
		$startDate = Request::input('startDate', 0);

		$db = new PDO ('mysql:host=localhost;dbname=race;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = " UPDATE races set raceName = :raceName,location = :location,length = :length,startDate = :startDate where raceId = :raceId";
		$statement = $db->prepare($sql);
		$statement->execute(["raceName"=>$raceName, "length"=>$length, "location"=>$location, "startDate"=>$startDate, "raceId"=>$raceId]);

		return redirect("/races/$raceId");
	}

}