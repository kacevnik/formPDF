<?php

 session_start();

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

        require_once 'dompdf/autoload.inc.php';
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