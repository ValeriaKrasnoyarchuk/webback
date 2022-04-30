<?php
header('Content-Type: text/html; charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $messages = array();
	if (!empty($_COOKIE['save'])) {
      setcookie('save', '', 100000);
    	$messages[] = 'Данные сохранены';
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

    $name = $_POST['field-name-1'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $radio1 = $_POST['radio-group-1'];
    $radio2 = $_POST['radio-group-2'];
    $power = $_POST['superpowers'];
    $bio = $_POST['biography'];
    $check = $_POST['check-1'];


  
    $user = 'u47505';
    $pass = '5503713';
    $db = new PDO('mysql:host=localhost;dbname=u47505', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

    try {
      $stmt = $db->prepare("INSERT INTO users SET name = ?, email = ?, date = ?, gender = ?, limbs = ?, bio = ?, policy = ?");
      $stmt->execute(array($name, $email, $date, $radio1, $radio2, $bio, $check));
      $power_id = $db->lastInsertId();
      
      $superpowers = $db->prepare("INSERT INTO powers SET powers = ?, user_id = ? ");
      $superpowers->execute(array($power, $power_id));
      print('Спасибо, результаты сохранены.<br/>');
    }
    catch (PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
    setcookie('save', '1');
    header('Location: index.php');
}
