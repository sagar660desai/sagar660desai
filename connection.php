<?php

date_default_timezone_set('Asia/Calcutta');
error_reporting(0);
define('ENCRYPTION_KEY', 'sagardesaiasdsfsdfsdfsdfsdfdsdsd');
session_start();

class conect {

    public $con;

    public function __construct() {

        $this->con = new mysqli("localhost", "root", "", "demoproject");
    }

    public function my_insert($tbl, $data) {
//        echo 'hiii';
//        echo $tbl;
//        print_r($data);

        $key = array_keys($data);
        $value = array_values($data);
//       

        $k = implode("`,`", $key);
        $v = implode("','", $value);
//        echo $k;

        $q = "INSERT INTO `$tbl`(`$k`) VALUES('$v')";
     
//        
        return $this->con->query($q);
    }

    public function my_select($tbl, $where = NULL, $field = NULL) {

        if (isset($field)) {

            $q = "SELECT `" . $field . "` FROM `$tbl`";
        } else {

            $q = "SELECT * FROM `$tbl`";
        }
        if (isset($where)) {

            $q .= " WHERE ";
            foreach ($where as $f => $value) {

                $q .= "`$f` = '$value' AND ";
            }
            $q = rtrim($q, "AND ");
        }
//        echo $q;
//        die();
        return $this->con->query($q);
    }

    public function my_update($tbl, $data, $where = null) {

        $q = "UPDATE $tbl SET ";
        if (isset($data)) {

            foreach ($data as $f => $value) {
                $q .= "`$f` = '$value', ";
            }
            $q = rtrim($q, ", ");
        }
        if (isset($where)) {
            $q .= " WHERE ";
            foreach ($where as $f => $value) {
                $q .= "`$f` = '$value' AND ";
            }
            $q = rtrim($q, "AND ");
        }
        return $this->con->query($q);
    }

    public function my_delete($tbl, $where = NULL) {

        $q = "DELETE FROM `$tbl` WHERE ";
        if (isset($where)) {

            foreach ($where as $f => $value) {
                $q .= "`$f` = '$value' AND ";
            }
            $q = rtrim($q, "AND ");
        }
//        echo $q;
//        die();
        return $this->con->query($q);
    }

    public function my_query($q) {

        return $this->con->query($q);
    }

    public function my_count($tbl, $field, $where = NULL) {

        $q = "SELECT COUNT($field) as count FROM $tbl";
        if (isset($where)) {
            $q .= " WHERE ";
            foreach ($where as $f => $value) {


                $q .= "`$f` = '$value' AND ";
            }
            $q = rtrim($q, "AND ");
        }
        return $this->con->query($q);
    }

    /*
      function mc_encrypt($encrypt) {
      $mc_key = ENCRYPTION_KEY;
      $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
      $passcrypt = trim(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $mc_key, trim($encrypt), MCRYPT_MODE_ECB, $iv));
      $encode = base64_encode($passcrypt);
      return $encode;
      }

      // Decrypt Function
      function mc_decrypt($decrypt) {
      $mc_key = ENCRYPTION_KEY;
      $decoded = base64_decode($decrypt);
      $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
      $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $mc_key, trim($decoded), MCRYPT_MODE_ECB, $iv));
      return $decrypted;
      }

     */

    function mc_encrypt($encrypt) {
        $simple_string = $encrypt;

        $ciphering = "AES-128-CTR";

        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        $encryption_iv = '1234567891011121';

// Store the encryption key 
        $encryption_key = ENCRYPTION_KEY;

// Use openssl_encrypt() function to encrypt the data 
        $encryption = openssl_encrypt($simple_string, $ciphering,
                $encryption_key, $options, $encryption_iv);
        return $encryption;
    }

    function mc_decrypt($decrypt) {
        $decryptt = $decrypt;
        // Non-NULL Initialization Vector for decryption 
        $ciphering = "AES-128-CTR";

        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $decryption_iv = '1234567891011121';

// Store the decryption key 
        $decryption_key = ENCRYPTION_KEY;

// Use openssl_decrypt() function to decrypt the data 
        $decryption = openssl_decrypt($decryptt, $ciphering,
                $decryption_key, $options, $decryption_iv);
        return $decryption;
    }

    function userlogin() {
        if (!isset($_SESSION['user_id'])) {
            header('location:login.php');
        }
    }

    function adminlogin() {
        if (!isset($_SESSION['admin'])) {
            header('location:index.php');
        }
    }

}

?>