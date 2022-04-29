<?php
header('Content-Type: text/html; charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $messages = array();
	if (!empty($_COOKIE['save'])) {
      setcookie('save', '', 100000);
      setcookie('login', '', 100000);
      setcookie('pass', '', 100000);
    	$messages[] = 'Данные сохранены';

      if (!empty($_COOKIE['pass'])) {
        $messages[] = sprintf('Вы можете <a href="login.php">войти</a> с логином <strong>%s</strong>
          и паролем <strong>%s</strong> для изменения данных.',
          strip_tags($_COOKIE['login']),
          strip_tags($_COOKIE['pass']));
      }
  	}
    $errors = array();
    $errors['name'] = !empty($_COOKIE['name_error']);
    $errors['email'] = !empty($_COOKIE['email_error']);
    $errors['date'] = !empty($_COOKIE['date_error']);
    $errors['radio-group-1'] = !empty($_COOKIE['radio-group-1_error']);
    $errors['radio-group-2'] = !empty($_COOKIE['radio-group-2_error']);
    $errors['superpowers'] = !empty($_COOKIE['superpowers_error']);
    $errors['biography'] = !empty($_COOKIE['biography_error']);
    $errors['check-1'] = !empty($_COOKIE['check-1_error']);
    $errors['1'] = !empty($_COOKIE['1_error']);
    $errors['2'] = !empty($_COOKIE['2_error']);
    $errors['3'] = !empty($_COOKIE['3_error']);

    if ($errors['name']) {
      setcookie('name_error', '', 100000);
      $messages[] = '<div class="error">Введите имя.</div>';
    }
    if ($errors['1']){
      setcookie('1_error', '', 100000);
      $messages[] = '<div class="error">Введите имя латинскими буквами</div>';
    } 
    if ($errors['email']) {
      setcookie('email_error', '', 100000);
      $messages[] = '<div class="error">Введите email.</div>';
    }
    if ($errors['2']){
      setcookie('2_error', '', 100000);
      $messages[] = '<div class="error">email имеет вид: test@example.com</div>';
    } 
    if ($errors['date']) {
      setcookie('date_error', '', 100000);
      $messages[] = '<div class="error">Введите дату рождения.</div>';
    }
    if ($errors['3']){
      setcookie('3_error', '', 100000);
      $messages[] = '<div class="error">Формат даты 09.02.2001</div>';
    } 
    if ($errors['radio-group-1']) {
      setcookie('radio-group-1_error', '', 100000);
      $messages[] = '<div class="error">Укажите пол.</div>';
    }
    if ($errors['radio-group-2']) {
      setcookie('radio-group-2_error', '', 100000);
      $messages[] = '<div class="error">Укажите кол-во конечностей.</div>';
    }
    if ($errors['superpowers']) {
      setcookie('superpowers_error', '', 100000);
      $messages[] = '<div class="error">Укажите суперспособность.</div>';
    }
    if ($errors['biography']) {
      setcookie('biography_error', '', 100000);
      $messages[] = '<div class="error">Напишите биографию.</div>';
    }
    if ($errors['check-1']) {
      setcookie('check-1_error', '', 100000);
      $messages[] = '<div class="error">Примите условия.</div>';
    }
  
    $values = array();

    $values['name'] = empty($_COOKIE['name_value']) ? '' : $_COOKIE['name_value'];
    $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
    $values['date'] = empty($_COOKIE['date_value']) ? '' : $_COOKIE['date_value'];
    $values['radio-group-1'] = empty($_COOKIE['radio-group-1_value']) ? '' : $_COOKIE['radio-group-1_value'];
    $values['radio-group-2'] = empty($_COOKIE['radio-group-2_value']) ? '' : $_COOKIE['radio-group-2_value'];
    $values['superpowers'] = empty($_COOKIE['superpowers_value']) ? '' : $_COOKIE['superpowers_value'];
    $values['biography'] = empty($_COOKIE['biography_value']) ? '' : $_COOKIE['biography_value'];
    $values['check-1'] = empty($_COOKIE['check-1_value']) ? '' : $_COOKIE['check-1_value'];
  
    $flag = FALSE;
  foreach($errors as $er){
    if(!empty($er)){
      $flag = TRUE;
      break;
    }
    print($er);
  }

  if (!$flag && !empty($_COOKIE[session_name()]) &&
  session_start() && !empty($_SESSION['login'])) { 
        try {
        $user = 'u24531';
        $pass1 = '5078774';
        $db = new PDO('mysql:host=localhost;dbname=u24531', $user, $pass1, array(PDO::ATTR_PERSISTENT => true));
        $log1 = $_SESSION['login'];
        $pass24 = $_SESSION['pass'];
          $data = $db->query("SELECT * FROM form where login = '$log1' AND pass='$pass24'");  

          foreach ($data as $row) {
            $values['name'] = $row['name'];
            $values['email'] = $row['email'];
            $values['date'] = $row['date'];
            $values['radio-group-1'] = $row['radio1'];
            $values['radio-group-2'] = $row['radio2'];
            $values['superpowers'] = $row['power'];
            $values['biography'] = $row['bio'];
            $values['check-1'] = $row['check1'];
        }
      } catch(PDOException $e) {
          echo 'Ошибка: ' . $e->getMessage();
      }
    
    printf('Вход с логином %s', $_SESSION['login']);
  }

  	include('form.php');
}
else{

  $errors = FALSE;

  if (!preg_match("/^[-a-zA-Z]+$/",$_POST['name'])){
    setcookie('1_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  } 
  if (!preg_match("/\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/",$_POST['email'])){
    setcookie('2_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  } 
  if (!preg_match("/^(\d{1,2})\.(\d{1,2})(?:\.(\d{4}))?$/",$_POST['date'])){
    setcookie('3_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  if (empty($_POST['name'])) {
    setcookie('name_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('name_value', $_POST['name'], time() + 365 * 24 * 60 * 60);
  }
  if (empty($_POST['email'])) {
    setcookie('email_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('email_value', $_POST['email'], time() + 365 * 24 * 60 * 60);
  }
  if (empty($_POST['date'])) {
    setcookie('date_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('date_value', $_POST['date'], time() + 365 * 24 * 60 * 60);
  }
  if (empty($_POST['radio-group-1'])) {
    setcookie('radio-group-1_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('radio-group-1_value', $_POST['radio-group-1'], time() + 365 * 24 * 60 * 60);
  }
  if (empty($_POST['radio-group-2'])) {
    setcookie('radio-group-2_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('radio-group-2_value', $_POST['radio-group-2'], time() + 365 * 24 * 60 * 60);
  }
  if (empty($_POST['superpowers'])) {
    setcookie('superpowers_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('superpowers_value', $_POST['superpowers'], time() + 365 * 24 * 60 * 60);
  }
  if (empty($_POST['biography'])) {
    setcookie('biography_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('biography_value', $_POST['biography'], time() + 365 * 24 * 60 * 60);
  }
  if (empty($_POST['check-1'])) {
    setcookie('check-1_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('check-1_value', $_POST['check-1'], time() + 365 * 24 * 60 * 60);
  }

  if ($errors) {
    header('Location: index.php');
    exit();
  }
  else {
    setcookie('name_error', '', 100000);
    setcookie('1_error', '', 100000);
    setcookie('email_error', '', 100000);
    setcookie('2_error', '', 100000);
    setcookie('date_error', '', 100000);
    setcookie('3_error', '', 100000);
    setcookie('radio-group-1_error', '', 100000);
    setcookie('radio-group-2_error', '', 100000);
    setcookie('superpowers_error', '', 100000);
    setcookie('biography_error', '', 100000);
    setcookie('check-1_error', '', 100000);
  }
  if (!empty($_COOKIE[session_name()]) &&
      session_start() && !empty($_SESSION['login'])) {
    $name = $_POST['field-name-1'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $radio1 = $_POST['radio-group-1'];
    $radio2 = $_POST['radio-group-2'];
    $power = $_POST['superpowers'];
    $bio = $_POST['biography'];
    $check = $_POST['check-1'];
      

    $user = 'u24531';
    $pass1 = '5078774';
    $db = new PDO('mysql:host=localhost;dbname=u24531', $user, $pass1, array(PDO::ATTR_PERSISTENT => true));
    $log1 = $_SESSION['login'];
    $pass24 = $_SESSION['pass'];

    try { 
      $stmt = $db->prepare("UPDATE form SET name='$name',email='$email',date='$date',radio1='$radio1',radio2='$radio2',power='$power',bio='$bio',check1='$check' where login = '$log1' AND pass='$pass24'");
      $stmt -> execute();
    }
    catch (PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
  }
    

  else {
    $login = uniqid();
    $pass = rand();
    $pass2 = md5($pass);
    setcookie('login', $login);
    setcookie('pass', $pass);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $radio1 = $_POST['radio-group-1'];
    $radio2 = $_POST['radio-group-2'];
    $power = $_POST['superpowers'];
    $bio = $_POST['biography'];
    $check = $_POST['check-1'];
  
    $user = 'u47505';
    $pass1 = '5503713';
    $db = new PDO('mysql:host=localhost;dbname=u24531', $user, $pass1, array(PDO::ATTR_PERSISTENT => true));

    try {
      $stmt = $db->prepare("INSERT INTO form (name,email,date,radio1,radio2,power,bio,check1,hash,login,pass) VALUE(:name,:email,:date,:radio1,:radio2,:power,:bio,:check1,:hash,:login,:pass)");
      $stmt -> execute(['name'=>$name,'email'=>$email,'date'=>$date,'radio1'=>$radio1,'radio2'=>$radio2,'power'=>$power,'bio'=>$bio,'check1'=>$check,'hash'=>$pass2,'login'=>$login,'pass'=>$pass]);

    }
    catch (PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
  }


    setcookie('save', '1');
    header('Location: index.php');
}
if(isset($_POST['exit'])){
  session_destroy();
  header('Location: login.php');
}
