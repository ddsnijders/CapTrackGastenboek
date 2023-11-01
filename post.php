<?php 

        //classes are named starting with a Capital letter
        interface ForumPost {
            public function postMessage(): string;
            public function deleteMessage(): string;

        }
        class UserPostMessage {
            //properties
            public $current = "";
            public $file = "";
            public $message = ""; 

            //methods
            function postMessage(){
                if (isset($_POST['message'])) { 
                    $current = file_get_contents('files/users.txt', use_include_path: true);
                    $file = 'files/users.txt';
                    $message = $_POST['message']; 
                    $current .= $message;
                    file_put_contents($file, $current);
                    $firstJson = json_decode($file);
                    // echo "test" . nl2br($current);
                }
                 return $this->file;
            }
            
    }
    echo (new UserPostmessage)->postMessage();
    // $message1->getmessage();
    // echo nl2br($message1->file);
   
    
        ?>