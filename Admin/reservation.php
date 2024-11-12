<?php
session_start();
include('function/nav.php');echo'<br>';
 include('inti.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
   

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone=$_POST['phone'];
    $date = $_POST['date'];
    $tableNumber = $_POST['table_number'];
    
   

    $stmt = $conn->prepare("INSERT INTO reservations (customer_name, customer_email,phone, reservation_date, table_number)
                            VALUES (:name,:email,:phone,:date,:tableNumber)");
    
    $stmt->execute(array(
        ':name'        => $name,
        ':email'       => $email,
        ':phone'       =>$phone,
        ':date'        => $date,
        ':tableNumber' => $tableNumber
    ));
   
    echo "Reservation successful!";
}

include('function/footer.php');
?>
<h1>Book A Table</h1>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        
        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>phone:</label>
        <input type="text" name="phone" required><br>

        <label>Date:</label>
        <input type="datetime-local" name="date" required><br>
        
        <label>Table Number:</label>
        <input type="number" name="table_number" required><br>
        
        <button type="submit">Submit</button>
    </form>