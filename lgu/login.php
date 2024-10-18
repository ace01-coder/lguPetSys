<?php
session_start();
include('portal/dbconn/connection.php');
// Function to generate CSRF token
function generateToken(){
    return bin2hex(random_bytes(32));
}

// Generate new token if not already set
if(empty($_SESSION['csrf_token'])){
    $_SESSION['csrf_token'] = generateToken();
    $_SESSION['csrf_token_time'] = time(); // Save timestamp for token expiration
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = array(); // Initialize error array

    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $error['csrf_token'] = "CSRF token mismatch";
    }

    // Validate email/username and password fields
    if (empty($_POST['umail'])) {
        $error['umail'] = 'Please enter your email or username';
    } else { 
        $umail = htmlspecialchars(trim($_POST['umail']));
    }

    if (empty($_POST['password'])) {
        $error['password'] = 'Please enter your password';
    } else {
        $password = htmlspecialchars(trim($_POST['password']));
    }

    // If no errors, proceed to account check
    if (empty($error)) {
        // Check if the account exists
        $stmt = $conn->prepare('SELECT id, pwd, role FROM users WHERE username=? OR email=?');
        $stmt->bind_param('ss', $umail, $umail);
        $stmt->execute();
        $stmt->store_result();

        // If no account is found
        if ($stmt->num_rows === 0) {
            $error['account'] = 'Account not found. Please check your email/username and password.';
        } else {
            // If account is found, fetch user details
            $stmt->bind_result($id, $hpassword, $role);
            $stmt->fetch();

            // Verify the password
            if (password_verify($password, $hpassword)) {
                // Set session variables for authentication
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $umail;
                $_SESSION['email'] = $umail;
                $_SESSION['role'] = $role;
                $_SESSION['logged_in'] = true; // Set the flag to indicate if the user is logged in.

                // Redirect based on role
                if ($role === 'admin') {
                    header("Location: admin_dashboard.php"); // Replace with actual admin dashboard
                    exit;
                } else {
                    header("Location: dashboard.php");
                    exit;
                }
            } else {
                $error['password'] = 'Incorrect password. Please try again.';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-blue-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <div class="flex justify-center">
            <img src="portal/img/barangay.png" alt="Logo" class="">
        </div>

        <?php if (!empty($error)) : ?>
            <div class="bg-red-500 text-white text-center py-2 mb-4">
                <?php 
                foreach ($error as $err) {
                    echo $err . '<br>';
                }
                ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

            <div class="mb-4">
                <label for="umail" class="block text-sm font-medium text-gray-700">Email/Username</label>
                <input type="text" name="umail" id="umail" class="mt-1 p-2 border border-gray-300 rounded w-full" value="<?php echo isset($_POST['umail']) ? htmlspecialchars($_POST['umail']) : ''; ?>" autocomplete="off">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 p-2 border border-gray-300 rounded w-full" value = "<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" autocomplete="off">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Login</button>
            </div>
        </form>
    </div>
    <script>
            window.onload = function() {
            document.getElementById('loginForm').reset();
        };
    </script>
</body>
</html>
