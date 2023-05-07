<?php
include("conn.php");
$id = $_GET['id'];

$query = "DELETE FROM form where id = '$id'";
$data = mysqli_query($conn,$query);
if($data){
    // echo " <script>alert('record delete successfully')</script>";
    ?>
    
    <meta http-equiv = "refresh" content = "0; url = http://localhost/crud_php/display.php" />
    
    <?php
}
else{
    echo "unsuccessfull";
}





?>