<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if($_SESSION['data']!=null){
    if($_SESSION['data']['level']==0 || $_SESSION['data']['level']==1){
        header('Location:apto-admin/');
    }else if($_SESSION['data']['level']==2){
        header('Location:apto-user/');
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../req/bulma/css/bulma.min.css">
    <title>Document</title>
</head>
<body>
    <div class="columns">
        <div class="column" style="background:#160f29;height:101.9vh"> 
            <div class="hero">
                <section class="hero-body">
                    <h1 class="title is-1" style="color:#ffc300;padding-top:20vh;">Selamat Datang di aPTO !!</h1><br/>
                    <h3 class="subtitle is-4" style="color:#f1f0cc;font-weight:bold">Aplikasi manajemen tagihan dalam satu aplikasi terpusat. Dibangung khusus bisnis menengah kebawah, mempermudah anda untuk membuat tagihan dan menerima pembayaran<br/>
                    </h3>
                    <a href="https://github.com/bijancot/aPTO" class="button is-warning is-medium" style="background-color:#ffc300 !important;color:#160f29 !important;font-weight:bold;">Pelajari lebih lanjut</a>

                </section>
            </div>
        </div>
        <div class="column" style="height:101.9vh;background:#f1f0cc">
            <div class="hero">  
                <div class="container">
                    <div class="hero-body" style="padding-top:32vh;">
                    <?php
                    $ds = $_COOKIE['message'];

                    echo $ds;
                    
                    unset($_COOKIE['message']);
                    setcookie('message', null, -1, '/');
                    ?>
                        <h1 class="title is-1">LOGIN</h1>
                        <form method="POST" action="login.php">
                            <input type="text" placeholder="USERNAME" name="username" class="input is-dark "/><br/><br/>
                            <input type="password" placeholder="PASSWORD" name="password" class="input is-dark"/><br/><br>
                            <input type="submit" value="Masuk Sekarang" class="button is-warning is-medium" style="background-color:#ffc300 !important;color:#160f29 !important;font-weight:bold;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>