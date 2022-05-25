<?php
session_start();

// Değişkenleri başlatıyoruz.
$username = "";
$email    = "";
$errors = array(); 

// Veritabanına bağlanıyorum.
$db = mysqli_connect('localhost', 'root', '', 'project'); 

// Kayıt oalcak kullanıcı için
if (isset($_POST['reg_user'])) {
  // İnputlara girilen değerleri alıyoruz.
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  //Formu doğruluyorum.
  // empty ile inputlara girilen bilgiler boş ve eşleşiyor mu kontrol ediyorum.
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) { //girilen şifreler aynı değilse "The two passwords do not match " hata mesajını gösteriyorum.
	array_push($errors, "The two passwords do not match");
  }

  // Veritabanında kayıt olunmak istenilen ad ve mailde kullanıcı olup olmadığını kontrol ediyorum.
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // girilen ad ile kullanıcı varsa "Username already exists" hata mesajını gösteriyorum.
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Formda hata yoksa kullanıcıyı kaydediyorum.
  if (count($errors) == 0) {
  	$password = md5($password_1);//md5 ile şifreyi güvenlik için şifreliyorum.

  	$query = "INSERT INTO users (username, email, password_1) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location:form_ekle.php');//giriş yapan kullanıcıyı anasayfaya yönlendiriyorum.
  }
}

// Giriş yapacak kullanıcı için
if (isset($_POST['login_user'])) { //post yapılan kullanıcının veritabanında ad ve şifresini alıyoruz.
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) { // Ad ve şifre girilmemiş ise girilmesi için uyarıyoruz.
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) { //hata yoksa kullsnıcı girişini yapıyoruz.
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password_1='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: form_ekle.php'); //hata yoksa form ekle sayfasını açıyor.
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>