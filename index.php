<?php 
declare(strict_types = 1);
include("classes.php");

$guestbook = new Guestbook();
$guestbookdisplayer = new GuestbookDisplayer($guestbook);
$messageArray = array();
array_push($messageArray, new Message("hello world!", "greeting", 1));
array_push($messageArray, new Message("goodbye world!", "goodbye", 2));
$guestbook->addMessages($messageArray);

$guestbookdisplayer->displayMessages();

?>

