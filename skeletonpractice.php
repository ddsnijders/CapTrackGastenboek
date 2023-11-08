<?php declare(strict_types = 1);
// include("classes.php");

interface CreateFile{
    public function createJson(); 
    public function messageCheck();
    }

class Post implements CreateFile{
    //properties
 
    //methods
    public function __construct(){
        $name = $_POST['name'];
        $message = $_POST['message'];
    }

    public function processUserInput(){

    }

    public function addPost(){
        //properties
        $file = 'files/users.json';
        $baseArray = [
            'name' => "",
            'message' => "",

        ];
        $name = $_POST['name'];
        $message = $_POST['message'];
        $messages=[
            'name' => $name,
            'message' => $message
        ];

        //methods
        $joined = array_push($baseArray, $messages);
        
        json_encode($joined, true);
        $userFile = file_put_contents('files/users.json', $userFile, FILE_APPEND);
        echo var_dump($userFile);
        // echo '<pre>' . print_r($final, true) . '</pre>' . '<br>';
        // echo $final[0]  . "<br>";
        echo $checkJson = json_decode($userFile);

    }

    public function getPost(){

    }

    //properties
    //methods
    public function saveMessageToFile(){
   
    }


    //properties
    //methods
    public function getMessageFromFile(){

    }
        

    }

    ?>
