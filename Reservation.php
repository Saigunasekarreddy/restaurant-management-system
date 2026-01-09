<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $table_no = $_POST["table_no"];
    $date = $_POST["date"];
    $message = $_POST["message"];

    $sql = "INSERT INTO reservations (user_id, table_no, reservation_date, message)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "isss",
        $_SESSION["user_id"],
        $table_no,
        $date,
        $message
    );

    mysqli_stmt_execute($stmt);
    $success = "Reservation successful!";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Reservation</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">

  <style>
    body, h1, h2 {
      font-family: "Amatic SC", sans-serif;
    }
  </style>
</head>
<body class="w3-container w3-padding-64 w3-blue-grey w3-xlarge">

<!-- Navbar -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off">
    <a href="index.html" class="w3-bar-item w3-button">HOME</a>
    <a href="menu.html" class="w3-bar-item w3-button">MENU</a>
    <a href="about.html" class="w3-bar-item w3-button">ABOUT</a>
    <a href="orders.php" class="w3-bar-item w3-button">ORDERS</a>
    <a href="reservation.php" class="w3-bar-item w3-button">RESERVATION</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-right">LOGOUT</a>
  </div>
</div>

<div class="w3-container w3-padding-64 w3-blue-grey w3-xlarge">
  <div class="w3-content">

    <h1 class="w3-center w3-jumbo">RESERVATION</h1>

    <?php if (isset($success)) echo "<p class='w3-text-green'>$success</p>"; ?>

    <form method="POST">
      <p>
        <input class="w3-input w3-padding-16 w3-border"
               name="table_no"
               placeholder="Table No"
               required>
      </p>

      <p>
        <input class="w3-input w3-padding-16 w3-border"
               type="datetime-local"
               name="date"
               required>
      </p>

      <p>
        <input class="w3-input w3-padding-16 w3-border"
               name="message"
               placeholder="Message / Special requirements">
      </p>

      <p>
        <button class="w3-button w3-black w3-block w3-padding-large">
          RESERVE TABLE
        </button>
      </p>
    </form>

  </div>
</div>

</body>
</html>
