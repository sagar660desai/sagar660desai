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

if (isset($_POST['submit'])) {
    $ds = $obj->my_select("tbl_user", ['user_login_id' => $_POST['email']])->num_rows;

    if ($ds == 0) {
        $da['user_name'] = $_POST['name'];
        $da['user_login_id'] = $_POST['email'];
        $da['user_password'] = $obj->mc_encrypt($_POST['password']);
        $da['user_role'] = 3;
        $da['user_status'] = 1;
        $da['user_entry_date'] = date("Y-m-d h:i:s");
        
        $obj->my_insert('tbl_user', $da);
    } else {
        $error = "login id  is all ready register";
    }
}
if (isset($_GET['status'])) {
    if ($_GET['status'] == 1) {
        $obj->my_update("tbl_user", ['user_status' => 0], ['user_id' => $_GET['id']]);
        header('location:artist.php?display');
    } else {
        $obj->my_update("tbl_user", ['user_status' => 1], ['user_id' => $_GET['id']]);
        header('location:artist.php?display');
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
                        <?php
                        if (isset($_GET['insert'])) {
//                        $u_info = $obj->my_select('tbl_info', ['id' => $_GET['myupdate']])->fetch_object();
                            ?>
                            <div class="col-md-12">
                                <div class="card">


                                    <div class="card-body" data-toggle="match-height">

                                        <form method="post" name="submit" action=""  enctype="multipart/form-data">

                                            <div class="insert-from-div">

                                                <div class='col-md-12'>
                                                    <div class="md-form-group md-label-floating">
                                                        <input class="md-form-control" type="text" name='name' placeholder="Enter Artist Name"  required="" />
                                                        <input class="md-form-control" type="email" name='email' placeholder="Enter id"  required="" />
                                                        <input class="md-form-control" type="text" name='password' placeholder="Enter password"  required="" />

                                                    </div>
                                                </div>




                                            </div>

                                            <button class="btn btn-outline-primary btn-thick btn-pill" name="submit" type="submit">Submit</button>

                                            <button class="btn btn-outline-default btn-thick btn-pill" type="reset">Erase</button>

                                        </form>
                                    </div>

                                </div>
                                <a href="artist.php?display">All Artist</a>
                            </div>
                            <?php
                        }
                        if (isset($_GET['display'])) {
                            ?>
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
                                                            Id
                                                        </th>
                                                        <th style="text-align: center">
                                                            Password
                                                        </th>
                                                        <th style="text-align: center" width='30%'>
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $team = $obj->my_query("select * from tbl_user where user_role = 3 order by user_id desc");
                                                    $c = 0;
                                                    while ($row = $team->fetch_object()) {
                                                        $c++;
                                                        ?>
                                                        <tr>
                                                            <td  style="text-align: center">
                                                                <?php echo $c; ?>
                                                            </td>
                                                            <td class="text-capitalize"  style="text-align: center">
                                                                <?php echo $row->user_name; ?>
                                                            </td>
                                                            <td class="text-capitalize"  style="text-align: center">
                                                                <?php echo $row->user_login_id; ?>
                                                            </td>
                                                            <td class="text-capitalize"  style="text-align: center">
                                                                <?php echo $obj->mc_decrypt($row->user_password); ?>
                                                            </td>



                                                            <td class="mytd">
                                                                <?php
                                                                if ($row->user_status == 1) {
                                                                    ?>
                                                                    <a href="artist.php?status=1&id=<?php echo $row->user_id; ?>">Active</a>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <a href="artist.php?status=0&id=<?php echo $row->user_id; ?>">Unactive</a>
                                                                    <?php
                                                                }
                                                                ?>
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
                            <a href="artist.php?insert">Add Artist</a>
                            <?php
                        }
                        ?>
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