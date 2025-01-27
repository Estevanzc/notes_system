<?php require_once("views/includes/html/head.html");?>
    <link rel="stylesheet" href="views/includes/css/userDetail.css">
</head>
<body onscroll="scroll_event(this)">
    <div id="page_background">
        <?php require_once("views/includes/html/menu.php");?>
        <section id="user_detail">
            <div id="page_title">
                <div>
                    <a href="users.php" id="return_btn">
                        <i class="fa-solid fa-arrow-left"></i>
                        <h3>Voltar</h3>
                    </a>
                </div>
                <h2>Informações da <?php echo($user->getLevel() == $_SESSION["user"]->getLevel() ? "sua " : "");?>conta</h2>
                <div></div>
            </div>
            <main>
                <div id="user_account">
                    <div id="personal_data">
                        <div><img id="account_img" src="uploads/estevan.png" alt=""></div>
                        <div>
                            <div>
                                <h4 id="account_name"><?php echo($user->getName())?></h4>
                                <p id="account_login"><?php echo($user->getLogin())?></p>
                            </div>
                            <p id="account_level"><strong>Nível de Acesso:</strong> <?php echo(["Cliente", "Administrador"][$user->getLevel()-1])?></p>
                        </div>
                    </div>
                    <div id="account_data">
                        <p id="account_date"><?php
                        $month_name = ["jan","fev","mar","abr","mai","jun","jul","ago","set","oct","nov","dec"][((int) substr($user->getEntry_date(), 5, 2))-1];
                        echo("Desde ".((int)substr($user->getEntry_date(), 8, 2)).", $month_name de ".substr($user->getEntry_date(), 0, 4));
                        ?></p>
                    </div>
                    <div id="description">
                        <?php echo(str_replace(' ', '', $user->getDescription()) == "" || empty($user->getDescription()) ? "" : "<p><strong>Sobre:</strong></p><p>".$user->getDescription()."</p>")?>
                    </div>
                    <div id="account_navigate">
                        <a href="userForm.php?id=<?php echo($user->getId())?>" id="edit_btn">
                            <i class="fa-solid fa-pen"></i>
                            <p>Editar dados</p>
                        </a>
                        <div id="delete_btn" onclick="open_delete(this)">
                            <i class="fa-solid fa-trash"></i>
                            <p>Deletar conta</p>
                        </div>
                    </div>
                </div>
            </main>
        </section>
    </div>
    <section id="delete_screen">
        <div>
            <p>Deseja deletar esta conta ?</p>
        </div>
        <div id="screen_navigate">
            <div id="cancel_btn" onclick="open_delete(this)">Cancelar</div>
            <a href="userDelete.php?id=<?php echo($user->getId())?>" id="confirm_btn">Confirmar</a>
        </div>
    </section>
    <?php require_once("views/includes/html/footer.html");?>
    <?php
    if ($_SESSION["user"]->getLevel() == 2) {
        require_once("views/includes/html/aside.html");
    }
    ?>
    <?php require_once("views/includes/html/profile_dropdown.php");?>
    <script src="views/includes/js/userDetail.js"></script>
    <script src="views/includes/js/menu.js"></script>
    <script src="views/includes/js/scroll_event.js"></script>
</body>
</html>