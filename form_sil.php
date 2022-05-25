<!-- $_GET= verileri çekmek için
include=çalışılan sayfaya dahil edilecek sayfalar için
query= sorgu için kullanılır. Bilgi almak için kullanılır.
DELETE= Tablo üzerinde silme işlemi yapar.
FROM= Hangi veritabanı üzerinde işlem yapılacağını belirtmek için kullanılır.
Where= Neredeki veriler üzerinde işlem yapılacağını belirtmek için kullanılır.

<?php
if($_GET) 
{
    include("form_vt.php");
    if ($baglanti -> query ("DELETE FROM f1 WHERE id =".(int)$_GET['id'])) // eğer f1 tablosundaki seçilen id silinirse. 
    {
        header("location:form_ekle.php"); //form_ekle.php sayfasına yönlendirilecek.
    }
}
?>