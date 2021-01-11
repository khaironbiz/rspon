<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Focus Admin: Widget</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="../assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/lib/helper.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<?php
include('../config/koneksi/koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama       = $_POST['name'];
    $email      = $_POST['email'];
    $pass       = md5($_POST['pass']);
    $pass_c     = md5($_POST['pass2']);
    $has_user   = md5(rand());
    if ($pass == $pass_c) {
        $sql_email      = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
        $count_email    = mysqli_num_rows($sql_email);
        if ($count_email < 1) {
            $input      = mysqli_query($koneksi, "INSERT INTO users SET nama_user='$nama', email='$email', password='$pass', has_user='$has_user', blokir='N'");
        } else {
            echo "<script>document.location=\"register.php\"</script>";
        }
        if ($input) {

            require '../config/PHPMailer/PHPMailerAutoload.php';
            $email_pengirim = "rspon.kemkes@gmail.com";
            $subjek         = "Aktivasi Pendaftaran";
            $link           = "http//localhost/rspon/auth/aktivasi.php?id=" . $has_user;
            $message        = "Terimakasih telah melakukan pendaftaran di website RS Pusat Otak nasional, berikut kami kirimkan tautan untuk aktivasi akun anda: <a href=$link>Klik disini</a>, atau jika tautan ini tidak dapat diklik copy text berikut ini : $link kemudian paste di browser anda. Terimakasih";
            $mail           = new PHPMailer();
            $mail->IsHTML(true);    // set email format to HTML
            $mail->IsSMTP();   // we are going to use SMTP
            $mail->SMTPAuth   = true; // enabled SMTP authentication
            $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
            $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
            $mail->Port       = 465;                   // SMTP port to connect to GMail
            $mail->Username   = $email_pengirim;  // alamat email kamu
            $mail->Password   = "@Mail250909#";            // password GMail
            $mail->SetFrom($email_pengirim, 'noreply');  //Siapa yg mengirim email
            $mail->Subject    = $subjek;
            $mail->Body       = $message;
            $mail->AddAddress($email);

            if (!$mail->Send()) {
                echo "Eror: " . $mail->ErrorInfo;
                exit;
            } else {
                echo "<script>document.location=\"index.php\"</script>";
            }
        }
    }
}

?>




<body class="bg-primary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="../index.php"><span>RS Pusat Otak Nasional</span></a>
                        </div>
                        <div class="login-form">
                            <h4>Register</h4>

                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation" novalidate name="RegForm" onsubmit="return GEEKFORGEEKS()">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Nama asli tanpa gelar" name="name" required>
                                    <div class="invalid-feedback">
                                        Nama Wajib diisi.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                                    <div class="invalid-feedback">
                                        Email wajib diisi dan pastikan format email benar.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="pass1" placeholder="Password" name="pass" required>
                                    <div class="invalid-feedback">
                                        Password Wajib diisi.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Confim Password</label>
                                    <input type="password" class="form-control" id="pass2" placeholder="Password" name="pass2" required>
                                    <div class="invalid-feedback">
                                        Password Wajib dikonfirmasi.
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>

                                <div class="register-link m-t-15 text-center">
                                    <p>Already have account ? <a href="index.php"> Sign in</a></p>
                                    <p><a href="../index.php"> HOME</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

</body>

</html>