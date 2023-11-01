<?php
declare(strict_types = 1);

class Guestbook{

    private array $messages = array();
    //private UserPostMessage $upm = null;

    function __construct(){

    }

    public function getMessages():array{
        return $this->messages;
    }
    
    public function addMessage(Message $message){
        array_push($this->messages, $message);
    }

    //"Override" for multiple messages - useful when adding messages from text file to the guestbook all at once. 
    // Can be removed in favour of addMessage in a loop instead.
    public function addMessages(array $messages){

        //$upm->functionToAddMessage() //Add message to file

        //To do: interface with file manager
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
        //$upm->functionToDeleteMessage //Delete message from
    }
}

class Message{

    protected string $name; //Protected for possible inheritance
    protected string $text;
    protected int $id;

    function __construct(string $name, string $text, int $id){

        $this->name = $name;
        $this->text = $text;
        $this->id = $id;

    }

    function __toString(){
        return ($this->text . " - " . $this->name);
    }

    public function getName(): string{
        return $this->name;
    }

    public function getText(): string{
        return $this->text;
    }

    public function getID(): int{
        return $this->id;
    }

}

class GuestbookDisplayer{

    private Guestbook $guestbook;

    public function __construct(Guestbook $guestbook){
        $this->guestbook = $guestbook;
    }

    private function convertMessageToHTML(Message $message): string{
        $htmlcode = 
        "
        <div class='message'>
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
        "
        . 
        "   <button class='btn' name='delete
        "
        .
        $message->getID()
        . 
        "   '>Verwijder</button>
        </div>
        "
        ;
        return $htmlcode;
    }

    public function displayMessages(){
        foreach($this->guestbook->getMessages() as $message){
            echo $this->convertMessageToHTML($message);
        }
    }
}

class GuestbookSubmitter{

    public function __construct(){

    }
    
    private function validateText(string $text): string{
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