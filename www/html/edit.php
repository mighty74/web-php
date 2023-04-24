<?php
    $dsn = "mysql:dbname=user;host=db;charset=utf8mb4";
    $username = "root";
    $password = "secret";
    $options = [];
    try{
        //データベースへ接続
        $pdo = new PDO($dsn, $username, $password, $options);

        $query = "SELECT * FROM user";
        $user = $pdo->prepare($query);
        $user->execute();

    } catch (PDOException $e) {
        exit($e->getMessage()); 
    }

    $loginFlag = False;
    $input_user_name = '';
    $input_user_password = '';
    if(isset($_POST['username'])){
        $input_user_name = (string)$_POST['username'];
    }
    if(isset($_POST['password'])){
        $input_user_password = (string)$_POST['password'];
    }
    foreach($user as $row){
        if($input_user_name == $row["user_name"] and $input_user_password == $row["user_password"]){
            $loginFlag = True;
            break;
        }
    }
    if (!$loginFlag) {
        header('Location: login.php');
        exit;
    }

?>
<?php
    $dsn = "mysql:dbname=test;host=db;charset=utf8mb4";
    $username = "root";
    $password = "secret";
    $options = [];
    try{
        //データベースへ接続
        $pdo = new PDO($dsn, $username, $password, $options);

        $query = "SELECT * FROM skills";
        $skills = $pdo->prepare($query);
        $skills->execute();

        $query = "SELECT * FROM works";
        $works = $pdo->prepare($query);
        $works->execute();

    } catch (PDOException $e) {
        exit($e->getMessage()); 
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
        <link rel="stylesheet" href="style/edit.css">
    </head>  

    <body>
        <a href="portfolio.php"><p>topに戻る</p></a>
        <div class="edit-area">
            <h1>edit pase</h1>
            <table>
                <th class = "skill-id">id</th>
                <th class = "skill-name">名前</th>
                <th class = "skill-type">タイプ</th>
                <th class = "skill-content">説明</th>
                <th class = "skill-img-path">レベル</th>
                <th class = "skill-img-path">画像</th>
                <?php
                    foreach($skills as $row){
                        echo '<tr>';
                            echo '<td>' . htmlspecialchars($row[0], ENT_QUOTES, "utf-8") . '</td>';
                            echo '<td>' . htmlspecialchars($row[1], ENT_QUOTES, "utf-8") . '</td>';
                            echo '<td>' . htmlspecialchars($row[2], ENT_QUOTES, "utf-8") . '</td>';
                            echo '<td>' . htmlspecialchars($row[3], ENT_QUOTES, "utf-8") . '</td>';
                            echo '<td>' . htmlspecialchars($row[4], ENT_QUOTES, "utf-8") . '</td>';
                            echo '<td>' . htmlspecialchars($row[5], ENT_QUOTES, "utf-8") . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
            <form method=post action="edit.php">
                <div class="input-box">
                    <input type="hidden" name="username" value="<?php echo $input_user_name ?>">   
                </div>
                <div class="input-box">
                    <input type="hidden" name="password" value="<?php echo $input_user_password ?>">
                </div>

                <div class="submit-box">
                    <input type="submit" name="submit_btn" value="追加">
                </div>
            </form>
            <table>
                <th class = "work-id">id</th>
                <th class = "work-name">名前</th>
                <th class = "short-desc">説明</th>
                <th class = "work-long-desc">説明</th>
                <th class = "work-img-path">画像</th>
                <?php
                    foreach($works as $row){
                        echo '<tr>';
                            echo '<td>' . htmlspecialchars($row[0], ENT_QUOTES, "utf-8") . '</td>';
                            echo '<td>' . htmlspecialchars($row[1], ENT_QUOTES, "utf-8") . '</td>';
                            echo '<td>' . htmlspecialchars($row[2], ENT_QUOTES, "utf-8") . '</td>';
                            echo '<td>' . htmlspecialchars($row[3], ENT_QUOTES, "utf-8") . '</td>';
                            echo '<td>' . htmlspecialchars($row[4], ENT_QUOTES, "utf-8") . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
            <form method=post action="edit.php">
                <div class="input-box">
                    <input type="hidden" name="username" value="<?php echo $input_user_name ?>">   
                </div>
                <div class="input-box">
                    <input type="hidden" name="password" value="<?php echo $input_user_password ?>">
                </div>

                <div class="submit-box">
                    <input type="submit" name="submit_btn" value="追加">
                </div>
            </form>
        </div>

    </body>

    
</html>