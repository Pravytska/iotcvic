<!DOCTYPE HTML>
<html>

<head>
    <style>
        body {
            background-image: url("https://images.freeimages.com/images/large-previews/a3b/website-rays-background-pattern-1637863.png");
            font-family: 'Raleway', sans-serif;
        }

        .label {
            display: inline-block;
            width: 100px;
            font-size: 16px;
        }

        .error {
            color: #FF0000;
        }

        input[type=text],
        input[type=date],
        textarea {
            padding: 5px;
            border: 2px solid #ccc;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }

        input[type=text]:focus,
        input[type=date]:focus,
        textarea:focus {
            border-color: #333;
        }

        input[type=submit] {
            width: 400px;
            height: 50px;
            padding: 5px 15px;
            background: #ccc;
            border: 0 none;
            cursor: pointer;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <?php
    // define variables and set to empty values
    $firstNameErr = $lastNameErr = $emailErr = $genderErr = $dateErr = "";
    $firstName = $lastName = $email = $gender = $comment = $date = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["firstname"])) {
            $firstNameErr = "First name is required";
        } else {
            $firstName = test_input($_POST["firstname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z' ]*$/", $firstName)) {
                $firstNameErr = "Only letters and white space allowed";
                $firstName = "";
            }
        }
        if (empty($_POST["lastname"])) {
            $lastNameErr = "Last name is required";
        } else {
            $lastName = test_input($_POST["lastname"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z' ]*$/", $lastName)) {
                $lastNameErr = "Only letters and white space allowed";
                $lastName = "";
            }
        }

        if (empty($_POST["date"])) {
            $dateErr = "Date is required";
        } else {
            $date = test_input($_POST["date"]);
            // check if date only contains date
            /*if (!preg_match("/^['d.m.Y' ]*$/", $date)) {
                $date = "Only date allowed";
            }*/
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $email = "";
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

        if ($firstName != "" && $lastName != "" &&  $date != "" && $email != "" && $gender != "") {
            $file = fopen("datebase.txt", "a");
            fwrite($file, "First name: " . $firstName);
            fwrite($file, "\nLast name: " . $lastName);
            fwrite($file, "\nGender: " . $gender);
            fwrite($file, "\nBirthday: " . $date);
            fwrite($file, "\nEmail: " . $email);
            fwrite($file, "\nComment: " . $comment);
            fwrite($file, "\n---------------------------------------\n");
            fclose($file);
            echo "<script type='text/javascript'>alert('Data stored in text file successfully.');</script>";
            $firstName = $lastName = $email = $gender = $comment = $date = false;

            // write to mysql
            /*
            // servername => localhost
            // username => root
            // password => empty
            // database name => formdata
            $conn = mysqli_connect("localhost", "root", "", "formdata");

            // Check connection
            if ($conn === false) {
                die("ERROR: Could not connect. "
                    . mysqli_connect_error());
            }

            // Performing insert query execution
            // here our table name is person
            $sql = "INSERT INTO person(first_name, last_name, email_address, comment, gender, birthdate) VALUES ('$firstName', '$lastName','$email','$comment','$gender','$date')";

            if (mysqli_query($conn, $sql)) {
                echo "<script type='text/javascript'>alert('Data stored in a database successfully.');</script>";
            } else {
                echo "ERROR: Sorry $sql. "
                    . mysqli_error($conn);
            }
            // Close connection
            mysqli_close($conn);
            $firstName = $lastName = $email = $gender = $comment = $date = false;
            */
        }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>PHP Form Validation Example</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <span class="label">First name: </span><input type="text" name="firstname" value="<?php echo $firstName; ?>">
        <span class="error">* <?php echo $firstNameErr; ?></span>
        <br><br>
        <span class="label">Last name: </span><input type="text" name="lastname" value="<?php echo $lastName; ?>">
        <span class="error">* <?php echo $lastNameErr; ?></span>
        <br><br>
        <span class="label">Date of birth: </span><input type="date" name="date" value="<?php echo $date; ?>">
        <span class="error">* <?php echo $dateErr; ?></span>
        <br><br>
        <span class="label">E-mail: </span><input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        <span class="label">Comment: </span><textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
        <br><br>
        <span class="label">Gender: </span>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>

        <input type="checkbox" name="conditions" value="agree" id="feedback-conditions" required><label>I agree with terms andconditions</label>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>


</body>

</html>
