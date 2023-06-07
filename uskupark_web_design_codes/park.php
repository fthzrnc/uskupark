<?php

include("connection.php");

// Fetch data from the database
$query = "SELECT * FROM sensor_data";
$result = $connect->query($query);

// Variable to hold the car style
$carStyle = '';
$recStyle = '';


if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'A1' && $detection == 'YES') {
      $carStyle = '';
      $recStyle = 'border-color: red;';
    } elseif ($id == 'A1' && $detection == 'NO') {
      $carStyle = 'display: none;';
      $recStyle = '';
    }
  }
}

$carStyle2 = '';
$recStyle2 = '';

// Fetch data from the database again
$result = $connect->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'A2' && $detection == 'YES') {
      $carStyle2 = ''; // Reset the car style if the condition is met
      $recStyle2 = 'border-color: red;';
    } elseif ($id == 'A2' && $detection == 'NO') {
      $carStyle2 = 'display: none;';
      $recStyle2 = '';
    }
  }
}

$carStyle3 = '';
$recStyle3 = '';

// Fetch data from the database again
$result = $connect->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'A3' && $detection == 'YES') {
      $carStyle3 = ''; // Reset the car style if the condition is met
      $recStyle3 = 'border-color: red;';
    } elseif ($id == 'A3' && $detection == 'NO') {
      $carStyle3 = 'display: none;';
      $recStyle3 = '';
    }
  }
}

$carStyle4 = '';
$recStyle4 = '';

// Fetch data from the database again
$result = $connect->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'A4' && $detection == 'YES') {
      $carStyle4 = ''; // Reset the car style if the condition is met
      $recStyle4 = 'border-color: red;';
    } elseif ($id == 'A4' && $detection == 'NO') {
      $carStyle4 = 'display: none;';
      $recStyle4 = '';
    }
  }
}

$carStyle5 = '';
$recStyle5 = '';

// Fetch data from the database again
$result = $connect->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'B1' && $detection == 'YES') {
      $carStyle5 = ''; // Reset the car style if the condition is met
      $recStyle5 = 'border-color: red;';
    } elseif (($id == 'B1' && $detection == 'NO') || ($id == 'B1' && $detection == 'NULL')) {
      $carStyle5 = 'display: none;';
      $recStyle5 = '';
    }
  }
}

$carStyle6 = '';
$recStyle6 = '';

// Fetch data from the database again
$result = $connect->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'B2' && $detection == 'YES') {
      $carStyle6 = ''; // Reset the car style if the condition is met
      $recStyle6 = 'border-color: red;';
    } elseif (($id == 'B2' && $detection == 'NO') || ($id == 'B2' && $detection == 'NULL')) {
      $carStyle6 = 'display: none;';
      $recStyle6 = '';
    }
  }
}

$carStyle7 = '';
$recStyle7 = '';

// Fetch data from the database again
$result = $connect->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'B3' && $detection == 'YES') {
      $carStyle7 = ''; // Reset the car style if the condition is met
      $recStyle7 = 'border-color: red;';
    } elseif (($id == 'B3' && $detection == 'NO') || ($id == 'B3' && $detection == 'NULL')) {
      $carStyle7 = 'display: none;';
      $recStyle7 = '';
    }
  }
}

$carStyle8 = '';
$recStyle8 = '';

// Fetch data from the database again
$result = $connect->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'B4' && $detection == 'YES') {
      $carStyle8 = ''; // Reset the car style if the condition is met
      $recStyle8 = 'border-color: red;';
    } elseif (($id == 'B4' && $detection == 'NO') || ($id == 'B4' && $detection == 'NULL')) {
      $carStyle8 = 'display: none;';
      $recStyle8 = '';
    }
  }
}

$carStyle9 = '';
$recStyle9 = '';

// Fetch data from the database again
$result = $connect->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'C1' && $detection == 'YES') {
      $carStyle9 = ''; // Reset the car style if the condition is met
      $recStyle9 = 'border-color: red;';
    } elseif (($id == 'C1' && $detection == 'NO') || ($id == 'C1' && $detection == 'NULL')) {
      $carStyle9 = 'display: none;';
      $recStyle9 = '';
    }
  }
}

$carStyle10 = '';
$recStyle10 = '';

// Fetch data from the database again
$result = $connect->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'C2' && $detection == 'YES') {
      $carStyle10 = ''; // Reset the car style if the condition is met
      $recStyle10 = 'border-color: red;';
    } elseif (($id == 'C2' && $detection == 'NO') || ($id == 'C2' && $detection == 'NULL')) {
      $carStyle10 = 'display: none;';
      $recStyle10 = '';
    }
  }
}

$carStyle11 = '';
$recStyle11 = '';

// Fetch data from the database again
$result = $connect->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'C3' && $detection == 'YES') {
      $carStyle11 = ''; // Reset the car style if the condition is met
      $recStyle11 = 'border-color: red;';
    } elseif (($id == 'C3' && $detection == 'NO') || ($id == 'C3' && $detection == 'NULL')) {
      $carStyle11 = 'display: none;';
      $recStyle11 = '';
    }
  }
}

$carStyle12 = '';
$recStyle12 = '';

// Fetch data from the database again
$result = $connect->query($query);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $detection = $row['detection'];

    // Check if sensorID is 'A1' and detection is 'no'
    if ($id == 'C4' && $detection == 'YES') {
      $carStyle12 = ''; // Reset the car style if the condition is met
      $recStyle12 = 'border-color: red;';
    } elseif (($id == 'C4' && $detection == 'NO') || ($id == 'C4' && $detection == 'NULL')) {
      $carStyle12 = 'display: none;';
      $recStyle12 = '';
    }
  }
}


function setA1Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='A1'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setA1No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='A1'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setA2Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='A2'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setA2No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='A2'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setA3Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='A3'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setA3No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='A3'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setA4Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='A4'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setA4No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='A4'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setB1Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='B1'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setB1No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='B1'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setB2Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='B2'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setB2No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='B2'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setB3Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='B3'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setB3No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='B3'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setB4Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='B4'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setB4No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='B4'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setC1Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='C1'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setC1No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='C1'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setC2Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='C2'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setC2No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='C2'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setC3Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='C3'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setC3No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='C3'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setC4Yes()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='YES' WHERE id='C4'";
  $result = $connect->query($query);
  header("Refresh:0");
}

function setC4No()
{
  include("connection.php");

  $query = "UPDATE sensor_data SET detection='NO' WHERE id='C4'";
  $result = $connect->query($query);
  header("Refresh:0");
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Park | USKUPARK</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css?v=<?php echo rand(); ?>">
  <script src="https://kit.fontawesome.com/7183f30c74.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="x-icon" href="../img/logo.png">



</head>
<body>

  <section id="menu">
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
  <section id="park" class="grid-container">
    <div class="rectangle" style="<?php echo $recStyle; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle; ?>" />
      <div class="circle">
        <span class="label">A1</span>
      </div>
    </div>
    <div class="rectangle" style="<?php echo $recStyle2; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle2; ?>" />
      <div class="circle">
        <span class="label">A2</span>
      </div>
    </div>
    <div class="rectangle" style="<?php echo $recStyle5; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle5; ?>" />
      <div class="circle">
        <span class="label">B1</span>
      </div>
    </div>
    <div class="rectangle" style="<?php echo $recStyle6; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle6; ?>" />
      <div class="circle">
        <span class="label">B2</span>
      </div>
    </div>
    <div class="rectangle" style="<?php echo $recStyle9; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle9; ?>" />
      <div class="circle">
        <span class="label">C1</span>
      </div>
    </div>
    <div class="rectangle" style="<?php echo $recStyle10; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle10; ?>" />
      <div class="circle">
        <span class="label">C2</span>
      </div>
    </div>
    <div class="rectangle" style="<?php echo $recStyle3; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle3; ?>" />
      <div class="circle">
        <span class="label">A3</span>
      </div>
    </div>
    <div class="rectangle" style="<?php echo $recStyle4; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle4; ?>" />
      <div class="circle">
        <span class="label">A4</span>
      </div>
    </div>
    <div class="rectangle" style="<?php echo $recStyle7; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle7; ?>" />
      <div class="circle">
        <span class="label">B3</span>
      </div>
    </div>
    <div class="rectangle" style="<?php echo $recStyle8; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle8; ?>" />
      <div class="circle">
        <span class="label">B4</span>
      </div>
    </div>
    <div class="rectangle" style="<?php echo $recStyle11; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle11; ?>" />
      <div class="circle">
        <span class="label">C3</span>
      </div>
    </div>
    <div class="rectangle" style="<?php echo $recStyle12; ?>">
    <img src="../img/car.png" alt="" class="carA1" style="<?php echo $carStyle12; ?>" />
      <div class="circle">
        <span class="label">C4</span>
      </div>
    </div>
  </section>


  <form method="POST">
    <button class="buttonA1" type="submit" name="a1yes">Set A1 YES</button>
  </form>

  <?php
  if (isset($_POST['a1yes'])) {
    setA1Yes();
  }
  ?>

<form method="POST">
    <button class="buttonA1NO" type="submit" name="a1no">Set A1 NO</button>
  </form>

  <?php
  if (isset($_POST['a1no'])) {
    setA1No();
  }
  ?>

<form method="POST">
    <button class="buttonA2" type="submit" name="a2yes">Set A2 YES</button>
  </form>

  <?php
  if (isset($_POST['a2yes'])) {
    setA2Yes();
  }
  ?>

<form method="POST">
    <button class="buttonA2NO" type="submit" name="a2no">Set A2 NO</button>
  </form>

  <?php
  if (isset($_POST['a2no'])) {
    setA2No();
  }
  ?>

<form method="POST">
    <button class="buttonA3" type="submit" name="a3yes">Set A3 YES</button>
  </form>

  <?php
  if (isset($_POST['a3yes'])) {
    setA3Yes();
  }
  ?>

<form method="POST">
    <button class="buttonA3NO" type="submit" name="a3no">Set A3 NO</button>
  </form>

  <?php
  if (isset($_POST['a3no'])) {
    setA3No();
  }
  ?>

<form method="POST">
    <button class="buttonA4" type="submit" name="a4yes">Set A4 YES</button>
  </form>

  <?php
  if (isset($_POST['a4yes'])) {
    setA4Yes();
  }
  ?>

<form method="POST">
    <button class="buttonA4NO" type="submit" name="a4no">Set A4 NO</button>
  </form>

  <?php
  if (isset($_POST['a4no'])) {
    setA4No();
  }
  ?>

<form method="POST">
    <button class="buttonB1" type="submit" name="b1yes">Set B1 YES</button>
  </form>

  <?php
  if (isset($_POST['b1yes'])) {
    setB1Yes();
  }
  ?>

<form method="POST">
    <button class="buttonB1NO" type="submit" name="b1no">Set B1 NO</button>
  </form>

  <?php
  if (isset($_POST['b1no'])) {
    setB1No();
  }
  ?>

<form method="POST">
    <button class="buttonB2" type="submit" name="b2yes">Set B2 YES</button>
  </form>

  <?php
  if (isset($_POST['b2yes'])) {
    setB2Yes();
  }
  ?>

<form method="POST">
    <button class="buttonB2NO" type="submit" name="b2no">Set B2 NO</button>
  </form>

  <?php
  if (isset($_POST['b2no'])) {
    setB2No();
  }
  ?>

<form method="POST">
    <button class="buttonB3" type="submit" name="b3yes">Set B3 YES</button>
  </form>

  <?php
  if (isset($_POST['b3yes'])) {
    setB3Yes();
  }
  ?>

<form method="POST">
    <button class="buttonB3NO" type="submit" name="b3no">Set B3 NO</button>
  </form>

  <?php
  if (isset($_POST['b3no'])) {
    setB3No();
  }
  ?>

<form method="POST">
    <button class="buttonB4" type="submit" name="b4yes">Set B4 YES</button>
  </form>

  <?php
  if (isset($_POST['b4yes'])) {
    setB4Yes();
  }
  ?>

<form method="POST">
    <button class="buttonB4NO" type="submit" name="b4no">Set B4 NO</button>
  </form>

  <?php
  if (isset($_POST['b4no'])) {
    setB4No();
  }
  ?>

<form method="POST">
    <button class="buttonC1" type="submit" name="c1yes">Set C1 YES</button>
  </form>

  <?php
  if (isset($_POST['c1yes'])) {
    setC1Yes();
  }
  ?>

<form method="POST">
    <button class="buttonC1NO" type="submit" name="c1no">Set C1 NO</button>
  </form>

  <?php
  if (isset($_POST['c1no'])) {
    setC1No();
  }
  ?>

<form method="POST">
    <button class="buttonC2" type="submit" name="c2yes">Set C2 YES</button>
  </form>

  <?php
  if (isset($_POST['c2yes'])) {
    setC2Yes();
  }
  ?>

<form method="POST">
    <button class="buttonC2NO" type="submit" name="c2no">Set C2 NO</button>
  </form>

  <?php
  if (isset($_POST['c2no'])) {
    setC2No();
  }
  ?>


<form method="POST">
    <button class="buttonC3" type="submit" name="c3yes">Set C3 YES</button>
  </form>

  <?php
  if (isset($_POST['c3yes'])) {
    setC3Yes();
  }
  ?>

<form method="POST">
    <button class="buttonC3NO" type="submit" name="c3no">Set C3 NO</button>
  </form>

  <?php
  if (isset($_POST['c3no'])) {
    setC3No();
  }
  ?>

<form method="POST">
    <button class="buttonC4" type="submit" name="c4yes">Set C4 YES</button>
  </form>

  <?php
  if (isset($_POST['c4yes'])) {
    setC4Yes();
  }
  ?>

<form method="POST">
    <button class="buttonC4NO" type="submit" name="c4no">Set C4 NO</button>
  </form>

  <?php
  if (isset($_POST['c4no'])) {
    setC4No();
  }
  ?>

</body>
</html>