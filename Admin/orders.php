<?php
$nonav='';
$PageTitle='orders';
include('inti.php') ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //  على البيانات من النموذج
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $details = $_POST['order_details'];

    // إنشاء استعلام الإدخال
    $stmt =  $conn->prepare("INSERT INTO orders 
                                               (customer_name,customer_phone,details) 
                                         VALUES 
                                              (:name,:phone,:details)");

    $stmt->execute(array(
     ':name'     => $customer_name,
     ':phone'   =>$customer_phone,
     ':details'  => $details));
     $count= $stmt->rowCount();

    if ($count > 0) {
        echo "تم تقديم طلبك بنجاح!";
    } else {
        echo "خطأ: " ;
    }
}

// غلق الاتصال بقاعدة البيانات

?>

<!DOCTYPE html>
<html>
<head>
    <title>طلب أوردر</title>
</head>
<body>

<h2>طلب أوردر من المطعم</h2>

<form  action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'>
    <label>الاسم:</label><br>
    <input type="text" name="customer_name" required><br><br>

    <label>رقم الهاتف:</label><br>
    <input type="text" name="customer_phone" required><br><br>

    <label>تفاصيل الطلب:</label><br>
    <textarea name="order_details" required></textarea><br><br>

    <input type="submit" value="تقديم الطلب">
</form>

</body>
</html>