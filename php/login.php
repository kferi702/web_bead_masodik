<?php

session_start();
require_once ('../config/connect.php');
if (isset($_POST['submit'])) {
    unset($_SESSION['error']);
    $username = $_POST['uname'];
    $password = $_POST['pword'];

    $sql = "SELECT name "
            . "FROM users "
            . "WHERE users.username=? "
            . "AND users.password=? ;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        //Sikeresen bejelentkezés
        $row = $result->fetch_row();
        $_SESSION['usern'] = $row[0];
    } else {
        //Sikertelen bejelentkezés
        $_SESSION['error'] = 'Helytelen felhasználónév vagy jelszó!';
    }
    header('location: ../index.php');
}
   

