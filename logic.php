<?php
declare(strict_types = 1);
include_once("classes.php");

class PageManager{

    private Guestbook $guestbook;
    private GuestbookDisplayer $guestbookdisplayer;
    private GuestbookSubmitter $guestbooksubmitter;
    private array $messages;

    public function __construct(){
        $this->guestbook = new Guestbook();
        $this->guestbookdisplayer = new GuestbookDisplayer();
        $this->guestbooksubmitter = new GuestbookSubmitter();
    }

    public function displayMessages(){
        $this->guestbookdisplayer->displayMessages($this->guestbook);
    }

    public function onSubmitPress(){
        $message = $this->guestbooksubmitter->getMessageFromPage();
        $this->guestbook->addMessage($message);
    }

}

?>