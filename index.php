<html>
<?php

$servername = "localhost";
$username = "root";
$password = "Admin123!";
$databasename = "opdrachtdatabase";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";

/*$sql = "INSERT INTO registrations (registrationID, firstName, lastName, email, region, industry, jobPosition, desiredSalary) VALUES (1, 'Testnaam', 'Testachternaam', 'test@test.com', 'Europe', 'IT', 'Software Developer', 50000)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/
?>
<p>Registration Form:</p>
<form method="post">
    <label for="firstName">First Name: </label><br>
    <input type="text" name="firstName"><br>
    <label for="lastName">Last Name: </label><br>
    <input type="text" name="lastName"><br>
    <label for="email">E-mail: </label><br>
    <input type="text" name="email"><br>
    <label for="region">Region: </label><br>
    <input type="text" name="region"><br>
    <label for="industry">Industry: </label><br>
    <input type="text" name="industry"><br>
    <label for="jobPosition">Job Position: </label><br>
    <input type="text" name="jobPosition"><br>
    <label for="desiredSalary">Desired Salary: </label><br>
    <input type="text" name="desiredSalary"><br>
    <input type="submit" value="Submit">
</form>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requiredFormFields = ["firstName", "lastName", "email", "region", "industry", "jobPosition", "desiredSalary"];
    foreach ($requiredFormFields as $field) {
        if (empty($_POST[$field])) {
            echo "Field $field is not filled in!";
            return;
        }
    }
    $sql =  "INSERT INTO registrations (firstName, lastName, email, region, industry, jobPosition, desiredSalary) VALUES ('" . $_POST['firstName'] . "', '" . $_POST['lastName'] . "', '" . $_POST['email'] . "', '" . $_POST['region'] . "', '" . $_POST['industry'] . "', '" . $_POST['jobPosition'] . "', " . $_POST['desiredSalary'] . ")";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
