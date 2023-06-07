<?php
// Include the database connection script
include("connection.php");

// Fetch the updated sensor data from the database
$sec = "SELECT * FROM sensor_data";
$result = $connect->query($sec);

// Generate the HTML content for the table
$tableHTML = '';
if ($result->num_rows > 0) {
  while ($get = $result->fetch_assoc()) {
    $tableHTML .= "
    <tr>
      <td>" . $get['id'] . "</td>
      <td>" . $get['detection'] . "</td>
      <td>" . $get['enterdate'] . "</td>
    </tr>";
  }
}

// Return the HTML content
echo $tableHTML;
?>
