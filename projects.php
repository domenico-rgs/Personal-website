<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Domenico Ragusa's projects">
        <meta name="keywords" content="engineering, student, profile, personal website, projects, works">
        <meta name="author" content="Domenico Ragusa">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Domenico Ragusa - Engineering student</title>
        <link rel="icon" href="./media/icon.png">
        <link type="text/css" rel="stylesheet" href="./css/projects.css" />
        <link type="text/css" rel="stylesheet" href="./css/common.css" />
        <link type="text/css" rel="stylesheet" href="./css/fonts.css" />
    </head>
    <body>
        <!-- Navbar -->
        <nav class="topnav" id="menu">
            <a href="./index.html" >Home</a>
            <a href="./profile.html">Profile</a>
            <a href="./curriculum.html">Curriculum</a>
            <a href="#" class="active">Projects</a>
            <a href="./contact.html" class="contact">Contact me</a>
            
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="icon-th-menu"></i>
            </a>
        </nav>
        
        <section id="projects">
            <h1>Projects</h1>
            <h3>Here are the projects carried out, both university and those made in free time. In group and alone.</h3>
            <hr>
        <?php
            $con = mysqli_connect("localhost","root","Gh67hj46gd");
            if(!$con){
                die('Could not connect: '.mysqli_error($con));
            }
        
            mysqli_select_db($con,"myprojects");
        
            $result = mysqli_query($con,"SELECT * FROM projects");
            
            
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                echo "<div class=\"project\" onclick=\"window.open('".$row['link']."')\">";
                echo "<h3 class=\"projectTitle\">".$row['title']."</h3>";
                echo "<p class=\"desc\">".$row['descript']."</p>";
                echo "<p class=\"lang\"> <b>Language</b>: <i>".$row['lang']."</i></p>";
                echo "</div>";
            }
        mysqli_close($con);
        ?>
        </section>
        
        <footer id="footer">
                &copy; <span class="it">Domenico Ragusa 2020</span>
        </footer>
        
        
        <script src="./js/common.js"></script>
    </body>
</html>