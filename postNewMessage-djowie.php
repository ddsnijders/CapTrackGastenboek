<?php declare(strict_types = 1);  ?>
<?php 
    //classes are named starting with a Capital letter
    //ready for commit

    class Backend{
        public function makePost()
         { (new UserPostMessage())->saveMessageToFile($name, $message);
         }
        public function retrievePost()
         { (new UserPostMessage())->getMmessageToFromFile($retrieveMessageName, $retrieveMessage);
         }       
    }

    
    class UserPostMessage{
        //properties
        public $name;
        public $message;
        public $userMessage;
        public $retrieveName;
        public $retrieveMessage;  
        //methods
        public function __construct($retrieveName, $retrieveMessage){
            
            $this->name = $retrieveName;
            $this->message = $retrieveMessage;
        }

        public function createGuestBookFile(){ 
            if (file_exists('files/users.json')) {
                (new UserPostMessage)->userMessageCheck();
            }else fopen('files/users.json', 'w');
        }

        public function placeholder(){
            $replace = array('{name}', '{message}');
            $values = array($name, $message);
            $template = file_get_contents(filename: 'index.php');
        }


        public function userMessageCheck(){
            $name = $_POST['name'];
            $message = $_POST['message'];
            $newMessage = str_replace($replace, $values, $template);
            if (isset($_POST['submitNewMessage'])) { $this->saveMessageToFile($name, $message);}    
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
        } 
        
        public function getMessageFromFile(){
            $file = 'files/users.json';
            $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
            $decodeJson =json_decode($file);
            echo $retrieveMessageName->name;
            echo $retrieveMessage->name;
        }
        
    }
    echo $post1 = new UserPostMessage($retrieveName, $retrieveMessage);
    ?>
