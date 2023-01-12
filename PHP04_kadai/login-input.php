<?php require '../PHP04_kadai/header.php';?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>監督ログイン画面</title>
    <!-- <style>
        *{
            outline: 1px solid #FF0000;
        }
    </style> -->
    <link rel="stylesheet" href="../PHP04_kadai/style0.css">
</head>

<body>

<h1 class="hero index">バスケットは、お好きですか？</h1>

    <main>
    <p>インターハイ、国体で優勝できるチームを。あなたの戦略を実現できる、最高のメンバーを揃えましょう。<br>
        その第一歩は、選手層の厚いチームづくりから。
        </p>

    <h2>お知らせ</h2>
        <ul>
            <li>健全かつ公平な試合運営のため<strong>レギュラー5人の合計身長は1,000㎝</strong>以内です</li>
            <li>中学MVPシューターの三井寿君(身長184センチ)が入部しました</li>
            <li>相田彦一君（身長167センチ）が転入しました</li>
            <li>八村塁君(203センチ)が入学しました</li>
        </ul>

    <p>ログイン名やパスワードをお忘れの場合は、<br>
            サポートセンター<br>
            <strong>0120-999-11111（土日祝を除く10:00-18:00）</strong><br>へご連絡ください
            </p>

        <form action="login-output.php" method="post">
        ログイン名<input type="text" name="login"><br>
        パスワード<input type="password" name="password"><br>
        <input type="submit" value="ログイン">
        </form>
    </main>

<?php
require '../PHP04_kadai/footer.php';?>
