<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Domenico Ragusa - Engineering student - Restricted area</title>
        <link rel="icon" href="./assets/media/icon.png">
        <link type="text/css" rel="stylesheet" href="./assets/css/common.css" />
        <link type="text/css" rel="stylesheet" href="./assets/css/icons.css" />
        <link type="text/css" rel="stylesheet" href="./assets/css/restricted.css" />
		
		<!-- JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="./assets/js/common.js"></script>
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
            <a href="./" title="Home" accesskey="1">Home</a>
            <a href="./profile" title="Profile" accesskey="2">Profile</a>
            <a href="./curriculum" title="Curriculum" accesskey="3">Curriculum</a>
            <a href="./projects" title="Projects" accesskey="4">Projects</a>
			<div class="rightelements">
				<a href="./contacts" title="Contacts" class="contact" accesskey="5">Contact me</a>
            </div>
            
            <a href="javascript:void(0);" class="icon" onclick="hamburger()">
                <span class="icon-th-menu"></span>
            </a>
        </nav>
        
        <!-- Message table -->
        <h1>Messages received</h1>
        <br>
        <div style="overflow-x:auto;">
        <table summary="Messages sent through contact form in Contact Me page">
            <thead><tr><th id="name">Name and Surname</th><th id="email">Email</th><th id="mess">Message</th></tr></thead>
            <tbody>
                <?php
                $con = mysqli_connect("sql211.epizy.com","epiz_28323548","Jb0qqCRadcNhv");
                    if(!$con){
                        die('Could not connect: '.mysqli_error($con));
                    }
        
                    mysqli_select_db($con,"epiz_28323548_WBDB");
        
                    $result = mysqli_query($con,"SELECT * FROM messages");
            
            
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        echo "<tr><td headers=\"name\">".$row['personName']." ".$row['surname']."</td><td headers=\"email\">".$row['email']."</td><td headers=\"mess\">".$row['message']."</td></tr>";
                    }
                mysqli_close($con);
                ?>
            </tbody>
        </table>
        </div>
        
        <!-- Footer -->
        <footer id="footer">
            &copy; &nbsp;<span class="it">Domenico Ragusa 2021</span>
        </footer>
        
    </body>
</html>