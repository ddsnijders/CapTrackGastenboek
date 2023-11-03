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
        <form action="postNewMessage.php" method="post" >
            <label for="" >Tell us your name here &nbsp;&nbsp;&nbsp;&nbsp;</label> 
            <input name="name" placeholder="name" required value="{name}" type="text">
            <br>
            <label for="" >Leave your message here&nbsp;</label>
            <input name="message" placeholder="Enter your messsage here please" required value="{message}" type="text"> 
            <br>      
            <button type="submit" name="submitNewMessage" required>submit</button>
        </form>
        
        <div>
        
        </div>
    </main>
</body>
</html>
