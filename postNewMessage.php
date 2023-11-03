<?php declare(strict_types = 1);  ?>
<?php 

        //classes are named starting with a Capital letter
    //ready for commit
    
        class UserPostMessage{
            //properties

            // public $current = "";
            public $file = "";
            
            //methods

            function createUserFile(){ 
                if (file_exists('files/users.txt')) {
                    (new UserPostMessage)->userMessageCheck();
                }else fopen('files/users.txt', 'w');
            }

            function userMessageCheck(){
                $replace = array('{name}', '{message}');
                $values = array('', '');
                if (isset($_POST['submitNewMessage'])){$this->postMessage($currentMessage = $_POST['message'], $currentName = $_POST['name']); }
                $template = file_get_contents(filename: 'index.php');
                str_replace($replace, $values, $template);
                $userMessage = json_encode($values); 
                return $userMessage;  
            }

            function postMessage($currentMessage, $currentName){ 
                $file = 'files/users.txt';
                $currentFile = file_get_contents('files/users.txt', use_include_path: true);
                $currentFile .= $currentMessage;
                $currentFile .= $currentName;
                file_put_contents($file, $currentFile);
                file_put_contents($file, $currentFile); 
                return $this->file;
            }    
       }
        echo (new UserPostMessage)->createUserFile();
        ?>
