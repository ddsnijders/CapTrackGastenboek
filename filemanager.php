<?php declare(strict_types = 1);
include_once(classes.php);

class FileManager{

    private $filename = "messages.txt";

    public function __construct(){
    }

    public function addMessage(Message $message){
        file_put_contents($filename, $message->jsonSerialize() . "\n");
    }

    public function getAllMessages(): array{
        return getFileContentsMessageArray($this->filename);
    }

    public function deleteMessage(string $id){
        $filecontentsarray = getFileContentsJsonArray($this->filename);
        foreach($filecontentsarray as $key => &$message){
            if ($message->getID() == $id){
                unset($filecontentsarray[$key]);
                break;
            }
        }
    }

    private function getFileContentsJsonArray($filename): array{
        $filecontents = file_get_contents($filename);
        return explode($filecontents, "\n");
    }

    private function getFileContentsMessageArray($filename): array{
        $filecontentsarray = getFileContentsJsonArray($filename);
        $messages = array();
        foreach ($filecontentsarray as &$message){
            array_push($messages, Message::jsonToMessage($message));
        }
        return $messages;
    }
}