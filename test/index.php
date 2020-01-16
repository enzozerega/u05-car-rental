<?php
    include "user.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
   $newuser = new User();
   $result = $newuser->getUser();
   print_r($result);
   echo $result[0]['name'];
   unset($newuser);
?>
    <form action="insert.php" method="POST">
        <input type="text" name="name" placeholder="Name"><br>
        <button type="submit" name="submit">Add</button>
    </form>
    
</body>
</html>