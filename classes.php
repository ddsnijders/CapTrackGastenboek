<?php
declare(strict_types = 1);

class Guestbook{

    private array $messages;
    private IDGenerator $idgenerator;
    //private UserPostMessage $upm = null;

    public function __construct(IDGenerator $idgenerator){
        $this->idgenerator = $idgenerator;
        $this->messages = $this->getMessages();
    }

    public function getMessages():array{
        
        $messages = [
            new Message("hello world!", "greeting", $this->idgenerator->generateID()),
            new Message("goodbye world!", "goodbye", $this->idgenerator->generateID()),
            new Message("Djowie", "Dit is een bericht om te kijken wat er gebeurt met langere berichten.", $this->idgenerator->generateID()),
            new Message("Brian", "Dit is een testbericht om te kijken wat er gebeurt met nog veel langere berichten. Berichten mogen niet overflowen.", $this->idgenerator->generateID())
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
    protected string $id;

    function __construct(string $name, string $text, string $id){

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

    public function getID(): string{
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

    private IDGenerator $idgenerator;

    public function __construct(IDGenerator $idgenerator){
        $this->idgenerator = $idgenerator;
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
            return new Message($name, $text, $this->idgenerator->generateID());
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

class IDGenerator{

    public function __construct(){

    }

    public function generateID(){
        return uniqid("", true);
    }
}
//$currentMessage = (new UserPostMessage())->userMessageCheck();