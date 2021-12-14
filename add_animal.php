<?php
	session_start();
	include_once('database.php');

	if(isset($_POST['add'])){
		$database = new Connection();
		$db = $database->open();
		try{
			//make use of prepared statement to prevent sql injection
			$sql = $db->prepare("INSERT INTO animals (name, type_id, color, number_of_legs,remarks) VALUES (:name, :type_id, :color, :number_of_legs, :remarks)");

			//bind
			$sql->bindParam(':name', $_POST['name']);
            $sql->bindParam(':type_id', $_POST['type_id']);
			$sql->bindParam(':color', $_POST['color']);
			$sql->bindParam(':number_of_legs', $_POST['number_of_legs']);
            $sql->bindParam(':remarks', $_POST['remarks']);
            

			//if-else statement in executing our prepared statement
			$_SESSION['message'] = ( $sql->execute()) ? 'Service added successfully' : 'Something went wrong. Cannot add axie.';	
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: index.php');
	
?>