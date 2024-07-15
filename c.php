<?php
$servername = "fdb1029.awardspace.net";   //$servername = "fdb26.awardspace.net"; 
$username = "4505012_client";           //$username = "3314504_shiva";
$password = "maxwell200905";                 //$password = "Shivam@179";
$dbname = "4505012_client";           //$dbname = "3314504_shiva";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * from users";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Username: " . $row["username"]. " -Password " . $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>