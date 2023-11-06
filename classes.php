<?php
declare(strict_types = 1);

class Guestbook{

    private array $messages = array();
    //private UserPostMessage $upm = null;

    public function __construct(){
        $this->messages = $this->getMessages();
    }

    public function getMessages():array{
        
        $messages = [
            new Message("hello world!", "greeting", 1),
            new Message("goodbye world!", "goodbye", 2),
            new Message("Djowie", "Dit is een bericht om te kijken wat er gebeurt met langere berichten.", 3),
            new Message("Brian", "Dit is een testbericht om te kijken wat er gebeurt met nog veel langere berichten. Berichten mogen niet overflowen.", 4)
        ];

        return $messages;
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

class Message implements JsonSerializable{

    protected string $name; //Protected for possible inheritance
    protected string $text;
    protected int $id;

    function __construct(string $name, string $text, int $id){

        $this->name = $name;
        $this->text = $text;
        $this->id = $id;

    }

    function __toString(){
        return ($this->name . " - " . $this->text);
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

    public function jsonSerialize(){
        return get_object_vars($this);
    }

}

class GuestbookDisplayer{

    public function __construct(){

    }

    private function convertMessageToHTML(Message $message): string{
        $placeholders = array("{{name}}", "{{text}}", "{{id}}");
        $replacements = array($message->getName(), $message->getText(), $message->getID());
        $html = file_get_contents("messagetemplate.html");

        return str_replace($placeholders, $replacements, $html);
    }

    public function displayMessages(Guestbook $guestbook){
        foreach($guestbook->getMessages() as $message){
            echo $this->convertMessageToHTML($message);
        }
    }
}

class GuestbookSubmitter{

    public function __construct(){
    }
    
    private function validateText(string $text): string{
        $text = trim($text);
        $text = htmlspecialchars($text);
        return $text;
    }

    private function validateName(string $name){
        $name = trim($name);
        $name = htmlspecialchars($name);
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

//$currentMessage = (new UserPostMessage())->userMessageCheck();