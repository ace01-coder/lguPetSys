<?php
if (isset($_POST['lg-btn'])) {
    require 'dbconn/connection.php';

    $umail = $_POST['umail'];
    $password = $_POST['pwd'];

    if (empty($umail) || empty($password)) {
        header('Location: login_pg.php?error=emptyfields');
        exit();
    } else {
        $sql = "SELECT * FROM lgu_user WHERE username =? OR email=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: login_pg.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $umail, $umail);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($rows = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $rows['pwd']);

                if ($pwdCheck == false) {
                    header("Location: login_pg.php?error=wrongpassword");
                    exit();
                } else {
                    session_start();
                    $_SESSION['userid'] = $rows['id_user'];
                    $_SESSION['useruid'] = $rows['username'];

                    // Redirect to dashboard page
                    header("Location: dashboard_pg.php");
                    exit();
                }
            } else {
                header('Location: login_pg.php?error=nouser');
                exit();
            }
        }
    }
} else {
    header('Location: login_pg.php');
    exit();
}
?>