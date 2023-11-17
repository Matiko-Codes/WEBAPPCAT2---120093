<?php

echo "Reached AutRegistration.php";

include __DIR__ . '/../configs/DbConn.php';

// Check if the database connection is successful before proceeding
if (isset($DbConn)) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form
        $authorFullName = $_POST['authorFullName'];
        $authorEmail = $_POST['authorEmail'];
        $authorAddress = $_POST['authorAddress'];
        $authorBiography = $_POST['authorBiography'];
        $authorDateOfBirth = $_POST['authorDateOfBirth'];
        $authorSuspended = isset($_POST['authorSuspended']) ? 1 : 0;

        // SQL query to insert data into the database
        $sql = "INSERT INTO authorstb (AuthorFullName, AuthorEmail, AuthorAddress, AuthorBiography, AuthorDateOfBirth, AuthorSuspended) 
                VALUES (:authorFullName, :authorEmail, :authorAddress, :authorBiography, :authorDateOfBirth, :authorSuspended)";

        // Prepare and execute the SQL statement
        try {
            $stmt = $DbConn->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':authorFullName', $authorFullName);
            $stmt->bindParam(':authorEmail', $authorEmail);
            $stmt->bindParam(':authorAddress', $authorAddress);
            $stmt->bindParam(':authorBiography', $authorBiography);
            $stmt->bindParam(':authorDateOfBirth', $authorDateOfBirth);
            $stmt->bindParam(':authorSuspended', $authorSuspended);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Author registration successful!";
            } else {
                echo "Error executing statement: " . implode(", ", $stmt->errorInfo());
            }
        } catch (PDOException $e) {
            echo "Error preparing statement: " . $e->getMessage();
        }
    }
} else {
    echo "Database connection not established.";
}
?>
