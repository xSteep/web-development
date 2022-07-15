<?php
header("Content-Type: text/plain");

function getQueryStringParameter(string $name): ?string
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
}

$firstName = getQueryStringParameter('first_name');
$lastName = getQueryStringParameter('last_name');
$age = getQueryStringParameter('age');
$email = getQueryStringParameter('email');
if ($email)
{
    $path = "./data/" . strtolower($email) . ".txt";
    if (file_exists($path))
    {
        $myFile = fopen($path, "r");
        getSubstringInFile(file($path));
        fclose($myFile);  
    }
    $myFile = fopen($path, "w");
    $somecontent = "First Name:" . $firstName . "\nLast Name:" . $lastName . "\nEmail:" . $email . "\nAge:" . $age;
    fwrite($myFile, $somecontent);
    fclose($myFile);
}
else
{
    echo 'have not email!'; 
}

function getSubstringInFile(array $arrayStrings): ?string
{ 
    global $firstName, $lastName, $age;
    $firstName = $firstName ?? trim(substr($arrayStrings[0], strpos($arrayStrings[0], ':') + 1));
    $lastName = $lastName ?? trim(substr($arrayStrings[1], strpos($arrayStrings[1], ':') + 1));
    $age = $age ?? trim(substr($arrayStrings[3], strpos($arrayStrings[3], ':') + 1)); 
    return '1';
}