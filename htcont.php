<?php
$room = $_POST['room'];
include "dbconnect.php";
$sql = "SELECT * FROM `msgs` WHERE `room` = '$room'  order by sno DESC";
// echo $sql;
$res = "";
$html_content = "";
$result = mysqli_query($con,$sql);
// echo mysqli_num_rows($result);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $res = $res .'<div class="container"><img src="img/profile.jpg" class="img-responsive img-thumbnai"/>';
        $res = $res. $row['ip'];
        $res = $res. "says <p>".$row['msg'];
        $res = $res.'</p> <span class="time-right">'.$row['stime'].'</span></div>';
    }   
}
echo $res;

?>