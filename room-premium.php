<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>プレミアム個室 | Luxury Relaxation Salon</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo"><a href="index.php" style="color: inherit; text-decoration: none;">SALON DE REPOS</a></div>
    </header>

    <button class="menu-btn" id="menuBtn"><span></span><span></span><span></span></button>
    <nav class="nav-menu" id="navMenu">
        <ul>
            <li><a href="index.php">ホーム</a></li>
            <li><a href="room-premium.php" class="active">プレミアム個室</a></li>
            <li><a href="room-counseling.php">カウンセリング</a></li>
            <li><a href="staff.php">スタッフ紹介</a></li>
            <li><a href="news.php">お知らせ・ブログ</a></li>
            <li><a href="info.php">営業時間・アクセス</a></li>
            <li><a href="admin.php" style="color: #a89480;">管理画面</a></li>
        </ul>
    </nav>

    <main style="padding-top: 100px;">
        <section class="page-section">
            <h2>PREMIUM ROOM</h2>
            <p style="text-align: center;">完全防音の贅沢なプライベート空間。周りの目を気にせず極上のリラックスタイムをお楽しみいただけます。</p>
            
            <h3 style="text-align:center; margin-top:40px;">【お部屋の雰囲気】</h3>
            <div class="grid-2" style="margin-bottom: 40px;">
                <div class="room-card"><img src="https://picsum.photos/600/400?random=21" class="room-img"><div class="room-info"><p>間接照明が心地よい落ち着いた空間</p></div></div>
                <div class="room-card"><img src="https://picsum.photos/600/400?random=22" class="room-img"><div class="room-info"><p>最高級のベッドをご用意しております</p></div></div>
            </div>

            <h3 style="text-align:center;">【施術イメージ】</h3>
            <div style="max-width: 600px; margin: 0 auto;" class="room-card">
                <img src="https://picsum.photos/600/400?random=23" class="room-img">
                <div class="room-info"><p>一人ひとりの筋肉のコリを丁寧にほぐします</p></div>
            </div>
        </section>
    </main>

    <footer><p>&copy; 2026 SALON DE REPOS. All Rights Reserved.</p></footer>
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const navMenu = document.getElementById('navMenu');
        menuBtn.addEventListener('click', () => { menuBtn.classList.toggle('open'); navMenu.classList.toggle('open'); });
    </script>
</body>
</html>