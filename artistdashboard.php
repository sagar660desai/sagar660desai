<?php
require_once './connection.php';
$obj = new conect();
session_start();
if ($_SESSION['artist']) {

    $where['user_id'] = $_SESSION['artist'];
    $dataname = $obj->my_select("tbl_user", $where)->fetch_object();
    $name = $dataname->user_name . " - Artist";
} else {
    header('location:index.php');
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
                    <div class="row gutter-xs" id="about">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong> My Project    </strong>
                                </div>
                                <div class="card-body" data-toggle="match-height"
                                     <div class="row">

                                    <div class="col-md-12">
                                        <table class="table table-responsive table-bordered table-hover" >
                                            <thead>
                                                <tr class="mytr">
                                                    <th style="text-align: center" width='8%'>
                                                        NO
                                                    </th>
                                                    <th style="text-align: center">
                                                        name
                                                    </th>
                                                    <th style="text-align: center">
                                                        Manager
                                                    </th>
                                                    <th style="text-align: center">
                                                        Artist
                                                    </th>
                                                    <th style="text-align: center" width='30%'>
                                                        Date
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $team = $obj->my_query("select * from tbl_project where p_artist = ".$_SESSION['artist']." order by p_id desc");
                                                $c = 0;
                                                while ($row = $team->fetch_object()) {
                                                    $c++;
                                                    ?>
                                                    <tr>
                                                        <td  style="text-align: center">
                                                            <?php echo $c; ?>
                                                        </td>
                                                        <td class="text-capitalize"  style="text-align: center">
                                                            <?php echo $row->p_name; ?>
                                                        </td>
                                                        <td class="text-capitalize"  style="text-align: center">

                                                            <?php
                                                            echo $obj->my_select('tbl_user', ['user_id' => $row->p_manager])->fetch_object()->user_name;
                                                            ?>
                                                        </td>
                                                        <td class="text-capitalize"  style="text-align: center">
                                                            <?php echo $obj->my_select('tbl_user', ['user_id' => $row->p_artist])->fetch_object()->user_name; ?>
                                                        </td>
                                                        <td class="text-capitalize"  style="text-align: center">
                                                            <?php echo $row->p_date ?>
                                                        </td>



                                                        <td class="mytd">

                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br />  






                            </div>
                        </div>
                        
                        <?php ?>
                    </div>
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