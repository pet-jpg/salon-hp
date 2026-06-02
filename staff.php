<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>セラピスト紹介 | 大阪のプライベートサロン SALON DE REPOS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="logo"><a href="index.php" style="color: inherit; text-decoration: none;">SALON DE REPOS</a></div>
    </header>

    <button class="menu-btn" id="menuBtn">
        <span></span><span></span><span></span>
    </button>

    <nav class="nav-menu" id="navMenu">
        <ul>
            <li><a href="index.php">ホーム</a></li>
            <li><a href="staff.php" class="active">スタッフ紹介</a></li>
            <li><a href="index.php#info">営業時間・アクセス</a></li>
            <li><a href="admin.php" style="color: #a89480;">管理画面</a></li>
        </ul>
    </nav>

    <main style="padding-top: 100px;">
        <section class="page-section">
            <h2>STAFF INTRODUCTION</h2>
            <p style="text-align: center; margin-bottom: 40px;">当サロンのセラピストをご紹介します。</p>
            
            <div class="staff-large-card">
                <img src="https://picsum.photos/400/400?random=50" alt="セラピスト" class="staff-large-img">
                <div class="staff-large-info">
                    <h3>名無しのごんべい</h3>
                    <p class="subtitle">オーナーセラピスト / 歴10年</p>
                    <hr>
                    <p>お客様一人ひとりの体調や気分に寄り添った丁寧な施術を心がけています。高価格帯のサロンやスパでの経験を活かし、日常を忘れて心からリフレッシュしていただけるよう、特別な時間をおもてなしいたします。</p>
                    <p>趣味：旅行、アロマ集め、ハーブティー</p>
                </div>
            </div>
        </section>
    </main>

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