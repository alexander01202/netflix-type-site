<?php include '../admin/includes/dbh.php';
session_start();

if (isset($_POST['btnedit']) && isset($_SESSION['userid'])) {
    $nameedit = mysqli_real_escape_string($conn,$_POST['nameedit']);
    $emailedit = mysqli_real_escape_string($conn, $_POST['emailedit']);
    $password = mysqli_real_escape_string($conn, $_POST['editpassword']);
    $rptpassword = mysqli_real_escape_string($conn,$_POST['rptpassword']);
    $userid = $_SESSION['userid'];

    $sqlcheck = "SELECT * FROM register WHERE id != $userid AND (username ='$nameedit' OR email='$emailedit')";
    $querycheck = mysqli_query($conn, $sqlcheck);
    if (mysqli_num_rows($querycheck) > 0) { 
    $rows = mysqli_fetch_assoc($querycheck);
    if ($rows['username'] === $nameedit) {
        header('Location: ../profile?error=usernametaken');
        exit();
    }
    elseif($rows['email'] === $emailedit) {
        header('Location: ../profile?error=emailtaken');
        exit();
    }
    elseif ($password !== $rptpassword) {
        header('Location: ../profile?error=notsamepassword');
        exit();
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../profile?error=emailinvalid');
        exit();
    }
}else {
     if ($password !== '') {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE register SET username='$nameedit',`password`='$hashedPwd', email='$emailedit' WHERE id='$userid'";
     }else {
        $query = "UPDATE register SET username='$nameedit', email='$emailedit' WHERE id='$userid'";
     }   
    
    $query_run = mysqli_query($conn, $query);  
    if ($query_run) {
        $file = $_FILES['editpfp'];

        if ($file['size'] !== 0 && $file['error'] === 0) {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 20000000) {
                    $sqlfile = "SELECT * FROM register WHERE username ='$nameedit' AND email ='$emailedit'";
                    $results = mysqli_query($conn, $sqlfile);
                    if (mysqli_num_rows($results) > 0) {
                        $row = mysqli_fetch_assoc($results);
                        $id = $row['id'];
                        $fileNameNew = "profile".$id.".".$fileActualExt;    
                        $fileDestination = '../avatar/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        $imageUrl = "UPDATE register SET avatar ='$fileDestination' WHERE id = '$id'";
                        $result = mysqli_query($conn, $imageUrl);
                        if ($result) {
                            $_SESSION['username'] = $nameedit;
                            $_SESSION['email'] = $emailedit;
                            header('Location: ../profile?update=success');
                            exit();
                         }else {
                            echo "Could not connect to database";
                            exit();
                            }
                        }else {
                            header("Location: ../profile?error=noresult");
                            exit();
                        }
                    } else {
                        echo "Your Image is too large";
                        exit();
                    }
                } else {
                    echo "There was an error uploading your file";
                    exit();
                }
            } else {
                    echo "You cannot upload files of this type";
                    exit();
            }
        }else {
            $_SESSION['username'] = $nameedit;
            $_SESSION['email'] = $emailedit;
            header('Location: ../profile?update=success'); 
            exit();
        }
        } else {
            header("Location: ../profile?update=failed");
            exit();
        }
    }  
}else{
    header("Location: https://yournetflixwebsite.com");
    exit();
}