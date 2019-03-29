<?php
session_start();
require_once './php/function.php';
echo file_get_contents('html/head.html');
menu();
echo file_get_contents('html/nyitvatartas.html');
?>




</div>
<footer>
    <?php
    echo "Ma " . date("Y.m.d") . " van.";
    ?>
</footer>
</body>
</html>