<?php
session_start();
include('dbconn/config.php');
include 'dbconn/authentication.php';



function generateToken() {
    return bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
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
            echo "<script>alert('Account created successfully!')</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Animal Welfare</title>
  <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="disc/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="flex bg-gray-100">

  <!-- Sidebar -->
  <?php include('disc/_partials/admin/admin-sidebar.php'); ?>

  <!-- Main Content with Navbar -->
  <div class="w-full mx-4">
    
    <!-- Top Navbar -->
    <?php include('disc/_partials/admin/admin-navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="">
      <div class="flex justify-center bg-white shadow-md rounded-lg p-6">
        <div class="w-full">
          <h2 class="text-xl font-semibold mb-4 text-center"><i class="fas fa-user w-5 h-5 mr-2"></i>Account Management</h2>
          <div class="flex justify-between py-4">
            <div class="">
              <input class="border p-2 rounded-lg" type="text" placeholder="Search...">
              <button class="bg-blue-500 p-2 rounded-lg hover:text-white">Search</button>
            </div>
            <button id="openModal" class="bg-blue-500 p-2 rounded-lg hover:text-white">Add Account</button>
          </div>
          <table class="min-w-full border border-gray-300">
            <thead>
              <tr class="bg-gray-100">
                <th class="py-2 px-4 border text-center">ID</th>
                <th class="py-2 px-4 border text-center">Name</th>
                <th class="py-2 px-4 border text-center">Email</th>
                <th class="py-2 px-4 border text-center">Role</th>
                <th class="py-2 px-4 border text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Fetch user data from the database
              $sql = "SELECT id, username, email, role FROM users"; // Adjust 'users' to your actual table name
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                $userTypeColors = [
                  'admin' => 'bg-yellow-200',
                  'user' => 'bg-blue-200',
                ];

                while ($row = $result->fetch_assoc()) {
                  $rowClass = isset($userTypeColors[$row['role']]) ? $userTypeColors[$row['role']] : 'bg-gray-200';
                  echo "<tr class='$rowClass'>";
                  echo "<td class='py-2 px-4 border text-center'>" . $row['id'] . "</td>";
                  echo "<td class='py-2 px-4 border text-center'>" . $row['username'] . "</td>";
                  echo "<td class='py-2 px-4 border text-center'>" . $row['email'] . "</td>";
                  echo "<td class='py-2 px-4 border text-center'>" . $row['role'] . "</td>";
                  echo "<td class='py-2 px-4 border text-center'>
                          <a href='update.php?id=" . $row['id'] . "' class='text-blue-500 hover:underline'>Edit</a> | 
                          <a href='deleteuseradmin.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this account?\");' class='text-red-500 hover:underline'>Delete</a>
                        </td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='5' class='py-2 px-4 border text-center'>No users found</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  <!-- Modal Form -->
  <div id="accountModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96 relative">
      <!-- Close Button -->
      <span class="close absolute top-2 right-2 text-gray-500 cursor-pointer hover:text-black">&times;</span>

      <!-- Modal Content -->
      <h2 class="text-2xl font-semibold mb-6 text-center">Create Your Account</h2>
      <form id="createAccountForm" class="space-y-4" action="" method="POST">
        <div>
          <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
          <input type="text" id="username" name="username" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input type="password" id="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>

        <div>
          <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
          <select id="role" name="role" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-700">
          Create Account
        </button>
      </form>
    </div>
  </div>

  <script>
    // Script to handle modal display
    document.getElementById('openModal').onclick = function() {
      document.getElementById('accountModal').classList.remove('hidden');
    };

    document.querySelector('.close').onclick = function() {
      document.getElementById('accountModal').classList.add('hidden');
    };

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
      const modal = document.getElementById('accountModal');
      if (event.target === modal) {
        modal.classList.add('hidden');
      }
    };
  </script>

  <script src="codejs/script.js"></script>
  <script src="codejs/script-admin.js"></script>
</body>
</html>
