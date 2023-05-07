<?php include("conn.php"); 
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="formstyle.css">
</head>
<body>
    <div class="box">
        <h1>Registration Form</h1>
        <hr>
        <div class="form">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="inside_box">
                    <label for="uploadfile">Photo</label>
                    <input type="file" id="uploadfile" name="uploadfile">
                </div>
                <div class="inside_box">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="inside_box">
                    <label for="phone">Phone no.</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="inside_box">
                    <label for="email">Email Id</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="inside_box">
                    <label for="gender">Gender</label>
                    <select name="gender" required>
                        <option value="">select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="inside_box">
                    <label for="caste">Caste</label>
                    <input type="radio" id="caste" name="caste" value="general" required>General
                    <input type="radio" id="caste" name="caste" value="st" required>ST
                    <input type="radio" id="caste" name="caste" value="obc" required>OBC
                </div>
                <div class="inside_box">
                    <label for="language">Language</label>
                    <input type="checkbox" name="language[]" id="lang" value="english">English
                    <input type="checkbox" name="language[]" id="lang" value="hindi">Hindi
                    <input type="checkbox" name="language[]" id="lang" value="gujarati">Gujarati
                </div>
                <div class="inside_box">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="40" rows="5" style="resize: none;" required></textarea>
                </div>
                <div class="inside_box">
                    <input type="submit" value="Submit Form" name="submit">
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if($_POST['submit']){

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
    $caste    =  $_POST['caste'];
    $lang    =  $_POST['language'];
    $language = implode(",",$lang);

    $address  =  $_POST['address'];

    $query = "INSERT INTO form (image,name,phone,email,gender,caste,language,address) values('$folder','$name','$phone','$email','$gender','$caste','$language','$address') ";
    $data = mysqli_query($conn,$query);

    if($data){
        echo " <script>alert('data inserted successfully')</script>";
    }
    else{
        echo "unsuccessfull";
    }



}
?>