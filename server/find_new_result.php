<?php
    $row = exec('ls ./outputs',$output,$error);
    $result_array=array();
    while(list(,$row) = each($output)){
       //echo $row, "<BR>\n";
        array_push($result_array,$row);
    }
    if($error){
        echo "Error : $error<BR>\n";
        exit;
    }
    echo json_encode($result_array);
?>