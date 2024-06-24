<?php

   $servername = "localhost";
   $username = "root";
   $password = "";
   $database = "father's_info";

   $connection = new mysqli($servername, $username, $password, $database);

   $name = "";
   $phone = "";
   $address = "";
   $fee_day = "";
   
   $errorMessage = "";
   $successMessage = "";

   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $name = $_POST['name'];
       $phone = $_POST['phone'];
       $address = $_POST['address'];
       $fee_day = $_POST['fee_day'];

       do {
           if (empty($name) || empty($phone) || empty($address)) {
               $errorMessage = "All the fields are required";
               break;
           }

           // add new client to database
           $sql = "INSERT INTO clients (name, phone, address, fee_day) VALUES ('$name','$phone', '$address', '$fee_day')";
           $result = $connection->query($sql);
           if (!$result) {
               $errorMessage = "Invalid query: " . $connection->error;
               break;
           }

           $name = "";
           $phone = "";
           $address = "";
           $fee_day = "";

           $successMessage = "Client added successfully";

           header("Location: index.php");
           exit;

       } while (false);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Marking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style_create.css">
    <style>
        body
        {
            background-image:url("six.jpg");
        }
        form
        {
            font-weight:bold;
            color:black;
        }
        h2
        {
            color:black;
        }
    </style>   
        
</head>
<body>
    <div class="container my-5">
        <h2><marquee>New Student Information</marquee></h2>

        <?php
           if (!empty($errorMessage)) {
               echo "
               <div class='alert alert-warning alert-dismissible fade show' role='alert'>
               <strong>$errorMessage</strong>
               <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>
               ";
           }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Student Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Grade</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Day Present to the Class</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($address); ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Day of Pay Fee</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fee_day" value="<?php echo htmlspecialchars($fee_day); ?>">
                </div>
            </div>

            <?php
                if (!empty($successMessage)) {
                    echo " 
                    <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                    </div>
                    </div>
                    ";
                }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index.php">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
