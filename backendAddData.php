<?php
require "db_config.php";
$method = $_SERVER["REQUEST_METHOD"];
$namePattern = '/^[a-zA-Z]+$/';

if($method == 'POST')
	{
		if(isset($_POST))
		{
			if(!empty($_POST["firstName"]))
				echo "firstName is not empty\n";
			if(!empty($_POST["lastName"]))
				echo "lastName is not empty\n";
			if(!empty($_POST["email"]))
				echo "email is not empty\n";
			if((!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["email"])))
			{
				if(preg_match($namePattern, $_POST["firstName"]))
					$firstName = $_POST["firstName"];
				if(preg_match($namePattern, $_POST["lastName"]))
					$lastName = $_POST["lastName"];
				$email = $_POST["email"];
			}
			else
			{
				header("Location: addData.php?error=1");
			}
		}
	}

try
{
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //insert entry into data table
    $stmt = $dbh->prepare("INSERT INTO allData (firstName, lastName, Email) VALUES (:firstName, :lastName, :email)");
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    header("Location: addData.php");	
}
catch(PDOException $e)
{
	echo "Error: " . $e->getMessage();
}

$dbh = NULL;
?>