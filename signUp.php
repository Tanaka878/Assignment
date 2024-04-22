<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Gather form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Perform some basic validation
    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Connect to your database (replace these variables with your database credentials)
        $servername = "localhost";
        $db_username = "your_username";
        $db_password = "your_password";
        $dbname = "your_database";
        
        $conn = new mysqli($servername, $db_username, $db_password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Insert the data into the database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Signup successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Close the database connection
        $conn->close();
    }
}
?>