<style>
@page { margin: 0px; }
body { margin: 0px; }
</style>

<?php
    $i=0;
    $csv = array();
    $file = fopen('Success- Form 1A.csv', 'r');

    while (($result = fgetcsv($file)) !== false)
    {
        $i++;
        $csv[] = $result;
        $title[] = $csv[0][$i];
    }

    fclose($file);

    echo '<pre>';
    print_r($title);
    echo '</pre>';
?>