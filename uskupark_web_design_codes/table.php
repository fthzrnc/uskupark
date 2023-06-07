<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Table | USKUPARK</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://kit.fontawesome.com/7183f30c74.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="x-icon" href="../img/logo.png">

</head>
<body>

  <section  id="menu">
    <div id="logo">
        <img src="../img/logo.png">
        USKUPARK
    </div>
    <nav>
        <a href="index"><i class="fa-solid fa-house icon"></i>Homepage</a>
        <a href="table"><i class="fa-solid fa-table icon"></i>Table</a>
        <a href="park"><i class="fa-solid fa-car icon"></i>Park</a>
    </nav>
</section>


<table id="sensordata">
    <thead>
      <tr>
        <th>Sensor ID</th>
        <th>Detection</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include("connection.php");
      $sec = "SELECT * FROM sensor_data";
      $result = $connect->query($sec);
      if ($result->num_rows > 0) {
        $count = 0;
        while ($get = $result->fetch_assoc()) {
          $count++;
          if ($count === 5) {
            echo "
              <tr>
                <th colspan=\"3\">Floor 2</th>
              </tr>
            ";
          } elseif ($count === 9) {
            echo "
              <tr>
                <th colspan=\"3\">Floor 3</th>
              </tr>
            ";
          }
          echo "
            <tr>
              <td>".$get['id']."</td>
              <td>".$get['detection']."</td>
              <td>".$get['enterdate']."</td> 
            </tr>
          ";
        }
      }
    ?>
    </tbody>
  </table>


<button class="refresh-button" onclick="window.location.reload();"><i class="fas fa-sync-alt"></i> Refresh Table</button>

<?php
include("connection.php");

$sec = "SELECT COUNT(*) AS no_count FROM sensor_data WHERE detection = 'NO'";
$result = $connect->query($sec);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $noCount = $row['no_count'];
  echo '<span class="available-lots">' . $noCount . ' Available Lot(s)</span>';
} else {
  echo "No detections found.";
}

$connect->close();
?>


</body>
</html>




