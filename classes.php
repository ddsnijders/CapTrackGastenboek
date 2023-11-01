<?php

class Guestbook{

    protected array $messages = array();

    function __construct(){

    }

    public function getMessages():array{
        return $this->messages;
    }

    public function addMessages(array $messages){
        foreach($messages as $message){
            array_push($messages, $this->messages);
        }
    }

    public function findMessage(int $messageID){
        foreach($this->messages as $key=>$message){
            if ($message->getID() === $messageID){
                return $key;
            }
        }
    }

    public function deleteMessage(int $messageID){
        $deletedmessageindex = $this->findMessage($messageID);
        unset($this->messages[$deletedmessageindex]);
    }
}

class Message{

    protected string $name;
    protected string $text;
    protected int $id;

    function __construct(string $name, string $text, int $id){

        $this->name = $name;
        $this->text = $text;
        $this->id = $id;

    }

    public function getName():string{
        return $this->name;
    }

    public function getText():string{
        return $this->text;
    }

    public function getID():int{
        return $this->id;
    }

}

class GuestbookDisplayer{

    protected Guestbook $guestbook;

    public function __construct(Guestbook $guestbook){
        $this->guestbook = $guestbook;
    }

    protected function convertToHTML(Message $message):string{
        $htmlcode = 
        "
        <div>
            <h3>
        "
        .
        $message->getName()
        . 
        "   </h3>
            <p>
        "
        .
        $message->getText()
        . 
        "   </p>
        </div>
        "
        ;
        return $htmlcode;
    }

    public function displayMessages(){
        echo "TEST";
        echo implode(",", $this->guestbook->getMessages());
        foreach($this->guestbook->getMessages() as $message){
            echo $this->convertToHTML($message);
        }
    }
}