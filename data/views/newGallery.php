<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/data/css/styles.css">
    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
    <title>New Gallery</title>
</head>
<body>
    <div class="container">
        <nav id="nav">
            <button type="button" class="logo-btn" onclick="location.href='/'">
                <img src="img/logo.svg" >
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

            </div>
            <hr>
            <div class="newgal-forms">
                <form action="/createNewGallery" method="POST">

                    <label>Create new gallery:</label>
                    <input type="text" name="galleryName" placeholder="name" required>
                    
                    <button type="submit" class="set-button">Create</button>
                </form>
                <form action="/joinGallery" method="POST">

                    <label>Join gallery:</label>
                    <input type="text" name="code" placeholder="code" required>
                    
                    <button type="submit" class="set-button">Join</button>
                </form>
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
    <script src="/data/js/messDisappear.js"></script>
</body>
</html>