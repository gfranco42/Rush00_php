<?php
    if (!isset($_SESSION))
        session_start();
    include ('session.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Minishop</title>
		<link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <div id="navbar">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php if (!is_logged()) {?>
                    <li><a href="signin.php">Sign In</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                <?php }
                else { ?>
                    <li><a href="">Sign Out</a></li>
                <?php } ?>
                <?php if($_SESSION['auth']['rank'] == "admin") { ?>
                    <li><a href="admin.php">Administration</a></li>
                <?php } ?>
				<li><a href="cart.php">Cart</a></li>
            </ul>
        </div>
	</body>
</html>
