<?php
    $filepath=$_GET['filepath'];
    $result_array=array();
    array_push($result_array,$filepath);
    $mf=fopen($filepath.".csv","r") or die("die");
    while(($data=fgetcsv($mf,1000,","))!==FALSE){
        array_push($result_array,$data);
    }
    fclose($mf);    
    echo json_encode($result_array);
?>