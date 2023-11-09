<?php
declare(strict_types = 1);
include_once("filemanager.php");

class Guestbook{

    private array $messages;
    private FileManager $fileManager;

    public function __construct(){
        $this->fileManager = new FileManager();
        $this->messages = $this->getMessages();

    }

    public function getMessages():array{
        
        /*$messages = [
            new Message("Djowie", "Dit is een bericht om te kijken wat er gebeurt met langere berichten.", IDGenerator::generateID()),
            new Message("Brian", "Dit is een testbericht om te kijken wat er gebeurt met nog veel langere berichten. Berichten mogen niet overflowen.", IDGenerator::generateID()),
            Message::jsonToMessage((new Message("Test", "Test2", "0"))->jsonSerialize())

        ];*/

        $messages = $this->fileManager->getAllMessages();

        return $messages;
    }
    
    public function addMessage(Message $message){
        $this->fileManager->addMessage($message);
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

    public function deleteMessage(string $messageID){
        $this->fileManager->deleteMessage($messageID);
    }
}

class Message implements JsonSerializable{

    private string $name; //Protected for possible inheritance
    private string $text;
    private string $id;

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

    //Deze roep je aan als [variabele naam]->jsonSerialize()
    public function jsonSerialize(): string{
        return json_encode(get_object_vars($this));
    }
    //Deze roep je aan als Message::jsonToMessage()
    public static function jsonToMessage(string $json): Message{
        $decodedjson = json_decode($json); //This is it
        return (new Message($decodedjson->name, $decodedjson->text, $decodedjson->id));
    }

    //[0, 1, [0,1]];

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

    private function validateName(string $name): string{
        $name = trim($name);
        $name = htmlspecialchars($name);
        return $name;
    }
    
    private function convertInputToMessage(string $name, string $text): Message{
        try{
            return new Message($name, $text, IDGenerator::generateID());
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

    public static function generateID(): string{
        return uniqid("", true);
    }
}
//$currentMessage = (new UserPostMessage())->userMessageCheck();