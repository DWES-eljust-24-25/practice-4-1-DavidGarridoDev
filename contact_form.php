<?php
// In this script, do the self-validated form

session_start();
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

// Initialize default values
$title = "Mr."; // Default title
$name = "";
$surname = "";
$birthdate = "";
$phone = "";
$email = "";
$favourite = false;
$important = false;
$archived = false;

// Attempt to load contacts
$contacts = require_once __DIR__ . '/data.php';

// Verify if contacts were loaded correctly
if (!is_array($contacts)) {
    die("Error: Contact data is not available. Check the data.php file.");
}

// If an ID is provided, look for the contact data
if ($id !== null) {
    $found = false; // Variable to check if the contact was found
    foreach ($contacts as $contact) {
        if ($contact['id'] === $id) {
            $title = $contact['title'];
            $name = $contact['name'];
            $surname = $contact['surname'];
            $birthdate = $contact['birthdate'];
            $phone = $contact['phone'];
            $email = $contact['email'];
            $favourite = $contact['favourite'];
            $important = $contact['important'];
            $archived = $contact['archived'];
            $found = true; // Contact was found
            break;
        }
    }
    // If the contact is not found, display an error
    if (!$found) {
        die("Error: Contact with ID $id not found.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Contact Form</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Contact Form</h2>
        <form action="checkdata.php" method="post">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <div>
                    <input type="radio" name="title" value="Mr." <?php echo ($title == "Mr.") ? "checked" : ""; ?>> Mr.
                    <input type="radio" name="title" value="Mrs." <?php echo ($title == "Mrs.") ? "checked" : ""; ?>> Mrs.
                    <input type="radio" name="title" value="Miss" <?php echo ($title == "Miss") ? "checked" : ""; ?>> Miss
                </div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $surname; ?>" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label>Type</label><br>
                <input type="checkbox" name="favourite" value="1" <?php echo $favourite ? 'checked' : ''; ?>> Favourite<br>
                <input type="checkbox" name="important" value="1" <?php echo $important ? 'checked' : ''; ?>> Important<br>
                <input type="checkbox" name="archived" value="1" <?php echo $archived ? 'checked' : ''; ?>> Archived<br>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="submit" formaction="checkdata.php" class="btn btn-success">Update</button>
            <button type="submit" formaction="delete.php" class="btn btn-danger">Delete</button>
        </form>
    </div>
</body>
</html>
