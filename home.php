<?php 
require_once("db.php");
session_start();

if(!isset($_SESSION['keep'])) {
    header('Location: login.php');
    exit();
}

if(!empty($_POST['out'])) {
    unset($_SESSION['keep']);
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sample</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
    <header>
        <h1>お客様画面</h1>
        <div class="header-right">
            <a href="question.php">良くある質問・お問合せ</a>
        </div>
        <div class="menu">
            <div class="username">
                <p><?php echo $_SESSION['keep']['name'] ?>さん　こんにちは😅</p>
            </div>
            <form action="" method="post">
                <div class="out">
                    <input style="width: 120px;" type="submit" name="out" value="ログアウト" >
                </div>
            </form>
        </div>
    </header>
    <main>
        <div class="main-wrapper"><h1>sample</h1></div>
        <div class="">
        </div>
    </main>

    <footer>
        <div class="footer-name">
            <p>@lalala_shuntaro</p>     
        </div>
    </footer>
</body>
</html>