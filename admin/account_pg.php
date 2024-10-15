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
  <?php
     //sidebar 
     include("disc/sidebar.php");
     //navbar
     include("disc/navbar.php");
 ?>
  <div class=" mx-2">
     <div class="flex m-2 justify-between">
     <div class="flex m-4">
        <input class="border-black shadow-lg rounded-lg px-10 py-2 mr-2" type="text" placeholder="Search">
        <button class="bg-blue-500 rounded-lg px-4" type="submit">search</button>
      </div>
      <div class="flex m-4">
        <button class="bg-"><a href="add_form_pg.php"></a></button>
      </div>
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
        </tbody>
    </table>
     </div>
    </div>
    <!--End:Table-->
</div>

<script src="js/script.js"></script> 
</body>
</html>