<?php
// 改行を無くし、1行に綺麗に収めました
$url = 'postgresql://petsuto_user:T4kBZYXhfElXKHi8D1dZRz7RHaKf1f9m@dpg-d8f50t42m8qs73dr9i90-a.oregon-postgres.render.com/petsuto';

// URLを自動で分解して接続するプログラム
$dbopts = parse_url($url);
$host = $dbopts["host"];
$port = isset($dbopts["port"]) ? $dbopts["port"] : 5432; // ポート番号を自動補完
$user = $dbopts["user"];
$pass = $dbopts["pass"];
$dbname = ltrim($dbopts["path"],'/');

try {
    // ネット上の倉庫（PostgreSQL）に接続します
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("データベース接続失敗: " . $e->getMessage());
}
?>