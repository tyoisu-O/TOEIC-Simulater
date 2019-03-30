<?php

session_start();

$once = $_POST["start_once"];
$number = $_POST["start_number"];
$target = $_POST["start_target"];
$_SESSION["nums"] = $_POST["exam_number"];
$_SESSION["point"] = $_POST["exam_target"];

if (!empty($once)) {
    header("location: once.php");
    exit();
}

if (!empty($number) && !empty($_POST["exam_number"])){
    header("location: number.php");
    exit();
}

if (!empty($target) && !empty($_POST["exam_target"])){
    header("location: target.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="toeic.css">
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kosugi+Maru" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <form action="main.php" method="post">
        <a href="top.php">
            <header>
                <p>TOEIC Simulator</p>
            </header>
        </a>
        <div class="background">
            <div class="container-fluid">
                <div class="row">
                    <div class="main">
                        <div class="exam_method">
                            <div class="once col-3">
                                <h2>一回受験</h2>
                                <p>通常と同じく、一度受験をします。制限時間は2時間ですが、あなたは一瞬で200問を解くことができる素晴らしいコースです。</p>
                                <input type="submit" name="start_once" value="開始">
                            </div>
                            <div class="number col-3">
                                <h2>受験回数指定</h2>
                                <p>何回も試験を受けたい人におすすめなコース。試行した全ての試験の中から最高点と最低点がわかります。</p>
                                <input type="text" name="exam_number" placeholder="回数">
                                <input type="submit" name=start_number value="開始">
                            </div>
                            <div class="target col-3">
                                <h2>目標点固定</h2>
                                <p>TOEICで獲得したい得点がわかっている人に向いているコース。その点数をたたき出す為に必要な受講回数がわかります。</p>
                                <input type="text" name="exam_target" placeholder="10〜990(点数)">
                                <input type="submit" name="start_target" value="開始">
                            </div>
                        </div>
                        <br>
                        <div class="attention">
                            <p>※このTOEICシュミレーターは正確な得点を表示することはできません。TOEIC公式のスコアレンジに基づき、計算をしています。<br>また過度な回数、目標点は処理落ちの原因になりますのでご注意ください。</p>
                        </div>
                        <div class="koukoku">
                            <P>空きスペース</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <p>© 2019  TOEIC Simulator</p>
        </footer>
    </form>
</body>
</html>
