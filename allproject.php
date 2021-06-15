<?php
session_start();
require_once './connection.php';
$obj = new conect();

if (isset($_SESSION['admin'])) {

    $where['user_id'] = $_SESSION['admin'];
    $dataname = $obj->my_select("tbl_user", $where)->fetch_object();
    $name = $dataname->user_name . " - Artist";
} elseif (isset($_SESSION['manager'])) {
    $where['user_id'] = $_SESSION['manager'];
    $dataname = $obj->my_select("tbl_user", $where)->fetch_object();
    $name = $dataname->user_name . " - Artist";
} else {
    header('location:index.php');
}
if (isset($_POST['submit'])) {
    $ds = $obj->my_select("tbl_user", ['user_login_id' => $_POST['email']])->num_rows;
    if ($ds == 0) {
        $data['user_name'] = $_POST['name'];
        $data['user_login_id'] = $_POST['email'];
        $data['user_password'] = $obj->mc_encrypt($_POST['password']);
        $data['user_role'] = 3;
        $data['user_status'] = 1;
        $data['user_entry_date'] = date("Y-m-d h:i:s");
        $obj->my_insert('tbl_user', $data);
    } else {
        $error = "login id  is all ready register";
    }
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
            <div class = "layout-content">

                <div class = "layout-content-body">



                    <?php
                    if (isset($error)) {
                        ?>
                        <p><?php echo $error; ?></p>
                        <?php
                    }
                    ?>

                    <div class="row gutter-xs" id="about">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong> All Title    </strong>
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
                                                $team = $obj->my_query("select * from tbl_project order by p_id desc");
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
                        <a href="addproject.php">Add Project</a>
                        <?php ?>
                    </div>
                </div>
                <?php
//                    }
                ?>
                <br />
                <br />
                <?php ?>

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