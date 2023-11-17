<?php
include 'configs/DbConn.php';

if(isset($_GET['AuthorId'])) {
    $authorId = $_GET['AuthorId'];

    $sql = "SELECT * FROM authorstb WHERE AuthorId = :authorId";
    $stmt = $DbConn->prepare($sql);
    $stmt->bindParam(':authorId', $authorId);
    $stmt->execute();
    $author = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$author) {
        echo "Author not found.";
    }
} else {
    echo "AuthorId not provided.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Edit Author</title>
</head>
<body>

    <h2>Edit Author</h2>

    <form action="processes/AutRegistration.php" method="post">
        <!-- AuthorId -->
        <input type="hidden" name="authorId" value="<?php echo $author['AuthorId']; ?>">

        <!-- AuthorFullName -->
        <label for="authorFullName">Author Full Name:</label>
        <input type="text" id="authorFullName" name="authorFullName" value="<?php echo $author['AuthorFullName']; ?>" required>
        <br>

        <!-- AuthorEmail -->
        <label for="authorEmail">Author Email:</label>
        <input type="email" id="authorEmail" name="authorEmail" value="<?php echo $author['AuthorEmail']; ?>" required>
        <br>

        <!-- AuthorAddress -->
        <label for="authorAddress">Author Address:</label>
        <input type="text" id="authorAddress" name="authorAddress" value="<?php echo $author['AuthorAddress']; ?>">
        <br>

        <!-- AuthorBiography -->
        <label for="authorBiography">Author Biography:</label>
        <textarea id="authorBiography" name="authorBiography" rows="4" cols="50"><?php echo $author['AuthorBiography']; ?></textarea>
        <br>

        <!-- AuthorDateOfBirth -->
        <label for="authorDateOfBirth">Date of Birth:</label>
        <input type="date" id="authorDateOfBirth" name="authorDateOfBirth" value="<?php echo $author['AuthorDateOfBirth']; ?>">
        <br>

        <!-- AuthorSuspended -->
        <label for="authorSuspended">Suspended:</label>
        <select id="authorSuspended" name="authorSuspended" required>
            <option value="0" <?php echo ($author['AuthorSuspended'] == 0) ? 'selected' : ''; ?>>No</option>
            <option value="1" <?php echo ($author['AuthorSuspended'] == 1) ? 'selected' : ''; ?>>Yes</option>
        </select>
        <br>

        <input type="submit" value="Update">
    </form>

</body>
</html>
