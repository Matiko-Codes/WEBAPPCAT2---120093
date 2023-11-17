<?php
include 'configs/DbConn.php';

if(isset($_GET['AuthorId'])) {
    $authorId = $_GET['AuthorId'];

    $sql = "DELETE FROM authorstb WHERE AuthorId = :authorId";
    $stmt = $DbConn->prepare($sql);
    $stmt->bindParam(':authorId', $authorId);

    if ($stmt->execute()) {
        echo "Author deleted successfully!";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} else {
    echo "AuthorId not provided.";
}
?>
