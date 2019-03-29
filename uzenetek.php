<?php
session_start();
$head = file_get_contents('html/head.html');
if (isset($_SESSION['usern'])) {
    $menu = file_get_contents('html/nav_logout.html');
} else {
    $menu = file_get_contents('html/nav_login.html');
}
?>
<html>

    <?php
    echo $head;
    ?>
    <body>    
        <div class="container">

            <?php
            echo $menu;

            $fname = "comments.txt";
// Fájl beolvasása
            if (file_exists($fname)) {
                $comment_wall = file_get_contents($fname);
            }
// comment mentése a fájlba
            if (isset($_POST["cbox"])) {
                $cbox = $_POST["cbox"];
                if (!empty($cbox)) {
                    $name = $_POST["name"];
                    $txt = "\n<hr>";
                    $txt .= date('Y-m-d H:i:s') . " " . $name;
                    $txt .= "<br>";
                    $txt .= $cbox;

                    file_put_contents($fname, $txt, FILE_APPEND);    // write the content to the file
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                }
            }
            ?>

            <form id="combox" method="post" action="#">
                Név:
                <br>
                <input id="cname" type="text" name="name" placeholder="Név" value="vendég">
                <br>
                Üzenet:
                <br>
                <textarea id="cbox" name="cbox" cols="25" rows="5"></textarea>
                <br>
                <input id="commbutton" type="submit" name="submit" value="submit">
            </form>
            <?php
            echo "<fieldset id='comments'>" . $comment_wall . "</fieldset>";
            ?>
    </body>
</html>
</div>
<footer>
    <?php
    echo "Ma " . date("Y.m.d") . " van.";
    ?>
</footer>
</body>
</html>



