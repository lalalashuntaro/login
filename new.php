<?php 
require_once("db.php");
session_start();

// 空欄エラー
if(!empty($_POST)) {
    if($_POST['name'] === "") {
        $error['name'] = "mis";
    }
    if($_POST['email'] === "") {
        $error['email'] = "mis";
    }
    if($_POST['password'] === "") {
        $error['password'] = "mis";
    }

// mail重複確認
    if(!isset($error)) {
        $member = $db->prepare('SELECT COUNT(*) as cnt FROM members WHERE email=?');
        $member->execute(array($_POST['email']));
        $record = $member->fetch();
        if($record['cnt'] > 0){
            $error['email'] = 'no';
        }
    }

    if(!isset($error)) {
        $_SESSION['join'] = $_POST;
        header('Location: check.php'); 
        exit();
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
</head>
<body>
    <header>
        <h1>新規入会</h1>
        <div class="header-right">
            <a href="question.php">良くある質問・お問合せ</a>
        </div>
        <div class="back">
            <a href="login.php">トップページへ</a> >>
            <a href="terms.php">新規入会のご案内</a> >> 新規入会登録
        </div>
    </header>
    <main>
        <div class="main-wrapper"><h1>sample</h1></div>

        <div class="main-login">
            <form action="" method="POST">
                <h1>新規会員登録</h1>
                <p>次のフォームに必要事項をご記入ください。</p>
                <div class="control">
                    <input type="text" placeholder="ユーザー名" name="name" value=<?= h($_POST['name']) ?> >
                    <?php if(!empty($error['name']) && $error['name'] === 'mis' ): ?>
                        <p class="error">*ユーザー名を入力してください</p>
                    <?php endif ?>
                </div>

                <div class="control">
                    <input type="email" placeholder="メールアドレス" name="email" value=<?= h($_POST['email']) ?> >
                    <?php if(!empty($error['email']) && $error['email'] === 'mis' ):?>
                        <p class="error">*メールアドレスを入力してください</p>
                    <?php elseif(!empty($error['email']) && $error['email'] === 'no' ): ?>
                        <p class="error">*メールアドレスが重複しています。</p>
                    <?php endif ?>
                </div>

                <div class="control">
                    <input type="password" placeholder="パスワード" name="password" value=<?= h($_POST['password']) ?> >
                    <?php if(!empty($error['password']) && $error['password'] === 'mis' ): ?>
                        <p class="error">*パスワードを入力してください</p>
                    <?php endif ?>

                </div>

                <div class="login-control">
                    <button type="submit" style="height: 40px;">確認する</button>
                </div>

            </form>
        </div>
    </main>
    <footer>
        <div class="footer-name">
            <p>@lalala_shuntaro</p>
        </div>
    </footer>
</body>
</html>