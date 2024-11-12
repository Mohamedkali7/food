<?php
include('inti.php');






if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $tableNumber = $_POST['table_number'];

    $stmt = $conn->prepare("INSERT INTO reservations (customer_name,customer_email,reservation_date,table_number)
                                          VALUES ($name,$email,$date,$tableNumber)");
    $stmt->execute(array($name,$email,$date,$tableNumber));

    echo "Reservation successful!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book A Table</title>
</head>
<body>
    <h1>Book A Table</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br>
        
        <label>Date:</label>
        <input type="datetime-local" name="date" required><br>
        
        <label>Table Number:</label>
        <input type="number" name="table_number" required><br>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>