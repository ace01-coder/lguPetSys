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
<body class="flex bg-gray-300">

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
    <div class="flex justify-center items-center w-full">
    <form action="registerForm.php" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md  w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">Registration Form</h2>
        <div class="grid grid-cols-2">
            <div class="">
                <div class="mb-4 mr-4 ">
                    <label class="block text-gray-700" for="owner_name">Owner Name:</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="owner_name" required type="text">
                </div>
                <div class="mb-4 mr-4 ">
                    <label class="block text-gray-700" for="pet_name">Pet Name:</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="pet_name" required type="text">
                </div>
                <div class="mb-4 mr-4 ">
                    <label class="block text-gray-700" for="pet_age">Age:</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="pet_age" required type="text">
                </div>
                <div class="mb-4 mr-4 ">
                    <label class="block text-gray-700" for="pet_breed">Breed:</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="pet_breed" required type="text">
                </div>
                <div class="mb-4 mr-4 ">
                    <label class="block text-gray-700" for="address">Address:</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="address" required type="text">
                </div>
            </div>
            <div class="">
                <div class="mb-4 mr-4 ">
                    <label class="block text-gray-700" for="pet_image">Pet Image:</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="pet_image" required type="file">
                </div>
                <div class="mb-4 mr-4 ">
                    <label class="block text-gray-700" for="vaccine_record">Vaccine Record:</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="vaccine_record" required type="file">
                </div>
                <div class="mb-4 mr-4">
                    <label class="block text-gray-700" for="additional_info">Additional Information:</label>
                    <textarea class="w-full p-2 border border-gray-300 rounded mt-1" name="additional_info" required></textarea>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <button type="submit" name="regsBtn" class="bg-blue-600 text-white p-2 rounded mt-4 hover:bg-blue-700">
                Submit Registration
            </button>
        </div>
    </form>
</div>

    </main>
  </div>

  <script src="codejs/script.js"></script>
</body>
</html>

