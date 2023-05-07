<?php
include("conn.php");

$id = $_GET['id'];
$query = "SELECT * FROM form where id= '$id'";
$data = mysqli_query($conn, $query);
// $total = mysqli_num_rows($data);

$result = mysqli_fetch_assoc($data);


//checkbox
$lang1 = $result['language'];
$language1 = explode(",",$lang1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update details</title>
    <link rel="stylesheet" href="formstyle.css">
    <!-- background-image: linear-gradient(to bottom right,#d5ede0,#ffffff); -->
</head>
<body>
    <div class="box">
        <h1>Update your Details</h1>
        <hr>
        <div class="form">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="inside_box">
                    <label for="uploadfile">Photo</label>
                    <input type="file" id="uploadfile" name="uploadfile" >
                </div>
                <div class="inside_box">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $result['name']; ?>" required>
                </div>
                <div class="inside_box">
                    <label for="phone">Phone no.</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $result['phone']; ?>" required>
                </div>
                <div class="inside_box">
                    <label for="email">Email Id</label>
                    <input type="email" id="email" name="email" value="<?php echo $result['email']; ?>" required>
                </div>
                <div class="inside_box">
                    <label for="gender">Gender</label>
                    <select name="gender" required>
                        <option value="">select</option>
                        <option value="male"
                           <?php 
                             if($result['gender'] == 'male'){
                               echo "selected";
                             }
                           ?>
                        >
                            Male</option>

                        <option value="female"
                        <?php 
                             if($result['gender'] == 'female'){
                               echo "selected";
                             }
                           ?>
                        >
                            Female</option>
                    </select>
                </div>
                <div class="inside_box">
                    <label for="caste">Caste</label>
                    <input type="radio" id="caste" name="caste" value="general" required
                    <?php
                    if($result['caste'] == "general"){
                        echo "checked";
                    }
                    ?>
                    >General
                    <input type="radio" id="caste" name="caste" value="st" required
                    <?php
                    if($result['caste'] == "st"){
                        echo "checked";
                    }
                    ?>
                    >ST
                    <input type="radio" id="caste" name="caste" value="obc" required
                    <?php
                    if($result['caste'] == "obc"){
                        echo "checked";
                    }
                    ?>
                    >OBC
                </div>
                <div class="inside_box">
                    <label for="language">Language</label>
                    <input type="checkbox" name="language[]" id="language[]" value="english"
                    <?php
                    if(in_array('english', $language1)){
                        echo "checked";
                    }
                    ?>
                    >English
                    <input type="checkbox" name="language[]" id="language[]" value="hindi"
                    <?php
                    if(in_array('hindi', $language1)){
                        echo "checked";
                    }
                    ?>
                    >Hindi
                    <input type="checkbox" name="language[]" id="language[]" value="gujarati"
                    <?php
                    if(in_array('gujarati', $language1)){
                        echo "checked";
                    }
                    ?>
                    >Gujarati
                </div>
                <div class="inside_box">
                    <label for="address">Address</label>
                    <textarea name="address" id="address"  cols="40" rows="5" style="resize: none;"><?php echo $result['address'];?>
                     </textarea>
                </div>
                <div class="inside_box">
                    <input type="submit" value="Update Details" name="update">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if($_POST['update']){

    // print_r($_FILES["uploadfile"]);
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = 'images1/'.basename($filename);
    //  echo $folder
    move_uploaded_file($tempname, $folder);


    $name     =  $_POST['name'];
    $phone    =  $_POST['phone'];
    $email    =  $_POST['email'];
    $gender   =  $_POST['gender'];
    $caste   =  $_POST['caste'];
    $lang   =  $_POST['language'];
    $language = implode(",",$lang);
    
    $address  =  $_POST['address'];

    $query = "UPDATE form set image='$folder',name='$name',phone='$phone',email='$email',gender='$gender',caste='$caste',language='$language',address='$address' where id='$id'";
    $data = mysqli_query($conn,$query);

    if($data){
        echo " <script>alert('record updated successfully')</script>";
        ?>

        <meta http-equiv = "refresh" content = "0; url = http://localhost/crud_php/display.php" />
        
        <?php
    }
    else{
        echo "unsuccessfull";
    }



}
?>