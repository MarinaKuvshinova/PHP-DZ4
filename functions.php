
<?php
$users='pages/users.txt';
function register($name,$pass,$email){
    //data validation block
    $name = trim(htmlspecialchars($name));
    $pass = trim(htmlspecialchars(stripcslashes($pass)));
    $email = trim(htmlspecialchars($email));
    if ($name == '' || $pass== '' || $email == ''){
        echo "<h3><span style='color:red'>Fill All Required Feilds!</span></h3>";
        return false;
    }
    if (strlen($name)<3 || strlen($name)>30 || strlen($pass)<3 || strlen($pass)>30)
    {
        echo "<h3><span style='color:red'>Value length must be between 3 and 30!</span></h3>";
        return false;
    }
    global $users;
    $file = fopen($users,'a+');
    while ($line = fgets($file)){
        $readname = substr($line,0,strpos($line,':'));
        if ($readname==$name){
            echo "<h3><span style='color:red'>Such Login Name is Already Used!</span></h3>";
            return false;
        }
    }
    //new Add block
    $line= $name.':'.md5($pass).':'.$email."\r\n";
    fputs($file, $line);
    fclose($file);
    $_SESSION['name']=$name;
    echo '<script>window.location="index.php?page=1";</script>';
    return true;
}
function loginFunction($login, $pass){
    global $users;
    $login = trim(htmlspecialchars($login));
    $pass = trim(htmlspecialchars(stripcslashes($pass)));
    if ($login == '' || $pass== '') {
        echo '<script>window.location="index.php?page=4";</script>';
        return false;
    }
    $file = fopen($users,'a+');
    while ($line = fgets($file)){
        $ar = explode(":", $line);
        $readname = $ar[0];
        $readpass = $ar[1];
        if ($readname==$login && $readpass==md5($pass)){
            $_SESSION['name']=$login;
            fclose($file);
            echo '<script>window.location="index.php?page=1";</script>';
            return true;
        }
    }
    fclose($file);
    echo '<script>window.location="index.php?page=4";</script>';
    return false;
}
if(isset($_POST['logoutBtn'])){
    unset($_SESSION['name']);
    echo '<script>window.location="index.php?page=1";</script>';

}