<?php

namespace App\Http\Controllers;

use PDO;
Use Request;

class RacerController extends Controller {

	public function getRacers(){

		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare('SELECT * from racers');
			$statement->execute();
			$racers = $statement->fetchALL();

			return view("racers",["racers"=>$racers]);

		} catch (PDOEXception $e) {
			die($e->getmessage());
		}

	}

	public function getRacerDetails($racerId) {
		
		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare('SELECT * from racers where racerId='.$racerId);
			$statement->execute();
			$racer = $statement->fetch();

			return view("racerdetails",["racer"=>$racer, "racerId" => $racerId]);
		 
		} catch(PDOEXception $e) {
			die($e->getmessage());
		}

	}

	public function deleteRacer($id) {
		$racerId = $id;

		echo "Deleted!";

		$db = new PDO ('mysql:host=localhost;dbname=race;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE from Racers where racerId = :racerId";
		$statement = $db->prepare($sql);
		$statement->execute(["racerId"=>$racerId]);
		
		$sql = "DELETE from raceRacers where racerId = :racerId";
		$statement = $db->prepare($sql);
		$statement->execute(["racerId"=>$racerId]);

		return redirect('/racers');

	}

	public function addRacerView() {

		return view('addracer');

	}

	public function addNewRacer() {

		// Validate Input
		$name = Request::input('name', '');
		$age = Request::input('age', 0);

		$db = new PDO ('mysql:host=localhost;dbname=race;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = " INSERT into racers(name,age) values(:name,:age)";
		$statement = $db->prepare($sql);
		$statement->execute(["name"=>$name, "age"=>$age]);

		return redirect('/racers');
	}

	public function editRacerView($racerId) {

		try {

			$db= new PDO('mysql:host=localhost;dbname=race;charset=utf8','root','');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$statement= $db->prepare('SELECT * from racers where racerId='.$racerId);
			$statement->execute();
			$racer = $statement->fetch();

			return view("editracer",["racer"=>$racer]);
		 
		} catch(PDOEXception $e) {
			die($e->getmessage());
		}

	}

	public function updateRacer($racerId) {

		// Validate Input
		$name = Request::input('name', '');
		$age = Request::input('age', 0);

		$db = new PDO ('mysql:host=localhost;dbname=race;charset=utf8','root','');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = " UPDATE racers set name = :name, age = :age where racerId = :racerId";
		$statement = $db->prepare($sql);
		$statement->execute(["name"=>$name, "age"=>$age, "racerId"=>$racerId]);

		return redirect("/racers/$racerId");
	}

}