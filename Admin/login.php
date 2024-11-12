<?php 
session_start();
include('inti.php'); 
$PageTitle = 'members';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username  = $_POST['username'];
    $password  = $_POST['password'];
   $hashedPass=sha1($password);

    $stmt = $conn->prepare("SELECT 
                                id, username, password 
                            FROM 
                                 users
                            WHERE  
                                 username = ? 
                            AND 
                                 password=? 
                            AND
                                 groupid=1
                            ");
    $stmt->execute(array($username, $hashedPass));
    $count=$stmt->rowCount();
    
if($count>0){
     header('location:modifications.php');
     exit();
}else{
     header('location:index.php');
     exit();
}
   
        
    
    include('function/footer.php');
}

?>

<h1>Login</h1>
<form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <label>Username</label>
    <input type="text" name="username" required><br>

    <label>Password</label>
    <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>