<!DOCTYPE html>
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
        $firstNumberErr = $secondNumberErr = $thirdNumberErr = $fourthNumberErr = $fifthNumberErr = $dateErr = "";
        $firstNumber = $secondNumber = $thirdNumber = $fourthNumber = $fifthNumber = "";
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["firstnumber"])) {
                $firstNumberErr = "First namber is required";
            } else {
                $firstNumber = test_input($_POST["firstnumber"]);
                // check if only contains numbers
                if (!preg_match("/[^0-9 ]*$/", $firstNumber)) {
                    $firstNumberErr = "Only numbers allowed";
                    $firstNumber = "";
                }
            }
            if (empty($_POST["secondnumber"])) {
                $secondNumberErr = "Second Number is required";
            } else {
                $secondNumber = test_input($_POST["secondnumber"]);
                // check if only contains numbers
                if (!preg_match("/[^0-9 ]*$/", $secondNumber)) {
                    $secondNumberErr = "Only numbers allowed";
                    $secondNumber = "";
                }
            }
            if (empty($_POST["thirdnumber"])) {
                $thirdNumberErr = "Third Number is required";
            } else {
                $thirdNumber = test_input($_POST["thirdnumber"]);
                // check if only contains numbers
                if (!preg_match("/[^0-9 ]*$/", $thirdNumber)) {
                    $thirdNumberErr = "Only numbers allowed";
                    $thirdNumber = "";
                }
            }
            if (empty($_POST["fourthnumber"])) {
                $fourthNumberErr = "Fourth Number is required";
            } else {
                $fourthNumber = test_input($_POST["fourthnumber"]);
                // check if only contains numbers
                if (!preg_match("/[^0-9 ]*$/", $fourthNumber)) {
                    $fourthNumberErr = "Only numbers allowed";
                    $fourthNumber = "";
                }
            }
            if (empty($_POST["fifthnumber"])) {
                $fifthNumberErr = "Fifth Number is required";
            } else {
                $fifthNumber = test_input($_POST["fifthnumber"]);
                // check if only contains numbers
                if (!preg_match("/[^0-9 ]*$/", $fifthNumber)) {
                    $fifthNumberErr = "Only numbers allowed";
                    $fifthNumber = "";
                }
            }
    
            if ($firstNumber != "" && $secondNumber != "" &&  $thirdNumber != "" && $fourthNumber != "" && $fifthNumber != "") {
                $file = fopen("numbers.txt", "a");
                fwrite($file, "First Number: " . $firstNumber);
                fwrite($file, "\nSecond Number: " . $secondNumber);
                fwrite($file, "\nThird Number: " . $thirdNumber);
                fwrite($file, "\nFourth Number: " . $fourthNumber);
                fwrite($file, "\nFifth Number: " . $fifthNumber);
                fwrite($file, "\n---------------------------------------\n");
                fclose($file);
                echo "<script type='text/javascript'>alert('Data stored in text file successfully.');</script>";
                // $file1 = fopen("numbers/txt", "w");
                // echo fwrite($file1);
                // fclose($file1);
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
            
            <?php $filed = "numbers.txt";
            $rez = file_get_contents($filed);
            $rez .= "\r\nИ еще одна новая строка";
            file_put_contents($filed, $rez);
            ?>

            <input type="submit" name="submit" value="Submit">
            
    </form>
    </body>
</html>