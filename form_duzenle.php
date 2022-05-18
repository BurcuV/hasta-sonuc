<?php
 include ("form_vt.php"); //veritabanını sayfaya ekliyorum. Veritabanındaki değerler üzerinde düzenleme yapacağız.
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     <?php
        $sorgu = $baglanti ->query ("SELECT * FROM f1 WHERE id =".(int)$_GET['id']); //id değeri ile düzenlenecek verileri veritabanından alacak sorgu

        $sonuc= $sorgu -> fetch_assoc(); //  fetch_assoc() ile verileri alıyoruz.

     ?>
     <div class="container"> <!-- Bootstrap responsive tasarım için sırasıyla container>row>col yapısını kullanıyorum.-->
     <div class="row"> 
     <div class="col">  

<form action="" method="post">
    
    <table class="table">
        
        <tr>
            <td>Hastalik</td>
            <td><input type="text" name="hastalik" class="form-control" value="<?php echo $sonuc['hastalik']; 
                  ?>">
            </td>
        </tr><!-- Veritabanından verileri çekip inputların içine yazdırıyoruz. -->

        <tr>
            <td>Doktor</td>
            <td><textarea name="doktor" class="form-control"><?php echo $sonuc['doktor']; ?></textarea></td>
        </tr> <!-- Veritabanından verileri çekip inputların içine yazdırıyoruz. -->

        <tr>
            <td>Tarih</td>
            <td><textarea name="tarih" class="form-control"><?php echo $sonuc['tarih']; ?></textarea></td>

        </tr> <!-- Veritabanından verileri çekip inputların içine yazdırıyoruz. -->
        <tr>
            <td>Yazı</td>
            <td><textarea name="yazi" class="form-control"><?php echo $sonuc['yazi']; ?></textarea></td>

        </tr> <!-- Veritabanından verileri çekip inputların içine yazdırıyoruz. -->

        <tr>
            <td></td>
            <td><input type="submit" class="btn btn-primary" value="Kaydet"></td>
        </tr> <!-- Veritabanından verileri çekip inputların içine yazdırıyoruz. -->

    </table>
</form></div></div></div>
<?php
if($_POST){ //post olup olmadığını kontrol ediyorum.
    $hastalik = $_POST['hastalik'];
    $doktor = $_POST['doktor'];
    $tarih = $_POST['tarih'];
    $yazi = $_POST['yazi']; //post edildiyse verileri değişkenlerde tutuyorum.

if($hastalik<>"" && $doktor<>"" && $tarih<>"" && $yazi<>""){ // veri alanları boş mu diye bakıyorum
    // formu düzenleyebilmek için veritabanındaki veriler için f1 tablosunu "UPDATE" diyorum. Update edilecek verileri id değeri ile seçiyorum.
    if($baglanti->query("UPDATE f1 SET hastalik ='$hastalik', doktor='$doktor', tarih='$tarih', yazi='$yazi' WHERE id =".$_GET ['id']))
{
    header("location:form_ekle.php"); //veriler eklenirse form sayfasına gönderiyorum.

}
else{
    echo "Hata oluştu";
}
}
}
?>

 </body>
 </html>