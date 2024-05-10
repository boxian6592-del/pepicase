<?php
// Retrieve the form data
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $data = json_decode(file_get_contents('php://input'));
    $name = $data->name;
    $age = $data->age;
    if ($name == 'lmao' && $age == 'lmao') {
        $responseMessage = "Login successful! Welcome, " . $name . "!";
        }
        // Send the response message
        else $responseMessage = "Login unsuccessful";
        echo $responseMessage;
}
?>