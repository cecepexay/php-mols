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
    $no_srt   = $r1['no_srt'];
	$no_wa  = $r1['no_wa'];
    $staff   = $r1['staff'];
	$maintenance   = $r1['maintenance'];

    if ($npp == '') {
        $error = "Data tidak ditemukan";
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
            width: 1250px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        

        <!-- untuk mengeluarkan data -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Mols
				<a href="index.php" class="btn btn-primary">HOME</a>
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
							<th scope="col">No. WA</th>
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

</html>