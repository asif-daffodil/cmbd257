<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .calculator {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .result {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="calculator card">
        <div class="card-body">
            <h2 class="card-title">Simple PHP Calculator</h2>
            <form method="post" action="">
                <div class="form-group">
                    <input type="number" class="form-control" name="num1" placeholder="First number" required>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="num2" placeholder="Second number" required>
                </div>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input type="radio" name="operation" value="add" required> +
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="operation" value="subtract" required> -
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="operation" value="multiply" required> *
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="operation" value="divide" required> /
                    </label>
                </div>
                <button type="submit" name="calculate" value="calculate" class="btn btn-warning btn-block mt-3">=</button>
            </form>

            <?php
            if (isset($_POST['calculate'])) {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                $operation = $_POST['operation'];
                $result = "";

                if (is_numeric($num1) && is_numeric($num2)) {
                    switch ($operation) {
                        case "add":
                            $result = $num1 + $num2;
                            break;
                        case "subtract":
                            $result = $num1 - $num2;
                            break;
                        case "multiply":
                            $result = $num1 * $num2;
                            break;
                        case "divide":
                            if ($num2 != 0) {
                                $result = $num1 / $num2;
                            } else {
                                $result = "Division by zero error!";
                            }
                            break;
                        default:
                            $result = "Invalid operation selected.";
                            break;
                    }
                    echo "<div class='result alert alert-success mt-3'>Result: $result</div>";
                } else {
                    echo "<div class='result alert alert-danger mt-3'>Please enter valid numbers.</div>";
                }
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
