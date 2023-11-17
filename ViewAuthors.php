<?php

include 'DbConn.php';

$sql = "SELECT * FROM authorstb ORDER BY AuthorFullName ASC";

$stmt = $DbConn->prepare($sql);
$stmt->execute();

$authors = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>View Authors</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>View Authors</h2>

    <?php if (count($authors) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Author ID</th>
                    <th>Author Full Name</th>
                    <th>Author Email</th>
                    <th>Author Address</th>
                    <th>Author Biography</th>
                    <th>Date of Birth</th>
                    <th>Suspended</th>
                    <th>Action</th> <!-- Added column for Delete button -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($authors as $author): ?>
                    <tr>
                        <td><?php echo $author['AuthorId']; ?></td>
                        <td><?php echo $author['AuthorFullName']; ?></td>
                        <td><?php echo $author['AuthorEmail']; ?></td>
                        <td><?php echo $author['AuthorAddress']; ?></td>
                        <td><?php echo $author['AuthorBiography']; ?></td>
                        <td><?php echo $author['AuthorDateOfBirth']; ?></td>
                        <td><?php echo $author['AuthorSuspended'] ? 'Yes' : 'No'; ?></td>
                        <td>
                            <a href="EditAuth.php?AuthorId=<?php echo $author['AuthorId']; ?>">Edit</a>
                            <a href="DelAuth.php?AuthorId=<?php echo $author['AuthorId']; ?>" onclick="return confirm('Are you sure you want to delete this author?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No authors found.</p>
    <?php endif; ?>

</body>
</html>