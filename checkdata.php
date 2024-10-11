<?php
//This script is to show the validated data from contact.php
session_start();
if (!isset($_SESSION['contact'])) {
    header('Location: contact_form.php');
    exit;
}

$contact = $_SESSION['contact'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Contact Data</h1>

    <p><strong>ID:</strong> <?php echo htmlspecialchars($contact['id']); ?></p>
    <p><strong>Title:</strong> <?php echo htmlspecialchars($contact['title']); ?></p>
    <p><strong>First Name:</strong> <?php echo htmlspecialchars($contact['firstname']); ?></p>
    <p><strong>Last Name:</strong> <?php echo htmlspecialchars($contact['lastname']); ?></p>
    <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($contact['dob']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($contact['phone']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($contact['email']); ?></p>
    <p><strong>Type:</strong> <?php echo htmlspecialchars(implode(', ', $contact['type'])); ?></p>

    <p>No errors, all data is valid!</p>
</div>
</body>
</html>