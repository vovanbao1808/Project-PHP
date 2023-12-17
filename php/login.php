<?php
session_start();
include('../DB_Config/db_config.php');
if (
    isset($_POST['uname']) &&
    isset($_POST['pass'])
) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $data = "uname=" . $uname;

    if (empty($uname)) {
        $em = "Username is required!";
        header("Location: ../login.php?error=$em");
        exit;
    } else if (empty($pass)) {
        $em = "Password is required!";
        header("Location: ../login.php?error=$em");
        exit;
    } else {
        $sql = "SELECT * FROM account WHERE Username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $username = $user['Username'];
            $password = $user['Password'];
            $fullname = $user['Fullname'];
            $id = $user['ID'];
            $email = $user['Email'];
            $role = $user['Role'];
            $phone = $user['Phone'];
            if ($username === $uname && $password === md5($pass)) {
                $_SESSION['ID'] = $id;
                $_SESSION['User'] = $username;
                $_SESSION['Role'] = $role;
                $_SESSION['Email'] = $email;
                $_SESSION['Phone'] = $phone;
                header("Location: /Project-PHP/index.php");
                exit;
            } else {
                $em = "Incorect Username or password";
                header("Location: ../login.php?error=$em");
                exit;
            }
        } else {
            $em = "Incorect Username or password";
            header("Location: ../login.php?error=$em");
            exit;
        }
    }
} else {
    header("Location: ../login.php?error=error");
    exit;
}
