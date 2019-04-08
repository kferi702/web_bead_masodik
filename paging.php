<?php
require_once ('./config/connect.php');
$record_per_page=5;
$page='';
$output='';

if(isset($_POST["page"])){
    $page=$_POST["page"];
}else{
    $page=1;
}
$start_from=($page-1)*$record_per_page;
$sql = "SELECT * FROM paciensek ORDER BY id ASC LIMIT $start_from, $record_per_page";
$result= mysqli_query($conn, $sql);
