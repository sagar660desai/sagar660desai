<?php
session_start();
require_once './connection.php';
$obj = new conect();
$obj->adminlogin();
if ($_SESSION['admin']) {
     
    $where['user_id'] = $_SESSION['admin'];
       $dataname = $obj->my_select("tbl_user", $where)->fetch_object();
    $name = $dataname->user_name . " - Artist";
}
?> 
<!DOCTYPE html>
<html lang="en">


    <head>
        <?php
        require_once './head.php';
        ?>
    </head>
    <body class="layout layout-header-fixed">
        <?php
        require_once './header.php';
        ?>
        <div class="layout-main">
            <?php
            require_once 'sidebar.php';
            ?>
            <div class="layout-content">
                <div class="layout-content-body">
                  
                </div>
            </div>
            <div class="layout-footer">
                <div class="layout-footer-body">
                    <small class="version">Version 1.0.0</small>
                    <!--<small class="copyright">2016 &copy; Elephant By <a href="http://naksoid.com/">Naksoid</a></small>-->
                </div>
            </div>
        </div>

        <?php
        require_once './footerjs.php';
        ?>
    </body>

</html>