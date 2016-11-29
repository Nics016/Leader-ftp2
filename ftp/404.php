<?php 
	wp_head();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Страница не существует</title>
</head>
<body>
	<div id="main-wrap">
		<div class="container">
			<img src="<?= get_template_directory_uri().'/img/404_pic.png'?>" alt="" class="page404-pic">
			<a href="<?= site_url() ?>" class="page404-link">Вернуться на главную</a> 
		</div>
	</div>
</body>
</html>