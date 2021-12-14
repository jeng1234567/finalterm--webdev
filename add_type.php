<?php
	session_start();
	include_once('database.php');

	if(isset($_POST['add_type'])){
		$database = new Connection();
		$db = $database->open();
		try{
			//make use of prepared statement to prevent sql injection
			$sql = $db->prepare("INSERT INTO animal_type (type_name) VALUES (:type_name)");

			//bind
			$sql->bindParam(':type_name', $_POST['type_name']);
           

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

	header('location: type.php');
	
?>