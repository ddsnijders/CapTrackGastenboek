<<<<<<< HEAD
<?php 
declare(strict_types = 1);
?>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="fontfaces.css">

<div class="span-page primary-theme" id="header">
    <h2>Gastenboek</h2>
</div>

<div id="elements-container">

    <div id="submission-container">
        <form method="POST">
            <h1>Laat een berichtje achter!</h1>
            <div class="flex-col">
                <label for="name">Naam</label>
                <input type="text" name="name" id="name-input">
                <label for="text">Tekst</label>
                <textarea name="text" id="text-input"></textarea>
                <input type="submit" class="btn" name="submit">
            </div>
        </form> 
    </div>

    <div id="message-container">
    <?php
        include("classes.php");
        include("logic.php");

        if (!empty($_POST['submit'])){
            onSubmitPress();
        }
    ?>
    </div>

</div>

<div class="span-page primary-theme" id="footer">
</div>

=======
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
            <label for="name" >Tell us your name here &nbsp;&nbsp;&nbsp;&nbsp;</label> 
            <input name="name" placeholder="name" required value="{name}" type="text">
            <br>
            <label for="message" >Leave your message here&nbsp;</label>
            <input name="message" placeholder="message" required value="{message}" type ="text"></input> 
            <br>      
            <button type="submit" name="submitNewMessage" required>submit</button>
        </form>
        
        <div>
        
        </div>
    </main>
</body>
</html>
>>>>>>> c19775f96b42a09cc79e848e29ed0c6df6561393
