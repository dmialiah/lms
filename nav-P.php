<?php
session_start();
$premium_name = isset($_SESSION['premium_name']) ? $_SESSION['premium_name'] : 'Premium User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/icon.png"/>
  <title>Premium User</title>
  <link rel="stylesheet" href="css/style3.css">
</head>
<body>
  <header>
    <div class="logo"><img src="images/selfo.jpg" alt="Company Logo"></div>
    <nav>
      <a class="active" href="premiumMainpage.php">Home</a>
      <a href="studyMaterialPremium.php">Study Materials</a>
      <a href="paperPremium.php">Past Year</a>
      <a href="listAdditionalNotes.php">Additional Notes</a>
      <a href="listOnlineSession.php">Online Session</a>
    </nav>
    <div class="dropdown">
      <div class="profile">
        <img src="images/profile.png" alt="Profile Icon"/>
        <button class="dropbtn"><?php echo htmlspecialchars($premium_name); ?></button>
      </div>
      <div class="dropdown-content">
        <a href="profilepage.php">Profile</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>
  </header>