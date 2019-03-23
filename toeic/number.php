<?php

session_start();

$home = $_POST["home"];
$exam_number = $_SESSION["nums"];

$exam_scores = [];

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



for($i = 1; $i <= $exam_number; $i++) {

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
    $exam_scores[] = $total_point;
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
        <form action="number.php" method="post">
            <header>
                <p>TOEIC Simulator</p>
            </header>
            <div class="main">
                <h3>試行回数(<?php echo $exam_number; ?>回)結果</h3>
                <?php foreach($exam_scores as $exam_num => $exam_score) : ?>
                    <p><?php echo $exam_num + 1 ?>回目：<?php echo $exam_score ?>点</p>
                <?php endforeach ?>
                <input type="submit" name="re_exam" value="再受験">
                <input type="submit" name="home" value="コース選択">
            </div>
            <footer>
                <p>© 2019  TOEIC Simulator</p>
            </footer>
        </form>
    </body>
</html>