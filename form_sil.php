<?php
if($_GET)
{
    include("form_vt.php");
    if ($baglanti -> query ("DELETE FROM f1 WHERE id =".(int)$_GET['id']))
    {
        header("location:form_ekle.php");
    }
}
?>