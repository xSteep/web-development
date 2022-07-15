<?php
header("Content-Type: text/plain");
function getQueryStringParameter(string $name): ?string
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
}
$email = getQueryStringParameter('email');
if ($email !== null)
{
    $path = "./data/" . $email . ".txt";
    if (file_exists($path))
    {
        $myFile = fopen($path, "r");
        $firstName = fgets($myFile);
        $lastName = fgets($myFile);
        $email = fgets($myFile);
        $age = fgets($myFile);
        echo $firstName . $lastName . $email . $age;
        fclose($myFile);
    }
    else
    {
        echo "нет файла";
    }
}
else
{
    echo "нет почты";
}