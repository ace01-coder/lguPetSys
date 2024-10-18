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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="flex bg-gray-100 ">

  <!-- Sidebar -->
<?php include('disc/_partials/admin-sidebar.php');?>

  <!-- Main Content with Navbar -->
  <div class="w-full mx-4">
    
    <!-- Top Navbar -->
    <?php include('disc/_partials/navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="">
    <div class="overflow-x-auto">
        <table id="petTable" class="min-w-full bg-white border border-gray-200 rounded-lg">
          <thead>
            <tr class="text-left bg-gray-100">
              <th class="px-4 py-2 border-b">Pet Name</th>
              <th class="px-4 py-2 border-b">Breed</th>
              <th class="px-4 py-2 border-b">Gender</th>
              <th class="px-4 py-2 border-b">Age</th>
              <th class="px-4 py-2 border-b">Vaccination Class</th>
              <th class="px-4 py-2 border-b">Last Dosage</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="px-4 py-2 border-b">Max</td>
              <td class="px-4 py-2 border-b">Golden Retriever</td>
              <td class="px-4 py-2 border-b">Male</td>
              <td class="px-4 py-2 border-b">5</td>
              <td class="px-4 py-2 border-b">Rabies</td>
              <td class="px-4 py-2 border-b">2024-08-12</td>
            </tr>
            <tr>
              <td class="px-4 py-2 border-b">Bella</td>
              <td class="px-4 py-2 border-b">Bulldog</td>
              <td class="px-4 py-2 border-b">Female</td>
              <td class="px-4 py-2 border-b">3</td>
              <td class="px-4 py-2 border-b">Distemper</td>
              <td class="px-4 py-2 border-b">2024-05-21</td>
            </tr>
            <tr>
              <td class="px-4 py-2 border-b">Rocky</td>
              <td class="px-4 py-2 border-b">Beagle</td>
              <td class="px-4 py-2 border-b">Male</td>
              <td class="px-4 py-2 border-b">7</td>
              <td class="px-4 py-2 border-b">Parvovirus</td>
              <td class="px-4 py-2 border-b">2023-11-15</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <script src="codejs/script.js"></script>
  <script src="codejs/script-admin.js" ></script>
</body>
</html>
