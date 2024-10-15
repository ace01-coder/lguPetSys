<?php
include 'dbconn/connection.php';

if (isset($_POST['adoptBtn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $reason = $_POST['reason'];
    $experience = $_POST['experience'];

    $conn = dbconnect();

    $sql = "INSERT INTO adoptions (name, email, phone, address, pet_name, pet_type, reason, experience) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $name, $email, $phone, $address, $petName, $petType, $reason, $experience);


    if ($stmt->execute()) {
        echo "<script>
                alert('Adoption application successfully submitted');
                window.location.href = 'adoption.php'; // Redirect back to the form page
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Error: Could not submit the application');
                window.location.href = 'adoption.php'; // Redirect back to the form page
              </script>";
    }
    

    
    $stmt->close();
    $conn->close();
}

?>
