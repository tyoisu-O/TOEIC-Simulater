<?php

$examination = $_POST["examination"];

if (!empty($examination)) {
    header("location: main.php");
    exit();
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
        <form action="top.php" method="post">
            <header>
                <p>TOEIC Simulator</p>
            </header>
            <div class="main">
                <h1>TOEIC シュミレーターとは...</h1>
                <p>リスニング100問とリーディング100問の計200問で構成されている990点満点の英語でのコミュニケーション力を判定するための世界共通のテストである。<br>
                TOEICでは、選択問題を採用しているため、全く勉強しなくても良い点数を取ることは可能である。可能性を感じて欲しい。</p>
                <input type="submit" name="examination" value="受験">
            </div>
            <footer>
                <p>© 2019  TOEIC Simulator</p>
            </footer>
        </form>
    </body>
</html>

