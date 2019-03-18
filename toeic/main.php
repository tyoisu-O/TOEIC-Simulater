<?php

$once = $_POST["start_once"];
$number = $_POST["start_number"];
$target = $_POST["start_target"];

if (!empty($once)) {
    header("location: once.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="toeic.css">
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <form action="main.php" method="post">
        <header>
            <p>TOEIC Simulator</p>
        </header>
        <div class="main">
            <div class="once">
                <h2>一回受験</h2>
                <p>通常と同じく、一度受験をします。制限時間は2時間ですが、あなたは一瞬で200問を解くことができる素晴らしいコースです。</p>
                <input type="submit" name="start_once" value="開始">
            </div>
            <div class="number">
                <h2>受験回数指定</h2>
                <p>何回も試験を受けたい人におすすめなコース。試行した全てのテストの中から最高点と最低点がわかります。</p>
                <input type="text" name="exam_number" placeholder="回数">
                <input type="submit" name=start_number value="開始">
            </div>
            <div class="target">
                <h2>目標点固定</h2>
                <p>TOEICで獲得したい得点がわかっている人に向いているコース。その点数をたたき出す為に必要な受講回数がわかります。</p>
                <input type="text" name="exam_target" placeholder="10〜990(点数)">
                <input type="submit" name="start_target" value="開始">
            </div>
        </div>
        <footer>
            <p>© 2019  TOEIC Simulator</p>
        </footer>
    </form>
</body>
</html>
