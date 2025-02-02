<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/data/css/styles.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <nav id="nav">
            <button type="button" class="logo-btn" onclick="location.href='/'">
                <img src="/img/logo.svg" >
            </button>
            <button class="nav_button" onclick="location.href='/'">
                Galleries
            </button>
            <button class="nav_button" onclick="location.href='/accountSettings'">
                Account Settings
            </button>
            <button class="nav_button" onclick="location.href='/logOut'">
                Log Out
            </button>
        </nav>
        <main>
            <div class="top_bar">
                <div class="search-bar-container">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" class="search-bar" placeholder="Search">
                </div>
                
                <button class="top-bar-button" onclick="location.href='/newGallery'">
                    New/Join
                </button>
            </div>
            <hr>
            <div class="gallery-container">
                
            </div>
        </main>
    </div>
    <?php if (!empty($message)): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <button class="nav-toggle" onclick="toggleNav()">
        &#9776;
    </button>
    <script src="/data/js/toggleNav.js"></script>
    <script src="/data/js/hideUnwanted.js"></script>
    <script src="/data/js/messDisappear.js"></script>
    <script src="https://kit.fontawesome.com/c3529cc8c8.js" crossorigin="anonymous"></script>
</body>
</html>