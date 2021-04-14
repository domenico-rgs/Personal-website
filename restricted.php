<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Domenico Ragusa - Engineering student - Restricted area</title>
        <link rel="icon" href="./media/icon.png">
        <link type="text/css" rel="stylesheet" href="./css/common.css" />
        <link type="text/css" rel="stylesheet" href="./css/icons.css" />
        <link type="text/css" rel="stylesheet" href="./css/restricted.css" />
		
		<!-- JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="./js/common.js"></script>
    </head>
    
    <body>
        <?php
            if (isset($_POST['psw'])) {
                if ($_POST['psw'] == "dcr") { //checking if password entered is correct
                    if (!session_id()) session_start();
                    $_SESSION['logon'] = true;
                }
            }
                
            if (!session_id()) session_start();
            if (!isset($_SESSION['logon']) or !$_SESSION['logon']) {
                    //if password is not correct go back to previous page
                    echo '<script>Swal.fire({
                            icon: \'error\',
                            text: \'Wrong password\',
                            }).then(function() {
                                history.go(-1);
                            });
                        </script>';
                    die();
            }
            if(session_id()) session_destroy();
        ?>
        <!-- Navbar -->
        <nav class="topnav" id="menu">
            <a href="./">Home</a>
            <a href="./profile">Profile</a>
            <a href="./curriculum">Curriculum</a>
            <a href="./projects">Projects</a>
            <a href="./contacts" class="contact">Contact me</a>
            
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <span class="icon-th-menu"></span>
            </a>
        </nav>
        
        <!-- Message table -->
        <h1>Messages received</h1>
        <br>
        <div style="overflow-x:auto;">
        <table>
            <thead><tr><th>Name and Surname</th><th>Email</th><th>Message</th></tr></thead>
            <tbody>
                <?php
                $con = mysqli_connect("sql211.epizy.com","epiz_28323548","Jb0qqCRadcNhv");
                    if(!$con){
                        die('Could not connect: '.mysqli_error($con));
                    }
        
                    mysqli_select_db($con,"epiz_28323548_WBDB");
        
                    $result = mysqli_query($con,"SELECT * FROM messages");
            
            
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        echo "<tr><td>".$row['personName']." ".$row['surname']."</td><td>".$row['email']."</td><td>".$row['message']."</td></tr>";
                    }
                mysqli_close($con);
                ?>
            </tbody>
        </table>
        </div>
        
        <!-- Footer -->
        <footer id="footer">
            &copy; <span class="it">Domenico Ragusa 2021</span>
        </footer>
        
    </body>
</html>