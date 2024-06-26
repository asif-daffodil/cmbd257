<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marriage Eligibility Checker</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            padding: 50px;
            background-color: #f8f9fa; 
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
        }
        .btn-primary {
            width: 100%;
            background-color: #28a745; 
            border-color: #28a745; 
        }
        .btn-primary:hover {
            background-color: #218838; 
            border-color: #218838; 
        }
        .form-control:focus {
            border-color: #28a745; 
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25); 
        }
        .alert {
            margin-top: 20px;
            border-radius: 5px;
        }
        .alert-success {
            background-color: #d4edda; 
            border-color: #c3e6cb; 
            color: #155724; 
        }
        .alert-danger {
            background-color: #f8d7da; 
            border-color: #f5c6cb;  
            color: #721c24; 
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">Marriage Eligibility Checker</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="gender">Select Gender:</label>
            <select class="form-control" id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="age">Enter Age:</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <button type="submit" class="btn btn-primary">Check Eligibility</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $gender = $_POST['gender'];
        $age = $_POST['age'];

        function isEligibleForMarriage($gender, $age) {
            $minAgeForMale = 21;
            $minAgeForFemale = 18;

            if ($gender === 'male') {
                return $age >= $minAgeForMale;
            } elseif ($gender === 'female') {
                return $age >= $minAgeForFemale;
            } else {
                return false;
            }
        }

        if (isEligibleForMarriage($gender, $age)) {
            echo '<div class="alert alert-success mt-3" role="alert">Eligible for marriage in Bangladesh.</div>';
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">Not eligible for marriage in Bangladesh.</div>';
        }
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
