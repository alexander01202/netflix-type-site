<?php include '../admin/includes/dbh.php';

if (isset($_POST['reset-pwdsubmit'])) {
   $selector = $_POST['selector'];
   $validator = $_POST['validator'];
   $pwd = $_POST['pwd'];
   $repeatpwd = $_POST['repeatpwd'];

   if ($pwd !== $repeatpwd) {
       header("location: create-new-pwd?error=pwdnotsame");
       exit();
   }
   $currentDate = date("U");

   $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= $currentDate";
   $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error or contact yournetflixwebsite";
    }else {
        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to resubmit Your reset request";
            exit();
        }else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row['pwdResetToken']);

            if ($tokenCheck === false) {
                echo "You need to resubmit Your reset request";
                exit();
            }elseif ($tokenCheck === true) {
                
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM register WHERE email = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error";
                    exit();
                }else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error";
                        exit();
                    }else {
                        $sql = "UPDATE register SET `password`=? WHERE email=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error";
                            exit();
                        }else {
                            $newhashpwd = password_hash($pwd, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newhashpwd, $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error";
                            }else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("location: ../login?newpwd=updated");
                            }
                        }
                    }
                }    
            }
        }
    }
}else {
    header("location: ../index");
}