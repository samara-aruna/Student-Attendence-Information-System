<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendence Marking </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        p
        {
            font-size:20px;
            font-weight:bold;
            color:yellow;
            text-align:right;
        }
        body
        {
            background-image:url("one.jpg");
        }
        </style>
</head>
<body>
    <div class="container my-5">
        <h1><marquee>Attendence Marking for My Classes</marquee></h1>
        <a class="btn btn-primary" href="create.php" role="button">New Student</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Grade</th>
                    <th>Days Present to the Class</th>
                    <th>Day of Pay Class Fee </th>
                    <th> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "father's_info";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM Clients";
                $result = $connection->query($sql);

                if(!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            
                            <td>$row[name]</td>
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                            <td>$row[fee_day]</td>
                            
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>
                    ";
                }


                ?>
                
            </tbody>
        </table>

    </div>


<p> Design and Developed by Aruna Samarasinghe(Wed Designer and UX/UI Designer)</p>
</body>
</html>