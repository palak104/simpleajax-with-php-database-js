
<!DOCTYPE html>
<!--  
I palak depani ,student no - 000787449 , cerify that all code submitted is my own work;
that i have not copied from any other source .
I also certify that i have not allowed my work to be copied by other.

Purpose of this assignment is to display list of student with their grade from database
uing ajax call.
-->
<head>
<link rel="stylesheet" href="css/student.css">
    
</head>
<body>

<?php

try {
    $dbh = new PDO(
        "mysql:host=https://csunix.mohawkcollege.ca/phpmyadmin/;dbname=000787449",
        "000787449",
        "19960601"    
    );
    
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}

// getting input of data
$name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING);
$grade = filter_input(INPUT_POST,"grade",FILTER_VALIDATE_INT);

// add record into database
if ($name !== null && $grade!== null){


    $command = "INSERT into student_list (fullname, grade) values (?,?)";
    $stmt = $dbh->prepare($command);
    $param = [$name, $grade];
    $succes = $stmt->execute($param);
  

}

?>

<h2> Data added successfully!!</h2>
 <form action = index.html method="get">
        <button type = submit id="back" value = "submit"> Go back! </button>
    </form>

</body>
</html>