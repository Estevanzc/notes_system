<?php require_once("views/includes/html/head.html");?>
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="views/includes/css/usersList.css">
</head>
<body onscroll="scroll_event(this)">
    <div id="page_background">
        <?php require_once("views/includes/html/menu.php");?>
        <section id="users_list">
            <h2 id="page_title">Lista de Usuários</h2>
            <main>
                <div id="loading_screen">
                    <img src="uploads/loading_icon.gif" class="screen_icon" alt="">
                    <h3 class="screen_title">Loading ...</h3>
                </div>
            </main>
        </section>
        <?php require_once("views/includes/html/footer.html");?>
    </div>
    <section id="user_popup" onmouseenter="mouse_enter(this)" onmouseleave="mouse_leave(this)">
        <h4>Detalhes:</h4>
        <div id="user_data">
            <p><strong>Nome:</strong> Estevan Zimeramnn</p>
            <p><strong>Login:</strong> estevan.zimermann@gmail.com</p>
            <p><strong>Level:</strong> Admin</p>
            <p>Desde 26, fev de 2008</p>
        </div>
        <div id="data_nav">
        </div>
    </section>
    <?php
    if ($_SESSION["user"]->getLevel() == 2) {
        require_once("views/includes/html/aside.html");
    }
    ?>
    <?php require_once("views/includes/html/profile_dropdown.php");?>
    <script src="views/includes/js/usersList.js"></script>
    <script src="views/includes/js/menu.js"></script>
    <script src="views/includes/js/scroll_event.js"></script>
</body>
</html>