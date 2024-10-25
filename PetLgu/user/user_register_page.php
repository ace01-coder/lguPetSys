<?php
include('dbconn/config.php');
include('dbconn/authentication.php');
checkAccess(requiredRole: 'user'); 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $error = array();
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    $targetDir = "pet_image/";
    $vaccineDir = "vaccine_record/";

    // Validate inputs
    if (empty($_POST['owner_name'])) {
        $error['owner_name'] = 'Owner Name is required';
    } else {
        $ownerName = htmlspecialchars($_POST['owner_name']);
    }

    if (empty($_POST['pet_name'])) {
        $error['pet_name'] = 'Pet Name is required';
    } else {
        $petName = htmlspecialchars($_POST['pet_name']);
    }

    if (empty($_POST['pet_age'])) {
        $error['pet_age'] = 'Pet age is required';
    } else {
        $petAge = htmlspecialchars($_POST['pet_age']);
    }

    if (empty($_POST['pet_breed'])) {
        $error['pet_breed'] = 'Pet breed is required';
    } else {
        $petBreed = htmlspecialchars($_POST['pet_breed']);
    }

    if (empty($_POST['address'])) {
        $error['address'] = 'Address is required';
    } else {
        $address = htmlspecialchars($_POST['address']);
    }

    if (empty($_POST['additional_info'])) {
        $error['additional_info'] = 'Additional information is required';
    } else {
        $additionalInfo = htmlspecialchars($_POST['additional_info']);
    }

    // Handle file uploads
    function handleFileUpload($fileInputName, $allowedTypes, $targetDir, &$error) {
        if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === 0) {
            $fileType = mime_content_type($_FILES[$fileInputName]['tmp_name']);
            $fileSize = $_FILES[$fileInputName]['size'];

            if (!in_array($fileType, $allowedTypes)) {
                $error[$fileInputName] = "Only JPEG, JPG, and PNG files are allowed for $fileInputName";
            } elseif ($fileSize > 2 * 1024 * 1024) { // 2MB limit
                $error[$fileInputName] = "File size should not exceed 2MB for $fileInputName";
            } else {
                $fileName = basename($_FILES[$fileInputName]['name']);
                $sanitizedFile = preg_replace("/[^a-zA-Z0-9,\-_]/", "", $fileName); // Sanitize filename
                $targetFile = $targetDir . $sanitizedFile;

                if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetFile)) {
                    return $targetFile;
                } else {
                    $error[$fileInputName] = "Failed to upload $fileInputName";
                }
            }
        } else {
            $error[$fileInputName] = "File is required for $fileInputName";
        }
        return null;
    }

    // Handle the pet image upload
    $petImagePath = handleFileUpload('pet_image', $allowedTypes, $targetDir, $error);

    // Handle the vaccine record upload
    $vaccineRecordPath = handleFileUpload('vaccine_record', $allowedTypes, $vaccineDir, $error);

    // Check for errors before database insertion
    if (empty($error)) {
        $sql = "INSERT INTO register (owner, pet, age, breed, address, pet_image, vaccine_record, additional_info) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $ownerName, $petName, $petAge, $petBreed, $address, $petImagePath, $vaccineRecordPath, $additionalInfo);

        if ($stmt->execute()) {
            echo "<script>
            alert('Registration successfully submitted');
            window.location.href = 'user_register_page.php';
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barangay Animal Welfare</title>
  <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="flex bg-gray-300">

  <!-- Sidebar -->
  <?php include ('disc/partials/sidebar.php'); ?>

  <!-- Main Content with Navbar -->
  <div class="flex-1 flex flex-col">
    <!-- Top Navbar -->
    <?php include ('disc/partials/navbar.php'); ?>

    <!-- Main Content Area -->
    <main id="mainContent" class="p-8">
      <div class="flex justify-center items-center w-full">
        <form action="" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md w-full">
          <h2 class="text-2xl font-bold mb-6 text-center">Registration Form</h2>
          <div class="grid grid-cols-2">
            <div class="">
              <div class="mb-4 mr-4">
                <label class="block text-gray-700" for="owner_name">Owner Name:</label>
                <input class="w-full p-2 border border-gray-300 rounded mt-1" name="owner_name" type="text" value="<?php echo isset($_POST['owner_name']) ? htmlspecialchars($_POST['owner_name']) : ''; ?>">
                <?php if (isset($error['owner_name'])) echo "<span class='text-red-500 text-sm'>" . $error['owner_name'] . "</span>"; ?>
              </div>
              <div class="mb-4 mr-4">
                <label class="block text-gray-700" for="pet_name">Pet Name:</label>
                <input class="w-full p-2 border border-gray-300 rounded mt-1" name="pet_name" type="text" value="<?php echo isset($_POST['pet_name']) ? htmlspecialchars($_POST['pet_name']) : ''; ?>">
                <?php if (isset($error['pet_name'])) echo "<span class='text-red-500 text-sm'>" . $error['pet_name'] . "</span>"; ?>
              </div>
              <div class="mb-4 mr-4">
                <label class="block text-gray-700" for="pet_age">Pet Age:</label>
                <input class="w-full p-2 border border-gray-300 rounded mt-1" name="pet_age" type="text" value="<?php echo isset($_POST['pet_age']) ? htmlspecialchars($_POST['pet_age']) : ''; ?>">
                <?php if (isset($error['pet_age'])) echo "<span class='text-red-500 text-sm'>" . $error['pet_age'] . "</span>"; ?>
              </div>
              <div class="mb-4 mr-4">
                <label class="block text-gray-700" for="pet_breed">Pet Breed:</label>
                <input class="w-full p-2 border border-gray-300 rounded mt-1" name="pet_breed" type="text" value="<?php echo isset($_POST['pet_breed']) ? htmlspecialchars($_POST['pet_breed']) : ''; ?>">
                <?php if (isset($error['pet_breed'])) echo "<span class='text-red-500 text-sm'>" . $error['pet_breed'] . "</span>"; ?>
              </div>
              <div class="mb-4 mr-4">
                <label class="block text-gray-700" for="address">Address:</label>
                <input class="w-full p-2 border border-gray-300 rounded mt-1" name="address" type="text" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>">
                <?php if (isset($error['address'])) echo "<span class='text-red-500 text-sm'>" . $error['address'] . "</span>"; ?>
              </div>
            </div>

            <div class="">
              <div class="mb-4 mr-4">
                <label class="block text-gray-700" for="pet_image">Pet Image:</label>
                <input class="w-full p-2 border border-gray-300 rounded mt-1" name="pet_image" type="file">
                <?php if (isset($error['pet_image'])) echo "<span class='text-red-500 text-sm'>" . $error['pet_image'] . "</span>"; ?>
              </div>
              <div class="mb-4 mr-4">
                <label class="block text-gray-700" for="vaccine_record">Vaccine Record:</label>
                <input class="w-full p-2 border border-gray-300 rounded mt-1" name="vaccine_record" type="file">
                <?php if (isset($error['vaccine_record'])) echo "<span class='text-red-500 text-sm'>" . $error['vaccine_record'] . "</span>"; ?>
              </div>
              <div class="mb-4 mr-4">
                <label class="block text-gray-700" for="additional_info">Additional Information:</label>
                <textarea class="w-full p-2 border border-gray-300 rounded mt-1" name="additional_info"><?php echo isset($_POST['additional_info']) ? htmlspecialchars($_POST['additional_info']) : ''; ?></textarea>
                <?php if (isset($error['additional_info'])) echo "<span class='text-red-500 text-sm'>" . $error['additional_info'] . "</span>"; ?>
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

  <script src="disc/js/script.js"></script>
</body>
</html>
