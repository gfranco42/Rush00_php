<?php
    if (!empty($_POST['username']) && !empty($_POST['password'])){
        $fail = "L'identifiant et/ou le mot de passe sont incorrectes.";
        $pwd = hash('whirlpool', $_POST['password']);
        $array = file_get_contents("./data/users");
        $test = unserialize($array);
        foreach ($test as $elem){
            if ($_POST['username'] == $elem['username'] && $elem['status'] == "active"){
                if ($pwd == $elem['password']){
                    $_SESSION['auth'] = array(
                        'username' => $elem['username'],
                        'password' => $pwd,
                        'grade' => $elem['grade']
                    );
                    header("Location:index.php");
                }
                else
                    echo $fail;
            }
        }
    }
?>
<?php include ('includes/header.php') ?>

        <form method="post" action="signin.php">
            <p>Identifiant :
                <input type="text" name="username" /></p>
            <p>Mot de passe :
                <input type="password" name="password" /></p>
            <input type="submit" name="submit" value="OK" />
        </form>

<?php include ('includes/footer.php') ?>