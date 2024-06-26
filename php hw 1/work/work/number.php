<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check if Number is Positive or Negative</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
        }
        .btn-primary {
            background-color: green; 
            border-color: green; 
        }
        .btn-primary:hover {
            background-color: darkgreen;
            border-color: darkgreen; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Check if Number is Positive or Negative</h2>
        <form method="post">
            <div class="form-group">
                <label for="number">Enter a number:</label>
                <input type="number" class="form-control" id="number" name="number" required>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </form>
        <br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $number = $_POST['number'];
            if ($number > 0) {
                echo "<p class='text-success'>$number is a positive number.</p>";
            } elseif ($number < 0) {
                echo "<p class='text-danger'>$number is a negative number.</p>";
            } else {
                echo "<p class='text-warning'>$number is zero.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
