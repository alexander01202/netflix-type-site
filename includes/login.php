<?php
    include '../admin/includes/dbh.php';

    if (isset($_POST['loginbtn'])) {
        $Email = $_POST['loginuid'];
        $Password = $_POST['password'];
        $query = "SELECT * FROM register WHERE email = ? OR username = ?;";
        $query_run = mysqli_query($conn, $query);
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../login?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $Email, $Email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $checkPwd = password_verify($Password, $row["password"]);
                if ($checkPwd === false) {
                    header("Location: ../login?error=wrongpassword&user=".$Email);
                    exit();
                }elseif ($checkPwd === true) {
                    $sqltoken = "SELECT userid FROM logintoken WHERE userid ='".$row['id']."';";
                    $queryusertoken = mysqli_query($conn, $sqltoken);
                    if(mysqli_num_rows($queryusertoken) > 0){
                        $DelToken = "DELETE FROM logintoken WHERE userid='".$row['id']."'";
                        $queryDelToken = mysqli_query($conn,$DelToken);
                    }
                    $token = bin2hex(random_bytes(32));
                    $tokenHash = password_hash($token, PASSWORD_DEFAULT);
                    $sqltoken = "INSERT INTO logintoken(userid,token) VALUES('".$row['id']."','$tokenHash');";
                    $querysqlToken = mysqli_query($conn, $sqltoken);
                    setcookie('usertoken',$token, time() + 31536000, "/");
                    setcookie('userid',$row["id"], time() + 31536000, "/"); 
                    
                    session_start();
                    $_SESSION['userid'] = $row["id"];
                    $_SESSION['username'] = $row["username"];
                    $_SESSION['email'] = $row["email"];
                    header('Location: https://www.yournetflixwebsite.com?login=success');
                    exit();
                } 
            }else {
                header("Location: ../login?error=nouser");
                exit();
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        header('Location: ../login.php?areyoudownbad:(');
        exit();
    }