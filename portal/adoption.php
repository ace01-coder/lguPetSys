<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Animal Welfare</title>
  <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="flex" >

  <!-- Sidebar -->

    <!-- Sidebar Links -->
<?php
  include 'sidebar.php';
?>

  <!-- Main Content with Navbar -->
  <div class="flex-1 flex flex-col">
    
    <!-- Top Navbar -->
  <?php
    include 'navbar.php'
  ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="p-8">
    <form action="adoptionForm.php" method="POST" class="bg-white p-8 rounded-lg shadow-md  w-full">
    <h2 class="text-2xl font-bold mb-6 text-center">Adoption Form</h2>
    <div class="grid grid-cols-2">
      <div class="">
        <div class="mb-4 mr-4">
          <label for="name" class="block text-gray-700">Full Name:</label>
          <input type="text" id="name" name="name"  class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>

        <div class="mb-4 mr-4">
          <label for="email" class="block text-gray-700">Email Address:</label>
          <input type="email" id="email" name="email"  class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>

        <div class="mb-4 mr-4">
          <label for="phone" class="block text-gray-700">Phone Number:</label>
          <input type="tel" id="phone" name="phone"  class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>

        <div class="mb-4 mr-4">
          <label for="address" class="block text-gray-700">Home Address:</label>
          <input type="text" id="address" name="address"  class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>
      </div>
      
      <div class="">
        <div class="mb-4 mr-4">
          <label for="petName" class="block text-gray-700">Pet Name:</label>
          <input type="text" id="petName" name="petName"  class="w-full p-2 border border-gray-300 rounded mt-1">
        </div>

        <div class="mb-4 mr-4">
          <label for="petType" class="block text-gray-700">Type of Pet:</label>
          <select id="petType" name="petType"  class="w-full p-2 border border-gray-300 rounded mt-1">
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Other">Other</option>
          </select>
        </div>

        <div class="mb-4 mr-4">
          <label for="reason" class="block text-gray-700">Why do you want to adopt this pet?</label>
          <textarea id="reason" name="reason" rows="4"  class="w-full p-2 border border-gray-300 rounded mt-1"></textarea>
        </div>

        <div class="mb-4 mr-4">
          <label for="experience" class="block text-gray-700">Do you have experience with pets?</label>
          <select id="experience" name="experience"  class="w-full p-2 border border-gray-300 rounded mt-1">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>
      </div>
    </div>

    <div class="flex justify-center">
      <button type="submit" name="adoptBtn" class="bg-blue-600 text-white p-2 rounded mt-4 hover:bg-blue-700">
        Submit Application
      </button>
    </div>
  </form>
</div>

    </main>
  </div>

  <script src="codejs/script.js"></script>
</body>
</html>

  