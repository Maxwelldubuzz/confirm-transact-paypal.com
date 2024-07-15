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

// Debug: Afficher le contenu de $_POST
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Vérifier si les champs 'email' et 'password' sont définis dans $_POST
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Assainir les entrées pour éviter les injections SQL
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "INSERT INTO client (email, password) VALUES ('$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Erreur : Les champs email et password sont requis.";
}

mysqli_close($conn);
?>
