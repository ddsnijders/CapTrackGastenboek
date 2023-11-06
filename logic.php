<?php
declare(strict_types = 1);
include_once("classes.php");

class PageManager{

    private Guestbook $guestbook;
    private GuestbookDisplayer $guestbookdisplayer;
    private GuestbookSubmitter $guestbooksubmitter;
    private array $messages;

    public function __construct(){
        $this->messages = [
            new Message("hello world!", "greeting", 1),
            new Message("goodbye world!", "goodbye", 2),
            new Message("Djowie", "Dit is een bericht om te kijken wat er gebeurt met langere berichten.", 3),
            new Message("Brian", "Dit is een testbericht om te kijken wat er gebeurt met nog veel langere berichten. Berichten mogen niet overflowen.", 4)
        ];
        $this->guestbook = new Guestbook();
        $this->guestbookdisplayer = new GuestbookDisplayer();
        $this->guestbooksubmitter = new GuestbookSubmitter();
        $this->loadMessages();
    }

    private function loadMessages(){
        $this->guestbook->addMessages($this->messages);
        //$this->guestbookdisplayer->displayMessages();
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