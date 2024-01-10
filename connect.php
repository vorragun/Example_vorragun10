<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Connect to the database (replace with your actual database credentials)
    $conn = new mysqli("Full Name", "Username","Email", "Phone Number", "Password","Confirm Password");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $FullName = $_POST["FullName"];
    $Username = $_POST["Username"];
    $Email = $_POST["Email"];
    $PhoneNumber = $_POST["PhoneNumber"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $ConfirmPassword = $_POST["ConfirmPassword"];

    // Insert user data into the database
    $sql = "INSERT INTO users (Full Name, Username,Email, PhoneNumber, Password,ConfirmPassword) VALUES ('Full Name', 'Username','Email', 'Phone Number', 'Password','Confirm Password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>