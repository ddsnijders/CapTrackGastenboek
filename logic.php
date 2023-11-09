<?php
declare(strict_types = 1);
include_once("classes.php");

class PageManager{

    private IDGenerator $idgenerator;
    private Guestbook $guestbook;
    private GuestbookDisplayer $guestbookdisplayer;
    private GuestbookSubmitter $guestbooksubmitter;
    private array $messageids;
    private array $submitids;

    public function __construct(){
        $this->idgenerator = new IDGenerator();
        $this->guestbook = new Guestbook();
        $this->guestbookdisplayer = new GuestbookDisplayer();
        $this->guestbooksubmitter = new GuestbookSubmitter();
        $this->messageids = $this->getAllIDs();
        $this->submitids = $this->getPostIDs();
    }

    public function displayMessages(){
        $this->guestbookdisplayer->displayMessages($this->guestbook);
    }

    public function onSubmitPress(){
        $message = $this->guestbooksubmitter->getMessageFromPage();
        $this->guestbook->addMessage($message);
    }

    public function getMessageIDs(){
        return $this->messageids;
    }

    public function getSubmitIDs(){
        return $this->submitids;
    }

    public function deleteMessage(string $id){
        $this->guestbook->deleteMessage(str_replace("_", ".", $id));
    }

    private function getAllIDs(){
        $messages = $this->guestbook->getMessages();
        $messageids = array();
        foreach ($messages as $message){
            array_push($messageids, $message->getID());
        }
        return $messageids;
    }

    private function getPostIDs(){
        $postids = array();
        foreach($this->messageids as $messageid){
            array_push($postids, "delete" . $messageid);
        }
        return $postids;
    }



    

}

?>