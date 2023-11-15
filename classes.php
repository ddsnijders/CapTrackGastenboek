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
        $messages = $this->fileManager->getAllMessages();
        return $messages;
    }
    
    public function addMessage(Message $message){
        $this->fileManager->addMessage($message);
    }

    public function deleteMessage(string $messageID){
        $this->fileManager->deleteMessage($messageID);
    }
}

class Message implements JsonSerializable{

    private string $name;
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

    public function jsonSerialize(): string{
        return json_encode(get_object_vars($this));
    }
    public static function jsonToMessage(string $json): Message{
        $decodedjson = json_decode($json);
        return (new Message($decodedjson->name, $decodedjson->text, $decodedjson->id));
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