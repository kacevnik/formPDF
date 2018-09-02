<?php

    session_start();

    require_once 'dompdf/autoload.inc.php';
    use Dompdf\Dompdf;

    if($_POST['submit']){
        $session = array();

        $error = "Заполните поля: ";
        if($_POST['company']){$company = $_POST['company']; $session['company'] = $company;}else{$error.= "Название компании"; }
        if($_POST['inn']){$inn = $_POST['inn']; $session['inn'] = $inn; }else{$error.= ", ИНН"; }
        if($_POST['kpp']){$kpp = $_POST['kpp']; $session['kpp'] = $kpp; }else{$error.= ", КПП"; }
        if($_POST['ogrn']){$ogrn = $_POST['ogrn']; $session['ogrn'] = $ogrn; }else{$error.= ", ОГРН"; }
        if($_POST['name']){$name = $_POST['name']; $session['name'] = $name; }else{$error.= ", Директор: ФИО"; }
        if($_POST['adres']){$adres = $_POST['adres']; $session['adres'] = $adres; }else{$error.= ", Адрес"; }
        if($_POST['phone']){$phone = $_POST['phone']; $session['phone'] = $phone; }else{$error.= ", Телефон"; }
        if($_POST['email']){$email = $_POST['email']; $session['email'] = $email; }else{$error.= ", Эл. почта"; }

        if($error != "Заполните поля: ") {
            $_SESSION['value'] = $session;
            $_SESSION['error'] = $error;
            header("Location: index.php");
            exit();
        }

        $html = '<style>body{font-family: "DejaVu Serif"; text-align: center; border: 1px solid #000000; position: relative;}</style>';
        $html.= '<style>body:after{content: ""; position: absolute; top: 0; left: 0; bottom: 0; right: 0; border: 2px solid #000000; outline: 1px solid #ffffff;}</style>';
        $html.= '<style>h1{font-size: 50px; font-family: "DejaVu Sans"; margin: 60px 0;}</style>';
        $html.= '<style>.bank{ padding-bottom: 10px; margin-bottom: 10px; font-size: 24px;}</style>';
        $html.= '<style>.bank i{border-bottom: 2px solid #000000;}</style>';
        $html.= '<style>.line{height: 60px;}</style>';
        $html.= '<style>.p{padding: 0 80px; font-size: 24px; margin: 0 0 0 0;}</style>';
        $html.= '<h1>'.$company.'</h1>';
        $html.= '<span class="bank"><b>ИНН: </b><i>'.$inn.'</i></span><br>';
        $html.= '<span class="bank"><b>КПП: </b><i>'.$kpp.'</i></span><br>';
        $html.= '<span class="bank"><b>ОГРН: </b><i>'.$ogrn.'</i></span>';
        $html.= '<p class="line"> </p>';
        $html.= '<p class="adres p"><b>Адрес: </b><i>'.$adres.'</i></p>';
        $html.= '<p class="name p"><b>Ген. директор: </b><i>'.$name.'</i></p>';
        $html.= '<p class="phone p"><b>Телефон: </b><i>'.$phone.'</i></p>';
        $html.= '<p class="email p"><b>Эл. почта: </b><i>'.$email.'</i></p>';


        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream();


    }

?>

<!DOCTYPE html>
<html lang="ru">
<html>
<head>
    <title>PDF from FORM</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/media.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="" class="form_pdf" method="post" name="form_pdf">
                <h2>Заполните Форму</h2>
                <div class="sub_title">для генерации PDF</div>
                <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                <div class="form_wrap">
                    <div class="col-md-6">
                        <input type="text" name="company" value="<?php if($_SESSION['value']['company']){echo $_SESSION['value']['company'];} ?>" class="input input_text" placeholder="Название компании" required="required">
                        <input type="text" name="inn" value="<?php if($_SESSION['value']['inn']){echo $_SESSION['value']['inn'];} ?>" class="input input_text" placeholder="ИНН" required="required">
                        <input type="text" name="kpp" value="<?php if($_SESSION['value']['kpp']){echo $_SESSION['value']['kpp'];} ?>" class="input input_text" placeholder="КПП" required="required">
                        <input type="text" name="ogrn" value="<?php if($_SESSION['value']['ogrn']){echo $_SESSION['value']['ogrn'];} ?>" class="input input_text" placeholder="ОГРН" required="required">
                        <input type="text" name="name" value="<?php if($_SESSION['value']['name']){echo $_SESSION['value']['name'];} ?>" class="input input_text" placeholder="ФИО: Директор" required="required">
                    </div>
                    <div class="col-md-6">
                        <textarea name="adres" class="input_text textarea" placeholder="Адрес" required="required"><?php if($_SESSION['value']['adres']){echo $_SESSION['value']['adres'];} ?></textarea>
                        <input type="text" name="phone" value="<?php if($_SESSION['value']['phone']){echo $_SESSION['value']['phone'];} ?>" class="input input_text" placeholder="Телефон" required="required">
                        <input type="text" name="email" value="<?php if($_SESSION['value']['email']){echo $_SESSION['value']['email'];} ?>" class="input input_text" placeholder="Эл. почта" required="required">
                        <input type="submit" name="submit" value="Сгенерировать PDF" class="button">
                    </div>
                </div>
                <?php unset($_SESSION['value']); ?>
                <div class="bottom_text">Внимание! Все поля должны быть заполнены.</div>
                <span class="info">created by <a href="https://www.fl.ru/users/kacevnik/">Dmitry Kovalev</a></span>
            </form>
        </div>
    </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>