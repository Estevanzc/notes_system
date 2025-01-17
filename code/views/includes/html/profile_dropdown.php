<div id="profile_menu">
    <a href="userData.php?id=<?php echo($_SESSION["user"]->getId());?>" class="profile_nav">
        <div><i class="fa-solid fa-user"></i></div>
        <div>Detalhes</div>
    </a>
    <a href="logout.php" class="profile_nav">
        <div><i class="fa-solid fa-door-open"></i></div>
        <div>Logout</div>
    </a>
</div>