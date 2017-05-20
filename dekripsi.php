<?php  
	error_reporting(0);
	include "class.php";
	$sctr = new Sctr();
	$chaesar = new Chaesar();
	$strHasil = "";
	if (isset($_POST['proses'])) {
		$str = $_POST['plain'];
		$k = $_POST['key'];
		$ar = explode(" ", $str);
		$en1 = array();
		foreach ($ar as $key => $value) {
			array_push($en1, $sctr->Dekripsi($value,$k));
		}
		//enkripsi 2
		$en2 = array();
		foreach ($en1 as $key => $value2) {
			array_push($en2, $chaesar->Dekripsi($value2,$k));
		}
		$strHasil = $en2;
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Kripto</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/costum.css">
	<link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
</head>
<body style="background-color:#A0A0A0;">
<div style="margin-top:40px;">
	<div class="container">
		<div class="col-md-12" style="padding:0px;">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">DEKRIPSI SCTR DAN CAESAR CHIPER</h3>
			  </div>
			  <div class="panel-body">
				 <form method="post">
				 	<div class="form-group">
				 		<label>Plaintext</label>
				 		<input type="text" class="form-control" name="plain"<?php if(isset($_POST['proses'])){echo "value='".$_POST['plain']."'";} ?> placeholder="Masukan Plain Text" required>
				 	</div>

				 	<div class="form-group">
				 		<label>Key</label>
				 		<input type="number" class="form-control" name="key" placeholder="Masukan Key" required>
				 		<p class="text-danger">Key diusahakan tidak lebih dari jumlah kata.</p>
				 	</div>
				 	<div class="form-group">
				 		<label>Chiper Text</label>
				 		<input type="text" class="form-control" name="chiper" value="<?php 
				 		if (isset($_POST['proses'])) {
				 		 	foreach ($strHasil as $key => $dt) {
					 			echo $dt." ";
					 		}
				 		 } 
				 		?>" readonly="true">
				 	</div>
				 
			  </div>
			  <div class="panel-footer">
			  	<button class="btn btn-primary" name="proses">Proses</button>
			  	<button class="btn btn-warning" type="reset">Reset</button>
			  	<a href="index.php" class="btn btn-info">Go Enkripsi</a>
			  	</form>
			  </div>
			</div>
		</div>
	</div>
</div>
<footer>
    <div class="footer">
       
      <div class="container narrow row-fluid" style="text-align:center; padding-top:5px;">
          <p>Copyright &copy; 2016 Kripto Grafi</p>    
      </div>
    </div>
  </footer>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>