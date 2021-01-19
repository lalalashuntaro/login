<?php 
require_once("db.php");
session_start();

// セキュリティー
if(!isset($_SESSION['join'])) {
    header('Location: login.php');
    exit();
}

// DB登録
if(!empty($_POST['check'])) {
    $hash = password_hash($_SESSION['join']['password'] , PASSWORD_BCRYPT);

    $statement = $db->prepare("INSERT INTO members SET name=?, email=?, password=?");
    $statement->execute(array
    ($_SESSION['join']['name'], $_SESSION['join']['email'], $hash ));

    unset($_SESSION['join']);
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>name</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
    <header>
        <h1>入力情報の確認</h1>
        <div class="header-right">
            <a href="question.php">良くある質問・お問合せ</a>
        </div>
        <div class="back">
            トップページへ >> 新規入会のご案内 >> 新規入会登録 >> 入力情報の確認
        </div>
    </header>
    <main>
        <div class="main-wrapper"><h1>sample</h1></div>

        <div class="main-login">
            <form action="" method="POST">
                <input type="hidden" name="check" value="checked">
                <h1>入力情報の確認</h1>
                <p>ご入力情報に変更が必要な場合、下のボタンを押し、変更を行ってください。</p>
                <p>登録情報はあとから変更することもできます。</p>
                <?php if (!empty($error) && $error === "error" ): ?>
                    <p class="error">＊会員登録に失敗しました。</p>
                <?php endif ?>

                <div class="confirmation">
                    <p>ユーザー名 >> <?= h($_SESSION['join']['name']); ?> </p>
                </div>

                <div class="confirmation">
                    <p>メールアドレス >> <?= h($_SESSION['join']['email']); ?> </p>
                </div>

                <button class="next-button" type="submit">登録する</button>
                
            </form>
                    <button class="back-button">
                        <a href="new.php">変更する</a>
                    </button>
        </div>
    </main>
    <footer>
        <div class="footer-logo">
            <p>@lalala_shuntaro</p>
        </div>
    </footer>
</body>
</html>