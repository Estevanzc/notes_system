<?php require_once("views/includes/html/head.html");?>
    <link rel="stylesheet" href="views/includes/css/notesList.css">
</head>
<body onscroll="scroll_event(this)">
    <div id="page_background">
        <?php require_once("views/includes/html/menu.php");?>
        <section id="notes_list">
            <h2 id="page_title">Suas Notas</h2>
            <div id="list_menu">
                <div onclick="filter_open(this)" id="list_filter_btn">
                    <i class="fa-solid fa-filter"></i>
                    <p>Filtro</p>
                </div>
                <div id="list_style_btn">
                    <div onclick="list_style(this)" data-style_type="notes_summary"><i class="fa-solid fa-table-cells-large"></i></div>
                    <div onclick="list_style(this)" data-style_type="notes_details"><i class="fa-solid fa-list"></i></div>
                </div>
                <a href="note.php" id="list_add">
                    <i class="fa-regular fa-square-plus"></i>
                    <p>Adicionar uma nota</p>
                </a>
            </div>
            <main class="notes_summary">
                <div id="loading_screen">
                    <img src="uploads/loading_icon.gif" class="screen_icon" alt="">
                    <h3 class="screen_title">Loading ...</h3>
                </div>
                <div id="empty_screen">
                    <img src="uploads/empty_icon.gif" class="screen_icon" alt="">
                    <h3 class="screen_title">Nenhum arquivo encontrado</h3>
                </div>
            </main>
        </section>
    </div>
    <section id="filter_window">
        <div id="window_title">
            <h3>Filtros</h3>
            <div id="close_window_btn" onclick="filter_close(this)"><i class="fa-solid fa-xmark"></i></div>
        </div>
        <div id="search_input" class="search_option">
            <h5 class="search_title">Pesquise por palavras</h5>
            <input type="text">
        </div>
        <div id="select_input">
            <div id="create_select" class="search_option">
                <h5 class="search_title">Ordem de criação</h5>
                <select>
                    <option value="0">Mais recentes</option>
                    <option value="1">Mais antigos</option>
                </select>
            </div>
            <div id="remind_select" class="search_option">
                <h5 class="search_title">Ordem de lembrete</h5>
                <select>
                    <option value="0" selected>Nenhuma</option>
                    <option value="1">Datas próximas</option>
                    <option value="2">Datas passadas</option>
                </select>
            </div>
        </div>
        <div id="filter_buttons">
            <button id="filter_apply" onclick="filter_close(this)">Aplicar</button>
        </div>
    </section>
    <?php require_once("views/includes/html/footer.html");?>
    <?php
    if ($_SESSION["user"]->getLevel() == 2) {
        require_once("views/includes/html/aside.html");
    }
    ?>
    <?php require_once("views/includes/html/profile_dropdown.php");?>
    <script src="views/includes/js/notesList.js"></script>
    <script src="views/includes/js/menu.js"></script>
    <script src="views/includes/js/scroll_event.js"></script>
    <script src="views/includes/js/data_taker.js"></script>
</body>
</html>