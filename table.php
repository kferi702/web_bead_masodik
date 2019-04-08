<?php
session_start();
require_once './php/function.php';
require_once ('./config/connect.php');
echo file_get_contents('html/head.html');
menu();

//https://www.webslesson.info/2016/08/make-pagination-using-ajax-with-jquery-php-and-mysql.html
//https://www.youtube.com/watch?v=6Ou-FCoW--Q
//lapozás
$record_per_page=5;
$page='';
$output='';
if(isset($_POST["page"])){
    $page=$_POST["page"];
}else{
    $page=1;
}
$start_from=($page-1)*$record_per_page;


//adatbázis fejléc
$table = "";
$sql = "SELECT * FROM paciensek ORDER BY id ASC;";
$result = $conn->query($sql);
//sorok száma
$count= mysqli_num_rows($result);
if($count>0){
    $paginationCount= getPagination($count);
}
?>
<div id="paging_data">
<input type='hidden' id='sort' value='asc'>            
<table id='database'>
    <tr>
        <th><span onclick='sortTable("v_nev");'>Name</span></th>
        <th><span onclick='sortTable("szulev");'>Születési idő</span></th>
        <th><span onclick='sortTable("tbszam");'>TB-szám</span></th>
        <th><span onclick='sortTable("neme");'>Neme</span></th>
    </tr>
    <?php
    //Adatbázis megjelenítése
    
    
    
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $name = $row['v_nev'] . " " . $row['k_nev'];
        $birth = $row['szulev'] . "-" . $row['szulho'] . "-" . $row['szulnap'];
        $tbnumber = $row['tbszam'];
        $gender = $row['neme'];
    ?>
        <tr>
        <td><?php echo $name; ?></td>
        <td><?php echo $birth; ?></td>
        <td><?php echo $tbnumber; ?></td>
        <td><?php echo $gender; ?></td>
    </tr>
    <?php
        
    }
} else {
    $name = "-";
    $birth = "-";
    $tbnumber = "-";
    $gender = "-";
}
    ?>
</div>






