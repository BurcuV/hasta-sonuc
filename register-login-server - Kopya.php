<?php
session_start();


$username = "";
$email    = "";
$password_1 = "";
$password_2= "";
$errors = array(); //kullanıcağımız değişkenler

$db = mysqli_connect('localhost', 'root', '', 'project'); //project adında veri tabanı oluşturdum.

//Kayıt

if (isset($_POST['reg_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']); //formdaki giriş değerlerini aldım.


  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  } //formun doğru doldurulduğunu kontrol ettiğimiz bölümdür.Burada array_push komutuna karşılık gelen hatayı "errors" dizisine ekliyoruz. 


  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1"; // users tablosunda aynı isim veya mail adresine sahip üye için limiti 1 veriyoruz.
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result); // Veri tabanında aynı mail veya kullanıcı adına sahip üye olup olmadığını kontrol ediyorum. 
  
  if ($user) { // Aynı isim veya maille giriş yapan kullanıcı varsa hata mesajı gösteriyorum.
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }


  if (count($errors) == 0) { //errors dizisinde hatayı saydığımızda hata yok ise kullanıcıyı kaydediyorum.
  	$password = md5($password_1);// şifreleri,şifrelemek için "md5" komutunu kullanıyorum.

  	$query = "INSERT INTO users (username, email, password_1) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php'); // Giriş yapan üyeyi anasayfaya yönlendiriyorum.
  }
}

// Giriş 
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);// kullanıcının adını ve şifresini "mysqli_real_escape_string" komutuyla filtreliyorum.

  if (empty($username)) {
  	array_push($errors, "Username is required");
  } //  kullanıcı adı girilmemişse hata mesajı yolluyorum.
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }  // Şifre girilmemişse hata mesajı yolluyorum.

  if (count($errors) == 0) { // Login olacak kişinin bilgilerinde hata veya eksiklik yoksa 
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password_1='$password'"; // users tablosundaki username ve password alanlarını seçiyorum.
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Giriş yaptın";
  	  header('location: index.php');
  	}
    // eğer veritabanındaki username ile girilen username aynıysa giriş yapabiliyor.
    else {
  		array_push($errors, "Kullanıcı adı veya şifre hatalı.");
  	}
  }
}

?>