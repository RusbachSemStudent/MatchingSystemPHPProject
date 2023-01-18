<?php

include 'databaseconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requiredFormFields = ["firstName", "lastName", "email", "region", "industry", "jobPosition", "desiredSalary"];
    foreach ($requiredFormFields as $field) {
        if (empty($_POST[$field])) {
            echo "Field $field is not filled in!";
            return;
        } else if ($field == "desiredSalary" && !ctype_digit($_POST[$field])) {
            echo "Field $field is not filled in properly!";
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