<?php
declare(strict_types = 1);

class Guestbook{

    protected array $messages = array();

    function __construct(){

    }

    public function getMessages():array{
        return $this->messages;
    }
    
    public function addMessage(Message $message){
        array_push($this->messages, $message);
    }

    //"Override" voor meerdere messages - bijvoorbeeld als ze uit de textfile komen
    public function addMessages(array $messages){
        foreach($messages as $message){
            array_push($this->messages, $message);
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


/*interface IMessage { 
    public function getID(): string {}
}*/

class Message{

    protected string $name;
    protected string $text;
    protected int $id;

    function __construct(string $name, string $text, int $id){

        $this->name = $name;
        $this->text = $text;
        $this->id = $id;

    }

    function __toString(){
        return $this->text;
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
        foreach($this->guestbook->getMessages() as $message){
            echo $this->convertToHTML($message);
        }
    }
}

class GuestbookSubmitter{

    public function __construct(){

    }
    
    private function validateText(string $text){
        return $text;
    }

    private function validateName(string $name){
        return $name;
    }
    
    private function convertInputToMessage(string $name, string $text): Message{
        try{
            return new Message($name, $text, 1);
        }
        catch (Exception $exception){
            return null;
        }
    }

    public function getMessageFromPage(): Message{
        $name = $this->validateName($_POST['name']); $text = $this->validateText($_POST['text']);
        return $this->convertInputToMessage($name, $text);
    }
}