<menu>
    <div id="logo">
        <a href="index.php">
            <img src="uploads/logo_text1.png">
        </a>
    </div>
    <nav>
        <?php
        if ($_SESSION["user"]->getLevel() == 2) {
            echo("
            <div onclick=\"aside_open(this)\" id=\"aside_btn\">
                <i class=\"fa-solid fa-bars\"></i>
            </div>
            ");
        }
        ?>
        <div onclick="profile_dropdown(this)" id="profile_btn" data-open="0">
            <div id="profile_img">
                <img src="uploads/<?php echo(empty($_SESSION["user"]->getPhoto()) ? "default_profile.png" : $_SESSION["user"]->getPhoto());?>" alt="">
            </div>
            <div id="profile_desc">
                <p>Seu perfil</p>
                <div><i class="fa-solid fa-caret-down"></i></div>
            </div>
        </div>
    </nav>
</menu>