<?php
 include ("form_vt.php");
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
        $sorgu = $baglanti ->query ("SELECT * FROM f1 WHERE id =".(int)$_GET['id']);
        $sonuc= $sorgu -> fetch_assoc();

     ?>
     <div class="container">
<div class="col-md-6">

<form action="" method="post">
    
    <table class="table">
        
        <tr>
            <td>Hastalik</td>
            <td><input type="text" name="hastalik" class="form-control" value="<?php echo $sonuc['hastalik']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>

        <tr>
            <td>Doktor</td>
            <td><textarea name="doktor" class="form-control"><?php echo $sonuc['doktor']; ?></textarea></td>
        </tr>

        <tr>
            <td>Tarih</td>
            <td><textarea name="tarih" class="form-control"><?php echo $sonuc['tarih']; ?></textarea></td>

        </tr>
        <tr>
            <td>Yazı</td>
            <td><textarea name="yazi" class="form-control"><?php echo $sonuc['yazi']; ?></textarea></td>

        </tr>

        <tr>
            <td></td>
            <td><input type="submit" class="btn btn-primary" value="Kaydet"></td>
        </tr>

    </table>
</form></div></div>
<?php
if($_POST){
    $hastalik = $_POST['hastalik'];
    $doktor = $_POST['doktor'];
    $tarih = $_POST['tarih'];
    $yazi = $_POST['yazi'];

if($hastalik<>"" && $doktor<>"" && $tarih<>"" && $yazi<>""){
    if($baglanti->query("UPDATE f1 SET hastalik ='$hastalik', doktor='$doktor', tarih='$tarih', yazi='$yazi' WHERE id =".$_GET ['id']))
{
    header("location:form_ekle.php");

}
else{
    echo "Hata oluştu";
}
}
}
?>

 </body>
 </html>