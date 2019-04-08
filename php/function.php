<?php
////első kettő az oldalakhoz???
//define('PAGE_PER_NO',8);
////oldalszámoló
//function getPagination($count){
//    $paginationCount=floor($count/PAGE_PER_NO);
//    $pageModeCount=$count%PAGE_PER_NO;
//    if(!empty($pageModeCount)){
//        $paginationCount++;
//    }
//    return $paginationCount;
//}




//bejelntkezés ellenörzése
function is_logged() {
    if (isset($_SESSION['usern'])) {
        return false;
    } else {
        return true;
    }
}
//menü bejelntkezés szerint
function menu() {
    if (is_logged()) {
        echo file_get_contents('html/nav_login.html');
    } else {
        echo file_get_contents('html/nav_logout.html');
    }
}

