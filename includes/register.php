<?php

include '../admin/includes/dbh.php';

if (isset($_POST['registerbtn'])) {
    $username = mysqli_real_escape_string($conn, $_POST['registeruid']);
    $email = mysqli_real_escape_string($conn,$_POST['registerEmail']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $referral = '';
    $confirmpassword = mysqli_real_escape_string($conn,$_POST['Rpassword']);

    $sql = "SELECT * FROM register WHERE username ='$username' OR email='$email'";
    $sqlquery = mysqli_query($conn, $sql);

    if (mysqli_num_rows($sqlquery) > 0) {
        $rows = mysqli_fetch_assoc($sqlquery);
        if ($rows['username'] === $username) {
            header('Location: ../register?error=usernametaken&user='.$username.'&email='.$email);
            exit();
        }
        elseif($rows['email'] === $email) {
            header('Location: ../register?error=emailtaken&user='.$username.'&email='.$email);
            exit();
        }
    }elseif ($password !== $confirmpassword) {
        header('Location: ../register?error=notsamepassword&user='.$username.'&email='.$email);
        exit();
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../register?error=emailinvalid&user='.$username.'&email='.$email);
        exit();
    }elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $username)) {
        header('Location: ../register?error=Nosymbols&user='.$username.'&email='.$email);
        exit();
    }else{
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
         $query = "INSERT INTO register (username, email, `password`, avatar,plan) VALUES('$username', '$email', '$hashedPwd', '../avatar/avatar.png', 0)";
        $query_run = mysqli_query($conn, $query);  
         session_start();
        $file = $_FILES['avatar'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
         $sqlres = "SELECT * FROM register WHERE email='$email' AND username='$username'";
        $results = mysqli_query($conn, $sqlres);
        $row = mysqli_fetch_assoc($results);
        $id = $row['id'];
        if($fileSize != 0){
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {    
                    if (mysqli_num_rows($results) > 0) {
                        $fileNameNew = "profile".$id.".".$fileActualExt;
                        $fileDestination = '../avatar/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $imageUrl = "UPDATE register SET avatar ='$fileDestination' WHERE id = '$id'";
                        if (!$result = mysqli_query($conn, $imageUrl)) {
                            header('Location: register?cant connect to database');
                            echo "Could not connect to database";
                           exit(); 
                        }elseif ($query_run) {
                             $token = bin2hex(random_bytes(32));
                    $tokenHash = password_hash($token, PASSWORD_DEFAULT);
                    $sqltoken = "INSERT INTO logintoken(userid,token) VALUES ('$id','$tokenHash');";
                    setcookie('usertoken',$token, time() + 31536000, "/",'yournetflixwebsite.com');
                    setcookie('userid',$id, time() + 31536000, "/",'yournetflixwebsite.com',true);
                    setcookie('trial','24', time() + 604800, "/",'yournetflixwebsite.com',true);
                    $querySqltoken = mysqli_query($conn, $sqltoken);
                             $_SESSION['username'] = $username;
                              $_SESSION['email'] = $email;
                             $_SESSION['userid'] = $id;
                             $_SESSION['productid'] = 0;
                              header('Location: https://www.yournetflixwebsite.com?register=success');
                             exit();
                        } 
                    } else {
                        header('Location: ../register?error=noresult&user='.$username.'&email='.$email);
                        exit();
                    } 
            }else {
                header("Location: ../register?erroruploadingfile");
                echo "There was an error uploading your file";
                exit();
            }
    }else{
        echo "fileType not allowed";
        exit();
    }
    }elseif ($query_run) {
         $token = bin2hex(random_bytes(32));
        $tokenHash = password_hash($token, PASSWORD_DEFAULT);
            setcookie('usertoken',$token, time() + 31536000, "/",'yournetflixwebsite.com');
            setcookie('userid',$id, time() + 31536000, "/",'yournetflixwebsite.com',true);
            setcookie('trial','24', time() + 604800, "/",'yournetflixwebsite.com',true);
        $sqltoken = "INSERT INTO logintoken(userid,token) VALUES('$id','$tokenHash');";
         $querySqltoken = mysqli_query($conn, $sqltoken);
            $_SESSION['username'] = $username;
             $_SESSION['email'] = $email;
            $_SESSION['userid'] = $id;
             $_SESSION['productid'] = 0;
            
             header('Location: https://www.yournetflixwebsite.com?register=success');
            exit();
        }elseif(!mysqli_query($conn, $queryAvatar)) {
                echo "Error: " . mysqli_error($conn);
            exit();
        }
    }
}
