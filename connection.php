<?php
$conn = mysqli_connect('localhost','spandan','test1234','cookbook.co');
if(!$conn)
{
    echo 'connection err ' . mysqli_connect_error();
}
?>