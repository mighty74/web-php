<!DOCTYPE html>
<?php
    $skill_name = [];
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

        $query = "SELECT COUNT(*) FROM skills";
        $skill_num = $pdo->prepare($query);
        $skill_num->execute();
        $skill_num = $skill_num->fetch(PDO::FETCH_ASSOC);
        
        $query = "SELECT * FROM works";
        $works = $pdo->prepare($query);
        $works->execute();


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
        <div class="header">
            <p class="text-header">● Hori Kosuke's Portfolio</p>
            <ul>
                <li class="text-header"><a href="#top">Top</a></li>
                <li class="text-header"><a href="#aboutme">About</a></li>
                <li class="text-header"><a href="#skills">Skills</a></li>
                <li class="text-header"><a href="#works">Works</a></li>
                <li class="text-header"><a href="#contacts">Contact</a></li>
            </ul>
            <div class="header-img">
                <div class="header-icon">
                    <a href="https://twitter.com/hori__engi" target="_blank"><img src="./img/twitter-bird-icon.png" width="100%"></a>
                </div>
                <div class="header-icon">
                <a href="https://github.com/mighty74" target="_blank"><img src="./img/github.png" width="100%"></a>
                </div>
            </div>
            <a href="login.php"><p class="header-edit">Edit</p></a>
        </div> 
        <div class="top" id="top">
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

            <div class="aboutme" id="aboutme">
                <div class="title">
                    <p class="text-content">About</p>
                </div>
                <div class="contents">
                    <div class="aboutImg">
                        <img src="./img/about.png" width="80%">
                    </div>
                    <div class="aboutContents">
                        <h1>Hori Kosuke</h1>
                        <h1>(堀 孝輔)</h1>
                        <p>Engineer / Frontend ・ ML</p>
                        <p class="text1">Affiliation</p>
                        <p>・近畿大学理工学部情報学科4年メディアコース</p>
                        <p>・近畿大学コンピュータービジョン研究室</p>
                        <p>・<a href="https://www.kindai-csg.dev/" target="_blank">近畿大学電子計算機研究会</a>元会計管理部門長</p>
                        <p>・<a href="https://act-kithub.github.io/" target="_blank">KINDAI Info-Tech HUB</a> 役員</p>
                        <div class="contentItem">
                            <div class="icon">
                                <img src="img/sozai_cman_jp_20230206194127.png" width=60% alt="位置アイコン" title="位置アイコン">
                            </div>
                            <p class="text2">Osaka</p>
                        </div>
                        <div class="contentItem">
                            <div class="icon">
                                <img src="img/birth.png" width=80% alt="誕生日アイコン" title="誕生日アイコン">
                            </div>
                            <p class="text2">2000/07/04</p>
                        </div>
                    </div>
                </div>

                
            </div>

            <div class="skills" id="skills">
                <div class="title">
                <p class="text-content">Skills</p>
                </div>
                <div class="skill-area">
                        <?php
                            echo '<div class="label-area">';
                            for($i=0; $i < $skill_num["COUNT(*)"]; $i++){
                                $num = $i+1;
                                if($num == 1){
                                    echo '<input type="radio" name="tab-radio" class="tab-radio" id="tab' . $num . '" checked>';
                                }
                                else{
                                    echo '<input type="radio" name="tab-radio" class="tab-radio" id="tab' . $num . '">';
                                }
                            }
                            foreach ($skills as $row){
                                $skill_name[] = $row['skill_name'];
                                echo '<div class="skill" id="skill' . $row['skill_id'] . '">';
                                    echo '<p class="skill-type">' . $row['skill_type'] . '</p>';
                                    echo '<img src="' . $row['skill_img_path'] . '" width=20% alt="' . $row['skill_name'] . '" title="' . $row['skill_name'] . '">';
                                    echo '<p class="skill-name">' . $row['skill_name'] . '</p>';
                                    echo '<p class="level">level:</p>';
                                    echo '<progress max="100" value="' . $row['skill_level'] . '"></progress>';
                                    echo '<p class="skill-content">' . $row['skill_content'] . '</p>';
                                    echo '<style type="text/css">';
                                        echo '#tab' . $row['skill_id'] . ':checked ~ #skill' . $row['skill_id'] . '{display: block;}';
                                        echo '#tab' . $row['skill_id'] . ':checked ~ #tabMenu' . $row['skill_id'] . '{background-color: #FFFFFF;}';
                                    echo '</style>';
                                echo '</div>';
                            }
                            for ($i=0; $i < count($skill_name); $i++){
                                $k = $i+1;
                                echo '<label for="tab' . $k . '" class="tab-menu" id="tabMenu' . $k . '">' . $skill_name[$i] . '</label>';
                            }
                            echo '</div>';
                        ?>
                </div>
                
            </div>

            <div class="works" id="works">
                <div class="title">
                <p class="text-content">Works</p>
                </div>
                <div class="works-area">
                    <?php
                        foreach ($works as $row){
                            echo '<div class="work">';
                                echo '<p class="work-left">[</p>';
                                echo '<div class="work-img">';
                                    echo '<img src="' . $row['work_img_path'] . '" width="100%">';
                                    echo '<form method=get action="detail.php">';
                                        echo '<div class="submit-box">';
                                            echo '<input type="hidden" name="work_id" value=' . $row['work_id'] . '>';
                                            echo '<input type="submit" value="詳細へ" class="detail-btn">';
                                        echo '</div>';
                                    echo '</form>';
                                    echo '<p class="work-name">' . $row['work_name'] . '</p>';
                                echo '</div>';
                                echo '<p class="work-right">]</p>';
                            echo '</div>';
                        }
                    ?>
                </div>
                
            </div>

            <div class="contacts" id="contacts">
                <div class="title">
                <p class="text-content">Contact</p>
                </div>
                <div class="contact-area">
                    
                </div>
                
            </div>
        </div>

    </body>

    
</html>