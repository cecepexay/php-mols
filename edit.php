<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query_mysql = mysql_query("SELECT * FROM user_pegawai WHERE id='$id'")or die(mysql_error());
	$nomor = 1;
	while($data = mysql_fetch_array($query_mysql)){
	?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mols</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 1100px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                POWERED BY HDE USERID SCR - Create / Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
					
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="npp" class="col-sm-2 col-form-label">NPP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="npp" name="npp" value="<?php echo $data['npp'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama =isset($_POST['nama'])? $_POST['nama'] : '' ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">unit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $unit =isset($_POST['unit'])? $_POST['unit'] : '' ?>">
                        </div>
                    </div>
					
					<div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">UserID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="userid" name="userid" value="<?php
						if (isset($_POST['submit'])) {
		
						echo '' . $_POST['unit'] . '-' . $npp . '-'.$_POST['nama'].'';
						}?>">
                        </div>
                   
					<div><input type="submit" name="submit" value="Cek UserID"/></div>
                        <div class="col-sm-10">
                        <p id="demo"></p>
                        </div>
                    </div>
					
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pass" name="pass" value="<?php echo $pass ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">NO SURAT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_srt" name="no_srt" value="<?php echo $no_srt ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">staff</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staff" name="staff" value="<?php echo $staff ?>">
                        </div>
                    </div>

                    
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
						<a href="inputtad.php" class="btn btn-primary">Input TAD</a>
						<a href="molspegawai.php" class="btn btn-primary">Lihat data Pegawai</a>
						<a href="molstad.php" class="btn btn-primary">Lihat data TAD</a>
                    </div>	
                </form>
            </div>
        </div>
	</div>
</body>

</html>