<?php
include('config/config.php');
include('includes/header.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $blood_group = $_POST['blood_group'];
    $location = $_POST['location'];
    $date = $_POST['date'];

    $sql = "INSERT INTO requests (user_id, blood_group, location, date) VALUES ('$user_id', '$blood_group', '$location', '$date')";
    if ($conn->query($sql) === TRUE) {
        echo "Request submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<div class="container">
    <h2>Request Blood</h2>
    <form method="POST" action="">
        <input type="text" name="blood_group" placeholder="Blood Group" required>
        <input type="text" name="location" placeholder="Location" required>
        <input type="date" name="date" placeholder="Date" required>
        <button type="submit">Request</button>
    </form>
</div>

<?php include('includes/footer.php'); ?>
