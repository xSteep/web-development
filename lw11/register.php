<?php
function getParameter(string $name): ?string
{
    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, true);
    return $input[$name] ?? null;
}
$email = getParameter('email');
$name = getParameter('name');
$agreement = getParameter('agreement');
$activity = getParameter('activity');
if ($email)
{
    if(is_dir('data'))
    {
        mkdir('data');
    }
    $path = './data/' . strtolower($email) . '.txt';
    $myFile = fopen($path, "w");
    $somecontent = "Name:" . $name . PHP_EOL . "Email:" . $email . PHP_EOL . "Activity:" . $activity . PHP_EOL . "Agreement:" . $agreement . PHP_EOL;
    fwrite($myFile, $somecontent);
    fclose($myFile);
}
else
{
    echo "Don't got email!";
}