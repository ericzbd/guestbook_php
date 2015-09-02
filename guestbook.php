<html>
<head><title>Eric's guestbook</title>


<style>

    #wrapper {

    padding-bottom: 10px; border: 3px; border-color: cornflowerblue; text-align: center; font-weight: bold; background-color: dodgerblue;

    }

</style>

</head>
<body>
<div id="wrapper">
    <h1>Please sign my guestbook!</h1>

    <form method="POST" action="guestbook.php">

        <h3>Please enter your name: </h3>

        <input name="name" size="23"> <br>

        <h3>Write something!</h3>


        <textarea name="comments" rows=8 cols=50></textarea><br>

        <input type=submit name="submit" value="Submit" />

        <input type=reset value="Clear form" />

    </form>

<?php

if(isset($_POST['submit'])){
    
    $textfile = "guestlist.txt";
    
    $fileopen = fopen($textfile,'a');
    
    $name = $_POST['name'];
    
    $comments = $_POST['comments'];
    
    fwrite($fileopen, $name."----".$comments.'<br>');
    
    fclose($fileopen);
}

echo "My guestbook:<br>";

$file = fopen("guestlist.txt","r") or exit("Foiled");

while(!feof($file)) {


    echo fgets($file);

    }
fclose($file);
?>
</div>
</body>
</html>