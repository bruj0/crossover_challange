<?
echo " Welcome to the Crossover Challenge for Rodrigo\n";
echo " Ctrl+C to exit\n\n";
echo " Please input a number: ";
while(1)
{
    while(1)
    {
        $number=trim(fgets(STDIN));
        if(!is_numeric($number))
        {
            echo " Error: Not a number\n";
            echo " Please input a number: ";
        }
        else
            break;
    }
    
    if($number>1000000000000)
        $ret=round(($number/1000000000000),1).'T';
    else if($number>1000000000)
        $ret= round(($number/1000000000),1).'B';
    else
        if($number>1000000)
            $ret= round(($number/1000000),1).'M';
        else if($number>1000)
                $ret=round(($number/1000),1).'Th';
                    else $ret=$number;
    
    echo " The output is: $ret\n\n";
    echo " Please input a number: ";
}
?>
