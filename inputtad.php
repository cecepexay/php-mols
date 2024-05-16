<?php
error_reporting(0);
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "mols";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$npp        = "";
$nama       = "";
$unit     = "";
$userid   = "";
$pass      = "";
$no_srt     = "";
$no_wa		= "";
$staff      = "";
$maintenance	= "";
$error = "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from uset_tad where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from uset_tad where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $npp        = $r1['npp'];
    $nama       = $r1['nama'];
    $unit     = $r1['unit'];
    $userid   = $r1['userid'];
    $pass   = $r1['pass'];
    $no_req   = $r1['no_req'];
	$no_wa   = $r1['no_wa'];
    $staff   = $r1['staff'];
	$maintenance   = $r1['maintenance'];

    if ($npp == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $npp        = $_POST['npp'];
    $nama       = $_POST['nama'];
    $unit     = $_POST['unit'];
    $userid   = $_POST['userid'];
    $pass   = $_POST['pass'];
    $no_srt   = $_POST['no_srt'];
	$no_wa   = $_POST['no_wa'];
    $staff   = $_POST['staff'];
	$maintenance   = $_POST['maintenance'];

    if ($npp && $nama && $unit && $userid && $pass && $no_srt && $no_wa && $staff && $maintenance) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update uset_tad set npp = '$npp',nama='$nama',unit = '$unit',userid='$userid',pass='$pass',no_srt='$no_srt',no_wa='$no_wa',staff='$staff',maintenance='$maintenance' where id = '$id'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into uset_tad(npp,nama,unit,userid,pass,no_srt,no_wa,staff,maintenance) values ('$npp','$nama','$unit','$userid','$pass','$no_srt','$no_wa','$staff','$maintenance')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
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
                            <input type="text" class="form-control" id="npp" name="npp" value="<?php echo $npp =isset($_POST['npp'])? $_POST['npp'] : '' ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama =isset($_POST['nama'])? $_POST['nama'] : '' ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_wa" class="col-sm-2 col-form-label">unit</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $unit =isset($_POST['unit'])? $_POST['unit'] : '' ?>">
                        </div>
                    </div>
					
					<div class="mb-3 row">
                        <label for="no_wa" class="col-sm-2 col-form-label">UserID</label>
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
                        <label for="no_wa" class="col-sm-2 col-form-label">PASSWORD</label>
                        <div class="col-sm-10">
                            <?php
							function generatePassword ($length = 8)
							{
							  $genpassword = "";
							  $possible = "0123456789abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
							  $i = 0;
							  while ($i < $length) {
								$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
								if (!strstr($genpassword, $char)) {
								  $genpassword .= $char;
								  $i++;
								}
							  }
							  return $genpassword;
							}
							?>
                            <input type="text" class="form-control" id="pass" name="pass" value="<?php echo generatePassword(); ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_wa" class="col-sm-2 col-form-label">NO SURAT</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_srt" name="no_srt" value="<?php echo $no_srt ?>">
                        </div>
                    </div>
					<div class="mb-3 row">
                        <label for="no_wa" class="col-sm-2 col-form-label">No. WA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_wa" name="no_wa" value="<?php echo $no_wa ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_wa" class="col-sm-2 col-form-label">staff</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="staff" name="staff" value="<?php echo $staff ?>">
                        </div>
                    </div>
					<div class="mb-3 row">
                        <label for="no_wa" class="col-sm-2 col-form-label">MAINTENANCE</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="maintenance" name="maintenance" value="<?php echo $maintenance ?>">
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
						<a href="index.php" class="btn btn-primary">Home</a>
						<a href="inputpegawai.php" class="btn btn-primary">Input Pegawai</a>
						<a href="molspegawai.php" class="btn btn-primary">Lihat data Pegawai</a>
						<a href="molstad.php" class="btn btn-primary">Lihat data TAD</a>
                    </div>	
                </form>
            </div>
        </div>

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mols
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NPP</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">UNIT</th>
                            <th scope="col">USERID</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col">NO SURAT</th>
							<th scope="col">no_wa</th>
                            <th scope="col">STAFF</th>
							<th scope="col">MAINTENANCE</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from uset_tad order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $npp       = $r2['npp'];
                            $nama       = $r2['nama'];
                            $unit     = $r2['unit'];
                            $userid   = $r2['userid'];
                            $pass   = $r2['pass'];
                            $no_srt   = $r2['no_srt'];
							$no_wa   = $r2['no_wa'];
                            $staff   = $r2['staff'];
							$maintenance   = $r2['maintenance'];
                            
                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $npp ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $unit ?></td>
                                <td scope="row"><?php echo $userid ?></td>
                                <td scope="row"><?php echo $pass ?></td>
                                <td scope="row"><?php echo $no_srt ?></td>
								<td scope="row"><?php echo $no_wa ?></td>
                                <td scope="row"><?php echo $staff ?></td>
								<td scope="row"><?php echo $maintenance ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</body>

</html
