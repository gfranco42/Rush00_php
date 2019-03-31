<?php
    include ('includes/header.php');
    if (!empty($_POST['username']) && !empty($_POST['password'])){
        $exist = false;
        $pwd = hash('whirlpool', $_POST['password']);
        $array = file_get_contents("./data/users");
        $test = unserialize($array);
        $i = 0;
        foreach ($test as $elem){
            if ($elem['username'] == $_POST['username'])
                $exist = true;
            $i++;
        }
        if ($exist == FALSE) {
            $i++;
            $test[] = array('id'=>$i, 'username'=>$_POST['username'], 'password'=>$pwd, 'status'=>"active", 'grade'=>"customer");
            $seri = serialize($test);
            file_put_contents("./data/users", $seri);
            echo "Votre compte a ete cree !\n";
        }
        else
            echo "Cet utilisateur existe deja !\n";
    }
?>
    <form method="POST" action="signup.php">
        Identifiant : <input type="text" name="username" value ="" /><br>
        Mot de passe : <input type="password" name="password" value = "" />
		<input type="submit" name="submit" value="OK">
	</form>

<?php include ('includes/footer.php') ?>