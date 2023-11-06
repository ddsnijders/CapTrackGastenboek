<?php declare(strict_types = 1);  ?>
<?php 
//classes are named starting with a Capital letter
// put in the class Backend the main objects for posting and getting a message

    interface UserPost {
        public function createGuestBookJson(); 
    }

    class Backend {
        public $name;
        public $message;
        public $userMessage;
        public function __construct (){
            $name = (new UserMessage($this->userMessageCheck()));
            $savePost = (new UserMessage($this->saveMessageToFile($name, $message)));
            // $openPost = (new UserMessage())->retrieveMessageFromFile();
        }
    }

    class UserFile extends Backend{

        public function placeholder(){
            $replace = array('{name}', '{message}');
            $values = array($name, $message);
            $template = file_get_contents(filename: 'index.php');
            $newMessage = str_replace($replace, $values, $template);
        }
        
        public function createGuestBookJson(){ 
            if (file_exists('files/users.json')) {
                (new UserPostMessage)->userMessageCheck();
            }
            else fopen('files/users.json', 'w');
        }
    }

    class UserMessage extends UserFile{ 
        public $retrieveName;
        public $retrieveMessage; 

        public function userMessageCheck(){
        if(isset($_POST)){
            // $userMessage = $_POST;
            if($_POST["name"] == 'name' || "{name})") {
                echo $nameErr = "Name is required";
            }
            if(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])) {
                echo $nameErr = "Only letters and white space allowed";
            }      
            }
            $name = $this->inputValidation($_POST['name']);
            $message = $this->inputValidation($_POST['message']);
            if(isset($_POST['submitNewMessage'])) {$this->saveMessageToFile($name, $message);}     
       } 

        public function inputValidation($data){
            $data = stripslashes($data);
            $data =trim($data);
            $data = htmlspecialchars($data);
            // (new UserPostMessage)->userMessageCheck();
            return $data;
        }
        
        public function saveMessageToFile($name, $message){ 
            $file = 'files/users.json';
            $currentFile =[
                "name" => $name,
                "message" => $message
            ];
            $addMessage = json_encode($currentFile);
            $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
            json_decode($file);
            $file = file_put_contents('files/users.json', $addMessage, FILE_APPEND);
            $savePost = $file;
            // return $savePost;        
        } 
        
        public function getMessageFromFile(){
            $file = 'files/users.json';
            $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
            $decodeJson =json_decode($file);
            $openPost = $file;
            // echo $retrieveMessageName->name->message;
            // echo $retrieveMessage->name;
            // return $openPost;
        }
        
    }

    echo (new UserMessage())->createGuestBookJson();
    ?>
