<?php

//$fp = fopen('output.txt', 'w');


// create a new cURL resource
$curl = curl_init();

// set URL and other appropriate options
$ean = "4104420038165";
curl_setopt($curl, CURLOPT_URL, "https://www.gtinsuche.de/result?article=" . $ean);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36');
curl_setopt($curl, CURLOPT_FILE, $fp);
curl_setopt($curl, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
//$data = curl_exec($curl);

// close cURL resource, and free up system resources
curl_close($curl);


$file_data = file('output.txt');

$product = preg_grep('~^<span.*<br>~', $file_data);
foreach($product as $line){
    $line = preg_replace('~<[^<]*>~', '', $line);
    echo $line;
}
echo "done";
