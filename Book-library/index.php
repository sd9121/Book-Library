<?php
//$isbn='9781451648546';
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require 'vendor/autoload.php';
use AntoineAugusti\Books\Fetcher;
use GuzzleHttp\Client;
use AntoineAugusti\Books\Book;
//parse_str(implode('&', array_slice($argv, 0)), $_GET);
if (isset($argv[1])) {
  $ISBN=($argv[1]);
  try{
    $client = new Client(['base_uri' => 'https://www.googleapis.com/books/v1/']);
    $fetcher = new Fetcher($client);
    $bookResult=$fetcher->forISBN($ISBN);
    echo json_encode($bookResult)."\n";
  }catch(Exception $e){
    echo "Zero Results Found"."\n";
  }
}else{
  echo "\n"."Argument is Missing"."\n";
}
?>
