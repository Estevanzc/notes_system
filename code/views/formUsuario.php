<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Acadêmico</title>
</head>
<body>
    <?php require_once("views/includes/menu.php");?>
    <h1>Sistema Acadêmico - Cadastro de Usuario</h1>
    <a href="usuarios.php">Voltar para a listagem</a>
    <form action="salvarUsuario.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
        <input type="text" name="login" value="<?php echo $usuario->getLogin(); ?>" placeholder="Login:">
        <select name="nivel" id="nivel">
            <option value="1" <?php echo($usuario->getNivel() == 1 ? "selected" : "")?>>Nível 1</option>
            <option value="2" <?php echo($usuario->getNivel() == 2 ? "selected" : "")?>>Nível 2</option>
        </select>
        <br>
        <input type="text" name="senha" placeholder="Senha:">
        <?php
        if (!empty($usuario->getId())) {
            ?>
            <br>
            <span>Para deixar a senha atual, basta deixar o o campo em branco</span>
            <?php
        }
        ?>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>