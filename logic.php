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
array_push($messageArray, new Message("Djowie", "Dit is een testbericht om te kijken wat er gebeurt met langere berichten.", 3));
array_push($messageArray, new Message("Brian", "Dit is een testbericht om te kijken wat er gebeurt met nog veel langere berichten. Berichten mogen niet overflowen.", 4));
$guestbook->addMessages($messageArray);

$guestbookdisplayer->displayMessages();

function onSubmitPress(){
    global $guestbook; //Invite global explicitly
    $submitter = new GuestbookSubmitter();
    $message = $submitter->getMessageFromPage();
    $guestbook->addMessage($message);
}

?>