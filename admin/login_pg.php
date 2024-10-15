<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | BARANGAY PAW SYSTEM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="fixed top-0 left-0 w-full h-full flex justify-center items-center">
 <div class="flex  justify-center items-center bg-blue-600 border-l border-t border-b   border-gray-600 rounded-l-lg shadow-md">
    <img width="82%" src="img/logo.png" alt="Barangay">
 </div>
 <div class="">
 <div class="bg-white p-32 border-r border-t border-b border-gray-600 rounded-r-lg shadowlg">

    <form action="login_action_pg.php" method="post">
      <div class="flex items-center mb-4">
        <i class="fas fa-user text-gray-500 mr-2"></i>
        <input type="text"  name="umail" class="w-full p-2 pl-10 border border-gray-300 rounded-lg" placeholder="Username/Email" >
      </div>
     
      <div class="flex items-center mb-4">
        <i class="fas fa-lock text-gray-500 mr-2"></i>
        <input type="password"  name="pwd" class="w-full p-2 pl-10 border border-gray-300 rounded-lg" placeholder="Password">
      </div>

      <input type="submit" name="lg-btn" value="Login" class="bg-blue-500 hover:bg-blue-900 text-white font-bold  p-2 w-full rounded-lg">
    </form>

  </div>
 </div>
</div>

</body>
</html>
