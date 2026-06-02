<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カウンセリングスペース | Luxury Relaxation Salon</title>
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
            <li><a href="room-premium.php">プレミアム個室</a></li>
            <li><a href="room-counseling.php" class="active">カウンセリング</a></li>
            <li><a href="staff.php">スタッフ紹介</a></li>
            <li><a href="news.php">お知らせ・ブログ</a></li>
            <li><a href="info.php">営業時間・アクセス</a></li>
            <li><a href="admin.php" style="color: #a89480;">管理画面</a></li>
        </ul>
    </nav>

    <main style="padding-top: 100px;">
        <section class="page-section">
            <h2>COUNSELING SPACE</h2>
            <p style="text-align: center;">施術の前後に、温かいハーブティーを飲みながらゆったりとお話を伺うスペースです。</p>
            
            <div class="grid-2" style="margin-top: 40px;">
                <div class="room-card"><img src="https://picsum.photos/600/400?random=31" class="room-img"><div class="room-info"><h3>お部屋の様子</h3><p>明るく清潔感のある、話しやすい空間です。</p></div></div>
                <div class="room-card"><img src="https://picsum.photos/600/400?random=32" class="room-img"><div class="room-info"><h3>カウンセリングの様子</h3><p>お体の状態やお好みの強さを事前にお伺いします。</p></div></div>
            </div>

            <div style="background-color: #fff; padding: 40px; margin-top: 40px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.02); text-align: center;">
                <h3 style="color: #a89480; margin-top:0;">どんな小さなお悩みでも、どんどんご相談ください</h3>
                <p style="text-align: left; max-width: 600px; margin: 0 auto; font-size: 15px;">
                    「最近寝つきが悪い…」「慢性的な肩こりをどうにかしたい…」「自分へのちょっとしたご褒美に癒されたい」など、どのような動機やお悩みでも大歓迎です。<br><br>当サロンは完全プライベート空間ですので、他のお客様に会話を聞かれる心配もありません。セラピストがマンツーマンであなたに最適なメニューをご提案しますので、どうぞ安心してお気軽にお話しくださいね。
                </p>
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