<?php
session_start();
require_once ('./config/connect.php');

 $perPage = 10;  
 $page = '';  
 $html = '';  
 $columnName = '';
 
 if(isset($_POST['columnName'])){
     $columnName = $_POST['columnName'];
 }else{
     $columnName = 'v_nev';
 }
 if(isset($_POST['sort'])){
     $sort = $_POST['sort'];
 }else{
      $sort = 'ASC';
 }
 if(isset($_POST["page"]) ||(isset($_POST["page"])&& $_POST["page"]<1))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start = ($page - 1)*$perPage;  
 $query = "SELECT * FROM paciensek ORDER BY " . $columnName . " " . $sort . " LIMIT $start, $perPage";  
 //echo var_dump($query);
 $result = mysqli_query($conn, $query);  
 $html .= "  
      <table id='database' class='table table-bordered'>  
           <tr>  
                <th><span onclick='sortTable(\"v_nev\");'>Név</th>  
                <th><span onclick='sortTable(\"szulev\");'>Születési idő</th>  
                <th><span onclick='sortTable(\"tbszam\");'>TB-szám</th>  
                <th><span onclick='sortTable(\"neme\");'>Neme</th>  
           </tr>  
 ";  
 while($row = mysqli_fetch_array($result))  
 {  
      $html .= '  
           <tr>  
                <td>'.$row['v_nev'] . " " . $row['k_nev'].'</td>  
                <td>'.$row['szulev'] . "-" . $row['szulho'] . "-" . $row['szulnap'].'</td>  
                <td>'.$row['tbszam'].'</td>  
                <td>'.$row['neme'].'</td>  
           </tr>  
      ';  
 }  
 $html .= '</table><br /><div align="center">';  
 $page_query = "SELECT * FROM paciensek ORDER BY v_nev ASC";  
 $page_result = mysqli_query($conn, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$perPage);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $html .= "<span class='page_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  
 $html .= '</div><br /><br />';  
 echo $html;  
 ?>  