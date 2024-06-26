<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png"/>
    <title>Premium User</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php include('nav-T.php'); ?>

    <main>
    <div class="container my-5">
        <h2>List of Premium User</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PREMIUM USER NAME</th>
                    <th>PREMIUM USER PHONE</th>
                    <th>PREMIUM USER EMAIL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "selfodb";

                //create connection
                $connection = new mysqli($servername, $username, $password, $database);

                //check connection
                if ($connection->connect_error){
                    die("Connection failed: ". $connection->connect_error);
                }

                //read all row from database table
                $sql = "SELECT * FROM premium_user";
                $result = $connection->query($sql);

                if (!$result){
                    die("Invalid query: ". $connection->error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                    <td>$row[premium_id]</td>
                    <td>$row[premium_name]</td>
                    <td>$row[premium_phone]</td>
                    <td>$row[premium_email]</td>
          
                </tr>
                ";
                }
                ?>
            </tbody>
        </table>
    </div>
    </main>
</body>
</html>