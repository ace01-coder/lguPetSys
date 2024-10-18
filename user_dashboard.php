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
<body class="flex bg-gray-100 ">

  <!-- Sidebar -->
<?php include('disc/_partials/sidebar.php');?>

  <!-- Main Content with Navbar -->
  <div class="w-full flex flex-col ">
    
    <!-- Top Navbar -->
    <?php include('disc/_partials/navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="w-full">
    <div class="w-full ">
     <div class="grid grid-cols-2 p-4 mb-36 ">
      <div class="min-w-fit">
      <img class="rounded-lg " src="img/animal_welfare" alt="animal_welfare">
      </div>
      <div class="grid grid-cols-1 ml-4 p-4">
        <h2 class="flex font-bold sm:text-3xl m-4 ">Barangay Animal Welfare</h2>
        <p class="flex  m-4">Barangay Animal Welfare promotes animal well-being by encouraging responsible pet ownership, preventing abuse, addressing stray animal issues, and providing resources for pet care, all to foster a compassionate and safe community for animals and residents.</p>
        <button class="flex justify-center items-center  hover:bg-blue-500 border-2 py-4 rounded-lg hover:text-white">Adoption Form</button>
      </div>
     </div>
     </div>
    
<!--content animal-->
     <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 lg:grid-cols-3 gap-6 mb-36 ">
      
     <div class="m-4">
       <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 ">
      <img src="img/dog1.jpg" alt="Animal" class=" w-full h-64 object-cover">
      </div>
      <div class="flex justify-center p-4">
        Dogs
      </div>
       </div>
       <div class="m-4">
       <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 ">
      <img src="img/cat.jpg" alt="Animal" class=" w-full h-64 object-cover">
      </div>
      <div class="flex justify-center p-4">
        Cats
      </div>
       </div>
       <div class="m-4">
       <div class="card bg-white shadow-md rounded-lg overflow-hidden transform transition duration-300 ">
      <img src="img/dog2.jpg" alt="Animal" class=" w-full h-64 object-cover">
      </div>
      <div class="flex justify-center p-4">
        Dogs
      </div>
       </div>
       <div class="m-4 col-span-3 mx-6">
       <div class="flex p-2 border-2 rounded-3xl justify-center items-center hover:bg-blue-500 hover:text-white">
        <span>View Our Animals</span>
       </div>
       </div>
       </div>
       <!--end-->
      
       <div class="w-full p-4 mb-36 ">
     <div class="flex flex-rows ">
      <div class="grid grid-cols-1 mr-4">
        <h2 class="flex font-bold  sm:text-4xl justify-center">Animal Abuse</h2>
        <p class="">Reporting animal abuse is essential to protect animals from harm. If you witness or suspect abuse or neglect, contact local authorities or animal welfare organizations. Your action can help ensure animals receive the care and protection they deserve, promoting a safer, more compassionate community.</p>
        <button class="flex justify-center items-center  hover:bg-blue-500 border-2 px-2 rounded-lg hover:text-white">Report Form</button>
      </div>  
      <div class=" min-w-fit">
      <img class="rounded-lg" src="img/animal_welfare" alt="animal_welfare">
      </div>
     </div>
     </div>

     <div class="w-full p-4 mb-36 ">
      <h2 class="flex items-center justify-center arrow-hidden mb-8 text-4xl font-bold">About</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, quaerat? Quae cupiditate quisquam dolores sit, blanditiis quo perspiciatis ratione placeat quibusdam, odio odit animi mollitia, modi dicta veritatis sint aut?Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores sapiente, aut itaque dolor nesciunt perferendis sit libero laboriosam qui esse maxime consequatur, nostrum voluptatibus culpa hic commodi inventore earum excepturi.</p>
     </div>



<footer class=" bg-white text-gray-700 shadow mt-10">
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-col md:flex-row justify-between">
            <!-- Contact Information -->
            <div class="mb-6 md:mb-0 md:w-1/3">
                <h3 class="text-lg font-semibold mb-4">Contact Us</h3>
                <p>Email: <a href="mailto:info@yourwebsite.com" class="text-green-600 hover:underline">info@yourwebsite.com</a></p>
                <p>Phone: <a href="tel:+11234567890" class="text-green-600 hover:underline">+1 (123) 456-7890</a></p>
                <p>Address: 123 Main Street, Your City, Your Country</p>
            </div>

            <!-- Social Media Links -->
            <div class="mb-6 md:mb-0 md:w-1/3">
                <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" target="_blank" class="text-gray-600 hover:text-green-600">Facebook</a>
                    <a href="#" target="_blank" class="text-gray-600 hover:text-green-600">Twitter</a>
                    <a href="#" target="_blank" class="text-gray-600 hover:text-green-600">Instagram</a>
                    <a href="#" target="_blank" class="text-gray-600 hover:text-green-600">LinkedIn</a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="md:w-1/3">
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <a href="#" class="block text-gray-600 hover:text-green-600 mb-1">About Us</a>
                <a href="#" class="block text-gray-600 hover:text-green-600 mb-1">Services</a>
                <a href="#" class="block text-gray-600 hover:text-green-600 mb-1">Volunteer</a>
                <a href="#" class="block text-gray-600 hover:text-green-600 mb-1">Contact</a>
                <a href="#" class="block text-gray-600 hover:text-green-600">FAQ</a>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="text-center mt-6">
            <p class="text-sm">&copy; 2024 Your Organization. All rights reserved.</p>
        </div>
    </div>
</footer>
    </main>
  </div>

  <script src="codejs/script.js"></script>
</body>
</html>
