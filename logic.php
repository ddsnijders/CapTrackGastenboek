<?php
declare(strict_types = 1);
include_once("classes.php");

class PageManager{

    private IDGenerator $idgenerator;
    private Guestbook $guestbook;
    private GuestbookDisplayer $guestbookdisplayer;
    private GuestbookSubmitter $guestbooksubmitter;
    private array $messageids;

    public function __construct(){
        $this->idgenerator = new IDGenerator();
        $this->guestbook = new Guestbook();
        $this->guestbookdisplayer = new GuestbookDisplayer();
        $this->guestbooksubmitter = new GuestbookSubmitter();
        $messageids = $this->getAllIDs();
    }

    public function displayMessages(){
        $this->guestbookdisplayer->displayMessages($this->guestbook);
    }

    public function onSubmitPress(){
        $message = $this->guestbooksubmitter->getMessageFromPage();
        $this->guestbook->addMessage($message);
    }

    private function getAllIDs(){
        $messages = $this->guestbook->getMessages();
        $messageids = array();
        foreach ($messages as $message){
            array_push($messages, $message->getID());
        }
        return $messageids;
    }

}

?>