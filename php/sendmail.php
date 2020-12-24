<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        background-color: #1d1d1d;
    </style>
</head>
<body>
    <?php
        $adminEmail='domenico.ragusa01@universitadipavia.it';
        $userEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $userMessage = "
        <html>
            <head>
            <title>Grazie per avermi contattato</title>
            </head>
        <body>
            <h1>Grazie per avermi contattato</h1>
            <p>Il tuo messaggio è stato inviato. Ti risponderò non appena possibile<p>
            <p>Domenico Ragusa</p>
        </body>
        </html>";

    $adminMessage= "
    <html>
        <head>
            <title>Contatto dal sito</title>
        </head>
        <body>
            <h1>Contatto dal sito</h1>
            <ul>
                <li>Nome: {$_POST['name']}</li>
                <li>Cognome: {$_POST['surname']}</li>
                <li>Mail: {$_POST['email']}</li>
                <li>Messaggio: {$_POST['message']}</li>
            </ul>     
        </body>
    </html>";

    $mail_headers = "From: Domenico <domenico.ragusa01@universitadipavia.it>\r\n";
    $mail_headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $mail_headers .= "MIME-Version: 1.0\r\n";
    $mail_headers .= "Content-type: text/html; charset=iso-8859-1";

    $con = mysqli_connect("localhost","root","Gh67hj46gd");
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
    mysqli_select_db($con,"myprojects");
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
    
    mail($userEmail,'Richiesta di contatto effettuata con successo', $userMessage, $mail_headers);
    mail($adminEmail,'Richiesta di contatto dal sito', $adminMessage, $mail_headers);
    echo '<script>
        Swal.fire({
            icon: \'success\',
            text: \'Message sent correctly!\',
        }).then(function() {
            window.location = "../contact.html";
        });
    </script>';
    ?>
</body>
</html>


