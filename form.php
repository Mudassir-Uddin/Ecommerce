
<?php

if(isset($_POST['send'])){
  

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    if(isset($_FILES['myimage'])){
        if($_FILES['myimage']['type'] == 'image/jpeg' || $_FILES['myimage']['type'] == 'image/jpg' || $_FILES['myimage']['type'] == 'image/png'){
            

    $imagename = $_FILES['myimage']['name'];
    $tmpname = $_FILES['myimage']['tmp_name'];
    $imagename = time(). $imagename;

    move_uploaded_file($tmpname,"images/".$imagename);

    echo "My Name is : " . $fname . $lname ;
    echo "<br> Email : " . $email ;
    echo "<img src='images/$imagename' width='200px'/> ";
    
}
else{
    echo "<script>alert('image extension')</script>";
}

}
}
?>