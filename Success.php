<style>
@page { margin: 0px; }
body { margin: 0px; }
</style>

<?php
    $i=0;
    $csv = array();
    $file = fopen('2022/Success- Form 1A.csv', 'r');
    $t=0;
    $row = 0;
    $p= 0;

    while (($result = fgetcsv($file)) !== false)
    $csv[] = $result;
    for ($t=0;$t<87;$t++){
        
        $title[] = $csv[0][$t];
    }

    fclose($file);

    echo '<pre>';
    print_r($title);
    echo '</pre>';
?>