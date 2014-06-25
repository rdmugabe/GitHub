 <?php
if (isset($_POST['username']) && isset($_POST['password'])){
    require('connect.php');
    
    /*
    The Above code can be in a different file, then you can place include'filename.php'; instead.
    */
    
    //Lets search the databse for the user name and password
    //Choose some sort of password encryption, I choose sha256
    //Password function (Not In all versions of MySQL).
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = mysql_query("SELECT * FROM example 
        WHERE username='$username' AND
        password='$password'");
    if(mysql_num_rows($sql) == 1){
        $row = mysql_fetch_array($sql);
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['firstName'] = $row['firstName'];
        $_SESSION['lastName'] = $row['lastName'];                              
        $_SESSION['logged'] = TRUE;
        header("Location: index4.html"); // Modify to go to the page you would like
        exit;
    }else{
        header("Location: login.php");
        exit;
    }
}else{    //If the form button wasn't submitted go to the index page, or login page
    header("Location: index.html");    
    exit;
}
?> 