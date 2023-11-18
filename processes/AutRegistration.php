<?php

echo "Reached AutRegistration.php";

include __DIR__ . '/../configs/DbConn.php';

// connection check
if (isset($DbConn)) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form
        $authorFullName = $_POST['authorFullName'];
        $authorEmail = $_POST['authorEmail'];
        $authorAddress = $_POST['authorAddress'];
        $authorBiography = $_POST['authorBiography'];
        $authorDateOfBirth = $_POST['authorDateOfBirth'];
        $authorSuspended = isset($_POST['authorSuspended']) ? 1 : 0;

        // SQL query for insertion
        $sql = "INSERT INTO authorstb (AuthorFullName, AuthorEmail, AuthorAddress, AuthorBiography, AuthorDateOfBirth, AuthorSuspended) 
                VALUES (:authorFullName, :authorEmail, :authorAddress, :authorBiography, :authorDateOfBirth, :authorSuspended)";

        try {
            $stmt = $DbConn->prepare($sql);

            $stmt->bindParam(':authorFullName', $authorFullName);
            $stmt->bindParam(':authorEmail', $authorEmail);
            $stmt->bindParam(':authorAddress', $authorAddress);
            $stmt->bindParam(':authorBiography', $authorBiography);
            $stmt->bindParam(':authorDateOfBirth', $authorDateOfBirth);
            $stmt->bindParam(':authorSuspended', $authorSuspended);

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
