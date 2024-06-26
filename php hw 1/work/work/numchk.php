<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Number Checker</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .container {
      margin-top: 50px;
    }
    .alert-success {
      color: #155724;
      background-color: #d4edda;
      border-color: #c3e6cb;
    }
    .alert-warning {
      color: #856404;
      background-color: #fff3cd;
      border-color: #ffeeba;
    }
    .alert-danger {
      color: #721c24;
      background-color: #f8d7da;
      border-color: #f5c6cb;
    }
    .custom-btn {
      background-color: #007bff;
      border-color: #007bff;
    }
    .custom-btn:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Number Checker</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="form-group">
        <label for="number">Enter a Number:</label>
        <input type="text" class="form-control" id="number" name="number">
      </div>
      <button type="submit" class="btn custom-btn">Check</button>
    </form>
    <br>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['number'];
        if (is_numeric($input)) {
          $number = (int)$input;
          if ($number % 2 == 0) {
            echo "<div class='alert alert-success' role='alert'>The number $number is even.</div>";
          } else {
            echo "<div class='alert alert-warning' role='alert'>The number $number is odd.</div>";
          }
        } else {
          echo "<div class='alert alert-danger' role='alert'>The input '$input' is not a valid number.</div>";
        }
      }
    ?>
  </div>
</body>
</html>
