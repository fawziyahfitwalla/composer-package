<?php
require 'vendor/autoload.php';
include 'src/searchEngine.php';


$client = new searchEngine(); 
try
{
$client->setEngine("google.com"); 
$results = $client->search(['ielts']); 
echo '<pre>';
print_r($results);
echo '</pre>';
} catch (Exception $e)
{
	echo 'Caught Exception: "'.$e->getMessage(). '"';
}




?>