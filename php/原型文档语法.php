
    <?php
    $var =23;
    $that = 'test';
    echo <<<EOD
    someVar $var
    Thisvar $that
    EOD;
    $string =<<<EOT
    string with $var \n
    EOT;
    echo $string;
    ?>



