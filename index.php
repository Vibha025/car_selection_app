<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Picks Pro</title>
  <link rel="stylesheet" href="./styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend+Peta&family=Oxygen:wght@700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">

    <div class="title">
      <h1>Select Your Car Options</h1>
    </div>

    <div class="form">
        <form id="form_data" method="post" action="submit_response.php" onsubmit="return validateForm()">
          
        <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required maxlength="10">
      </div>

      <div class="form-group">
        <label for="email">Email Id:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea>
      </div>

      <div class="form-group">
        <label>Car Options:
        <input type="checkbox" name="customer_details[]" value="Hatchback"> Hatchback
        <input type="checkbox" name="customer_details[]" value="Sedan"> Sedan
        <input type="checkbox" name="customer_details[]" value="SUV"> SUV
        </label>
      </div>

      <div class="form-group">
        <input type="submit" value="Submit">
      </div>
    </div>

  </div>
  
  <script>
  function validateForm() {
    var formElement = document.getElementById("form_data");
    var nameField = formElement.elements["name"].value;
    var phoneField = formElement.elements["phone"].value; 
    var emailField = formElement.elements["email"].value; 

    var namePattern = /^[A-Za-z\s]+$/;
    var phonePattern = /^\d{10}$/; 
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    var validationErrors = [];
    
    if (!nameField.match(namePattern)) {
      validationErrors.push("Name must contain only letters and spaces.");
    }
    
    if (!phoneField.match(phonePattern)) {
      validationErrors.push("Phone number must be a 10-digit number.");
    }
    
    if (!emailField.match(emailPattern)) {
      validationErrors.push("Please enter a valid email address.");
    }
    
    if (validationErrors.length > 0) {
      alert(validationErrors.join("\n"));
      return false;
    }
    
    return true;
  }
  </script>

</body>
</html>