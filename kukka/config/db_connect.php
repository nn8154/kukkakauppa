<?php
//connect to database
$conn = mysqli_connect('localhost', 'nn8154', '1234', 'kukka');

//check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

?>