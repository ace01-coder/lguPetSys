<?php
session_start();
include('dbconn/config.php');
include('dbconn/authentication.php');

function generateToken() {
    return bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['uname'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];
    $role = $_POST['role'];

    // Simple validation
    if (!empty($username) && !empty($email) && !empty($password) && !empty($role)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $sql = "INSERT INTO users (username, email, pwd, role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);

        if ($stmt->execute()) {
            echo "Account created successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required!";
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

<div class="max-w-lg mx-auto p-10 bg-white rounded-lg shadow-lg">
    <!--form-->
    <form action="" method="post">
        <!-- Username -->
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                type="text" name="uname" placeholder="Enter username" required>
        </div>

        <!-- E-mail -->
        <div class="mb-4">
            <label for="mail" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                type="email" name="mail" placeholder="Enter your email" required>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                type="password" name="pass" placeholder="Enter password" required>
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="rpass" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                type="password" name="rpass" placeholder="Re-enter password" required>
        </div>

        <!-- Role Selection -->
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" id="role" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" name="btn-ruser" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Add User
            </button>
        </div>
    </form>
    <a href="account_mgt.php">back</a>
</div>


</div>
</section>