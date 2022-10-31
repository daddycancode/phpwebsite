<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
/*if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HomePage</title>
</head>
<body>
    <p>Hello !</p>
    <a href="/register">Register</a><br>
    <a href="/login">Login</a><br>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "W00dcutt3rz";
    $dbname = "website";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "SELECT * FROM USERS";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. ", Username: " . $row["username"]. ", Password: " . $row["password"]. "<br>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</body>
</html>