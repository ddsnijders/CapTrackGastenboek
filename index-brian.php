<?php declare(strict_types = 1);  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- <?php require './files/guestbook.php'?> -->
    
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
    echo new message();
    // $message1->getmessage();
    // echo nl2br($message1->file);
   
    
        ?>
        </div>
    </main>
</body>
</html>