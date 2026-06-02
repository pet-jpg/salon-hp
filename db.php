<?php
// ▼ 下のシングルクォーテーションの間に、今コピーしたURLをそのまま貼り付けてください！
$url = 'postgresql://petsuto_user:T4kBZYXhfElXKHi8D1dZRz7RHaKf1f9m@dpg-d8f50t42m8qs73dr9i90-a.oregon-postgres.render.com/petsuto
';

// URLを自動で分解して接続するプログラム（ここは触らなくて大丈夫です）
$dbopts = parse_url($url);
$host = $dbopts["host"];
$port = $dbopts["port"];
$user = $dbopts["user"];
$pass = $dbopts["pass"];
$dbname = ltrim($dbopts["path"],'/');

try {
    // ネット上の倉庫（PostgreSQL）に接続します
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("データベース接続失敗: " . $e->getMessage());
}
?>