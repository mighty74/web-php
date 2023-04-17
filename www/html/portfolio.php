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

        $query = "SELECT * FROM skills";
        $skills = $pdo->prepare($query);
        $skills->execute();

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
        <link rel="stylesheet" href="style/skills.css">
    </head>  

    <body>
        <div class="header">
            <p class="text-header">Hori Kosuke's Portfolio</p>
            <ul>
                <li class="text-header">Top</li>
                <li class="text-header">About</li>
                <li class="text-header">Skills</li>
                <li class="text-header">Works</li>
                <li class="text-header">Contact</li>
            </ul>
        </div> 
        <div class="top">
            <div class="top-text">
                <p class="text-top">Hori Kosuke's Portfolio</p>
                <p class="text-content">こんにちは、堀 孝輔です。</br> 画像解析の研究とweb系の開発をしています。</br> 技術の習得を必死に頑張っています。</p>
            </div>
        </div>
        <div class="main">
            <div class="about">
                <div class="title">
                    <p class="text-content">About this site</p>
                </div>
                
                <p class="text-about-content">ここはエンジニアHoriのポートフォリオサイトです。私の身につけたスキル、これまでの成果物をまとめています。</br> どうぞごゆるりとサイト内を散策ください。</p>
            </div>

            <div class="aboutme">
                <div class="title">
                    <p class="text-content">About this site</p>
                </div>
                
                <p class="text-about-content">ここはエンジニアHoriのポートフォリオサイトです。私の身につけたスキル、これまでの成果物をまとめています。</br> どうぞごゆるりとサイト内を散策ください。</p>
            </div>
        </div>
        <!-- <div class="main">
            <div class="about">
                <div class="title">
                    <h1>About</h1>
                </div>
                <div class="contents">
                    <div class="aboutImg">
                        <img src="./img/aboutme.jpg" width="100%" height="100%">
                    </div>
                    <div class="aboutContents">
                        <h1>Hori Kosuke</h1>
                        <h1>(堀 孝輔)</h1>
                        <p class="text2">Engineer / frontend ・ ml</p>
                        <p class="text3">Affiliation</p>
                        <ul>
                            <li>近畿大学理工学部情報学科4年メディアコース</li>
                            <li>近畿大学コンピュータービジョン研究室</li>
                            <li><a href="https://www.kindai-csg.dev/" target="_blank">近畿大学電子計算機研究会</a>元会計管理部門長</li>
                            <li><a href="https://act-kithub.github.io/" target="_blank">KINDAI Info-Tech HUB</a> 役員</li>
                        </ul>
                        <div class="contentItem">
                            <div class="icon">
                                <img src="img/sozai_cman_jp_20230206194127.png" width=60% height=90% alt="位置アイコン" title="位置アイコン">
                            </div>
                            <p class="text4">Osaka</p>
                        </div>
                        <div class="contentItem">
                            <div class="icon">
                                <img src="img/sozai_cman_jp_20230206194148.png" width=80% height=70% alt="メールアイコン" title="メールアイコン">
                            </div>
                            <p class="text4">k.hori0704@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="main">
            <div class="skills">
                <div class="title">
                    <h1>Skills</h1>
                </div>
                <?php foreach ($skills as $row): ?>
                    <?php
                        echo '<pre>';
                        echo $row['skill_name'];
                        echo $row['skill_type'];
                        echo '<img src=' . $row['skill_img_path'] . ' width=20% alt=' . $row['skill_name'] . ' title=' . $row['skill_name'] . '>';
                        echo '</pre>';
                    ?>
                <?php endforeach; ?>
            </div>
        </div>
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
    </body>

    
</html>