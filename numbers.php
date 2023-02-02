<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
        $firstNumberErr = $secondNumberErr = $thirdNumberErr = $fourthNumberErr = $fifthNumberErr = $dateErr = "";
        $firstNumber = $secondNumber = $thirdNumber = $fourthNumber = $fifthNumber = "";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["firstnumber"])) {
                $firstNumberErr = "First namber is required";
            } else {
                $firstNumber = test_input($_POST["firstnumber"]);
                if (!preg_match("/[^0-9 ]*$/", $firstNumber)) {
                    $firstNumberErr = "Only numbers allowed";
                    $firstNumber = "";
                }
            }
            if (empty($_POST["secondnumber"])) {
                $secondNumberErr = "Second Number is required";
            } else {
                $secondNumber = test_input($_POST["secondnumber"]);
                if (!preg_match("/[^0-9 ]*$/", $secondNumber)) {
                    $secondNumberErr = "Only numbers allowed";
                    $secondNumber = "";
                }
            }
            if (empty($_POST["thirdnumber"])) {
                $thirdNumberErr = "Third Number is required";
            } else {
                $thirdNumber = test_input($_POST["thirdnumber"]);
                if (!preg_match("/[^0-9 ]*$/", $thirdNumber)) {
                    $thirdNumberErr = "Only numbers allowed";
                    $thirdNumber = "";
                }
            }
            if (empty($_POST["fourthnumber"])) {
                $fourthNumberErr = "Fourth Number is required";
            } else {
                $fourthNumber = test_input($_POST["fourthnumber"]);
                if (!preg_match("/[^0-9 ]*$/", $fourthNumber)) {
                    $fourthNumberErr = "Only numbers allowed";
                    $fourthNumber = "";
                }
            }
            if (empty($_POST["fifthnumber"])) {
                $fifthNumberErr = "Fifth Number is required";
            } else {
                $fifthNumber = test_input($_POST["fifthnumber"]);
                if (!preg_match("/[^0-9 ]*$/", $fifthNumber)) {
                    $fifthNumberErr = "Only numbers allowed";
                    $fifthNumber = "";
                }
            }
    
            if ($firstNumber != "" && $secondNumber != "" &&  $thirdNumber != "" && $fourthNumber != "" && $fifthNumber != "") {
                $file = fopen("skuska1.txt", "a");
                fwrite($file, $firstNumber);
                fwrite($file, $secondNumber);
                fwrite($file, $thirdNumber);
                fwrite($file, $fourthNumber);
                fwrite($file, $fifthNumber);
                fclose($file);
                echo "<script type='text/javascript'>alert('Data stored in text file successfully.');</script>";
                $firstNumber = $secondNumber = $thirdNumber = $fourthNumber = $fifthNumber = false;
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

        <h2>Numbers</h2>
        <p><span class="error">* required field</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <span class="label">First Number: </span><input type="number" name="firstnumber" value="<?php echo $firstNumber; ?>">
            <span class="error">* <?php echo $firstNumberErr; ?></span>
            <br><br>
            <span class="label">Second Number: </span><input type="number" name="secondnumber" value="<?php echo $secondNumber; ?>">
            <span class="error">* <?php echo $secondNumberErr; ?></span>
            <br><br>
            <span class="label">Third Number: </span><input type="number" name="thirdnumber" value="<?php echo $thirdNumber; ?>">
            <span class="error">* <?php echo $thirdNumberErr; ?></span>
            <br><br>
            <span class="label">Fourth Number: </span><input type="number" name="fourthnumber" value="<?php echo $fourthNumber; ?>">
            <span class="error">* <?php echo $fourthNumberErr; ?></span>
            <br><br>
            <span class="label">Fifth Number: </span><input type="number" name="fifthnumber" rows="5" value="<?php echo $fifthNumber; ?>">
            <span class="error">* <?php echo $fifthNumberErr; ?></span>
            <br><br>

            <input type="submit" name="submit" value="Submit">
            <br><br>
            <?php $a = file_get_contents("skuska1.txt"); echo $a; ?>
            
    </form>
    </body>
</html>