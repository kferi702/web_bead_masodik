<?php
function is_logged() {
    if (isset($_SESSION['usern'])) {
        return false;
    } else {
        return true;
    }
}
function menu() {
    if (is_logged()) {
        echo file_get_contents('html/nav_login.html');
    } else {
        echo file_get_contents('html/nav_logout.html');
    }
}

