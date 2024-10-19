<?php
session_start();
include 'dbconn/authentication.php';
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
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="disc/css/style.css">
</head>
<body class="flex bg-gray-300">

  <!-- Sidebar -->
<?php
  include('disc/_partials/user/sidebar.php');
 ?>

  <!-- Main Content with Navbar -->
  <div class="flex-1 flex flex-col">
    
    <!-- Top Navbar -->
 <?php
  include('disc/_partials/user/navbar.php');
 ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="p-8">
     <?php
      include('disc/_partials/user/ouranimalCard.php');
     ?>
    </main>
  </div>

  <script src="codejs/script.js"></script>
</body>
</html>


