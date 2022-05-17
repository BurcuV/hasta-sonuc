<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@1&family=Festive&family=Open+Sans:wght@400;500;700&family=Roboto+Condensed:ital,wght@0,300;0,400;1,400&family=Roboto+Slab&family=Roboto:wght@500&family=Rowdies:wght@300&family=Secular+One&family=Ubuntu:ital@1&display=swap" rel="stylesheet">
</head>
<body>



   
<div class="container">
           
           <div class="row navbar ">

               <nav class="navbar ">
                 <div class=" row link justify-content-center ">
           
             <div class=" col logo  ">Logo</div>
             <a class="col home border-bottom  text-decoration-none " href="#">Anasayfa</a> </div>
             <div class="  buton  justify-content-end ">
            <a href="register.php">  <button class=" btn btn-outline-success " >Kaydol</button></a> 
          <a href="login.php"> <button class=" btn btn-outline-success ">Giriş </button></a> </div> </nav>
   </div>
   <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
       <div class="carousel-inner pt-2">
         <div class="carousel-item active">
           <img src="resimler/banner.png.png" class="d-block w-100" alt="...">
         </div>
         
       </div>
     </div>
   
       
     <div class="row pt-4 pb-4 ">
       <div class="col-12">
         <div class="card">
           <div class="card-body">
             <h5 class="card-title">Neden E-Sonuç ? </h5>
             <p class="card-text"> E-sonuç, hastaların muayane sonrası sonuçlarını saklayarak kişisel bir kütüphane sunmaktadır.</p>
            
           </div>
         </div>
       </div>
     </div>
             
     <div class="row  justify-content-center mb-4 pb-4 ">
       <div class="col p-2 m-2 cards">
         <h5 class="card-title">Ulaşım Kolaylığı Sağlar</h5>
         <p class="card-text">E-sonuç,hastalara hastalık bilgilerini saklayıp sonradan takip edebileceği bir ortam sunar. Böylelikle rahatsızlığınız hakkında detaylara E-sonuçtan istediğiniz zaman ulaşabilirsiniz. </p>

       </div>
       <div class="col p-2 m-2 cards">
         <h5 class="card-title">Karışıklıkları Önler</h5>
<p class="card-text">Muayanesinden memnuniyetle ayrıldığınız doktorun ismini, hastalığınız için koyulan tıbbi tanımı ya da sizin rahatsızlığınız için önerilenleri unuttuğunuz olmuştur. Bu gibi durumların artık sorun olmaması için buradayız.</p>
       </div>
       <div class="col p-2 m-2 cards">
         <h5 class="card-title">Kimseyle Paylaşılmaz</h5>
         <p class="card-text"> Hastanın eklediği bilgilere erişim sadece hastanın kendisine aittir. Doktorunun ya da kurum/kuruluşların bilgileri görme hakkı yoktur.
         </p>            </div>
       
     </div>
    
    
       
       
             <div class="row footer border-top text-dark  pb-2 justify-content-center pt-4 pb-4">

           <div class="phone col-3  ">Phone: 0212 000 00 00</div>
           <div class="email col-3  ">E-mail: örnekmail@gmail.com</div>
           <div class="fax col-3 ">Fax: +902123102416</div>
           
             </div>
       </div>
     
     
    

</body>
</html>