<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/data/css/styles.css">
    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
    <title>SignUp</title>
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

            </div>
            <hr>
            <div class="set_form">
                <form action="/changePassword" method="POST">

                    <label>Old Password:</label>
                    <input type="password" name="oldPassword" placeholder="OldPassword" required>

                    <label>New Password:</label>
                    <input type="password" name="newPassword" placeholder="NewPassword" required>

                    <label>Repeat Password:</label>
                    <input type="password" name="repeatedPassword" placeholder="RepeatedPassword" required>
                    
                    <button type="submit" class="form_button">Submit</button>
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