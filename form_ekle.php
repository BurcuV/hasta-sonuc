<?php include('form_vt.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="register-login.css">
	<title>Document</title>
</head>
<body>
	<div class="container">
		
	<div class="row">
		<div class="col mt-4 mb-4" >
			
	<form action="" method="post">
	<div class="">
				<img src="resimler/rontgen-3.jpg" width="345" height="200" alt="">
			</div>
    <table class="table">
        <tr>
            <td>Hastalık</td>
            <td><input type="text" name="hastalik" class="form-control" ></td>
        </tr>

        <tr>
            <td>Doktor</td>
            <td><textarea name="doktor" class="form-control" ></textarea></td>
        </tr>
		<tr>
            <td>Tarih</td>
            <td><input type="date" name="tarih" class="form-control"></textarea></td>
        </tr>
		<tr>
            <td>Not</td>
            <td><textarea name="yazi" class="form-control" ></textarea></td>
        </tr>

        <tr>
            <td></td>
            <td><input class="btn btn-primary"  type="submit" value="Ekle"></td>
        </tr>

    </table>

</form>
	<?php
	if ($_POST){
		$hastalik=$_POST['hastalik'];
		$doktor=$_POST['doktor'];
		$tarih=$_POST['tarih'];
		$yazi=$_POST['yazi'];

		if($hastalik<>"" && $doktor<>"" && $tarih<>"" && $yazi<>"" ){
			if ($baglanti-> query ("INSERT INTO f1 (hastalik,doktor,tarih,yazi) VALUES ('$hastalik','$doktor','$tarih','$yazi')"))
			{
			echo "Veri Eklendi";
		}
		else{
			echo "Hata Oluştu";
		}
	}
}
	?> 
		</div>
		<div class="row">
	<div class="col-md-7 " style="margin: 0px auto;">
<table class="table text-center">
    
    <tr>
        <th>id</th>
        <th>Hastalık</th>
        <th>Doktor</th>
        <th>Tarih</th>
        <th>Not</th> 
		
    </tr>

	<?php
		$sorgu=$baglanti->query("SELECT * FROM f1");
		while($sonuc = $sorgu->fetch_assoc()){
			$id=$sonuc['id'];
			$hastalik=$sonuc['hastalik'];
			$doktor=$sonuc['doktor'];
			$tarih=$sonuc['tarih'];
			$yazi=$sonuc['yazi'];
	?>
	  <tr>
        <td><?php echo $id;?></td>
        <td><?php echo $hastalik; ?></td>
        <td><?php echo $doktor; ?></td>
		<td><?php echo $tarih; ?></td>
		<td><?php echo $yazi; ?></td>

        <td><a href="form_duzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
        <td><a href="form_sil.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
    </tr> 
<?php
		}
		?>
</table> </div></div></div>
</body>
</html>