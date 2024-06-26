<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Eligibility Checker</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
        body {
            background-color: #f8f9fa; 
        }
        .card {
            background-color: #343a40;
            color: #ffffff; 
        }
        .card-header {
            background-color: #ff6f00; 
            color: #ffffff; 
        }
        .btn-primary {
            background-color: #ff6f00; 
            border-color: #ff6f00; 
        }
        .btn-primary:hover {
            background-color: #fb5200; 
            border-color: #fb5100; 
        }
        .form-control {
            background-color: #ffffff; 
            color: #495057; 
            border-color: #ced4da;
        }
        .alert {
            background-color: #ff6f00; 
            color: #ffffff; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Check Your Voting Eligibility</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="age">Enter Your Age:</label>
                        <input type="number" class="form-control" id="age" name="age" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Check Eligibility</button>
                </form>
                <br>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $age = $_POST['age'];
                    
                    function checkVotingEligibility($age) {
                        if (!is_numeric($age)) {
                            return "Invalid input. Please enter a numerical age.";
                        }

                        if ($age >= 18) {
                            return "You are eligible to vote.";
                        } else {
                            return "You are not eligible to vote.";
                        }
                    }

                    echo '<div class="alert alert-info">' . checkVotingEligibility($age) . '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
