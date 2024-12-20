<?php
include('dbconn/config.php');
include('dbconn/authentication.php');
checkAccess(requiredRole: 'user'); 
$error = array(); // Array to store validation errors

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate inputs
    if (empty($_POST['name'])) {
        $error['name'] = 'Full Name is required';
    } else {
        $name = htmlspecialchars($_POST['name']);
    }

    if (empty($_POST['email'])) {
        $error['email'] = 'Email is required';
    } else {
        $email = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['phone'])) {
        $error['phone'] = 'Phone Number is required';
    } else {
        $phone = htmlspecialchars($_POST['phone']);
    }

    if (empty($_POST['address'])) {
        $error['address'] = 'Home Address is required';
    } else {
        $address = htmlspecialchars($_POST['address']);
    }

    if (empty($_POST['petName'])) {
        $error['petName'] = 'Pet Name is required';
    } else {
        $petName = htmlspecialchars($_POST['petName']);
    }

    if (empty($_POST['reason'])) {
        $error['reason'] = 'Please provide a reason for adopting this pet';
    } else {
        $reason = htmlspecialchars($_POST['reason']);
    }

    if (empty($_POST['petType'])) {
      $error['petType'] = 'Type of Pet is required';
  } else {
      $petType = htmlspecialchars($_POST['petType']);
  }
  
  if (empty($_POST['experience'])) {
      $error['experience'] = 'Please specify if you have experience with pets';
  } else {
      $experience = htmlspecialchars($_POST['experience']);
  }
  

    // If no errors, insert data into the database
    if (empty($error)) {
        $sql = "INSERT INTO adoptions (name, email, phone, address, pet_name, pet_type, reason, experience) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $name, $email, $phone, $address, $petName, $petType, $reason, $experience);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Adoption application successfully submitted');
                    window.location.href = 'adoption.php';
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Error: Could not submit the application');
                    window.location.href = 'adoption.php';
                  </script>";
        }

        $stmt->close();
        $conn->close();
    }
}
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
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="flex">

  <!-- Sidebar -->
  <?php include ('disc/partials/sidebar.php'); ?>

  <!-- Main Content with Navbar -->
  <div class="flex-1 flex flex-col">
    <!-- Top Navbar -->
    <?php include('disc/partials/navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="p-8">
      <form action="" method="POST" class="bg-white p-8 rounded-lg shadow-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">Adoption Form</h2>
        <div class="grid grid-cols-2">
          <div class="">
            <div class="mb-4 mr-4">
              <label for="name" class="block text-gray-700">Full Name:</label>
              <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded mt-1" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
              <?php if (isset($error['name'])) echo "<span class='text-red-500 text-sm'>" . $error['name'] . "</span>"; ?>
            </div>

            <div class="mb-4 mr-4">
              <label for="email" class="block text-gray-700">Email Address:</label>
              <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
              <?php if (isset($error['email'])) echo "<span class='text-red-500 text-sm'>" . $error['email'] . "</span>"; ?>
            </div>

            <div class="mb-4 mr-4">
              <label for="phone" class="block text-gray-700">Phone Number:</label>
              <input type="tel" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded mt-1" value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
              <?php if (isset($error['phone'])) echo "<span class='text-red-500 text-sm'>" . $error['phone'] . "</span>"; ?>
            </div>

            <div class="mb-4 mr-4">
              <label for="address" class="block text-gray-700">Home Address:</label>
              <input type="text" id="address" name="address" class="w-full p-2 border border-gray-300 rounded mt-1" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>">
              <?php if (isset($error['address'])) echo "<span class='text-red-500 text-sm'>" . $error['address'] . "</span>"; ?>
            </div>
          </div>

          <div class="">
            <div class="mb-4 mr-4">
              <label for="petName" class="block text-gray-700">Pet Name:</label>
              <input type="text" id="petName" name="petName" class="w-full p-2 border border-gray-300 rounded mt-1" value="<?php echo isset($_POST['petName']) ? htmlspecialchars($_POST['petName']) : ''; ?>">
              <?php if (isset($error['petName'])) echo "<span class='text-red-500 text-sm'>" . $error['petName'] . "</span>"; ?>
            </div>

            <div class="mb-4 mr-4">
    <label for="petType" class="block text-gray-700">Type of Pet:</label>
    <select id="petType" name="petType" class="w-full p-2 border border-gray-300 rounded mt-1">
        <option value="">Choose...</option> <!-- Added blank option -->
        <option value="Dog" <?php echo isset($_POST['petType']) && $_POST['petType'] == 'Dog' ? 'selected' : ''; ?>>Dog</option>
        <option value="Cat" <?php echo isset($_POST['petType']) && $_POST['petType'] == 'Cat' ? 'selected' : ''; ?>>Cat</option>
        <option value="Other" <?php echo isset($_POST['petType']) && $_POST['petType'] == 'Other' ? 'selected' : ''; ?>>Other</option>
    </select>
    <?php if (isset($error['petType'])) echo "<span class='text-red-500 text-sm'>" . $error['petType'] . "</span>"; ?>
</div>

            <div class="mb-4 mr-4">
              <label for="reason" class="block text-gray-700">Why do you want to adopt this pet?</label>
              <textarea id="reason" name="reason" rows="4" class="w-full p-2 border border-gray-300 rounded mt-1"><?php echo isset($_POST['reason']) ? htmlspecialchars($_POST['reason']) : ''; ?></textarea>
              <?php if (isset($error['reason'])) echo "<span class='text-red-500 text-sm'>" . $error['reason'] . "</span>"; ?>
            </div>
            <div class="mb-4 mr-4">
    <label for="experience" class="block text-gray-700">Do you have experience with pets?</label>
    <select id="experience" name="experience" class="w-full p-2 border border-gray-300 rounded mt-1">
        <option value="">Choose...</option> <!-- Added blank option -->
        <option value="Yes" <?php echo isset($_POST['experience']) && $_POST['experience'] == 'Yes' ? 'selected' : ''; ?>>Yes</option>
        <option value="No" <?php echo isset($_POST['experience']) && $_POST['experience'] == 'No' ? 'selected' : ''; ?>>No</option>
    </select>
    <?php if (isset($error['experience'])) echo "<span class='text-red-500 text-sm'>" . $error['experience'] . "</span>"; ?>
</div>
        </div>
        </div>
        <div class="flex justify-center items-center">
          <button type="submit" name="adoptBtn" class="bg-blue-600 text-white p-2 rounded mt-4 hover:bg-blue-700">
            Submit Application
          </button>
      </form>
    </main>
  </div>

  <script src="dsic/js/script.js"></script>
</body>
</html>
