<!DOCTYPE html>
<?php
    $$work_id = '';
    if(isset($_GET["work_id"])){
        $work_id = $_GET["work_id"];
    }

    $skill_name = [];
    $dsn = "mysql:dbname=test;host=db;charset=utf8mb4";
    $username = "root";
    $password = "secret";
    $options = [];
    try{
        //データベースへ接続
        $pdo = new PDO($dsn, $username, $password, $options);
        
        $works = $pdo->query("SELECT * FROM works WHERE work_id = $work_id");
        if(is_null($works)){
            throw new Exception();
        }



    } catch (PDOException $e) {
        exit($e->getMessage()); 
    }

?>
<html lang="ja">
    <head>
        <link rel="icon" href="img/aboutme.jpg">
        <title>
            Hori Kosuke's Portfolio
        </title>
        <meta name="viewport" content="width=device-width" >
        <meta charset="utf-8">
        <link rel="stylesheet" href="style/style.css">
    </head>  

    <body>
        <a href="portfolio.php#works"><p>戻る</p></a>
        <?php
            foreach($works as $row){
                echo $row[0];
                echo $row[1];
                echo $row[2];
                echo $row[3];
                echo $row[4];
            }
        ?>        

    </body>

    
</html>