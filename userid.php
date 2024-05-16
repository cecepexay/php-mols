<html>
<head>
	<title>Form HTML Pada PHP | JagoWebDev.com</title>
	<style>
		body {
			font-family: "segoe ui";
		}
		h1 {
			font-size: 25px;
		}
		input, select {
			border: 1px solid #CCCCCC;
			padding: 7px;
			font-size: 14px;
		}
		input[type="submit"] {
			padding: 7px 15px;
			margin-left: 120px;
			cursor: pointer;
		}
		label {
			width: 120px;
			display: block;
			float: left;
		}
		.checkbox, .radio {
			float:none;
			width: auto;
		}
		.row::after {
			content: "";
			display: block;
			clear:both;
		}
		.row {
			margin-bottom: 5px;
			clear: both;
		}
		.options {
			float:left;
		}
	</style>
</head>
<body>
	<h1>Form HTML Pada PHP</h1>
	<form action="" method="post">
		<div class="row">
			<label>Nama</label>
			<input type="text" name="nama" value="<?=isset($_POST['nama']) ? $_POST['nama'] : ''?>"/>
		</div>
		<div class="row">
			<label>Npp</label>
			<input type="text" name="npp" value="<?=isset($_POST['npp']) ? $_POST['npp'] : ''?>"/>
		</div>

		<div class="row">
			<label>Lokasi</label>
			<select name="area">
				<?php $options = array('Jakarta', 'Semarang', 'Surakarta', 'Yogyakarta', 'Surabaya');
				foreach ($options as $area) {
					$selected = @$_POST['area'] == $area ? ' selected="selected"' : '';
					echo '<option value="' . $area . '"' . $selected . '>' . $area . '</option>';
				}?>
			</select>
		</div>
		
		</div>
		</div>
		<div class="row">
			<input type="submit" name="submit" value="Simpan"/>
		</div>
	</form>
	<?php
	if (isset($_POST['submit'])) {
		
		echo '<li>Nama: ' . $_POST['nama'] . '-' . $_POST['npp'] . '-'.$_POST['area'].'</li>';
		
	}?>
</body>
</html>