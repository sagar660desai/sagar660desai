<?php
require_once './connection.php';
$obj = new conect();

if (isset($_POST['submit'])) {


    $data['user_login_id'] = $_POST['email'];
    $data['user_password'] = $obj->mc_encrypt($_POST['password']);

    $cou = $obj->my_select('tbl_user', $data);

    if ($cou->num_rows == 1) {
        $user = $cou->fetch_object();
      
        if ($user->user_status == 1) {
            switch ($user->user_role) {
                case 1:
                    $_SESSION['admin'] = $user->user_id;
                    header('location:admindashboard.php');
                    break;
                    ;
                case 2:
                    $_SESSION['manager'] = $user->user_id;
                    header('location:managerdashboard.php');
                    break;
                case 3:
                    $_SESSION['artist'] = $user->user_id;
                    header('location:artistdashboard.php');
                    break;
            }
        } else {
            $error = "restrict User";
        }
    } else {
        $error = "somthing wrong...!";
    }
}
?>
<!-- comment --><!DOCTYPE html>
<html lang="en">

    <head>
        <?php
        require_once './head.php';
        ?>
    </head>
    <body>
        <div class="login">
            <div class="login-body">

                <div class="login-form">
                    <form  method="post" name="submit">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" name="email"   required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" data-msg-required="Please enter your password." required>
                        </div>
                        <div class="form-group">
                            <span aria-hidden="true"> · </span>
                            <?php
                            if (isset($error)) {
                                ?>
                                <a><?php echo $error; ?></a>
                                <?php
                            }
                            ?>
                        </div>
                        <button class="btn btn-primary btn-block" name="submit" type="submit">Sign in</button>
                    </form>
                </div>
            </div>
            <!--            <div class="login-footer">
                            Don't have an account? <a href="signup-2.html">Sign Up</a>
                        </div>-->
        </div>
        <?php
        require_once './footerjs.php';
        ?>

    </body>

</html>