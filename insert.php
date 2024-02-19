
<?php
  if( isset( $_POST['name'] ) )
  {
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $con = mysqli_connect("localhost","jules","F05D730D5F","twitter");
    $insert = " INSERT INTO user (name,mail) VALUES( '$name','$mail' ) ";
    mysqli_query($con, $insert); 
  }
?>