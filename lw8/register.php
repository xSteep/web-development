<?php
header("Content-type: text/plain");

function getPostParameter(string $name): ?string
{
    return isset($_POST[$name]) ? $_POST[$name] : null;
}

$email = getPostParameter('email');
$name = getPostParameter('name');
$subscribe = getPostParameter('subscribe');
$activity = getPostParameter('activity');


$hasErrors = false;
if (empty($subscribe))
{
    echo "Согласитесь с пользовательским соглашением\n";
    $hasErrors = true;
}

if (empty($email))
{
	echo "Почта не указана\n";
	$hasErrors = true;
}

if (empty($name))
{
	echo "Имя не указано\n";
	$hasErrors = true;
}

if (empty($activity))
{
	echo "Деятельность не выбрана\n";
	$hasErrors = true;
}

if ($hasErrors)
{
    die();
}

if (isset($email))
{
    $fileName = "data/" . strtolower($email) . ".txt";

    $file = fopen($fileName, "w+");
    fwrite($file, "Name: $name" . PHP_EOL);
    fwrite($file, "Email: $email" . PHP_EOL);
    fwrite($file, "Activity: $activity" . PHP_EOL);
    fclose($file);
    
}
else
{
    echo "Такого файла не существует!";
}