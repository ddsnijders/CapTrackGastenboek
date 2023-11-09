<?php declare(strict_types = 1);
include_once("classes.php");
include_once("index.php");

class FileManager{

    private $filename = "messages.txt";

    public function __construct(){
    }

    public function addMessage(Message $message){
        $jsonmessages = $this->getFileContentsJsonArray($this->filename);
        $messages = array();
        foreach ($jsonmessages as $m){
            array_push($messages, Message::jsonToMessage($m));
        }
        array_push($messages, $message);
        file_put_contents($this->filename, json_encode($messages));
    }

    public function getAllMessages(): array{
        $filecontents = $this->getFileContentsMessageArray($this->filename);

        if (!empty($filecontents)){
            return $filecontents;
        }
        else{
            return array();
        }

    }

    public function deleteMessage(string $id){
        $filecontentsarray = $this->getFileContentsJsonArray($this->filename);
        foreach($filecontentsarray as $key => &$message){
            if ($message->getID() == $id){
                unset($filecontentsarray[$key]);
                break;
            }
        }
    }

    private function getFileContentsJsonArray($filename): array{
        $filecontents = json_decode(file_get_contents($filename), true);
        if (!empty($filecontents)){
            return $filecontents;
        }
        else {
            return array();
        }
    }

    private function getFileContentsMessageArray($filename): array{
        $filecontentsarray = $this->getFileContentsJsonArray($filename);
        //$filecontentsarray = [(new Message("Hallo", "Wereld!", "0"))->jsonSerialize()];
        $messages = array();
        foreach ($filecontentsarray as &$message){
            array_push($messages, Message::jsonToMessage($message));
        }
        return $messages;
    }
}