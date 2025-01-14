<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Notes System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="views/includes/css/common.css">
    <link rel="stylesheet" href="views/includes/css/login.css">
    <link rel="icon" href="uploads/logo_no_text.png">
</head>
<body onmousemove="cursor_locate(event)">
    <div id="page_background">
        <header>
            <h1><img src="uploads/logo_text1.png" alt=""></h1>
        </header>
        <main>
            <h2>Faça seu Login</h2>
            <form action="fazerLogin.php" method="post">
                <div id="email_input">
                    <label for="login">Insira seu email</label>
                    <input type="email" name="login" id="login">
                    <p class="input_err">asdasd</p>
                </div>
                <div id="password_input">
                    <label for="password_ipt">Insira sua senha</label>
                    <div id="password">
                        <input type="password" name="password" id="password_ipt">
                        <div id="pass_btn" onclick="pass_visibility(this)"><i class="fa-solid fa-eye-slash"></i></div>
                    </div>
                    <p class="input_err">asdadasads</p>
                </div>
                <div id="remember_checkbox">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Confie neste browser</label>
                </div>
                <nav>
                    <div>Não possui uma conta ? <a href="user.php?page_type=1">Crie uma</a></div>
                </nav>
                <div id="submit_btn">
                    <button type="submit">Entrar</button>
                </div>
            </form>
        </main>
        <footer>
            <p>© 2024 — 2024, Estevan.com, Inc. ou suas afiliadas</p>
        </footer>
    </div>
    <script src="views/includes/js/login.js"></script>
    <script src="views/includes/js/cursor_interaction.js"></script>
</body>
</html>