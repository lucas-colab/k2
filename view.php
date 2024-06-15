<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Videos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			min-height: 100vh;
			background-color: #f8f9fa;
		}

		video {
			width: 640px;
			height: 360px;
			margin-top: 70px;
		}

		a {
			text-decoration: none;
			color: black;
			font-size: 1.5rem;
		}

		.alb div {
			margin-bottom: 20px;
			text-align: center;
		}
	</style>
</head>

<body>
	<a href="index.php">UPLOAD</a> || <a href="view_img.php">IMAGENS</a>
	<div class="alb">
		<?php
		include "db_conn.php";
		$sql = "SELECT * FROM videos ORDER BY id DESC";
		$res = mysqli_query($conn, $sql);
		if (mysqli_num_rows($res) > 0) {
			while ($video = mysqli_fetch_assoc($res)) {
		?>
				<div>
					<video src="uploads/<?= htmlspecialchars($video['videos_url']) ?>" controls></video>
					<section><?= htmlspecialchars($video['descricao']) ?></section>
				</div>
		<?php
			}
		} else {
			echo "Nenhum vídeo encontrado.";
		}
		?>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>