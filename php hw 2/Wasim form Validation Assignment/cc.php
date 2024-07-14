<?php 
function validate($data){
    $data =trim($data);
    $data = htmlspecialchars($data);
    $data=stripslashes($data);
    return $data;
}

// All the cities BD in php single line 
$cities = ["Dhaka", "Chittagong", "Khulna", "Rajshahi", "Barisal", "Sylhet", "Rangpur", "Mymensingh", "Comilla", "Narayanganj", "Gazipur", "Bogra", "Jessore", "Pabna", "Moulvibazar", "Dinajpur", "Cox's Bazar", "Tangail", "Brahmanbaria", "Kushtia", "Noakhali", "Chandpur", "Feni", "Sirajganj", "Faridpur", "Manikganj", "Habiganj", "Narsingdi", "Jhenaidah", "Patuakhali", "Bhola", "Bandarban", "Lalmonirhat", "Kurigram", "Nilphamari", "Sherpur", "Sunamganj", "Magura", "Meherpur", "Narail", "Panchagarh", "Thakurgaon", "Satkhira", "Bagerhat", "Jhalokathi", "Barguna", "Joypurhat", "Natore", "Chapai Nawabganj", "Naogaon", "Munshiganj", "Laxmipur", "Shariatpur", "Madaripur", "Gopalganj", "Netrokona", "Khagrachari", "Pirojpur", "Gaibandha"];



if(isset($_POST['reg123']) && $_POST['reg123']== 'Sign-up'){
    $name= validate($_POST['name']);
    $email= validate( $_POST['email']);
    $age= validate($_POST['age']);
    $gender = isset($_POST['gender']) ? validate($_POST['gender']) : null;
    $hobbies =zzzzzisset($_POST['hobbies']) ? validate($_POST['hobbies']) : null;
    $country= isset($_POST['country'])? validate($_POST['country']): null;

    if(empty($name)){
        $errName= "Name is required";
    } elseif(!preg_match('/^[A-Za-z.]*$/', $name)){
        $errName= "Only letters and white space allowed";
    }else{
        $correctName= $name;
    }


    if(empty($email)){
        $errEmail = "Input Valid Email Address";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errEmail= "Invalid email address";
    }else {
        $correctEmail= $email;
    }

  
    if(empty($age)){
        $errAge = "Age is required Min: 10, Max: 100";
    }elseif(!filter_var($age, FILTER_VALIDATE_INT)){
        $errAge = "Write a age number";
    } else{
        $correctAge= $age;
    }

    // Gender
    if(empty($gender)){
        $errGender = "Please Select your Gender";
    }
    else{
        $crrGender  = $gender;
    }
    //Hobbies
    if(empty($hobbies)){
        $errHobbies= "Please select your hobbies";
    } else{
        $crrHobbies= $hobbies;
    }
    // All Cities
    if(empty($country)){
        $errcities = "Please select your cities";
    }else{
        $crrcities = $country;
    }
    // All the input server hit
    if(isset($errName) && isset($errEmail) && isset($errAge) &&($errGender) && isset($errHobbies) && isset($errcities)){
        echo "<script> akert('Done') </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practise</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row min-vh-100">
            <div class="col-md-5 m-auto border rounded shadow p-4">
                <h3>Sign-up</h3>
            

            <form action="<?=  $_SERVER['PHP_SELF']?>" method="post">
                <!-- Name, Email, Age input -->
                 <div class="mb-3">
                    <input type="text" placeholder="Enter name:" name="name" class="form-control <?= isset($errName)? 'is-invalid' : null ?>" value="<?= $correctName ?? null?>">
                    <div class="invalid-feedback"><?= $errName ?? null?></div>               
                 </div>
<!-- Email -->
                 <div class="mb-3">
                    <input type="emali" placeholder="Enter email:" name="email" class="form-control <?= isset($errEmail) ? 'is-invalid' : null;?>" value="<?= $correctEmail ?? null?>">
                    <div class="invalid-feedback"><?= $errEmail ?? null?></div>
                 </div>
<!-- Age -->
                 <div class="mb-3">
                    <input type="number" placeholder="Your age:" name="age" class="form-control <?= isset($errAge) ? 'is-invalid' : null;?>" min="10" max="100" value="<?= $correctAge ?? null?>">
                    <div class="invalid-feedback"><?= $errAge ?? null?></div>
                    

                 </div>

                 <!-- Gender Radio Area -->
                  <div class="mb-1 <?= isset($errGender) ? 'border border-danger' : null?> rounded py-1 position-relative">
                    
                    <div class="form-check form-check-inline">
                        <label for="">Gender : </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label for="male">
                            <input type="radio" class="form-check-input" name="gender" value="Male" id="male">Male
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <label for="femail">
                            <input type="radio" class="form-check-input" name="gender" value="Female" id="female">Female
                        </label>
                    </div>

                        <?php if(isset($errGender)){ ?>
                        <span class="fw-bold" style="font-weight: bold; -webkit-text-stroke: 0.5px red;">
                            <i class="bi bi-exclamation-circle position-absolute end-0 top-50 translate-middle-y text-denger fw-bold pe-2 small" ></i>
                        </span>
                        <?php } ?>
                  </div>
                  <div class="text-danger mb-3 small"><?=  $errGender ?? null;?></div>


                  <!-- CheckBox Area -->
                   <div class="mb-1 <?= isset($errHobbies) ? 'border border-danger' : null?> rounded position-relative" >
                    <div class="form-check form-check-inline">
                        <label for="">Hobbies :</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label for="reading">
                            <input type="checkbox" class="form-check-input" name="hobbies[]" value="Rading" id="Reading" > Reading
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label for="Writing">
                            <input type="checkbox" class="form-check-input" name="hobbies[]" value="Writing">Writing
                        </label>
                    </div>
                    <!-- Coading -->
                    <div class="form-check form-check-inline">
                        <label for="Writing">
                            <input type="checkbox" class="form-check-input" name="hobbies[]" value="Writing">Coading
                        </label>
                    </div>
                    <!-- icon -->
                    <?php if(isset($errHobbies)){ ?>
                        <span class="fw-bold" style="font-weight: bold; -webkit-text-stroke: 0.5px red;">
                            <i class="bi bi-exclamation-circle position-absolute end-0 top-50 translate-middle-y text-denger fw-bold pe-2 small" ></i>
                        </span>
                        <?php } ?>
                        
                   </div>
                   <div class="text-danger mb-3 small"><?= $errHobbies ?? null?></div>
                   <!-- Country Area -->
                    <div class="mb-3 ">
                        <select name="country" class="form-select  <?= isset($errcities) ? 'is-invalid' : null?>" id="">
                            <option value="<?= $errcities ?? null?>">Select Country</option>
                            <?php foreach($cities as $ct){?>
                                <option value="<?= $ct ?>"><?= $ct?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="text-danger mb-3 small"><?= $errcities ?? null?></div>

                    
                    <!-- Submit Form -->
                     <div class="mb-3">
                        <input type="submit" name="reg123" value="Sign-up" class="btn btn-primary">
                     </div>
            </form>
        </div>
    </div>
    </div>
    
</body>
</html>