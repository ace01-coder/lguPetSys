<?php
include 'dbconn/connection.php';

if (isset($_POST['regsBtn'])) {

    $ownerName = $_POST['owner_name'];
    $petName = $_POST['pet_name'];
    $petAge = $_POST['pet_age'];
    $petBreed = $_POST['pet_breed'];
    $address = $_POST['address'];
    $additionalInfo = $_POST['additional_info'];    
    $petImageFile = $_FILES['pet_image']['name'];
    $vaccineRecordFile = $_FILES['vaccine_record']['name'];
    $targetDir = "pet_image/";
    $targetFile = "vaccine_record/";


    $petImagePath = $targetDir . basename($petImageFile);
    $vaccineRecordPath = $targetfile . basename($vaccineRecordFile);


    $conn = dbconnect();

    
    $sql = "INSERT INTO registrations (owner_name, pet_name, pet_age, pet_breed, address, pet_image, vaccine_record, additional_info) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $ownerName, $petName, $petAge, $petBreed, $address, $petImagePath, $vaccineRecordPath, $additionalInfo);

    if ($stmt->execute()) {
        if (move_uploaded_file($_FILES['pet_image']['tmp_name'], $petImagePath) && 
            move_uploaded_file($_FILES['vaccine_record']['tmp_name'], $vaccineRecordPath)) {
            echo "<script>
            alert('Registration successfully submitted');
            window.location.href = 'register.php'; // 
          </script>";
        } else {
            echo "<script>
            alert('Error uploading files');
            window.location.href = 'register.php'; // 
          </script>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
