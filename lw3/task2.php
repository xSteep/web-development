<?php
$identifier = isset($_GET['identifier']) ? $_GET['identifier'] : null;
if ($identifier !== null)
{
    if (ctype_alpha($identifier[0]))
    {
        if (ctype_alnum($identifier))
        {
            echo "yes";
        }
        else
        {
            echo "no\ncontent special chars";
        }
    }
    else
    {
        echo "no\nstarts with digit";
    }
}