<?php
//$isbn='9781451648546';
ini_set('display_errors', 'On');
error_reporting(E_ALL);
require 'vendor/autoload.php';
use AntoineAugusti\Books\Fetcher;
use GuzzleHttp\Client;
use AntoineAugusti\Books\Book;
parse_str(implode('&', array_slice($argv, 0)), $_GET);
$isbn;
if(isset($_GET['isbn']))
{
  $isbn= $_GET['isbn'] ;
  $client = new Client(['base_uri' => "https://www.googleapis.com/books/v1/volumes?q=isbn:"]);
  $fetcher = new Fetcher($client);
  $book = $fetcher->forISBN($isbn);
  echo 'ISBN :- '.$isbn. "\xA";
  echo "Tiltle :- ".$book->title. "\xA";
  echo "Authors :- ".$book->authors[0]. "\xA";
  echo "PageCount :- ".$book->pageCount. "\xA";
  echo "Publisher :- ".$book->publisher. "\xA";
  echo "Rating :- ".$book->averageRating. "\xA";
  echo "Language :- ".$book->language. "\xA";
  echo "Categories :- ".$book->categories[0]. "\xA";
  $date=$book->publishedDate;
  echo "PublishedDate :- ".date_format($date, 'Y-m-d H:i:s'). "\xA";
}
else if(isset($argv[1]))
{
 $client = new Client(['base_uri' => "https://www.googleapis.com/books/v1/volumes?q=isbn:"]);
 $fetcher = new Fetcher($client);
 $book = $fetcher->forISBN($argv[1]);
 echo 'ISBN :- '.$argv[1]. "\xA";
 echo "Tiltle :- ".$book->title. "\xA";
 echo "Authors :- ".$book->authors[0]. "\xA";
 echo "PageCount :- ".$book->pageCount. "\xA";
 echo "Publisher :- ".$book->publisher. "\xA";
 echo "Rating :- ".$book->averageRating. "\xA";
 echo "Language :- ".$book->language. "\xA";
 echo "Categories :- ".$book->categories[0]. "\xA";
 $date=$book->publishedDate;
 echo "PublishedDate :- ".date_format($date, 'Y-m-d H:i:s'). "\xA";
}
else
{
  echo "Enter ISBN number !". "\xA\xA";
  echo "List of ISBN Number :- ". "\xA";
  echo "------------------------"."\xA";
  echo "9783940862211". "\xA";
  echo "9781451648546". "\xA";
  echo "9780521467131". "\xA";
  echo "9783540332398". "\xA";
}
?>
