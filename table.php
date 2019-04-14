<?php
session_start();
require_once './php/function.php';
require_once ('./config/connect.php');
echo file_get_contents('html/head.html');
menu();
if (isset($_SESSION['usern'])) {
    echo "<input type='hidden' id='sort' value='ASC'>" 
."<div id=\"page_data\">" 
                ."</div>";
}else{
    header('Location: index.php');
}
 ?>

     
