<?php
header("Content-Type: text/plain");
$identifier = $_GET['identifier'];
if (is_string($identifier) && $identifier !== '')
{
    if (ctype_alpha(substr($identifier, 0, 1)))
    {
        if (ctype_alnum($identifier))
        {
            echo "yes";
        }
        else
        {
            echo "no\nспециальные символы";
        }
    }
    else
    {
        echo "no\nначинается с цифры";
    }
}
?>