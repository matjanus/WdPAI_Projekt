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
        </nav>
        <main>
            <div class="sec_form">
                 <?php if (!empty($message)): ?>
                    <p class="mess"><?php echo htmlspecialchars($message); ?></p>
                <?php endif; ?>
                <form action="/register" method="POST">
                    <img src="/img/logo.svg" class="logo-over-form">
                    <br>
                    <label>Email: 
                    </label>
                    <input type="text" name="email" placeholder="Email" required>

                    <label>Username:
                    </label>
                    <input type="text" name="username" placeholder="Username" required>

                    <label>Password:</label>
                    <input type="password" name="password" placeholder="Password" required>

                    <label>Repeat Password:</label>
                    <input type="password" name="repeatedPassword" placeholder="RepeatedPassword" required>
                    <br>
                    <button type="submit" class="form_button">Sign Up</button>
                </form>
            </div>
        </main>
    </div>
    <?php if (!empty($message)): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <script src="/data/js/messDisappear.js"></script>
</body>
</html>