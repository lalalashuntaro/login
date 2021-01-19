<?php 
    try {
        $db = new PDO('mysql:dbname=Fan Club; host=127.0.0.1;port=8889 charset=utf8mb4', 'root', 'root',);
    }   catch (PDOException $e) {
        echo "データベース接続エラー　：".$e->getMessage();
    }

    function h($s) {
        return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
    }

?>