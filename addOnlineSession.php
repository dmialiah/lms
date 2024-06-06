<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "selfodb";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$course_code = "";
$link_meet = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $course_code = $_POST["course_code"];
    $link_meet = $_POST["link_meet"];

    do {
        if ( empty($course_code) || empty($link_meet)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // Add new session to database
        $sql = "INSERT INTO online_session ( course_code, link_meet) VALUES ( ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sss", $course_code, $link_meet);
        $result = $stmt->execute();

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $course_code = "";
        $link_meet = "";

        $successMessage = "Online session added correctly";

        header("Location: listOnlineSession.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Session</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New Online Session</h2>

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
                <label class="col-sm-3 col-form-label">Course Code</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="course_code" value="<?php echo htmlspecialchars($course_code, ENT_QUOTES, 'UTF-8'); ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Link Meeting</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="link_meet" value="<?php echo htmlspecialchars($link_meet, ENT_QUOTES, 'UTF-8'); ?>">
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
                    <a class="btn btn-outline-primary" href="listOnlineSession.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>