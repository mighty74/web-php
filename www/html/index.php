<!DOCTYPE html>
<?php
    $dsn = "mysql:dbname=test;host=db;charset=utf8mb4";
    $username = "root";
    $password = "secret";
    $options = [];
    try{
        //データベースへ接続
        $pdo = new PDO($dsn, $username, $password, $options);
        $query = "SELECT * FROM works";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

    } catch (PDOException $e) {
        exit($e->getMessage()); 
    }

?>
<html lang="ja">
<?php
    echo "hello";
    // phpinfo();
?>
    <?php foreach ($stmt as $row): ?>
        <?php 
            echo '<pre>';
            echo $row['work_name'];
            echo "aa";
            echo PHP_EOL;
            echo "bb";
            echo '</pre>';
        ?>
        
    <?php endforeach; ?>
    
</html>