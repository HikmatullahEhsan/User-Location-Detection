<?php 


function secret($one){
	$i=null;
	$prod= 1;
    
    for($i=1; $i<=3; $i++)
    {
    	$prod=$prod*$one;
    }

    return $prod;

} 

echo 2*secret(6);


?>