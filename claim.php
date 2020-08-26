<?php

$room = $_POST['room'];

if(strlen($room)>20 || strlen($room)<2){
    $message = "Please choose a name between 2 to 20 Character";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo 'window.location="http://localhost/chatroom"';
    echo '</script>';
}
else if(!ctype_alnum($room)){
    $message = "Please chose an alphanumeric name";
    echo '<script language="javascript">';
    echo 'alert("'.$message.'");';
    echo '</script>';
    header('location:http://localhost/chatroom');

}else{
    include "dbconnect.php";
    
//check if room already exists
$sql = "SELECT * FROM `room` where `name` = '$room'";
$result = mysqli_query($con,$sql);
if($result){
    echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) > 0){
        $message = "Please choose diffrent  room name. This room already exsist";
        echo '<script language="javascript">';
        echo 'alert("'.$message.'");';
        echo 'window.location="http://localhost/chatroom"';
        echo '</script>';
    }else{
        $sql = "INSERT INTO `room`(`name`) VALUES ('$room')";
        // echo $sql;
        if(mysqli_query($con,$sql)){
            $message = "Your room is ready and you can chat now!";
            echo '<script language="javascript">';
            echo 'alert("'.$message.'");';
            echo 'window.location="http://localhost/chatroom/room.php?roomname='.$room.'"';
            echo '</script>';
        }
    }
}

}
?>