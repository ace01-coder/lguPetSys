<?php
session_start();
  include 'connection.php';
?>
<script src="https://cdn.tailwindcss.com"></script>
<section class="grid grid-cols p-2 bg-blue-800">
<div class="bg-white">
<div class="bg-green-600">
<h2 class="text-2xl font-bold p-2">Create a user account</h2>
</div>
<div class="">

    <div class="p-10">
          <!--form-->
        <form action="account_add_pg.php" method="post">
               <div class="m-4">
               <label for="username">Username</label>
               <input  class="border px-12" type="text" name="uname">
               </div>
                <div class="m-4">
                    <label for="mail">E-mail</label>
                    <input  class="border px-12" type="text" name="mail">
                </div>
                <div class="m-4">
                    <label for="password">Password</label>
                    <input  class="border px-12" type="password" name="pass">
                </div>
                <div class="m-4">
                    <label for="password">Confirm Password</label>
                    <input  class="border px-12" type="password" name="rpass">
                </div>
            </div>
            <label for="role">Role:</label>
           <select name="role" id="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
            </select>
            <div class="">
                <button type="submit" name="btn-ruser">
                    add user
                </button>
            </div>
        </form>
    
    </div>

</div>
</section>