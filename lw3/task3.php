<?php
function getQueryStringParameter(string $name): ?string
{
    return isset($_GET[$name]) ? $_GET[$name] : null;
}

$password = getQueryStringParameter('password'); 

if (($password !== null) and (ctype_alnum($password)))
{
    $lenPasword = strlen($password);
    $arrString = str_split($password);
    $arrCountValuesString = array_count_values($arrString);
    $count = 0;
    $countNumber = 0;
    $countUpperCase = 0;
    $countLowerCase = 0;
    $countRepeat = 0;

    while ($count < $lenPasword)
    {
        if (is_numeric($arrString[$count]))
        {
            $countNumber = $countNumber + 1;
        }
        if (ctype_upper($arrString[$count]))
        {
            $countUpperCase = $countUpperCase + 1;
        }
        if (ctype_lower($arrString[$count]))
        {
            $countLowerCase = $countLowerCase + 1;
        }
        $count = $count + 1;
    }  

    $countValues = array_shift($arrCountValuesString);
    while ($countValues !== null)
    {
        if ($countValues > 1)
        {
            $countRepeat = $countRepeat + $countValues; 
        }
        $countValues = array_shift($arrCountValuesString);  
    }

    if ($countUpperCase === 0)
    {
        $countUpperCase = $lenPasword;
    }
    if ($countLowerCase === 0)
    {
        $countLowerCase = $lenPasword;
    }

    $strength = 0;
    $strength = 4 * $lenPasword + 4 * $countNumber + ($lenPasword - $countUpperCase) * 2 + ($lenPasword - $countLowerCase) * 2 - $countRepeat;
    if ((ctype_alpha($password)) or (ctype_digit($password)))
    {
        $strength = $strength - $lenPasword;
    } 
    
    echo $strength; 
}
else
{
    echo 'The password was entered incorrectly';  
}