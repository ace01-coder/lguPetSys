<?php
session_start();
include 'connection.php';

if(isset($_POST['btn-ruser'])) {

    $username = $_POST['uname'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $rpassword = $_POST['rpass'];
    $role = $_POST['role'];

    if (empty($username) || empty($email) || empty($password) || empty($rpassword) || empty($role)) {
        header('Location: account_pg.php?error=emptyfield&uname=' . $username . "&mail=" . $email);
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header('Location: account_pg.php?error=invalidmail&uname=' . $username);
        exit();
    } elseif ($password !== $rpassword) {
        header('Location: account_pg.php?error=passwordcheck&uname=' . $username . '&mail=' . $email);
        exit();
    } else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: account_pg.php?error=sqlerror');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header('Location: account_pg.php?error=usernametaken&mail=' . $email);
                exit();
            } else {
                $sql = "INSERT INTO users (username, email, pwd, role) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header('Location: account_pg.php?error=sqlerror');
                    exit();
                } else {
                    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashpassword, $role);
                    mysqli_stmt_execute($stmt);
                    header('Location: account_pg.php?useradd=success');
                    exit();
                }
            }
        }
    }
 
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

} else {
    header('Location: account_pg.php');
    exit();
}
