<?php
function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$cities = array("Dhaka", "Chittagong", "Khulna", "Rajshahi", "Sylhet", "Barisal", "Rangpur", "Comilla", "Narayanganj", "Mymensingh", "Gazipur", "Narsingdi", "Savar", "Tongi", "Jessore", "Dinajpur", "Bogra", "Saidpur", "Nawabganj", "Feni", "Pabna", "Sirajganj", "Tangail", "Noakhali", "Cox's Bazar", "Kushtia", "Gopalganj", "Faridpur", "Madaripur", "Bhola", "Laxmipur", "Jamalpur", "Sherpur", "Netrokona", "Sunamganj", "Habiganj", "Maulvibazar", "Patuakhali", "Barguna", "Jhalokati", "Pirojpur", "Brahmanbaria", "Chandpur", "Lakshmipur", "Munshiganj", "Rajbari", "Shariatpur", "Meherpur", "Chuadanga", "Jhenaidah", "Magura", "Narail", "Bagerhat", "Satkhira");



if (isset($_POST['reg123']) && $_POST['reg123'] == "Register") {
    $yname = validate($_POST['yname']);
    $age = validate($_POST['age']);
    $email = validate($_POST['email']);
    $gender = isset($_POST['gender']) ? validate($_POST['gender']) : null;
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : null;
    $city = validate($_POST['city']);

    if (empty($yname)) {
        $errName = "Name is required";
    } elseif (!preg_match("/^[A-Za-z. ]*$/", $yname)) {
        $errName = "Only letters and white space allowed";
    } else {
        $crrName = $yname;
    }

    if (empty($age)) {
        $errAge = "Age is required";
    } elseif (!is_numeric($age)) {
        $errAge = "Invalid age";
    } else {
        $crrAge = $age;
    }

    if (empty($email)) {
        $errEmail = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email format";
    } else {
        $crrEmail = $email;
    }

    if (empty($gender)) {
        $errGender = "Please select your gender";
    } else {
        $crrGender = $gender;
    }

    if (empty($hobbies)) {
        $errHobbies = "Please select your hobbies";
    } else {
        $crrHobbies = $hobbies;
    }

    if (empty($city)) {
        $errCity = "Please select your city";
    } else {
        $crrCity = $city;
    }

    if (isset($crrName) && isset($crrAge) && isset($crrEmail) && isset($crrGender) && isset($crrHobbies) && isset($crrCity)) {
        echo "<script>alert('Done')</script>";
        $yname = $age = $email = $gender = $hobbies = $city = null;
        $crrName = $crrAge = $crrEmail = $crrGender = $crrHobbies = $crrCity = null;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <div class="row min-vh-100">
            <div class="col-md-5 m-auto border shadow rounded p-5">
                <h2 class="mb-4">Registration Form</h2>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="mb-3">
                        <input type="text" placeholder="Your Name" name="yname" class="form-control <?= isset($errName) ? 'is-invalid' : null ?>" value="<?= $crrName ?? null ?>">
                        <div class="invalid-feedback">
                            <?= $errName ?? null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Your Age" name="age" class="form-control <?= isset($errAge) ? 'is-invalid' : null ?>" value="<?= $crrAge ?? null ?>">
                        <div class="invalid-feedback">
                            <?= $errAge ?? null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Your Email" name="email" class="form-control <?= isset($errEmail) ? 'is-invalid' : null ?>" value="<?= $crrEmail ?? null ?>">
                        <div class="invalid-feedback">
                            <?= $errEmail ?? null ?>
                        </div>
                    </div>
                    <div class="mb-1 <?= isset($errGender) ? "border border-danger" : null ?> rounded py-1 position-relative">
                        <div class="form-check form-check-inline">
                            <label for="">
                                Gender :
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="male">
                                <input type="radio" class="form-check-input" name="gender" value="Male" id="male" <?= isset($gender) && $gender == "Male" ? "checked" : null ?> />Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="female">
                                <input type="radio" class="form-check-input" name="gender" value="Female" id="female" <?= isset($gender) && $gender == "Female" ? "checked" : null ?> />Female
                            </label>
                        </div>
                        <?php if (isset($errGender)) {  ?>
                            <span class="fw-bold" style="font-weight: bold; -webkit-text-stroke: 0.5px red; ">
                                <i class="bi bi-exclamation-circle position-absolute end-0 top-50 translate-middle-y text-danger fw-bold pe-2"></i>
                            </span>
                        <?php } ?>
                    </div>
                    <div class="mb-3 text-danger small">
                        <?= $errGender ?? null ?>
                    </div>
                    <div class="mb-1 <?= isset($errHobbies) ? "border border-danger" : null ?> rounded py-1 position-relative">
                        <div class="form-check form-check-inline">
                            <label for="">
                                Hobbies :
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="Singing">
                                <input type="checkbox" class="form-check-input" name="hobbies[]" value="Singing" id="Singing" <?= isset($crrHobbies) && in_array("Singing", $crrHobbies) ? "checked" : null ?> />Singing
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="Dancing">
                                <input type="checkbox" class="form-check-input" name="hobbies[]" value="Dancing" id="Dancing" <?= isset($crrHobbies) && in_array("Dancing", $crrHobbies) ? "checked" : null ?> />Dancing
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="Reading">
                                <input type="checkbox" class="form-check-input" name="hobbies[]" value="Reading" id="Reading" <?= isset($crrHobbies) && in_array("Reading", $crrHobbies) ? "checked" : null ?> />Reading
                            </label>
                        </div>
                        <?php if (isset($errHobbies)) {  ?>
                            <span class="fw-bold" style="font-weight: bold; -webkit-text-stroke: 0.5px red; ">
                                <i class="bi bi-exclamation-circle position-absolute end-0 top-50 translate-middle-y text-danger fw-bold pe-2"></i>
                            </span>
                        <?php } ?>
                    </div>
                    <div class="mb-3 text-danger small">
                        <?= $errHobbies ?? null ?>
                    </div>
                    <div class="mb-3">
                        <select name="city" class="form-select <?= isset($errCity) ? "is-invalid" : null ?>">
                            <option value="">Select City</option>
                            <?php foreach ($cities as $ct) { ?>
                                <option value="<?= $ct ?>" <?= isset($crrCity) && $crrCity == $ct ? "selected" : null ?>><?= $ct ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $errCity ?? null ?>
                        </div>
                    </div>
                    <input type="submit" value="Register" name="reg123" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</body>

</html>