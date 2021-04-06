<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        background-color: #1d1d1d;
    </style>
</head>
<body>
    <?php
        /*
        $adminEmail='domenico.ragusa01@universitadipavia.it';
        $userEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //check if email is correct if JS has been disabled
        $userMessage = "
        <html>
            <head>
            <title>Thank you for contacting me</title>
            </head>
        <body>
            <h1>Thank you for contacting me</h1>
            <p>Your message has been sent. I will reply as soon as possible<p>
            <p>Domenico Ragusa</p>
        </body>
        </html>";

    $adminMessage= "
    <html>
        <head>
            <title>Contact from site</title>
        </head>
        <body>
            <h1>Contact from site</h1>
            <ul>
                <li>Name: {$_POST['name']}</li>
                <li>Surname: {$_POST['surname']}</li>
                <li>Mail: {$_POST['email']}</li>
                <li>Message: {$_POST['message']}</li>
            </ul>     
        </body>
    </html>";
    
    //information needed to send the email
    $mail_headers = "From: Domenico <domenico.ragusa01@universitadipavia.it>\r\n";
    $mail_headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $mail_headers .= "MIME-Version: 1.0\r\n";
    $mail_headers .= "Content-type: text/html; charset=iso-8859-1"; 
    */

    //Save message into DB
    $con = mysqli_connect("sql100.epizy.com","epiz_28239783","2VpSrYnhM1R");
    if(!$con) {
        echo '<script>Swal.fire({
                        icon: \'error\',
                        text: \'The request could not be completed, please retry\',
                }).then(function() {
                    window.location = "../contact.html";
                });
            </script>';
        exit();
    }
    mysqli_select_db($con,"epiz_28239783_WBDB");
    $sql="INSERT INTO messages (personName, surname, email, message) VALUES ('$_POST[name]','$_POST[surname]','$_POST[email]','$_POST[message]')";
    if (!mysqli_query($con,$sql)){
        echo '<script>Swal.fire({
                        icon: \'error\',
                        text: \'The request could not be completed, please retry\',
                }).then(function() {
                    window.location = "../contact.html";
                });
            </script>';
        exit();
    }
    mysqli_close($con);
    
    /*
    mail($userEmail,'Contact request made successfully', $userMessage, $mail_headers);
    mail($adminEmail,'Contact request from the site', $adminMessage, $mail_headers);
    */
    echo '<script>
        Swal.fire({
            icon: \'success\',
            text: \'Message sent correctly!\',
        }).then(function() {
            history.go(-1);
        });
    </script>';
    ?>
</body>
</html>


