<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>M.S Food - Records</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      margin: 20px;
    }

    h2 {
      text-align: center;
      color: #04AA6D;
    }

    #customers {
      border-collapse: collapse;
      width: 100%;
      margin-top: 20px;
    }

    #customers td, #customers th {
      border: 1px solid #ddd;
      padding: 10px;
    }

    #customers tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    #customers tr:hover {
      background-color: #f1f1f1;
    }

    #customers th {
      background-color: #04AA6D;
      color: white;
      text-align: left;
    }

    a {
      text-decoration: none;
      color: blue;
      font-weight: bold;
      margin-right: 10px;
    }

    a:hover {
      color: red;
    }
  </style>
</head>
<body>

  <h2>Customer Address Records</h2>

  <table id="customers">
    <tr>
      <th>S.No.</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Phone</th>
      <th>House</th>
      <th>Address</th>
      <th>City</th>
      <th>Pin</th>
      <th>Action</th>
    </tr>

    <?php
    include 'config.php';

    if (!$conn) {
      die("Database connection failed.");
    }

    $sql = "SELECT * FROM address";
    $result = $conn->query($sql);
    $serial = 1;

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $serial++ . "</td>";
        echo "<td>" . htmlspecialchars($row['fname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['lname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
        echo "<td>" . htmlspecialchars($row['house']) . "</td>";
        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['city']) . "</td>";
        echo "<td>" . htmlspecialchars($row['pin']) . "</td>";
        echo "<td>
                <a href='delete.php?id=" . $row['id'] . "'>🗑️ Delete</a>
                <a href='update.php?id=" . $row['id'] . "'>✏️ Edit</a>
              </td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='9' style='text-align:center;'>No records found</td></tr>";
    }

    $conn->close();
    ?>
  </table>

</body>
</html>
