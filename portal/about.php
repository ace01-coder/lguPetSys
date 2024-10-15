<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex ">
  <!-- Sidebar -->
  <?php
 include 'sidebar.php';
?>

  <!-- Main Content with Navbar -->
  <div class="flex-1 flex flex-col">
    
    <!-- Top Navbar -->
    <?php
     include'navbar.php';
    ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="p-8">
      
    </main>
  </div>

  <script src="codejs/script.js"></script>

</body>
</html>
