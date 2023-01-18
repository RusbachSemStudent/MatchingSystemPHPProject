<?php

include 'databaseconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requiredFormFields = ["company", "email", "region", "industry", "jobPosition", "startSalary", "endSalary"];
    foreach ($requiredFormFields as $field) {
        if (empty($_POST[$field])) {
            echo "Field $field is not filled in!";
            return;
        } else if ($field == "startSalary" && !ctype_digit($_POST[$field])) {
            echo "Field $field is not filled in properly!";
            return;
        } else if ($field == "endSalary" && !ctype_digit($_POST[$field])) {
            echo "Field $field is not filled in properly!";
            return;
        }
    }
    $sql =  "INSERT INTO vacancies (company, email, region, industry, jobPosition, startSalary, endSalary) VALUES ('" . $_POST['company'] . "', '" . $_POST['email'] . "', '" . $_POST['region'] . "', '" . $_POST['industry'] . "', '" . $_POST['jobPosition'] . "', '" . $_POST['startSalary'] . "', " . $_POST['endSalary'] . ")";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}