<?php

session_start();

$home = $_POST["home"];
$target_point = $_SESSION["point"];

$exam_count = 0;

if (!empty($home)) {
    header("location: main.php");
    exit();
}


function question($num,$choice){
    $point = 0;
    for($i = 1; $i <= $num; $i++){
        if(rand(1,$choice) == 1){
            $point = $point + 1;
        }
    }
    return $point;
}


//スコアレンジ
$listening_score = [5, rand(5, 20), rand(15, 40), rand(20, 55), rand(35, 70), rand(50, 90), rand(70, 105), rand(85, 130),
rand(110, 155), rand(135, 180), rand(160, 210), rand(190, 235), rand(215, 260), rand(240, 285), rand(265, 315), rand(295, 340), rand(325, 375),
rand(355, 415), rand(395, 450), rand(435, 490), rand(480, 495)];

$reading_score = [5, rand(5, 20), rand(15, 35), rand(20, 50), rand(30, 65), rand(40, 80), rand(55, 100), rand(75, 120),
rand(100, 140), rand(120, 170), rand(150, 195), rand(175, 225), rand(205, 255), rand(235, 285), rand(265, 315), rand(295, 345), rand(325, 375),
rand(355, 400), rand(380, 430), rand(410, 475), rand(460, 495)];



while($target_point > $max_score) {

    $listening_point = 0;
    $reading_point = 0;
    $total_listening_point = 0;
    $total_reading_point = 0;

    //リスニングpart1(写真描写問題) 6問 4択
    $listening_point = $listening_point + question(6,4);

    //リスニングpart2(応答問題) 25問 3択
    $listening_point = $listening_point + question(25,3);

    //リスニングpart3(会話問題) 39問 4択
    $listening_point = $listening_point + question(39,4);

    //リスニングpart4(説明文問題) 30問 4択
    $listening_point = $listening_point + question(30,4);


    //リーディングpart5(短文穴埋め問題) 30問 4択
    $reading_point = $reading_point + question(30,4);
    //リーディングpart6(長文穴埋め問題) 16問 4択
    $reading_point = $reading_point + question(16,4);
    //リーディングpart7(長文読解問題) 54問 4択
    $reading_point = $reading_point + question(54,4);


    for($j = 0; $j <= 4; $j++){
        if(($listening_point + $j) % 5 == 0){
            $listening_point = $listening_point + $j;
            break;
        }
    }
    $listening_list_num = $listening_point / 5;

    for($j = 0; $j <= 4; $j++){
        if(($reading_point + $j) % 5 == 0){
            $reading_point = $reading_point + $j;
            break;
        }
    }
    $reading_list_num = $reading_point / 5;


    $total_listening_point = $listening_score[$listening_list_num];
    $total_reading_point = $reading_score[$reading_list_num];
    $total_point = $total_listening_point + $total_reading_point;

    if($total_point >$max_score){
        $max_score = $total_point;
    }

    $exam_count++;

    if($exam_count >= 100000){

        break;
    }
}

?>






<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="toeic.css">
        <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru" rel="stylesheet">
        </head>
    <body>
        <form action="target.php" method="post">
            <a href="top.php">
                <header>
                    <p>TOEIC Simulator</p>
                </header>
            </a>
            <div class="main">
                <h3>目標点:<?php echo $target_point; ?>点</h3>
                <?php if($exam_count < 100000): ?>
                <p>受験回数<?php echo $exam_count; ?>回目で目標点達成!!</p>
                <?php else: ?>
                <p>100000回受験してもダメでした(泣)</p>
                <?php endif ?>
                
                <input type="submit" name="re_exam" value="再受験">
                <input type="submit" name="home" value="コース選択">
                <div class="koukoku">
                    <P>空きスペース</P>
                </div>
            </div>
            <footer>
                <p>© 2019  TOEIC Simulator</p>
            </footer>
        </form>
    </body>
</html>