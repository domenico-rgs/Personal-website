<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Domenico Ragusa's projects made in work and alone for University or for curiosity. Hosted on GitHub">
        <meta name="keywords" content="engineering, student, profile, personal website, projects, works, university, github">
        <meta name="author" content="Domenico Ragusa">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Domenico Ragusa - Engineering student - Projects</title>
        <link rel="icon" href="./assets/media/icon.png">
        <link type="text/css" rel="stylesheet" href="./assets/css/common.css" />
		<link type="text/css" rel="stylesheet" href="./assets/css/projects.css" />
        <link type="text/css" rel="stylesheet" href="./assets/css/icons.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    </head>
    <body>
        <!-- Navbar -->
        <nav class="topnav" id="menu">
            <a href="./" title="Home" accesskey="1">Home</a>
            <a href="./profile" title="Profile" accesskey="2">Profile</a>
            <a href="./curriculum" title="Curriculum" accesskey="3">Curriculum</a>
            <a href="#" title="Projects" class="active" accesskey="4">Projects</a>
			<div class="rightelements">
				<a href="./contacts" title="Contacts" class="contact" accesskey="5">Contact me</a>
				<a href="javascript:openForm()" class="restr" title="Restricted area" accesskey="6"><span class="material-icons">perm_identity</span></a>
            </div>
			
            <a href="javascript:void(0);" class="icon" onclick="hamburger()">
                <span class="icon-th-menu"></span>
            </a>
        </nav>
        
        <!-- Projects -->
        <section id="projects">
            <h1>Projects</h1>
            <h2>Here are the projects carried out, both university and those made in free time. In group and alone.</h2>
            <hr>
            <?php
                //Get projects info from DB
                $con = mysqli_connect("sql211.epizy.com","epiz_28323548","Jb0qqCRadcNhv");
                if(!$con){
                    echo '<script>Swal.fire({
                        icon: \'error\',
                        text: \'The request could not be completed, please retry\',
                        }).then(function() {
                            window.location = "../contacts.html";
                        });
                        </script>';
                    exit();
                }
        
                mysqli_select_db($con,"epiz_28323548_WBDB");
        
                $result = mysqli_query($con,"SELECT * FROM projects");
            
            
                while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    echo "<div class=\"project\" onclick=\"window.open('".$row['link']."')\" title=\"Go to ".$row['title'] ." GitHub page\">";
                    echo "<h3 class=\"projectTitle\">".$row['title']."</h3>";
                    echo "<p class=\"desc\">".$row['descript']."</p>";
                    echo "<p class=\"lang\"> <strong>Language</strong>: <em>".$row['lang']."</em></p>";
                    echo "</div>";
                }
            mysqli_close($con);
            ?>
        </section>
        
         <!-- Restricted Area -->
        <div class="access-popup" id="accessForm">
            <form action="./restricted" method="POST" class="form-container">
            <label for="psw"><strong>Restricted Area</strong></label>
            <input type="password" placeholder="Enter Password" id="psw" name="psw" required novalidate>

            <button type="submit" class="btn">Login</button>
            <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>
        
        <!-- Footer -->
        <footer id="footer">
            &copy; &nbsp;<span class="it">Domenico Ragusa 2021</span>
        </footer>
        
        <!-- JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="./assets/js/common.js"></script>
    </body>
</html>