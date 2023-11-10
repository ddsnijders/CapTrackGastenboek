<?php declare(strict_types = 1);
// include("classes.php");

interface CreateFile{

    
        // createJson();
        // addPost();
    }
    

class Post implements CreateFile{
    //properties
    
    //methods


    public function createJson(){ 
        $file = 'files/users.json';
        if(!file_exists('files/users.json')) {   
            $file = fopen('files/users.json', 'w'); echo "creating users.json"; 
            echo "creating file one moment please......" . "<br>";     
        }
    }

    public function addPost(){
        $this->createJson();
        $name = $_POST['name'];
        $message = $_POST['message'];
        //properties
        $baseArray = array(file_get_contents(filename: 'files/users.json', use_include_path: true));
        $name = $_POST['name'];
        $message = $_POST['message'];
        $messages= array("name"=>$name, "message"=>$message);  // TODO: VERWIJDER:"{'name': $name,'message': $message}";

        //methods
        array_push($baseArray, $messages);

        print_r($baseArray);
        // print_r($baseArray);
        // echo is_array($baseArray);
        $json = json_encode($baseArray);
        // echo is_string($json);
        $file = file_put_contents('files/users.json', $json, FILE_APPEND);
        $checkJson = json_decode($json, true);
        //echo '-----';

        foreach($checkJson as $key => $value) {
            echo $value;
        }

        // echo '<pre>' . print_r($json, true) . '</pre>' . '<br>';
        //  echo $json[0]['name'];
        
        
        
        // echo json_decode($json);
        
        
        // echo var_dump($checkJson);

        // echo implode($checkJson);

    }

    public function getPost(){
        $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
        // echo is_string($file);
        $jsonArray = json_decode($file, true);
        echo $jsonArray;

    }

  
    public function saveMessageToFile(){
   
    }


    public function getMessageFromFile(){

    }    

}
echo (new Post())->addPost();
// echo (new Post())->getPost();

    ?>
