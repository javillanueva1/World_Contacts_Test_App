<?php
require "db_config.php";
$method = $_SERVER["REQUEST_METHOD"];
$namePattern = '/^[a-zA-Z]+$/';
$searchResults = array();
$searchTerm = $_POST["searchTerm"];

if($method == 'POST')
    {
        if(isset($_POST))
        {
            if((!empty($_POST["searchTerm"])))
            {
                if(preg_match($namePattern, $_POST["searchTerm"]))
                    $name = "%" . $_POST["searchTerm"] . "%"; //search in firstname, lastname and email, for security purposes need to do it this way
                $email = "%" . $_POST["searchTerm"] . "%"; //search only in email (this is only used if @ is in the searchTerm)
            }
            //There is no need for else, there should always be a searchTerm if this is called
        }
    }

try
{
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //select from all locations because no email format given for searchTerm
    if(!empty($name))
    {
        //Search using FirstName category
        $stmt = $dbh->prepare("SELECT * FROM allData WHERE FirstName LIKE :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $results1 = $stmt->fetchAll();

        //Search using LastName category
        $stmt = $dbh->prepare("SELECT * FROM allData WHERE LastName LIKE :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $results2 = $stmt->fetchAll();

        //Search using Email category
        $stmt = $dbh->prepare("SELECT * FROM allData WHERE Email LIKE :name");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $results3 = $stmt->fetchAll();

        $searchResults = array_merge($results1, $results2);
        $searchResults = array_map("unserialize", array_unique(array_map("serialize", $searchResults)));
        $searchResults = array_merge($results3, $searchResults);
        $searchResults = array_map("unserialize", array_unique(array_map("serialize", $searchResults)));

    }  
    //Email format given for searchTerm, use 
    else if(!empty($email))
    {
        //Search using Email Category only
        $stmt = $dbh->prepare("SELECT * FROM allData WHERE Email LIKE :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $searchResults = $stmt->fetchAll();
    }
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}

$dbh = NULL;


//Print search results
function printSearchResults()
{
    global $searchResults;
    //Print table
    if(count($searchResults) != 0)
    {
        echo "<thead>";
        echo "<tr>";
        echo "<th class = \"col s4\">First Name</th>";
        echo "<th class = \"col s4\">Last Name</th>";
        echo "<th class = \"col s4\">Email</th>";
        echo "</tr>";
        echo "</thead>";
        for ($i=0; $i < count($searchResults); $i++) 
        { 
            if(!empty($searchResults[$i]))
            {
                echo "<tbody>";
                echo "<tr>";
                echo "<td class = \"col s4\">" . $searchResults[$i]["FirstName"] . "</td>";
                echo "<td class = \"col s4\">" . $searchResults[$i]["LastName"] . "</td>";
                echo "<td class = \"col s4\">" . $searchResults[$i]["Email"] . "</td>";
                echo "</tr>";
                echo "</tbody>";
            }
        }
    }
    //Print that there are no results
    else
    {
        echo "<p class = \"col s12\" style = \"text-align: center\">No Results</p>";
    }

}

?>