<?php
require 'db.php';

// 送信ボタンが押された時の処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if ($title != '' && $content != '') {
        $stmt = $pdo->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
        $stmt->execute(['title' => $title, 'content' => $content]);
        echo "<p style='color:green;'>記事を投稿しました！</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>CMS管理画面</title>
</head>
<body>
    <h1>記事の新規投稿</h1>
    <form action="admin.php" method="POST">
        <label>タイトル：</label><br>
        <input type="text" name="title" style="width:300px;"><br><br>
        
        <label>本文：</label><br>
        <textarea name="content" rows="8" style="width:300px;"></textarea><br><br>
        
        <input type="submit" value="投稿する">
    </form>
    <br>
    <a href="index.php">閲覧画面へ</a>
</body>
</html>