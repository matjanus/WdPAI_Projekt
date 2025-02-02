<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/data/css/styles.css">
    <script src="https://kit.fontawesome.com/8fd9367667.js" crossorigin="anonymous"></script>
    <title>Galleries</title>
</head>
<body>
    <div class="container">
    <button class="nav-toggle" onclick="toggleNav()">
        &#9776;
    </button>
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
                <form action="/uploadImage" method="POST" enctype="multipart/form-data" class="search-form">
                    <input  type="file" name="image" id="image" accept="image/*" required>
                    <input type="hidden" name="id_gallery" value="<?php echo htmlspecialchars($id_gallery); ?>">
                    <button class="set-button" type="submit">Send</button>
                </form>
                <button class="top-bar-button" id="show_code_button" onclick="showCode('<?php echo $invite_code ?>')">
                    Show code
                </button>
            </div>
            <hr>
            <div class="gallery-div">
                <?php if (!empty($images)): ?>
                    <?php foreach($images as $image): ?>

                        <div class='image-div'>
                            <img src="<?php echo $image->getFilePath(); ?>" class="gallery-image"
                                onclick="showImage('<?php echo $image->getFilePath(); ?>', '<?php echo $image->getId(); ?>')">
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </main>
        <div id="imageModal" class="modal" onclick="closeImage()">
            <img id="fullImage" class="modal-content" src="" alt="">
            <form id="coverForm" action="/setGalleryCover" method="POST" class="cover-form">
                <input type="hidden" name="id_gallery" value="<?php echo $id_gallery; ?>">
                <input type="hidden" name="id_image" id="coverImageId" value="">
                <button type="submit" class="modal-button">Set as cover</button>
            </form>
        </div>
    </div>
    <?php if (!empty($message)): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <script src="/data/js/toggleNav.js"></script>
    <script src="/data/js/messDisappear.js"></script>
    <script src="/data/js/showCode.js"></script>
    <script src="/data/js/images.js"></script>
</body>
</html>