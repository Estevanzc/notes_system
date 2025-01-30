<?php require_once("views/includes/html/head.html");?>
    <title>Edite a <?php echo($user->getId() == $_SESSION["user"]->getId() ? "sua " : "")?>conta - Notes System</title>
    <link rel="stylesheet" href="views/includes/css/userForm.css">
</head>
<body onscroll="scroll_event(this)">
    <div id="page_background">
        <?php require_once("views/includes/html/menu.php");?>
        <section id="user_detail">
            <div id="page_title">
                <div>
                    <a href="<?php echo($_SESSION["user"]->getLevel() == 2 ? "users" : "index")?>.php" id="return_btn">
                        <i class="fa-solid fa-arrow-left"></i>
                        <h3>Voltar</h3>
                    </a>
                </div>
                <h2>Edite a <?php echo($user->getId() == $_SESSION["user"]->getId() ? "sua " : "")?>conta</h2>
                <div></div>
            </div>
            <main>
                <form id="user_account" action="userSave.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?php echo($user->getId())?>">
                    <input type="hidden" id="entry_date" name="entry_date" value="<?php echo($user->getEntry_date())?>">
                    <input type="hidden" id="change_photo" name="change_photo" value="0">
                    <div id="personal_data">
                        <div>
                            <div class="user_img_side">
                                <input type="file" onchange="del_btn(this, event)" name="photo" id="photo" accept=".png, .jpg, .jpeg">
                            </div>
                            <?php
                            $photo_path = "uploads/". (!empty($user->getPhoto()) ? $user->getPhoto() : "default_profile.png");
                            ?>
                            <div id="user_img" <?php echo("style=\"background-image: url($photo_path);\"")?>>
                                <label for="photo">
                                    <i class="fa-solid fa-camera"></i>
                                    <p>Sua foto de perfil</p>
                                </label>
                            </div>
                            <div class="user_img_side">
                                <div id="photo_remove" onclick="del_profile(this)" <?php echo(!empty($user->getPhoto()) ? "" : "class=\"hidden\"")?>><i class="fa-solid fa-trash"></i></div>
                            </div>
                        </div>
                        <div>
                            <div id="user_data">
                                <div id="account_name">
                                    <label for="name">Seu nome</label>
                                    <input type="text" name="name" id="name" value="<?php echo($user->getName())?>" class="input_verifyer">
                                    <p class="input_err">asdadasads</p>
                                </div>
                                <div id="account_login">
                                    <label for="login">Seu login</label>
                                    <input type="email" name="login" id="login" value="<?php echo($user->getLogin())?>" class="input_verifyer">
                                    <p class="input_err">asdadasads</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="account_data">
                        <p id="account_date">
                        <?php
                        $month_name = ["jan","fev","mar","abr","mai","jun","jul","ago","set","oct","nov","dec"][((int) substr($user->getEntry_date(), 5, 2))-1];
                        echo("Desde ".((int)substr($user->getEntry_date(), 8, 2)).", $month_name de ".substr($user->getEntry_date(), 0, 4));
                        if ($_SESSION["user"]->getLevel() == 2) {
                            echo("
                            <div id=\"user_level\">
                                <label for=\"level\">Nível de Acesso:</label>
                                <select name=\"level\" id=\"level\">
                                    <option value=\"1\" ".($user->getLevel() == 1 ? "selected" : "").">Cliente</option>
                                    <option value=\"2\" ".($user->getLevel() == 2 ? "selected" : "").">Admin</option>
                                </select>
                            </div>
                            ");
                        } else {
                            echo("
                            <p id=\"account_level\"><strong>Nível de Acesso:</strong> Cliente</p>
                            ");
                        }
                        ?>
                        </p>
                    </div>
                    <div id="user_description">
                        <label for="description">Sobre:</label>
                        <textarea name="description" id="description"><?php echo($user->getDescription())?></textarea>
                    </div>
                    <div id="account_navigate">
                        <a href="userData.php?id=<?php echo($user->getId())?>" id="cancel_btn">Cancelar</a>
                        <button type="button" id="confirm_btn" onclick="logon_verifyer()">Salvar</button>
                    </div>
                </form>
            </main>
        </section>
        <?php require_once("views/includes/html/footer.html");?>
    </div>
    <?php
    if ($_SESSION["user"]->getLevel() == 2) {
        require_once("views/includes/html/aside.html");
    }
    ?>
    <?php require_once("views/includes/html/profile_dropdown.php");?>
    <script src="views/includes/js/userForm.js"></script>
    <script src="views/includes/js/menu.js"></script>
    <script src="views/includes/js/scroll_event.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="views/includes/js/form_verifyer.js"></script>
</body>
</html>