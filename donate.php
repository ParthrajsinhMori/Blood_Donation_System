<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <style>
        li {
            font-size: 28px;
        }

        .error {
            color: brown;
        }

        table {
            font-size: xx-large;
        }
    </style>



    <title>Bank Registration form</title>



</head>


<body bgcolor="#FFCEC4">



    <?php include 'header.php' ?>


    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <?php
    // define variables and set to empty values
    $nameErr = $genderErr =  $cityErr = $dateErr =  $mobileNo1Err = $addressError = $bloodgroupErr = "";
    $name =  $gender = $city =  $date =  $mobileNo1 = $mobileNo2 = $address = $bloodgroup = "";
    $flag = 0;

    if (isset($_POST['submit'])) {
        /*$name=$_POST["name"];
	$email=$_POST["email"];
	$comment=$_POST["comment"];
	$website=$_POST["website"];
	$gender=$_POST["gender"];*/
        if (!empty($_POST["name"]))
            $name = $_POST["name"];

        if (!empty($_POST["gender"]))
            $gender = $_POST["gender"];
        if (!empty($_POST["city"]))
            $city = $_POST["city"];

        if (!empty($_POST["address"]))
            $city = $_POST["address"];


        if (!empty($_POST["mobileNo1"]))
            $mobileNo1 = $_POST["mobileNo1"];

        if (!empty($_POST["mobileNo2"]))
            $mobileNo2 = $_POST["mobileNo2"];
    }


    if (empty($_POST["name"])  || empty($_POST["gender"]) || empty($city)  ||  empty($_POST["actype"]) || empty($_POST["mobileNo1"]) || empty($_POST["address"])) {
        $flag = 0;
    }
    $flag = 1;


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $flag = 0;
        } else {
            $name = test_input($_POST["name"]);
        }


        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
            $flag = 0;
        } else {
            $gender = test_input($_POST["gender"]);
        }



        if (empty($_POST["city"]) || $_POST["city"] == "Select One") {
            $cityErr = "city is required";
            $flag = 0;
        } else {
            $city = $_POST["city"];
        }

        if (empty($_POST["bloodgroup"]) || $_POST["bloodgroup"] == "Select One") {
            $cityErr = "bloodgroupis required";
            $flag = 0;
        } else {
            $bloodgroup = $_POST["bloodgroup"];
        }

        if (empty($_POST["date"])) {
            $dateErr = "birth date is reqired";
            $flag = 0;
        } else {
            $date = $_POST["date"];
        }


        if (empty($_POST["mobileNo1"])) {
            $actypeErr = "mobile number is reqired for bank SMS";
            $flag = 0;
        } else {
            $mobileNo1 = test_input($_POST["mobileNo1"]);
        }

        if (!empty($_POST["mobileNo2"])) {
            $mobileNo2 = $_POST["mobileNo2"];
        }

        if (!empty($_POST["address"])) {
            $address = test_input($_POST["address"]);
            $flag = 0;
        } else {
            $addressErr = "Adress is required";
        }
    }

    ?>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blood_donation_system";

    // Create connection
    $conn = new mysqli(
        $servername,
        $username,
        $password,
        $dbname
    );
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_SESSION["email"];
        $sql = "SELECT * from user_info where email='$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $uid = $row["id"];


        $sql = "INSERT INTO user_details (user_id, user_name, user_bg, user_gender, user_address, user_city, user_bd, user_major, user_minor ) VALUES ('$uid','$name','$bloodgroup','$gender','$address','$city',' $date','$mobileNo1','$mobileNo2')";

        $conn->query($sql);
        $conn->close();
        header("location: index.php");
    }

    ?>


    <br>
    <br>
    <br>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table align="center" style="background-color:lightgray; width:1100px; height: 700px;">

            <tr>
                <td colspan="2" style="background-color:aquamarine" align="center">
                    <?php


                    $email = $_SESSION["email"];
                    $sql = "SELECT * from user_info where email='$email'";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $uid = $row["id"];

                    $sql = "SELECT * from user_details where user_id=$uid";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "You have already filled this form. If you want to update your details than you can resubmit it.";
                    }

                    ?>
                </td>



            </tr>

            <tr>
                <td colspan="2" style="background-color:cornflowerblue;" align="center">
                    Registration form for blood donation
                </td>

            </tr>
            <tr>
                <td>
                    Name
                </td>
                <td>
                    <input type="text" name="name" value="<?php echo $name; ?>" style="font-size:28px;">
                    <span class="error">* <?php echo $nameErr; ?></span>
                </td>
            </tr>




            <tr>
                <td>
                    Your blood group
                </td>
                <td>
                    <select name="bloodgroup" style="font-size:28px;">
                        <option value="Select One" <?= $bloodgroup == "Select One" ? "selected" : "";  ?>>Select One</option>
                        <option value="A+" <?= $bloodgroup == "A+" ? "selected" : ""; ?>>A+</option>
                        <option value="A-" <?= $bloodgroup == "A-" ? "selected" : ""; ?>>A-</option>
                        <option value="B+" <?= $bloodgroup == "B+" ? "selected" : ""; ?>>B+</option>
                        <option value="B-" <?= $bloodgroup == "B-" ? "selected" : ""; ?>>B-</option>
                        <option value="AB+" <?= $bloodgroup == "AB+" ? "selected" : ""; ?>>AB+</option>
                        <option value="AB-" <?= $bloodgroup == "AB-" ? "selected" : ""; ?>>AB-</option>
                        <option value="O+" <?= $bloodgroup == "O+" ? "selected" : ""; ?>>O+</option>
                        <option value="O-" <?= $bloodgroup == "O-" ? "selected" : ""; ?>>O-</option>

                    </select>
                    <span class="error">* <?php echo $bloodgroupErr; ?></span>

                </td>
            </tr>


            <tr>
                <td>
                    Gender


                </td>
                <td>
                    <input type="radio" id="male" name="gender" value="male" style="font-size:28px;">
                    <label for="male">Male</label>&nbsp;

                    <input type="radio" id="female" name="gender" value="female" style="font-size:28px;">
                    <label for="female">Female</label>&nbsp;

                    <input type="radio" id="other" name="gender" value="other" style="font-size:28px;">
                    <label for="other">Other</label>

                    <span class="error">*<?php echo $genderErr; ?></span>


                </td>
            </tr>




            <tr>
                <td>
                    Address
                </td>
                <td>
                    <input type="text" name="address" value="<?php echo $address; ?>" style="font-size:28px;">
                    <span class="error">* <?php echo $addressError; ?></span>
                </td>
            </tr>

            <tr>
                <td>
                    City
                </td>

                <td>
                    <select name="city" style="font-size:28px;">
                        <option value="Select One" <?=
                                                    $city == "Select One" ? "selected" : "";
                                                    ?>>Select One</option>
                        <option value="Ahmedabad" <?= $city == "Ahmedabad" ? "selected" : ""; ?>>Ahmedabad</option>
                        <option value="Surat" <?= $city == "Surat" ? "selected" : ""; ?>>Surat</option>
                        <option value="Vadodara (Baroda)" <?= $city == "Vadodara (Baroda)" ? "selected" : ""; ?>>Vadodara (Baroda)</option>
                        <option value="Rajkot" <?= $city == "Rajkot" ? "selected" : ""; ?>>Rajkot</option>
                        <option value="Bhavnagar" <?= $city == "Bhavnagar" ? "selected" : ""; ?>>Bhavnagar</option>
                        <option value="Jamnagar" <?= $city == "Jamnagar" ? "selected" : ""; ?>>Jamnagar</option>
                        <option value="Gandhinagar" <?= $city == "Gandhinagar" ? "selected" : ""; ?>>Gandhinagar</option>
                        <option value="Junagadh" <?= $city == "Junagadh" ? "selected" : ""; ?>>Junagadh</option>
                        <option value="Anand" <?= $city == "Anand" ? "selected" : ""; ?>>Anand</option>
                        <option value="Porbandar" <?= $city == "Porbandar" ? "selected" : ""; ?>>Porbandar</option>
                        <option value="Bhuj" <?= $city == "Bhuj" ? "selected" : ""; ?>>Bhuj</option>
                        <option value="Bharuch" <?= $city == "Bharuch" ? "selected" : ""; ?>>Bharuch</option>
                        <option value="Vapi" <?= $city == "Vapi" ? "selected" : ""; ?>>Vapi</option>
                        <option value="Ankleshwar" <?= $city == "Ankleshwar" ? "selected" : ""; ?>>Ankleshwar</option>
                        <option value="Gandhidham" <?= $city == "Gandhidham" ? "selected" : ""; ?>>Gandhidham</option>

                    </select>
                    <span class="error">* <?php echo $cityErr; ?></span>
                </td>


            </tr>

            <tr>
                <td> Birth date </td>
                <td>
                    <?php
                    $day = date("d");
                    $year = date("Y");
                    $month = date("m");
                    $today_date = "$year-" . "$month-" . "$day";
                    $initial_date = "2023-01-01";
                    $old_year = $year - 130;
                    $min_date = "$old_year-" . "$month-" . "$day";
                    ?>

                    <input type="date" id="date" name="date" min="<?php echo $min_date; ?>" max="<?php echo $today_date; ?>" style="font-size:28px;">
                    <span class="error"> * <?php echo $dateErr; ?></span>

                </td>
            </tr>
            <!-- <tr>
                <td> Upload Blood Report </td>
                <td>

                    <input type="file" name="fileToUpload" id="fileToUpload" style="font-size:28px;">


                </td>
            </tr> -->

            <tr>
                <td> Mobile Number( Major , 10 digits ) </td>
                <td>

                    <input type="tel" id="mobilNo1" name="mobileNo1" value="<?php echo $mobileNo1; ?>" pattern="[0-9]{10}" style="font-size:28px;">
                    <span class="error"> * <?php echo $mobileNo1Err; ?></span>

                </td>
            </tr>


            <tr>
                <td> Mobile Number( Minor ,10 digits) </td>
                <td>

                    <input type="tel" id="mobilNo2" name="mobileNo2" value="<?php echo $mobileNo2; ?>" pattern="[0-9]{10}" style="font-size:28px;">

                </td>
            </tr>


            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Submit" style="font-size:28px;">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <span class="error"> * </span>&nbsp; means required field. you must fill this details.
                </td>
            </tr>


        </table>
    </form>

    <?php
    if ($flag == 0) {

        $nameErr = $emailErr = $genderErr = $websiteErr = $cityErr = $ageErr = "";
        $name = $email = $gender = $comment = $website = $city = $age = "";
        echo "Form successfully submitted...";
        // header("Location: http://localhost:80/success.php"); /* Redirect browser */
        //exit();
    }
    ?>

</body>