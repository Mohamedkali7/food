<?php
session_start();
$nonav='';
$PageTitle='modifications';

  if(isset($_SESSION['username'])){
    include('init.php');

    $do=isset($_GET['do'])? $_GET['do']: 'manage';

    if($do=='manage'){

     echo"manag";
    echo"<a >+Edit</a>";
    }elseif($do=='Edit'){?>

   <form method="POST" action="" enctype="multipart/form-data">
    <div>
        <label for="food_name">Name Food</label>
        <input type="text" name="food_name" id="food_name" required>
    </div>
    
    <div>
        <label for="description">description</label>
        <textarea name="description" id="description" rows="4" required></textarea>
    </div>
    
    <div>
        <label for="price">Price</label>
        <input type="number" name="price" id="price"  required>
    </div>
    
    <div>
        <label for="image">Image</label>
        <input type="file" name="image" id="image" accept="image/*" required>
    </div>
    
    <button type="submit">SAVE</button>
</form>


   <?php
    }


    include("function/footer.php");
  }else{
    
  }