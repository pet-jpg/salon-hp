<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>営業時間・アクセス | 大阪のプライベートサロン SALON DE REPOS</title>
    <meta name="description" content="SALON DE REPOSの営業時間・アクセス詳細です。大阪市中央区（〇〇駅 徒歩3分）にある完全個室のリラクゼーションサロン。詳しい地図もこちらからご確認いただけます。">
    <link rel="stylesheet" href="style.css">
    <style>
        /* 地図をスマホでも綺麗に四角く表示させるための設定 */
        .map-container {
            width: 100%;
            position: relative;
            padding-top: 56.25%; /* 16:9の比率でスマホでも潰れないようにする */
            margin-top: 10px;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100% !important;
            height: 100% !important;
            border: 0;
        }
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
            <li><a href="news.php">お知らせ・ブログ</a></li>
            <li><a href="info.php" class="active">営業時間・アクセス</a></li>
            <li><a href="admin.php" style="color: #a89480;">管理画面</a></li>
        </ul>
    </nav>

    <main style="padding-top: 100px;">
        <section class="page-section">
            <h2>INFORMATION</h2>
            <p style="text-align: center; margin-bottom: 40px;">サロンの営業時間・アクセス詳細です。</p>
            
            <table class="info-table">
                <tr><th>サロン名</th><td>SALON DE REPOS（サロンドルポ）</td></tr>
                <tr><th>営業時間</th><td>10:00 〜 21:00（最終受付 20:00）</td></tr>
                <tr><th>定休日</th><td>毎週水曜日 / 第2・第4火曜日</td></tr>
                <tr>
                    <th>アクセス</th>
                    <td>
                        大阪府大阪市中央区（〇〇駅 徒歩3分）<br>
                        <small style="color: #666;">※プライベートサロンのため、詳細な部屋番号などはご予約時にお伝えします。</small>
                        
                        <!-- ▼ Googleマップ表示エリア ▼ -->
                        <div class="map-container">
                            <!-- ★ここにGoogleマップでコピーしたHTMLを丸ごと貼り付ける★ -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.368361738734!2d135.500057!3d34.671545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e7144e59074d%3A0x6bda19a933f20d0e!2z5b-D5pa55qmL6aeF!5e0!3m2!1sja!2sjp!4v1717320000000!5m2!1sja!2sjp" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <!-- ▲ Googleマップ表示エリア ▲ -->
                    </td>
                </tr>
            </table>
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