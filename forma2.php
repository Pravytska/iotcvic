<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$firstNameErr = $lastNameErr = $emailErr = $genderErr = "";
$firstName = $lastName = $email = $gender = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstNameErr = "First name is required";
  } else {
    $firstName = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) {
      $fitstNameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["lastname"])) {
    $lastNameErr = "Last name is required";
  } else {
    $lastName = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
      $lastNameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if(isset($_POST['sub'])) {
    $Year = $_POST['Year'];
    $Month = $_POST['Month'];
    $Date = $_POST['Date'];
    if ($Year != '' && $Month != '' && $Date != '') {
      $date = $Year.'-'.$Month.'-'.$Date;
      $sql="INSERT INTO dob VALUES  (Null,'$date')";
      if (mysqli_query($conn,$sql)) {
        echo "Record added!";
      } else {
        echo "Error!!!";
      }
    } else {
      echo "Please Select Day, Month and Year!!!";
    }   
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First name: <input type="text" name="firstname" value="<?php echo $firstName;?>">
  <span class="error">* <?php echo $firstNameErr;?></span>
  <br><br>
  Last name: <input type="text" name="lastname" value="<?php echo $lastName;?>">
  <span class="error">* <?php echo $lastNameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Date of birth:
  <select name="Date">
  <option value="">Select date</option>
  <?php for ($i = 1; $i <= 31; $i++) : ?>
  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
  <?php endfor; ?>
  </select>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $firstName;
echo "<br>";
echo $lastName;
echo "<br>";
echo $email;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
echo "<br>";
echo $date;
?>

</body>
</html>