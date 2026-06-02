<?php
require 'db.php';

// データベースから新着のお知らせ（ブログ）を3件だけ取得
$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 3");
$posts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>大阪市中央区の完全個室リラクゼーションサロン | SALON DE REPOS</title>
    <meta name="description" content="大阪市中央区にある完全プライベートなリラクゼーションサロンです。こだわりのアロマと洗練された技術で、極上の癒やしをお届けいたします。日常の忙しさから離れ、あなただけの贅沢なひとときをお過ごしください。">
    <link rel="stylesheet" href="style.css">
    <style>
        /* スムーズスクロールを有効にするおまじない */
        html {
            scroll-behavior: smooth;
        }
        /* 全体の初期設定 */
        body {
            font-family: 'Helvetica Neue', Arial, 'Hiragino Kaku Gothic ProN', sans-serif;
            background-color: #faf7f2; /* 落ち着いたアイボリー */
            color: #4a3b32; /* 優しいダークブラウン */
            margin: 0;
            padding: 0;
            line-height: 1.8;
        }
        h2 {
            text-align: center;
            font-size: 28px;
            letter-spacing: 3px;
            margin-bottom: 40px;
            position: relative;
        }
        h2::after {
            content: '';
            display: block;
            width: 50px;
            height: 1px;
            background-color: #a89480;
            margin: 15px auto 0;
        }
        section {
            padding: 80px 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        /* ーーー ヘッダー ーーー */
        header {
            background-color: rgba(255, 255, 255, 0.95);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 70px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
            z-index: 100;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
            padding: 0 20px;
        }
        .logo {
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 2px;
        }
        /* ロゴのリンクを綺麗に見せる設定 */
        .logo a {
            color: inherit;
            text-decoration: none;
            cursor: pointer;
        }

        /* ーーー ハンバーガーメニュー ーーー */
        .menu-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 200;
            width: 30px;
            height: 30px;
            cursor: pointer;
            border: none;
            background: none;
        }
        .menu-btn span {
            display: block;
            position: absolute;
            width: 30px;
            height: 2px;
            background-color: #4a3b32;
            transition: 0.3s;
        }
        .menu-btn span:nth-child(1) { top: 6px; }
        .menu-btn span:nth-child(2) { top: 15px; }
        .menu-btn span:nth-child(3) { top: 24px; }

        .menu-btn.open span:nth-child(1) { transform: translateY(9px) rotate(-45deg); }
        .menu-btn.open span:nth-child(2) { opacity: 0; }
        .menu-btn.open span:nth-child(3) { transform: translateY(-9px) rotate(45deg); }

        .nav-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 300px;
            height: 100vh;
            background-color: rgba(255, 255, 255, 0.98);
            box-shadow: -5px 0 15px rgba(0,0,0,0.05);
            z-index: 150;
            transition: 0.4s ease;
            padding-top: 100px;
        }
        .nav-menu.open {
            right: 0;
        }
        .nav-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .nav-menu li {
            text-align: center;
            margin-bottom: 25px;
        }
        .nav-menu a {
            color: #4a3b32;
            text-decoration: none;
            font-size: 18px;
            letter-spacing: 2px;
            display: block;
            padding: 10px;
            transition: 0.2s;
        }
        .nav-menu a:hover {
            color: #a89480;
        }

        /* ーーー メインビジュアル ーーー */
        .hero {
            margin-top: 70px;
            height: 60vh;
            background-image: url('https://picsum.photos/1200/800?random=99');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .hero::before {
            content: '';
            position: absolute;
            top:0; left:0; width:100%; height:100%;
            background-color: rgba(0,0,0,0.2);
        }
        .hero-title {
            position: relative;
            color: #fff;
            font-size: 32px;
            letter-spacing: 4px;
            text-align: center;
            font-weight: 300;
        }

        /* ーーー サロン紹介 ーーー */
        .about-text {
            text-align: center;
            max-width: 700px;
            margin: 0 auto;
        }

        /* ーーー お部屋紹介 ーーー */
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }
        .room-card {
            background-color: #fff;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.02);
        }
        .room-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }
        .room-info { padding: 20px; text-align: center; }
        .room-info h3 { margin: 0 0 10px 0; font-size: 18px; }

        /* ーーー ブログ・お知らせ ーーー */
        .blog-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }
        .blog-card {
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.02);
            text-decoration: none;
            color: inherit;
        }
        .blog-img { width: 100%; height: 160px; object-fit: cover; }
        .blog-content { padding: 15px; }
        .blog-date { font-size: 11px; color: #999; }
        .blog-title { font-size: 16px; font-weight: bold; margin: 5px 0 0 0; }

        /* ーーー 営業時間・アクセス ーーー */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.02);
        }
        .info-table th, .info-table td {
            padding: 15px 20px;
            border-bottom: 1px solid #f0eadd;
            text-align: left;
        }
        .info-table th { background-color: #f3ede2; width: 30%; }

        footer {
            background-color: #4a3b32;
            color: #fff;
            text-align: center;
            padding: 30px 20px;
            font-size: 12px;
        }
    </style>
</head>
<body id="top"> <!-- 最上部に戻るための目印（id="top"）を追加 -->

    <!-- ヘッダー -->
    <header>
        <!-- ★屋号名を押したら、一番上（#top）へスムーズにスクロールするリンクに修正★ -->
        <div class="logo"><a href="#top">SALON DE REPOS</a></div>
    </header>

    <!-- ハンバーガーメニューボタン -->
    <button class="menu-btn" id="menuBtn">
        <span></span><span></span><span></span>
    </button>

    <!-- スライドメニュー -->
    <nav class="nav-menu" id="navMenu">
        <ul>
            <li><a href="index.php" class="active">ホーム</a></li>
            <li><a href="room-premium.php">プレミアム個室</a></li>
            <li><a href="room-counseling.php">カウンセリング</a></li>
            <li><a href="staff.php">スタッフ紹介</a></li>
            <li><a href="news.php">お知らせ・ブログ</a></li>
            <li><a href="info.php">営業時間・アクセス</a></li>
            <li><a href="admin.php" style="color: #a89480;">管理画面（記事投稿）</a></li>
        </ul>
    </nav>

    <!-- メインビジュアル -->
    <div class="hero">
        <h1 class="hero-title">心と体を癒す、<br>極上のプライベート空間</h1>
    </div>

    <!-- サロン紹介セクション -->
    <section id="about">
        <h2>SALON INTRODUCE</h2>
        <div class="about-text">
            <p>日々の忙しさから離れ、あなただけの特別な時間をお過ごしいただけるリラクゼーションサロンです。</p>
            <p>こだわりのアロマと洗練された技術で、極上の癒やしをお届けいたします。自分へのご褒美に、贅沢なひとときをいかがですか？</p>
        </div>
    </section>

    <!-- お部屋紹介セクション -->
    <section id="rooms" style="background-color: #f3ede2;">
        <h2>ROOMS</h2>
        <div class="grid-2">
            <a href="room-premium.php" style="text-decoration: none; color: inherit;" class="room-card">
                <img src="https://picsum.photos/600/400?random=11" alt="当サロンの完全防音プレミアム個室の様子。間接照明と最高級ベッドを完備。" class="room-img">
                <div class="room-info">
                    <h3>プレミアム個室</h3>
                    <p>完全防音のプライベート空間。周りの目を気にせずリラックスしていただけます。</p>
                    <span style="color: #a89480; font-size:14px;">詳しく見る ➔</span>
                </div>
            </a>
            <a href="room-counseling.php" style="text-decoration: none; color: inherit;" class="room-card">
                <img src="https://picsum.photos/600/400?random=12" alt="ハーブティーを飲みながらゆったりとお話を伺うカウンセリングスペース。" class="room-img">
                <div class="room-info">
                    <h3>カウンセリングスペース</h3>
                    <p>施術の前後に、ハーブティーを飲みながらゆったりとお話を伺います。</p>
                    <span style="color: #a89480; font-size:14px;">詳しく見る ➔</span>
                </div>
            </a>
        </div>
    </section>

    <!-- ブログ・お知らせセクション -->
    <section id="blog">
        <h2>NEWS & BLOG</h2>
        <div class="blog-list">
            <?php if (empty($posts)): ?>
                <p style="text-align: center; grid-column: 1/-1;">まだお知らせはありません。</p>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                    <a href="news.php" class="blog-card">
                        <img src="https://picsum.photos/400/250?random=<?php echo $post['id']; ?>" alt="ブログ画像" class="blog-img">
                        <div class="blog-content">
                            <div class="blog-date"><?php echo date('Y.m.d', strtotime($post['created_at'])); ?></div>
                            <div class="blog-title"><?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div style="text-align: center; margin-top: 40px;">
            <a href="news.php" style="display: inline-block; padding: 12px 30px; background: #4a3b32; color: #fff; text-decoration: none; border-radius: 4px; font-size: 14px;">過去の記事をもっと見る</a>
        </div>
    </section>

    <!-- 営業時間・アクセスセクション -->
    <section id="info" style="background-color: #f3ede2;">
        <h2>INFORMATION</h2>
        <table class="info-table">
            <tr><th>サロン名</th><td>SALON DE REPOS（サロンドルポ）</td></tr>
            <tr><th>営業時間</th><td>10:00 〜 21:00（最終受付 20:00）</td></tr>
            <tr><th>定休日</th><td>毎週水曜日 / 第2・第4火曜日</td></tr>
            <tr><th>アクセス</th><td>大阪府大阪市中央区（〇〇駅 徒歩3分）</td></tr>
        </table>
        <div style="text-align: center; margin-top: 30px;">
            <a href="info.php" style="color: #a89480; text-decoration: none; font-weight: bold;">詳細なマップ・アクセスはこちら ➔</a>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 SALON DE REPOS. All Rights Reserved.</p>
    </footer>

    <script>
        const menuBtn = document.getElementById('menuBtn');
        const navMenu = document.getElementById('navMenu');
        menuBtn.addEventListener('click', () => {
            menuBtn.classList.toggle('open');
            navMenu.classList.toggle('open');
        });
    </script>
</body>
</html>