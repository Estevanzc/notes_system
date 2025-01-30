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
    <link rel="stylesheet" href="views/includes/css/logon.css">
    <link rel="icon" href="uploads/logo_no_text.png">
</head>
<body onmousemove="cursor_locate(event)">
    <div id="page_background">
        <header>
            <h1><img src="uploads/logo_text1.png" alt=""></h1>
        </header>
        <main>
            <h2>Faça sua conta</h2>
            <div>
                <form action="userSave.php" method="post" enctype="multipart/form-data">
                    <div id="name_input">
                        <label for="name">Insira seu nome</label>
                        <input type="text" onkeyup="change_name(this)" name="name" id="name" class="input_verifyer" value="golden_turtle">
                        <p class="input_err">asdasd</p>
                    </div>
                    <div id="email_input">
                        <label for="login">Insira seu email</label>
                        <input type="email" name="login" id="login" class="input_verifyer">
                        <p class="input_err">asdasd</p>
                    </div>
                    <div id="password_input">
                        <label for="password_ipt">Insira sua senha</label>
                        <div id="password" onclick="input_focus(this)">
                            <input type="password" onblur="input_blur(this)" name="password" id="password_ipt" class="input_verifyer">
                            <div id="pass_btn" onclick="pass_visibility(this)"><i class="fa-solid fa-eye-slash"></i></div>
                        </div>
                        <p class="input_err">asdasd</p>
                    </div>
                    <div id="photo_input">
                        <label for="photo">Insira sua imagem de perfil</label>
                        <div>
                            <div id="del_profile_btn" onclick="del_profile(this)">
                                <i class="fa-solid fa-trash"></i>
                            </div>
                            <input type="file" onchange="del_btn(this, event)" name="photo" id="photo" accept=".png, .jpg, .jpeg">
                        </div>
                    </div>
                    <nav>
                        <div>Já possui uma conta ? <a href="login.php">Faça Login</a></div>
                    </nav>
                    <input type="hidden" id="level" name="level" value="1">
                    <input type="hidden" id="entry_date" name="entry_date" value="">
                    <div id="submit_btn">
                        <button type="button" onclick="logon_verifyer()">Salvar</button>
                    </div>
                </form>
                <section id="profile_simulation">
                    <div id="profile">
                        <div id="profile_img">
                            <div></div>
                        </div>
                        <div id="profile_desc">
                            <p id="profile_name">golden_turtle</p>
                            <p id="profile_date">Desde 20, fev de 2020</p>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <?php require_once("views/includes/html/footer.html");?>
    </div>
    <script src="views/includes/js/logon.js"></script>
    <script src="views/includes/js/cursor_interaction.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script src="views/includes/js/form_verifyer.js"></script>
</body>
</html>