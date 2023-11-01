<?php
include_once("classes.php");
global $guestbook;
$guestbook = new Guestbook();
global $guestbookdisplayer;
$guestbookdisplayer = new GuestbookDisplayer($guestbook);
global $guestbooksubmitter;
$guestbooksubmitter = new GuestbookSubmitter();

$messageArray = array();
array_push($messageArray, new Message("hello world!", "greeting", 1));
array_push($messageArray, new Message("goodbye world!", "goodbye", 2));
$guestbook->addMessages($messageArray);

$guestbookdisplayer->displayMessages();

function onSubmitPress(){
    global $guestbook; //Invite global explicitly
    $submitter = new GuestbookSubmitter();
    $message = $submitter->getMessageFromPage();
    $guestbook->addMessage($message);
    echo "Pressed - message added: " . strval($message);
}

?>