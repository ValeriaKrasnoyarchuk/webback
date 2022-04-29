<?php

header('Content-Type: text/html; charset=UTF-8');

session_start();

if (!empty($_SESSION['login'])) {

  if(isset($_POST['exit'])){
    session_destroy();
    header('Location: login.php');
  } else {

  header('Location: index.php');}
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>
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
                             <h2 class="text-center">Авторизация</h2>
                             <form action="" method="post">
            <label>
                Логин:<br />
                <input name="login" />
              </label><br />
              <label>
                Пароль:<br />
                <input name="pass" />
              </label><br />
            <input type="submit" value="Войти" />
            </form>
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="row d-flex flex-row justify-content-start mt-3 h-sm-75">
            <div class="d-flex flex-row align-items-center col-sm-9">
                <div class="text-body text-light">(с)Красноярчук Валерия 2022</div>
            </div>
        </footer>
    </div>
</body>

<?php
}
else {
  $user = 'u47505';
  $pass = '5503713';
  $db = new PDO('mysql:host=localhost;dbname=u24531', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

  $pass0 = $_POST['pass'];
  $log0 = $_POST['login'];
  $data = $db->query("SELECT * FROM form where login = '$log0' AND pass='$pass0'");
  $res = $data->fetchALL();

    if($res[0]['login']!=$log0 || $res[0]['pass']!=$pass0){
      echo 'Ошибка: Пользователь не существует!' ;
    } else{
      $_SESSION['login'] = $log0;
      $_SESSION['pass'] = $pass0;
      $_SESSION['uid'] = 123;

      header('Location: index.php');}
    
}
