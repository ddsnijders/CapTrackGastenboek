<?php declare(strict_types = 1);  ?>
<?php 
//classes are named starting with a Capital letter
// put in the class Backend the main objects for posting and getting a message

    interface CreateFile{
        public function createJson(); 
        public function messageCheck();
    }

    class Backend{

        
    }

    class UserFile{
        public function placeholder(){
            $replace = array('{name}', '{message}');
            $values = array($name, $message);
            $template = file_get_contents(filename: 'index.php');
            $newMessage = str_replace($replace, $values, $template);
        }         
    }

    class Message implements CreateFile{
        public $name = "";
        public $message = "";
        public $retrieveName = array();
        public $retrieveMessage = array();
        public string $data;
        public $decodeJson = array();


        // public function __construct(){
        //     $this->createJson();
            
        // }

        public function createJson(){ 
            // $file = 'files/users.json';
            if(file_exists('files/users.json')) {   
                echo "file exists";
            }
            else 
                fopen('files/users.json', 'w'); echo "creating users.json"; 
            }
    
        public function messageCheck(){
            
            if(isset($_POST['submitNewMessage'])) {
                

            }
            if(!preg_match("/^[a-zA-Z-' ]*$/",$this->name)) {
                echo $nameErr = "Only letters and white space allowed";
            }      
            
            else 
                
                $data = $this->inputValidation($this->name);
                // $message = inputValidation($_POST['message']);
        }

        public function inputValidation($data){
            $data = stripslashes($data);
            $data =trim($data);
            $data = htmlspecialchars($data);
            return $data;
        } 

    }   
    
    class AddMessage extends Message{
        public function __construct(){
            $this->createJson();
            // $this->messageCheck();
            
        }
        public $addMessage;


        public function saveMessageToFile(){
            $name = $_POST['name'];
            $message = $_POST['message'];
            $messages=[
                ['name'],
                ['message']
            ];
            $this->messageCheck($name);
            $file = 'files/users.json';
            json_decode($file, true);
            $currentFile=[
                'name' => $name,
                'message' => $message,
            ];
            
            $Post = array_push($messages, $currentFile);
            // print_r($currentFile);
            $addMessage = json_encode($currentFile);
            $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
            $joined = file_put_contents('files/users.json', $addMessage, FILE_APPEND);
            $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
            $final = json_encode($file);
            echo is_string($file);
            // echo var_dump($final);
            // echo '<pre>' . print_r($final, true) . '</pre>' . '<br>';
            // echo $final[0]  . "<br>";
            // $savePost = $file;
            // return $savePost; 
        }
    }

    class GetMessage extends Message{
    public function getMessageFromFile(){
        $file = 'files/users.json';
        $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
        $decodeJson = array(json_decode($file));
        echo is_array($decodeJson);
        echo '<pre>' . print_r($decodeJson, true) . '</pre>' . '<br>';
        // echo $retrieveMessage = $decodeJson->message;
        echo var_dump($decodeJson);
        // $encodeJosn = json_encode($decodeJson);
        // print_r($file);
        
        
        
        // echo var_dump($decodeJson);
        // echo '<pre>' . print_r($file, true) . '</pre>' . '<br>';
        // echo $decodeJson['name'] . "<br>";
        // echo $retrieveMessage = $decodeJson['message']. "<br>"
    }
}
    echo (new AddMessage())->saveMessageToFile();
    // echo (new Getmessage())->getMessageFromFile();
    ?>
