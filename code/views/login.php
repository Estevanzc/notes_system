<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes System | lembre mais fácilmente</title>
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
                    <input type="email" name="login" id="login" class="input_verifyer">
                    <p class="input_err">asdasd</p>
                </div>
                <div id="password_input">
                    <label for="password_ipt">Insira sua senha</label>
                    <div id="password">
                        <input type="password" name="password" id="password_ipt" class="input_verifyer">
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
                    <a href="mailer.php">Esqueci minha senha</a>
                </nav>
                <div id="submit_btn">
                    <button type="button" onclick="login_verifyer()">Entrar</button>
                </div>
            </form>
        </main>
        <?php require_once("views/includes/html/footer.html");?>
    </div>
    <script src="views/includes/js/login.js"></script>
    <script src="views/includes/js/cursor_interaction.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="views/includes/js/form_verifyer.js"></script>
</body>
</html>