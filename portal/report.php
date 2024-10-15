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
     include 'navbar.php';
   ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="p-8">
    <div class="flex justify-center items-center w-full">
    <form action="reportForm.php" method="POST" class="bg-white p-8 rounded-lg shadow-md  w-full" enctype="multipart/form-data">
        <h2 class="text-2xl font-bold mb-6 text-center">Report Form</h2>
        <div class="grid grid-cols-2">
            <div class="">
                <div class="mb-4 mr-4">
                    <label class="block text-gray-700" for="report_party">Report Party</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="report_party" required type="text">
                </div>
                <div class="mb-4 mr-4">
                    <label class="block text-gray-700" for="phone">Phone</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="phone" required type="tel">
                </div>
                <div class="mb-4 mr-4">
                    <label class="block text-gray-700" for="email">Email</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="email" required type="text">
                </div>
                <div class="mb-4 mr-4">
                    <label class="block text-gray-700" for="species">Species</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="species" required type="text">
                </div>
                <div class="mb-4 mr-4">
                    <label class="block text-gray-700" for="breed">Breed</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="breed" required type="text">
                </div>
                <div class="mb-4 mr-4">
                    <label class="block text-gray-700" for="age">Age</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="age" required type="text">
                </div>
            </div>
            <div class="">
                <div class="mb-4 mr-4">
                    <label class="block text-gray-700" for="number">Number</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="number" required type="number">
                </div>
                <div class="mb-4 mr-4">
                    <label class="block text-gray-700" for="abuse_nature">Nature of Abuse</label>
                    <select class="w-full p-2 border border-gray-300 rounded mt-1" name="abuse_nature" id="abuse_nature" required>
                        <option value="physical abuse">Physical Abuse</option>
                        <option value="emotional abuse">Emotional Abuse</option>
                        <option value="sexual abuse">Sexual Abuse</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mb-4 mr-4">
                    <label class="block text-gray-700" for="description">Description of Incident</label>
                    <textarea class="w-full p-2 border border-gray-300 rounded mt-1" name="description" required></textarea>
                </div>
                <div class="mb-4 mr-4">
                    <label class="block text-gray-700" for="imgInput">Evidence</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" name="imgInput" required type="file">
                </div>
            
            </div>
        </div>
        <div class="flex justify-center">
            <button type="submit" name="reportBtn" class="bg-blue-600 text-white p-2 rounded mt-4 hover:bg-blue-700">Submit Report</button>
        </div>
    </form>
</div>

    </main>
  </div>

  <script src="codejs/script.js"></script>
</body>
</html>

