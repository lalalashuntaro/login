<?php 
require_once("db.php");
session_start();

// DBと照合（ログイン処理）
if(!empty($_POST)) {
    $query = $db->prepare('SELECT * FROM members');
    $query->execute();
    foreach($query->fetchAll() as $data){
        if(password_verify($_POST['password'], $data['password'] ) && $_POST['email'] === $data['email'] ){
            $_POST = $data;
            $_SESSION['keep'] = $_POST;
            header('Location: home.php');
            exit(); 
        }else{
            $error = "mis";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>イメージ画像</h1>
        <div class="header-right">
            <a href="question.php">良くある質問・お問合せ</a>
        </div>
        <div class="back">
            トップページ
        </div>
    </header>
    <main>
        <div class="main-wrapper"><h1>sample</h1></div>

        <div class="main-login">
            <h1>ログイン（すでに会員の方）</h1>
            
            <form action="" method="post">
                <div class="login-control">
                    <input type="email" placeholder="メールアドレス" name="email" value=<?= h($_POST['email']) ?> >
                </div>

                <div class="login-control">
                    <input type="password" placeholder="パスワード" name="password" value=<?= h($_POST['password']) ?> >
                </div>

                <div>
                    <?php if(!empty($error) && $error === "mis"): ?>
                        <p class="error"><?php echo "＊メールアドレスまたは、パスワードが間違っています" ?></p>
                    <?php endif ?>
                </div>

                <div class="login-control">
                    <button type="submit" style="height: 40px; width: 150px; ">ログイン</button>
                </div>
            </form>

            <div class="new-wrapper">
                <button class="login-button" style="height: 40px;  width: 150px; ">
                    <a href="terms.php">新規入会する</a>
                </button>
            </div>
        </div>

        <div class="sub-wrapper">
            <div class="movie">
                <h1>MOVIE</h1>
            </div>
        </div>

        <div class="sub-wrapper">
            <div class="news">
                <h1>NEWS</h1>
            </div>
        </div>

    </main>

    <footer>
        <div class="footer-logo">
        <ul>
            <li>
            <a href="https://twitter.com/share?">
                <i class="fab fa-twitter-square fa-3x"></i>
            </a>
            </li>

            <li>
            <a href="https://www.facebook.com/share?">
                <i class="fab fa-facebook-square fa-3x"></i>
            </a>
            </li>

            <li>
            <a href="https://line.me/R/msg/text/?">
                <i class="fab fa-line fa-3x"></i>
            </a>
            </li>

            <li>
            <a href="https://www.instagram.com/?hl=ja">
                <i class="fab fa-instagram fa-3x"></i>
            </a>
            </li>
        </ul>
        </div>
        <div class="footer-name">
            <p>@lalala_shuntaro</p>
        </div>
    </footer>
</body>
</html>