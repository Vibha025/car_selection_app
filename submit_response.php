<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $carOptions = isset($_POST['customer_details']) ? $_POST['customer_details'] : [];

    $validationErrors = [];

    if (!preg_match("/^[A-Za-z\s]+$/", $name)) {
        $validationErrors[] = "Name must contain only letters and spaces.";
    }

    if (!preg_match("/^\d{10}$/", $phone)) {
        $validationErrors[] = "Phone number must be a 10-digit number.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validationErrors[] = "Please enter a valid email address.";
    }

    if (count($validationErrors) > 0) {
        echo implode("<br>", $validationErrors);
    } else {
        $host = "localhost";
        $dbname = "customer_details";
        $username = "root";
        $password = "";

        try {
          $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
          
          $carOptionsStr = implode(", ", array_map('strtoupper', $carOptions));
          if (empty($carOptionsStr)) {
              $carOptionsStr = "No selection";
          }

          $sql = "INSERT INTO details (name, phone, email, address, car_options) VALUES (?, ?, ?, ?, ?)";
          $stmt = $pdo->prepare($sql);
          $stmt->execute([strtoupper($name), $phone, $email, strtoupper($address), $carOptionsStr]);
      
          
          echo '<script>alert("Form data successfully submitted!");</script>';
          echo '<script>window.location.href = "index.php";</script>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    echo "Form not submitted.";
}
?>
