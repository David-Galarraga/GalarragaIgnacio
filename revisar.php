<?php
    session_start();

    if (isset($nickname)) {
        
    }else {
        $nickname = $_POST["nickname"];
        var_dump($nickname);
    };
    
    
    if (isset($password)) {
        
    }else {
        $password = $_POST["password"];
        var_dump($password);
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login succes</title>
</head>
<body>
    
    
</body>
</html>
