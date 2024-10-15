<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 ">
  <div class="flex ">
          <!--Start:Sidebar-->
          <?php
          //sidebar 
     include("disc/sidebar.php");
     //navbar
     include("disc/navbar.php");
     ?>
<main>
<!--Start:Table-->
<div class="container mx-auto p-5">
  <h1 class="text-2xl font-bold mb-5">CRUD Table with Search</h1>

  <input type="text" id="search" placeholder="Search..." class="mb-5 p-2 border border-gray-300 rounded">

  <button id="openModal" class="mb-5 bg-blue-500 text-white px-4 py-2 rounded">Add Entry</button>

  <table class="min-w-full bg-white border border-gray-300">
      <thead>
          <tr>
              <th class="border px-4 py-2">ID</th>
              <th class="border px-4 py-2">Person Name</th>
              <th class="border px-4 py-2">Pet Name</th>
              <th class="border px-4 py-2">Phone</th>
              <th class="border px-4 py-2">Actions</th>
          </tr>
      </thead>
      <tbody id="table-body">
          <!-- Rows will be dynamically added here -->
      </tbody>
  </table>
</div>
    </div>
    <!--End:Table-->
</main>
<!--End:Main-->
 </div>  
  </div> 
 
  <!--Modal-->
  <div id="modal" class="fixed inset-0 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
    <div class="bg-white p-5 rounded shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4" id="modal-title">Add Entry</h2>
        <input type="hidden" id="entry-id">
        <input type="text" id="entry-name" placeholder="Person Name" class="mb-4 p-2 border border-gray-300 rounded w-full">
        <input type="text" id="entry-pet" placeholder="Pet Name" class="mb-4 p-2 border border-gray-300 rounded w-full">
        <input type="tel" id="entry-phone" placeholder="Phone" class="mb-4 p-2 border border-gray-300 rounded w-full">
        <div class="flex justify-end">
            <button id="saveBtn" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
            <button id="closeModal" class="ml-2 bg-red-500 text-white px-4 py-2 rounded">Close</button>
        </div>
    </div>
</div>

<script src="script.js"></script>

</body>
</html>
