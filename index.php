<?php 
declare(strict_types = 1);
include("classes.php");

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
        foreach($messages as $key=>$message){
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

$guestbook = new Guestbook();
$messageArray = array();
array_push($messageArray, new Message("hello world!", "greeting", 1));
array_push($messageArray, new Message("goodbye world!", "goodbye", 2));
$guestbook->addMessages($messageArray);

echo $guestbook->getMessages();

?>

