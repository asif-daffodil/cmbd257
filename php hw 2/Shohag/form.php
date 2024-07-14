<?php
function validate($data)
{
    // $data = trim($data);
    // $data = htmlspecialchars($data);
    // $data = stripslashes($data);
    return $data;
}
$bangladeshCities = [
    "Dhaka", "Chittagong", "Khulna", "Rajshahi", "Sylhet", "Barisal", "Rangpur", "Narayanganj",
    "Comilla", "Gazipur", "Mymensingh", "Jessore", "Cox's Bazar", "Dinajpur", "Bogra", "Kushtia", "Nawabganj",
    "Tangail", "Faridpur", "Jamalpur", "Pabna", "Naogaon", "Sirajganj", "Madaripur", "Netrakona", "Magura", "Joypurhat",
    "Narsingdi", "Bagerhat", "Sherpur"
];

if (isset($_POST['reg123']) && $_POST['reg123'] == 'sign up') {
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $age = validate($_POST['age']);
    $gender = isset($_POST['gender']) ? validate($_POST['gender']) : null;
    $hobbies = isset($_POST['hobbies']) ? validate($_POST['hobbies']) : null;
    $city = validate($_POST['city']);

    if (empty($name)) {
        $errorName = 'Name is required';
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $name)) {
        $errorName = "Only letters and white space allowed";
    } else {
        $crrName = $name;
    }

    if (empty($email)) {
        $errorEmail = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "Invalid email format";
    } else {
        $crrEmail = $email;
    }

    if (empty($age)) {
        $errorAge = 'Age is required';
    } elseif (!is_numeric($age)) {
        $errorAge = "Invalid age";
    } else {
        $crrAge = $age;
    }

    if (empty($gender)) {
        $errorGen = 'Gender is required';
    } else {
        $crrGen = $gender;
    }

    if (empty($hobbies)) {
        $errorHobbies = 'Hobbirs is required';
    } else {
        $crrHob = $hobbies;
    }

    if (empty($city)) {
        $errorCity = "City is required";
    } else {
        $crrCity = $city;
    }

    if (isset($crrName) && isset($crrEmail) && isset($crrAge) && isset($crrGen) && isset($crrHob) && isset($crrCity)) {
        echo "<script> alert(' Your submition is successful!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <div class="row min-vh-100">
            <div class="col md-5 m-auto border round shadwo p-4">
                <h2 class="mb-3">Sing up form</h2>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <!--Name field--------------------->
                    <div class="mb-3">
                        <input type="text" placeholder="Enter Your Name" name="name" class="form-control <?= isset($errorName) ? 'is-invalid' : null ?>" value="<?= $crrName ?? null ?>" />
                        <div class="invalid-feedback"> <?= $errorName ?? null ?></div>
                    </div>
                    <!--Email field--------------------->
                    <div class="mb-3">
                        <input type="text" placeholder="Enter Your Email" name="email" class="form-control <?= isset($errorEmail) ? 'is-invalid' : null ?>" value="<?= $crrEmail ?? null ?>" />
                        <div class="invalid-feedback"><?= $errorEmail ?? null ?></div>
                    </div>
                    <!--Age field--------------------->
                    <div class="mb-3">
                        <input type="text" placeholder="Enter Your Age" name="age" class="form-control <?= isset($errorAge) ? 'is-invalid' : null ?>" value="<?= $crrAge ?? null ?>" />
                        <div class="invalid-feedback"><?= $errorAge ?? null ?></div>
                    </div>
                    <!--Gender field--------------------->
                    <div class="mb-1 <?= isset($errorGen) ? "border border-danger" : null ?> py-1 rounded px-2 position-relative">
                        <label for="">Gender: </label>
                        <input type="radio" name="gender" id="male" value="Male" />
                        <label for="male">Male</label>
                        <input type="radio" name="gender" id="female" value="Female" />
                        <label for="female">Female</label>
                        <?php if (isset($errorGen)) { ?>
                            <i class="bi bi-exclamation-circle text-danger position-absolute top-0 start-0"></i>
                        <?php } ?>
                    </div>
                    <div class="mb-3 text-danger small"><?= $errorGen ?? null ?></div>
                    <!--Hobbies field--------------------->
                    <div class="mb-1 <?= isset($errorHobbies) ? "border border-danger py-1 rounded" : null ?> ">
                        <div class="form-check form-check-inline ml-2 ">
                            <label for="">Hobbies:</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="reading">
                                <input type="checkbox" class="form-check-input" name="hobbies[]" value="Reading" id="reading" />Reading
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="writing">
                                <input type="checkbox" class="form-check-input" name="hobbies[]" value="Writing" id="writing" />Writing
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="coding">
                                <input type="checkbox" class="form-check-input" name="hobbies[]" value="Coding" id="coding" />Coding
                            </label>
                        </div>
                        <?php if (isset($errorHobbies)) { ?>
                            <i class="bi bi-exclamation-circle text-danger position-a   bsolute end-0 top-0 translate-middel fw-bold"></i>
                        <?php } ?>
                    </div>
                    <div class=" mb-3 text-danger small "><?= $errorHobbies ?? null ?></div>
                    <!--Country field--------------------->
                    <div class="mb-3 ">
                        <select name="city" class="form-select form-control my-1 <?= isset($errorCity) ? "is-invalid" : null ?>">
                            <option value="">Select City</option>
                            <?php foreach ($bangladeshCities as $city) { ?>

                                <option value="<?= $city ?>"><?= $city ?></option>
                            <?php } ?>
                        </select>
                        <div class=" text-danger small"><?= $errorCity ?? null ?> </div>
                    </div>
                    <div class="mb">
                        <input type="submit" name="reg123" value="sign up" class="btn btn-primary">
                    </div>
            </div>
        </div>
    </div>
    </form>

    </div>
    </div>
</body>

</html>