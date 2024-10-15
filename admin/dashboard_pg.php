<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay</title>
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">
  <div class="flex ">
        <!--Start:Sidebar-->
        <?php
    //sidebar 
    include("disc/sidebar.php");
    //navbar
    include("disc/navbar.php");
 ?>
<!--End:Navbar-->
<!--Start:Main-->
<main>
  <!--Container-->
  <div class="w-full">
    <!--Container 1-->
    <h2 class="font-bold text-xl  md:ml-6 md:mt-3">RECORDS</h2>
    <div class="grid grid-cols-2">
      <div class=" m-2">
        <div class="bg-white rounded-lg shadow-lg m-2 ">
          <div class="flex flex-col items-center">
            <h2 class="font-bold">REGISTERED NO.</h2>
            <div class="p-5">
              <span>0</span>
            </div>
          </div>
        </div>
      <!--Container 2-->
        <div class="bg-white rounded-lg shadow-lg m-2 ">
          <div class="flex flex-col items-center">
            <h2 class="font-bold">REPORT NO.</h2>
            <div class="p-5">
              <span>0</span>
            </div>
          </div>
        </div>
        </div>
      <!--Container 3-->
        <div class="m-2">
          <div class="bg-white rounded-lg shadow-lg m-2 ">
            <div class="flex flex-col items-center">
              <h2 class="font-bold">ADOPTION NO.</h2>
              <div class="p-5">
                <span>0</span>
              </div>
            </div>
          </div>
        <!--Container 4-->
          <div class="bg-white rounded-lg shadow-lg m-2 ">
            <div class="flex flex-col items-center">
              <h2 class="font-bold">ACCOUNT NO.</h2>
              <div class="p-5">
                <span>0</span>
              </div>
            </div>
          </div>
        </div>
    </div>
<!--End:Container-->
<!--Start:Table-->
    <div class=" mx-2">
      <div class="flex justify-between mb-2
      mt-10">
        <h2 class="font-bold text-xl  md:ml-6 md:mt-3">LIST</h2>
        <input class="border-black shadow-lg rounded-lg px-10 mr-6" type="text" placeholder="Search">
      </div>
      <table class="bg-white rounded-lg shadow-lg w-full ">
        <thead class=" bg-blue-600 text-white">
            <tr>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Age</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Occupation</th>
              
            </tr>
        </thead>
        <tbody class="text-gray-700 ">
            <tr>
                <td class="text-left m py-3 px-2">John Doe</td>
                <td class="text-left m py-3 px-2">28</td>
                <td class="text-left py-3 px-4">Software Engineer</td>
              
            </tr>
            <tr class="bg-gray-100">
                <td class="text-left m py-3 px-2">Jane Smith</td>
                <td class="text-left m py-3 px-2">34</td>
                <td class="text-left m py-3 px-2">Data Scientist</td>

            </tr>
            <tr>
                <td class="text-left m py-3 px-2">Paul Walker</td>
                <td class="text-left m py-3 px-2">45</td>
                <td class="text-left m py-3 px-2">Manager</td>

            </tr>
    

        </tbody>
    </table>
     </div>
    </div>
    <!--End:Table-->
</main>
<!--End:Main-->
 </div>  
  </div> 
 

<script src="js/script.js"></script>
</body>
</html>

