<?php declare(strict_types = 1);  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <main>
        <form action="" method="post" >
            <label for="" >Tell us yout name here &nbsp;&nbsp;&nbsp;&nbsp;</label> 
            <input name="name" required type="text">
            <br>
            <label for="" >Leave your message here&nbsp;</label>
            <input name="message" required type="text"> 
            <br>      
            <button type="submit">submit</button>
        </form>
        
        <div>
        
        </div>
    </main>
</body>
</html>
<?php 

        //classes are named starting with a Capital letter
        // interface ForumPost {
        //     public function createUserFile();
        //     public function postMessage(): string;
        //     public function deleteMessage(): string;
        // }

        class UserPostMessage{
            //properties
            public $current = "";
            public $file = "";
            public $currentMessage = "";
            public $currentName = "";
            //methods

            function userMessageCheck(){
                if (isset($_POST['message'])){$currentMessage = $_POST['message']; return $currentMessage;}
                
                }

            function UserNameCheck(){
                if (isset($_POST['name'])){$currentName = $_POST['name'];return $currentName;}
                
                }


            function createUserFile(){ 
                if (file_exists('files/users.txt')) {
                    (new UserPostMessage)->postMessage($this->currentName, $this->currentMessage);
                }else fopen('files/users.txt', 'w');
                }

            function postMessage($currentName, $currentMessage){
                
                $file = 'files/users.txt';
                $currentFile = file_get_contents('files/users.txt', use_include_path: true); 
                file_put_contents($file, $currentMessage);
                file_put_contents($file, $currentName); 
                return $this->file;
                }

                echo (new UserPostMessage())->userMessageCheck();
                echo (new UserPostMessage())->userNameCheck();             
                echo (new UserPostMessage())->createUserFile();
                echo (new UserPostMessage())->postMessage($this->currentName, $this->currentMessage); 

            } 



    // echo nl2br($message1->file);
   
    
        ?>
