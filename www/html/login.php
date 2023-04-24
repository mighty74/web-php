<?php
    $message = '';
    $motourl = $_SERVER['HTTP_REFERER'];
    if($motourl == 'http://127.0.0.1/login.php'){
        $message = 'usernameかpasswordが間違っています';
    }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="icon" href="img/aboutme.jpg">
        <title>
            Hori Kosuke's Portfolio
        </title>
        <meta name="viewport" content="width=device-width" >
        <meta charset="utf-8">
        <link rel="stylesheet" href="style/login.css">
    </head>  

    <body>
        <a href="portfolio.php"><p>戻る</p></a>
        <div class="login-area">
            <h1>login pase</h1>
            <form method=post action="edit.php">
                <div class="input-box">
                    <label class="label-text">user name</label>
                    <input type="text" name="username" value="">   
                </div>
                <div class="input-box">
                    <label class="label-text">password</label>
                    <input type="text" name="password" value="">   
                </div>
                <?php
                    echo $message;
                ?>
                <div class="submit-box">
                    <input type="submit" name="submit_btn" value="login">
                </div>
            </form>

        </div>

    </body>

    
</html>