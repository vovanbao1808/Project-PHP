<?php
include('../DB_Config/db_config.php');
if (
    isset($_POST['fname']) &&
    isset($_POST['email']) &&
    isset($_POST['phone']) &&
    isset($_POST['uname']) &&
    isset($_POST['pass']) &&
    isset($_POST['repass'])
) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];

    $data = "fname=" . $fname . "&uname=" . $uname;

    if (empty($fname)) {
        $em = "Full name is required";
        header("Location: ../register.php?error=$em");
        exit;
    } else if (empty($email)) {
        $em = "Email is required";
        header("Location: ../register.php?error=$em");
        exit;
    } else if (empty($phone)) {
        $em = "PhoneNumber is required";
        header("Location: ../register.php?error=$em");
        exit;
    } else if (empty($uname)) {
        $em = "UserName is required";
        header("Location: ../register.php?error=$em");
        exit;
    } else if (empty($pass)) {
        $em = "Password is required";
        header("Location: ../register.php?error=$em");
        exit;
    } else if (empty($repass)) {
        $em = "Retype Password is required";
        header("Location: ../register.php?error=$em");
        exit;
    } else if ($pass !== $repass) {
        $em = "Password and Retype password not same";
        header("Location: ../register.php?error=$em");
        exit;
    } else {
        $sql1 = "SELECT * FROM account where Username = ? ";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute([$uname]);
        if ($stmt1->rowCount() == 1) {
            $em = "Username has been used";
            header("Location: ../register.php?error=$em");
            exit;
        } else {
            $sql = "INSERT INTO account(Fullname, Email, Phone, Username, Password) 
                VALUES (?,?,?,?,?) ";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$fname, $email, $phone, $uname, md5($pass)]);

            header("Location: ../register.php?success=Your account has been created successfully");
            exit;
        }
    }
} else {
    header("Location: ../register.php?error=error");
    exit;
}
