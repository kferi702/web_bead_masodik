<?php
session_start();
require_once './php/function.php';
require_once ('./config/connect.php');
echo file_get_contents('html/head.html');
menu();


    $sql = "SELECT * FROM paciensek ;";
    $result = $conn->query($sql);
    //Adatbázis megjelenítése
    if ($result) {
        $table = "<table id='database'>
            <tr>
            <th>Neve</th>
            <th>Születési idő</th>
            <th>TB-szám</th>
            <th>Neme</th>
            
            </tr>";
        while ($row = $result->fetch_assoc()) {
            $table .= "<tr>" .
                    "<td>{$row['v_nev']} {$row['k_nev']}</td>" .
                    "<td>{$row['szulev']}-{$row['szulho']}-{$row['szulnap']}</td>" .
                    "<td>{$row['tbszam']}</td>" .
                    "<td>{$row['neme']}</td>";
        }
        $table .= "</table>";
    } else {
        $table = "hiba az adatbázisban!";
    }
    echo $table;
    //Szűres megjelenítése
//    $sql = "SELECT DISTINCT neme FROM adatok";
//    $result = $conn->query($sql);
//    if ($result) {
//        $szures= "<form id='szures' method='get' action='adatlap.php'>";
//        $szures .= "<select name='neme'>";
//        //legördülő lista
//        while ($row = $result->fetch_row()) {
//            $szures .= "<option>$row[0]</option>";
//        }
//        $szures .= "</selection><input type='submit' value='Szűrés'></form>";
//
//        
//    }
?>




