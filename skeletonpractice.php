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
        $file;
        $current;

        if(!file_exists('files/users.json')) {   
            $file = fopen('files/users.json', 'w'); 
            echo "creating users.json";
            $appendString = array();
            // $toettoet = json_encode($appendString);
            $template = file_put_contents('files/users.json', $appendString);
            echo "creating file one moment please......" . "<br>";     
        }
    }

    public function addPost(){
    
        // $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
        // $appendString = "{}";
        // $file = file_put_contents('files/users.json', $appendString);
        $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
        $tempArray = json_decode($file, true);
        // echo print_r($tempFile) . '<br>';
        echo var_dump($tempArray) . '<br>';
        // echo "--------------------------------------" . '<br>';
        $name = $_POST['name'];
        $message = $_POST['message'];
        // $baseArray = array('name'=>'name', 'message'=>'message');
        $postArray = array('name' => $name, 'message'=>$message);
        array_push($tempArray, $postArray);
        // echo print_r($addArray) . '<br>';
        // echo var_dump($addArray) . '<br>';
        // echo "--------------------------------------" . '<br>';
        // $json = json_encode($postArray);
        // $baseJson = json_decode ("{}");
        // $resultBaseJson = json_encode($baseJson);
        
        // json_encode($baseArray);
        // echo print_r($baseArray) . '<br>';
        // echo var_dump($baseArray) . '<br>';
        // echo "--------------------------------------" . '<br>';
        // echo var_dump($baseArray) . '<br>';
        // $replacedArray = array_replace($baseArray,$postArray);
        // echo print_r($replacedArray) . '<br>';
        // echo var_dump($replacedArray) . '<br>';
        // echo "--------------------------------------" . '<br>';
        // echo $replacedArray["name"] . '<br>';
        // echo $replacedArray["message"] . '<br>';
        // echo "--------------------------------------" . '<br>';
        $json = json_encode($addArray);
        // echo print_r($json) . '<br>';
        // echo var_dump($json) . '<br>';
        // echo is_string($json);
        // echo "--------------------------------------" . '<br>';
        // $stringToArray = json_decode($json, True);
        // echo print_r($stringToArray) . '<br>';
        // echo var_dump($stringToArray) . '<br>';
        // echo is_string($stringToArray);
        // echo "--------------------------------------" . '<br>';
        // echo $stringToArray["name"] . '<br>';
        // echo $stringToArray["message"] . '<br>';
        // echo "--------------------------------------" . '<br>';
        // $json = json_decode($replacedArray);
        // $finalArray = array_merge($replacedArray, $baseArray);
        // $firstJsonValuesInEmptyArray = json_encode($emptyArray);
        // json_encode($finalArray);
        // $file = $replacedArray;
        // $emptyArray = $firstJsonValuesInEmptyArray;
        // json_decode($emptyArray);
        // echo '<pre>' . print_r($emptyArray, true) . '</pre>' . '<br>';    
        $file = file_put_contents('files/users.json', $json); 
        // $testFile = file_get_contents(filename: 'files/users.json', use_include_path: true);
        // $json = json_decode($testFile, true);
        // echo print_r($json) . '<br>';
        // echo var_dump($json) . '<br>';
        // echo is_string($json);
        // echo "--------------------------------------" . '<br>';
        // echo print_r($file) . '<br>';
        // echo var_dump($file);
        // $testFile = file_get_contents(filename: 'files/users.json', use_include_path: true);
        // $test = json_encode($testFile);
        // $test2 = json_decode($test,true);  
        // echo print_r($test) . '<br>';
        // echo var_dump($test);
        // echo "--------------------------------------" . '<br>';
        // echo print_r($testFile) . '<br>';
        // echo $testFile->name;
        // echo $testFile['name']; 
        // $test = json_decode($testFile,true);
        // echo var_dump($testFile);
        // echo print_r($testFile) . '<br>';
        // echo $test['name'];
        // echo $testFile->message;
        // $testJson = json_encode($testFile);
        // echo var_dump($testJson);
        // $testFileJson = json_decode($testFile);
        // var_dump($testFileJson);
        // $test = array('{}');
        // $testArray =[array_push($test, $testFileJson)];
        // json_decode($test, true);
        // print_r($testArray);
        
        // $test = json_decode($f,true);
        // echo is_string($test);
        // json_decode($file);
        // echo var_dump($test);
        // echo '<pre>' . print_r($test, true) . '</pre>' . '<br>';

    }

    public function getPost(){
        $file = file_get_contents(filename: 'files/users.json', use_include_path: true);
        // $obj = (new Post())->getPost();

        $toJson = json_encode($file);
        // echo print_r($toJson) . '<br>';
        // echo var_dump($toJson) . '<br>';
        // echo is_string($toJson);
        echo "--------------------------------------" . '<br>';
        $stringToArray = json_decode($toJson, $depth = 512, True);
        echo print_r($stringToArray) . '<br>';
        // echo var_dump($stringToArray) . '<br>';
        // echo is_string($stringToArray);
        // echo "--------------------------------------" . '<br>';
        // echo $stringToArray[3][3] . '<br>';
        // echo $stringToArray[3][3] . '<br>';
        // echo "--------------------------------------" . '<br>';

    }

    public function jsonSerialize(){
        return $this->stringToArray;
 
    }

    public function saveMessageToFile(){
   
    }


    public function getMessageFromFile(){

    }   

    public function showPost(){
        $obj = (new Post())->getPost();
        echo print_r($obj) . '<br>';
        echo var_dump($obj) . '<br>';
        echo is_string($obj);
        echo "--------------------------------------" . '<br>';
    }
}
echo (new Post())->createJson();
echo $obj = (new Post())->addPost();
echo print_r($obj) . '<br>';
echo var_dump($obj) . '<br>';
echo is_string($obj);
echo "--------------------------------------" . '<br>';
// echo (new Post())->getPost();
// echo (new Post())->showPost();

    ?>
