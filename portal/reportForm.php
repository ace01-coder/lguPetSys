<?php
include 'dbconn/connection.php';

if ((isset($_POST['reportBtn']))) {
    
    $reportParty = $_POST['report_party'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $number = $_POST['number'];
    $abuse_nature = $_POST['abuse_nature'];
    $incidentDescription = $_POST['description'];
    
    // File upload handling for "Evidence"
    $evidenceFile = $_FILES['imgInput']['name'];
    $targetDir = "reportEvidence/";
    $targetFile = $targetDir . basename($evidenceFile);

    
    $conn = dbconnect();

    // Prepare the SQL statement
    $sql = "INSERT INTO reports (report_party, phone, email, species, breed, age, number, abuse_nature, 	description, evidence) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $reportParty, $phone, $email, $species, $breed, $age, $number, $abuse_nature, $incidentDescription, $targetFile);

    if ($stmt->execute()) {
        if (move_uploaded_file($_FILES['imgInput']['tmp_name'], $targetFile)) {
            echo "<script>
            alert('Report successfully submitted ');
            window.location.href = 'register.php'; // 
          </script>";
        } else {
         
            echo "<script>
            alert('Error uploading evidence file.');
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
