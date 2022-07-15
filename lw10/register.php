<?php
header("Content-type: text/plain");

if (empty($_POST['subscribe']))
{
    echo "Согласитесь с пользовательским соглашением";
    die();
}

if (empty($_POST['subscribe']))
{
	echo "Почта не указана";
	die();
}

if (empty($_POST['subscribe']))
{
	echo "Имя не указано";
	die();
}

if (empty($_POST['activity']))
{
	echo "Деятельность не выбрана";
	die();
}

if (isset($_POST["email"]))
{
    $fileName = "data/" . strtolower($_POST["email"]) . ".txt";
    $file = fopen($fileName, "w+");
    $answer = "Email: " . $_POST["email"] . PHP_EOL;
    fwrite($file, $answer);
    $answer = "Name: " . $_POST["name"] . PHP_EOL;
    fwrite($file, $answer);
    $activity = $_POST["activity"];
    switch ($activity) {
        case "programmer":
            fwrite($file, "Activity: programmer" . PHP_EOL);
            break;
        case "designer":
            fwrite($file, "Activity: designer" . PHP_EOL);
            break;
        case "marketer":
            fwrite($file, "Activity: marketer" . PHP_EOL);
            break;
    }
    $file = fopen($fileName, "r+");
    if ($file)
        while (($buffer = fgets($file, 4096)) !== false)
            echo($buffer);
    else
        echo("Такого файла не существует!");
        
    fclose($file);
}
else
{
    echo "Такого файла не существует!";
}