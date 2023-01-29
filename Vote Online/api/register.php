<?php
include("connect.php");
$name = $_POST["name"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$address = $_POST["address"];
$photo = $_FILES["photo"]["name"];
$tmp_name = $_FILES["photo"]["tmp_name"];
$role = $_POST["role"];

if($password==$cpassword){
    move_uploaded_file($tmp_name, "../uploads/$photo");
    $insert = mysqli_query($connect, "INSERT INTO User (name,phone,password,address,photo,role,status,votes) VALUES ('$name','$phone','$password','$address','$photo','$role',0,0)" );
    if($insert){
        echo '
            <script>
                alert("Registration Successful");
                window.location="../";
            </script>
        ';
    }
    else{
        echo '
            <script>
                alert("Some error occurred");
                window.location="../sources/register.html";
            </script>
        ';
    }
}
else{
    echo '
    <script>
        alert("Password and Confirm Password did not match");
        window.location="../sources/register.html";
    </script>
    ';
}
?>