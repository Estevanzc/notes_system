<?php
require_once("views/includes/html/head.html");
$isEmpty = empty($note->getId());
?>
    <title><?php echo($isEmpty ? "Crie" : "Edite")?> sua nota - Notes System</title>
    <link rel="stylesheet" href="views/includes/css/noteForm.css">
</head>
<body onscroll="scroll_event(this)">
    <div id="page_background">
        <?php require_once("views/includes/html/menu.php");?>
        <section id="note_form">
            <div id="page_title">
                <div>
                    <a href="index.php" id="return_btn">
                        <i class="fa-solid fa-arrow-left"></i>
                        <h3>Voltar</h3>
                    </a>
                </div>
                <h2><?php echo($isEmpty ? "Crie" : "Edite")?> sua nota</h2>
                <div></div>
            </div>
            <main>
                <form action="noteSave.php" method="post">
                    <div id="title_input" class="input_subpart">
                        <label for="title">Título</label>
                        <input type="text" id="title" name="title" onblur="title_blur(this)" value="<?php echo($isEmpty ? "Nota[".($notes_num + 1)."]" : $note->getTitle())?>">
                    </div>
                    <div id="description_input" class="input_subpart">
                        <label for="description">Texto da nota</label>
                        <textarea id="description" name="description"><?php echo($note->getDescription())?></textarea>
                    </div>
                    <div id="note_date" class="input_subpart">
                        <div>
                            <?php
                            $remind_date = $note->getRemind_date();
                            $noteEmpty = !empty($remind_date) && $remind_date != "0000-00-00"
                            ?>
                            <input type="checkbox" name="remind_checkbox" id="remind_checkbox" <?php echo($noteEmpty ? "checked" : "")?>>
                            <label for="remind_checkbox" onclick="remind_date(this)">
                                <div id="toggle_switch" class="<?php echo($noteEmpty ? "toggle" : "")?>">
                                    <div></div>
                                </div>
                                <p>Adicionar data de lembrete</p>
                            </label>
                        </div>
                        <input type="date" id="remind_date" name="remind_date" onblur="remind_blur(this)" class="<?php echo($noteEmpty ? "visible" : "")?>" value="<?php echo($remind_date)?>">
                    </div>
                    <input type="hidden" id="id" name="id" value="<?php echo($note->getId())?>">
                    <input type="hidden" id="create_date" name="create_date" value="<?php echo(isset($_GET["id"]) ? $note->getCreate_date() : date("Y-m-d"))?>">
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo($_SESSION["user"]->getId())?>">
                    <div id="form_navigate">
                        <div <?php
                        if (!$isEmpty) {
                            echo ("
                            id=\"delete_btn\" onclick=\"open_delete(this)\">
                            <i class=\"fa-solid fa-trash-can\"></i>
                            <p>Apagar Nota</p>
                            ");
                        } else {
                            echo(">");
                        }
                        ?></div>
                        <button type="submit" id="submit_btn">Salvar</button>
                    </div>
                </form>
            </main>
        </section>
        <?php require_once("views/includes/html/footer.html");?>
    </div>
    <?php
    if (!$isEmpty) {
        echo("
        <section id=\"delete_screen\">
            <div>
                <p>Deseja deletar esta nota ?</p>
            </div>
            <div id=\"screen_navigate\">
                <div id=\"cancel_btn\" onclick=\"open_delete(this)\">Cancelar</div>
                <a href=\"noteDelete.php?id=".$note->getId()."\" id=\"confirm_btn\">Confirmar</a>
            </div>
        </section>
        ");
    }
    ?>
    <?php
    if ($_SESSION["user"]->getLevel() == 2) {
        require_once("views/includes/html/aside.html");
    }
    ?>
    <?php require_once("views/includes/html/profile_dropdown.php");?>
    <script src="views/includes/js/noteForm.js"></script>
    <script src="views/includes/js/menu.js"></script>
    <script src="views/includes/js/scroll_event.js"></script>
    <script src="views/includes/js/noteForm.js"></script>
</body>
</html>