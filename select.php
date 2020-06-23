<?php
/**
 * I palak depani ,student no - 000787449 , cerify that all code submitted is my own work
 * that i have not copied from any other source .
 * I also certify that i have not allowed my work to be copied by other.
 * Purpose of this assignment is to display list of student with their grade from
 *  database using ajax call
 * 
 */
include "student.php";
// database connection

try {
    $dbh = new PDO(
        "mysql:hot=https://csunix.mohawkcollege.ca/phpmyadmin/;dbname=000787449",
        "000787449",
        "19960601"   
    );
    
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}



$command = "SELECT fullname , grade FROM student_list ORDER BY fullname";
$stmt = $dbh->prepare($command);
$success = $stmt->execute();

$studentlist =[];
while($row = $stmt->fetch()){
    $student = [
        "fullname" => $row["fullname"],
        "grade" => $row["grade"]
    ];
    array_push($studentlist,$student);
}

echo json_encode($studentlist);


?>