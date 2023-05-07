<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <style>
        html,body{
            height: 100%;
            background-image: linear-gradient(to bottom right,#ffffff,#baffab);
        }
        table{
            background-color: whitesmoke;
        }
    </style>
</head>
<body>
    


<?php
include("conn.php");
error_reporting(0);

$query = "SELECT * FROM form";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
// echo "<br>$total";

// $result = mysqli_fetch_assoc($data);
// echo "<br>$result";
// echo $result[name]." ".$result[phone];

if($total != 0){
    ?>
    
    <h1 align="center"><mark>Displaying DATA (php CRUD)</mark></h1>
    <center>
    <table border="1" cellspacing="7" width=99%">
        <tr>
        <th width="3%">ID</th>
        <th width="8%">Image</th>
        <th width="8%">name</th>
        <th width="10%">phone</th>
        <th width="10%">email</th>
        <th width="7%">gender</th>
        <th width="7%">caste</th>
        <th width="9%">language</th>
        <th width="18%">address</th>
        <th width="19%">operation</th>
        </tr>
        
<?php
    while($result = mysqli_fetch_assoc($data)){
        // echo $result[name]." ".$result[phone];
        echo "<tr>
                  <td>".$result['id']."</td>
                  <td><img src=' ".$result['image']."' height='100px' width='100px'></td>
                  <td>".$result['name']."</td>
                  <td>".$result['phone']."</td>
                  <td>".$result['email']."</td>
                  <td>".$result['gender']."</td>
                  <td>".$result['caste']."</td>
                  <td>".$result['language']."</td>
                  <td>".$result['address']."</td>
                  <td>
                  <a href='update_design.php?id=$result[id]'><button>Update</button></a>
                  <a href='delete.php?id=$result[id]'> <input type='submit' value='Delete' onclick = 'return checkdelete()'> </a>
                  </td>
              </tr>
        
        
        ";
    }
}
else{
    echo "no Records found";
}

?>
</table>
</center>
<script>
    function checkdelete(){
        return confirm('Are you sure want to delete this data?');
    }
</script>
</body>
</html>

