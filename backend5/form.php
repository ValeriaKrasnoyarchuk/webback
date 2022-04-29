<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Красноярчук Валерия</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body class="text-dark">
    <div class="container-fluid">
        <header class="row d-flex flex-row justify-content-center">
            <div
                class="d-flex flex-row align-items-center justify-content-around justify-content-sm-start col-sm-9 px-sm-4 h-100">
                <img src="https://image.freepik.com/free-vector/bird-logo-vector_95982-44.jpg" alt="Нет изображения"
                    class="logo">
                <h2 class="text-body">Задание</h2>
            </div>
        </header>
        <div class="items d-flex flex-column">
            <div class="row d-flex flex-row justify-content-center mt-3 order-sm-3">
                <div class="col-sm-9 bg-light">
                    <div class="items d-flex flex-column ">
                        <div id="form" class="order-sm-3">
                            <?php
    
                                if (!empty($messages)) {
                                    print('<div id="messages">');
                                    foreach ($messages as $message) {
                                        print($message);
                                    }
                                    print('</div>');
                                }
                            ?>
                             <h2 class="text-center">Форма</h2>
                              <form action="" method="POST">
                                    <label>
                                        Имя:<br />
                                        <input name="name" <?php if ($errors['name'] || $errors['1']) {print "class='error'" ;} ?> value="<?php print $values['name']; ?>" />
                                    </label><br />
    
                                    <label>
                                        E-mail:<br />
                                        <input name="email" <?php if ($errors['email'] || $errors['2']) {print 'class="error"' ;} ?> value="<?php print $values['email']; ?>"  />
                                    </label><br />
    
                                    <label>
                                        День рождения:<br />
                                        <input name="date" <?php if ($errors['date'] || $errors['3']) {print 'class="error"' ;} ?> value="<?php print $values['date']; ?>" />
                                    </label><br />
                                    Пол:<br />
                                    <label><input type="radio" name="radio-group-1" <?php if ($errors['radio-group-1']) {print 'class="error"' ;} if($values['radio-group-1']=="М"){print "checked='checked'";}?> value="М" />
                                        Муж.</label>
                                    <label><input type="radio" name="radio-group-1" <?php if ($errors['radio-group-1']) {print 'class="error"' ;} if($values['radio-group-1']=="Ж"){print "checked='checked'";}?> value="Ж" />
                                        Жен</label><br />
                                    Кол-во конечностей:<br />
                                    <label><input type="radio" name="radio-group-2" <?php if ($errors['radio-group-2']) {print 'class="error"' ;} if($values['radio-group-2']=="4"){print "checked='checked'";}?> value="4" />
                                        4</label>
                                    <label><input type="radio" name="radio-group-2" <?php if ($errors['radio-group-2']) {print 'class="error"' ;} if($values['radio-group-2']=="5"){print "checked='checked'";}?> value="5" />
                                        5</label>
                                    <label><input type="radio" name="radio-group-2" <?php if ($errors['radio-group-2']) {print 'class="error"' ;} if($values['radio-group-2']=="6"){print "checked='checked'";}?> value="6" />
                                        6</label><br />
                                    <label><input type="radio" name="radio-group-2" <?php if ($errors['radio-group-2']) {print 'class="error"' ;} if($values['radio-group-2']=="7"){print "checked='checked'";}?> value="7" />
                                        7</label><br />    
                                        
                                    <label>
                                        Сверхспособности:
                                        <br />
                                        <select name="superpowers" multiple="multiple">
                                        <option value="Бессмертие" <?php if($values['superpowers']=="Бессмертие"){print "selected='selected'";}?>>Бессмертие</option>
                                        <option value="Левитация" <?php if($values['superpowers']=="Левитация"){print "selected='selected'";}?>>Левитация</option>
                                        <option value="Прохождение сквозь стены" <?php if($values['superpowers']=="Прохождение сквозь стены"){print "selected='selected'";}?>>Прохождение сквозь стены</option>
                                        </select>
                                    </label><br />
                                    <label>
                                        Биография:<br />
                                        <textarea name="biography" <?php if ($errors['biography']) {print 'class="error"' ;} ?>><?php print $values['biography']; ?></textarea> 
                                    </label><br />
                                    Ознакомлен с условиями:<br />
                                    <label><input type="checkbox" name="check-1" <?php  if($values['check-1']=="1"){print "checked='checked'";}?> value="1" />
                                        Согласен с условиями</label><br /> 
                                    <input type="submit" value="Отправить" />
                                    <?php
                                     if(!empty($_SESSION['login']))
                                    print('<input type="submit" name="exit" value="Выйти" />');
                                    ?>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="row d-flex flex-row justify-content-start mt-3 h-sm-75">
            <div class="d-flex flex-row align-items-center col-sm-9">
                <div class="text-body text-light">(с) Красноярчук Валерия 2022</div>
            </div>
        </footer>
    </div>
</body>

</html>