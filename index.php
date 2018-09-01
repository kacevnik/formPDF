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
                <div class="form_wrap">
                    <div class="col-md-6">
                        <input type="text" name="name_company" class="input input_text" placeholder="Название компании" required="required">
                        <input type="text" name="inn" class="input input_text" placeholder="ИНН" required="required">
                        <input type="text" name="kpp" class="input input_text" placeholder="КПП" required="required">
                        <input type="text" name="ogrn" class="input input_text" placeholder="ОГРН" required="required">
                        <input type="text" name="fio" class="input input_text" placeholder="ФИО: Директор" required="required">
                    </div>
                    <div class="col-md-6">
                        <textarea name="adress" class="input_text textarea" placeholder="Адресс" required="required"></textarea>
                        <input type="text" name="phone" class="input input_text" placeholder="Телефон" required="required">
                        <input type="text" name="email" class="input input_text" placeholder="Эл. почта" required="required">
                        <input type="submit" name="submit" value="Сгенерировать PDF" class="button">
                    </div>
                </div>
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