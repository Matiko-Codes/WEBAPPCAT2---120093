<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Author Details Submission</title>
</head>
<body>

    <h2>Author Details Submission</h2>

    <form action="processes/AutRegistration.php" method="post">
        
        <!-- AuthorFullName -->
        <label for="authorFullName">Author Full Name:</label>
        <input type="text" id="authorFullName" name="authorFullName" required>
        <br>

        <!-- AuthorEmail -->
        <label for="authorEmail">Author Email:</label>
        <input type="email" id="authorEmail" name="authorEmail" required>
        <br>

        <!-- AuthorAddress -->
        <label for="authorAddress">Author Address:</label>
        <input type="text" id="authorAddress" name="authorAddress">
        <br>

        <!-- AuthorBiography -->
        <label for="authorBiography">Author Biography:</label>
        <textarea id="authorBiography" name="authorBiography" rows="4" cols="50"></textarea>
        <br>

        <!-- AuthorDateOfBirth -->
        <label for="authorDateOfBirth">Date of Birth:</label>
        <input type="date" id="authorDateOfBirth" name="authorDateOfBirth">
        <br>

        <!-- AuthorSuspended -->
        <label for="authorSuspended">Suspended:</label>
        <select id="authorSuspended" name="authorSuspended" required>
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
        <br>

        <input type="submit" name="submitBtn" value="Submit">
    </form>

</body>
</html>