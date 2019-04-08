<?php

require_once ('./config/connect.php');

$columnName = $_POST['columnName'];
$sort = $_POST['sort'];

$sql = "SELECT * FROM paciensek ORDER BY " . $columnName . " " . $sort . " ";
echo var_dump($sql);
$result = $conn->query($sql);

//Adatbázis megjelenítése
$html = "";
while ($row = $result->fetch_assoc()) {
    $name = $row['v_nev'] . " " . $row['k_nev'];
    $birth = $row['szulev'] . "-" . $row['szulho'] . "-" . $row['szulnap'];
    $tbnumber = $row['tbszam'];
    $gender = $row['neme'];

    $html .= "<tr>
        <td>" . $name . "</td>
        <td>" . $birth . "</td>
        <td>" . $tbnumber . "</td>
        <td>" . $gender . "</td>
            </tr>";
}
echo $html;
