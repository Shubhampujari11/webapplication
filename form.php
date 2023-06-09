<?php

$FIRSTNAME = $_POST["first_name"];
$LASTNAME = $_POST["last_name"];

$servername = "localhost";
$database = "project";
$username = "root";
$password = "September@2018";
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check the connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully". "<br>";

$sql_put = "INSERT INTO records (ID,FIRST_NAME,LAST_NAME) VALUES (LPAD(FLOOR(RAND()*10000), 4, '0'),'$FIRSTNAME', '$LASTNAME')";
#echo "RUNNING: $sql";
if (mysqli_query($conn, $sql_put)) {
     echo "New record created successfully" . "<br>";
} else {
     echo "Error: " . $sql_put . "<br>" . mysqli_error($conn);
}

$sql_get = "select * from records where FIRST_NAME='$FIRSTNAME' AND LAST_NAME='$LASTNAME'";
$result = $conn->query($sql_get);
if ($result->num_rows > 0)
    {
        // OUTPUT DATA OF EACH ROW
        while($row = $result->fetch_assoc())
        {
            echo "ID: " . $row["ID"]. "|FirstName: " . $row["FIRST_NAME"]. " | LastName: " . $row["LAST_NAME"] . "<br>";
        }
    }
    else {
        echo "0 results";
    }
#if (mysqli_query($conn, $sql_get)) {
#     echo "\nNew record fetched successfully";
#} else {
#     echo "Error: " . $sql_get . "<br>" . mysqli_error($conn);
#}

mysqli_close($conn);
#echo "\nID generated for $FIRSTNAME $LASTNAME is: $SHOW_ID";
echo "<a href='http://ec2-13-126-79-184.ap-south-1.compute.amazonaws.com/' target='_blank'>GO BACK TO FORM</a>";
?>
