<?php
session_start();
include('dbconn/config.php');
include('dbconn/authentication.php');

function generateToken() {
    return bin2hex(random_bytes(32));
}

if (isset($_POST['btn-ruser'])) {


    $username = $_POST['uname'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $rpassword = $_POST['rpass'];
    $role = $_POST['role'];

    // Input validation
    if (empty($username) || empty($email) || empty($password) || empty($rpassword) || empty($role)) {
        header('Location: acc_form.php?error=emptyfield&uname=' . $username . '&mail=' . $email);
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: acc_form.php?error=invalidemail&uname=' . $username);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header('Location: acc_form.php?error=invaliduname&mail=' . $email);
        exit();
    } elseif ($password !== $rpassword) {
        header('Location: acc_form.php?error=passwordcheck&uname=' . $username . '&mail=' . $email);
        exit();
    }

    // Check if the username already exists in the database
    $sql = "SELECT username FROM users WHERE username=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: acc_form.php?error=sqlerror');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck > 0) {
            header('Location: acc_form.php?error=usernametaken&mail=' . $email);
            exit();
        } else {
            // Insert new user into the database
            $sql = "INSERT INTO users (username, email, pwd, role) VALUES (?, ?, ?, ?)";
            
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header('Location: acc_form.php?error=sqlerror');
                exit();
            } else {
                // Hash password before storing it
                $hashpassword = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashpassword, $role);
                mysqli_stmt_execute($stmt);
                header('Location: acc_form.php?useradd=success');
                exit();
            }
        }
    }

}

?>
<script src="https://cdn.tailwindcss.com"></script>
<section class="grid grid-cols p-2 bg-blue-800">
<div class="bg-white">
<div class="bg-green-600">
<h2 class="text-2xl font-bold p-2">Create a user account</h2>
</div>
<div class="">

    <div class="p-10">
          <!--form-->
        <form action="account_add_pg.php" method="post">
               <div class="m-4">
               <label for="username">Username</label>
               <input  class="border px-12" type="text" name="uname">
               </div>
                <div class="m-4">
                    <label for="mail">E-mail</label>
                    <input  class="border px-12" type="text" name="mail">
                </div>
                <div class="m-4">
                    <label for="password">Password</label>
                    <input  class="border px-12" type="password" name="pass">
                </div>
                <div class="m-4">
                    <label for="password">Confirm Password</label>
                    <input  class="border px-12" type="password" name="rpass">
                </div>
            </div>
            <label for="role">Role:</label>
           <select name="role" id="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
            </select>
            <div class="">
                <button type="submit" name="btn-ruser">
                    add user
                </button>
            </div>
        </form>
    </div>

</div>
</section>