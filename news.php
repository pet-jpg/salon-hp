<?php
require 'db.php';

// 絞り込み条件の取得
$month = isset($_GET['month']) ? $_GET['month'] : '';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// 基本のSQL（すべての記事を新しい順に）
$sql = "SELECT * FROM posts WHERE 1=1";
$params = [];

// もし月が選択されていたら絞り込む
if ($month != '') {
    $sql .= " AND DATE_FORMAT(created_at, '%Y-%m') = :month";
    $params['month'] = $month;
}

// もしキーワード（内容）が指定されていたら絞り込む
if ($keyword != '') {
    $sql .= " AND (title LIKE :keyword OR content LIKE :keyword)";
    $params['keyword'] = '%' . $keyword . '%';
}

$sql .= " ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$posts = $stmt->fetchAll();

// サイドバー用の「月別一覧」を自動生成するためのデータ取得
$archive_stmt = $pdo->query("SELECT DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count FROM posts GROUP BY month ORDER BY month DESC");
$archives = $archive_stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お知らせ・ブログ | Luxury Relaxation Salon</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* ブログページ専用の2カラムレイアウト */
        .blog-container { display: flex; gap: 40px; max-width: 1000px; margin: 0 auto; padding: 40px 20px; }
        .blog-main { flex: 3; }
        .blog-sidebar { flex: 1; background: #fff; padding: 20px; border-radius: 4px; height: fit-content; box-shadow:0 4px 10px rgba(0,0,0,0.02); }
        .sidebar-title { font-size: 16px; font-weight: bold; border-bottom: 1px solid #a89480; padding-bottom: 5px; margin-bottom: 15px; }
        .sidebar-list { list-style: none; padding:0; margin:0; font-size: 14px; }
        .sidebar-list li { margin-bottom: 10px; }
        .sidebar-list a { color: #4a3b32; text-decoration: none; }
        .sidebar-list a:hover { color: #a89480; }
        .search-box input { width: 100%; padding: 8px; box-sizing: border-box; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .search-box button { width: 100%; padding: 8px; background: #4a3b32; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        @media (max-width: 768px) { .blog-container { flex-direction: column; } }
    </style>
</head>
<body>
    <header>
        <div class="logo"><a href="index.php" style="color: inherit; text-decoration: none;">SALON DE REPOS</a></div>
    </header>

    <button class="menu-btn" id="menuBtn"><span></span><span></span><span></span></button>
    <nav class="nav-menu" id="navMenu">
        <ul>
            <li><a href="index.php">ホーム</a></li>
            <li><a href="room-premium.php">プレミアム個室</a></li>
            <li><a href="room-counseling.php">カウンセリング</a></li>
            <li><a href="staff.php">スタッフ紹介</a></li>
            <li><a href="news.php" class="active">お知らせ・ブログ</a></li>
            <li><a href="info.php">営業時間・アクセス</a></li>
            <li><a href="admin.php" style="color: #a89480;">管理画面</a></li>
        </ul>
    </nav>

    <main style="padding-top: 100px;">
        <h2 style="text-align: center;">NEWS & BLOG</h2>
        
        <div class="blog-container">
            <div class="blog-main">
                <?php if ($month || $keyword): ?>
                    <p style="background: #eebd9033; padding: 10px; border-radius:4px;">🔍 絞り込み中：<a href="news.php" style="color:#4a3b32;">[条件をクリアしてすべて見る]</a></p>
                <?php endif; ?>

                <div class="blog-list" style="grid-template-columns: 1fr;">
                    <?php if (empty($posts)): ?>
                        <p>該当する記事が見つかりませんでした。</p>
                    <?php else: ?>
                        <?php foreach ($posts as $post): ?>
                            <div class="blog-card" style="display: flex; margin-bottom: 20px;">
                                <img src="https://picsum.photos/300/200?random=<?php echo $post['id']; ?>" style="width: 200px; height: 150px; object-fit: cover;">
                                <div class="blog-content" style="flex: 1;">
                                    <div class="blog-date"><?php echo date('Y.m.d', strtotime($post['created_at'])); ?></div>
                                    <div class="blog-title" style="font-size: 18px; margin-bottom: 10px;"><?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                                    <p style="font-size: 14px; color:#666; margin:0;"><?php echo mb_strimwidth(strip_tags($post['content']), 0, 140, "..."); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="blog-sidebar">
                <div class="sidebar-title">内容で検索</div>
                <form action="news.php" method="GET" class="search-box">
                    <input type="text" name="keyword" placeholder="キーワードを入力" value="<?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?>">
                    <button type="submit">検索する</button>
                </form>
                <br>
                <div class="sidebar-title">月別アーカイブ</div>
                <ul class="sidebar-list">
                    <?php foreach ($archives as $arch): ?>
                        <li><a href="news.php?month=<?php echo $arch['month']; ?>"><?php echo date('Y年m月', strtotime($arch['month'] . '-01')); ?> (<?php echo $arch['count']; ?>)</a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </main>

    <footer><p>&copy; 2026 SALON DE REPOS. All Rights Reserved.</p></footer>
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const navMenu = document.getElementById('navMenu');
        menuBtn.addEventListener('click', () => { menuBtn.classList.toggle('open'); navMenu.classList.toggle('open'); });
    </script>
</body>
</html>