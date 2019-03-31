<?php
    include ('includes/header.php');
    if ($_SESSION['auth']['grade'] == "admin"){
        if (isset($_POST)) {
            extract($_POST);
            $valid = true;
            if ($submit === "Add") {
                foreach ($_POST as $elem){
                    if (empty($elem))
                        $valid = false;break;
                }
                if ($valid){
                    $exist = false;
                    $pwd = hash('whirlpool', $password);
                    $array = file_get_contents("./data/users");
                    $test = unserialize($array);
                    $i = 0;
                    foreach ($test as $elem){
                        if ($elem['username'] == $username)
                            $exist = true;
                        $i++;
                    }
                    if ($exist == FALSE) {
                        $i++;
                        $test[] = array('id'=>$i, 'username'=>$username, 'password'=>$pwd, 'status'=>$status, 'grade'=>$grade);
                        $seri = serialize($test);
                        file_put_contents("./data/users", $seri);
                        echo "Votre compte a ete cree !\n";
                    }
                    else
                        echo "Cet utilisateur existe deja !\n";
                }
                else
                    echo "All fields must be filled.";
            }
            if ($submit === "Edit") {

            }
            if ($submit === "Delete") {
                extract($_POST);
                $change = false;
                $array = file_get_contents("./data/users");
                $test = unserialize($array);
                $edit = array();
                foreach ($test as $elem => $value){
                    if ($elem['id'] == $id) {
                        $value = "inactive";
                        $change = true;
                        break;
                    }
                }
                if ($change){
                    $seri = serialize($test);
                    file_put_contents("./data/users", $seri);
                    echo "Account deleted!";
                }
                else
                    echo "This user doesn't exist!";
            }
        }
?>
        <h1>Add user</h1>
        <form method="post" action="admin.php">
            <p>Username : <input type="text" name="username" />
                &emsp;Password : <input type="text" name="password" />
                &emsp;Rank : <select name="grade">
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                </select>
                &emsp;Status : <select name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                &emsp;<input type="submit" name="submit" value="Add"/></p>
        </form>
        <h1>Edit user</h1>
        <form method="post" action="admin.php">
            <p>Select the user to edit :&emsp;<select name="id">
                    <?php
                        $array = file_get_contents("./data/users");
                        $test = unserialize($array);
                        $i = 0;
                        foreach ($test as $elem){
                            if ($elem['status'] == "active"){
                                echo '<option value="' . $elem['id'] . '">'
                                    . $elem['username'] . '</option>';
                            }
                        }
                    ?>
                </select>
            <p>Username : <input type="text" name="login" />
                &emsp;Password : <input type="text" name="passwd" />
                &emsp;Rank : <select name="rank">
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                </select>
                &emsp;Status : <select name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
                &emsp;<input type="submit" name="submit" value="Edit"/></p>
        </form>
        <h1>Delete user</h1>
        <form method="post" action="admin.php">
            <p>Select the user to delete :&emsp;<select name="id">
                    <?php
                    $array = file_get_contents("./data/users");
                    $test = unserialize($array);
                    $i = 0;
                    foreach ($test as $elem){
                        if ($elem['status'] == "active" && $elem['username'] != 'root'){
                            echo '<option value="' . $elem['id'] . '">'
                                . $elem['username'] . '</option>';
                        }
                    }
                    ?>
                </select>
                &emsp;<input type="submit" name="submit" value="Delete"/></p>
        </form>
<?php
    }
    else
        header("Location:index.php");
?>

<?php include ('includes/footer.php') ?>
