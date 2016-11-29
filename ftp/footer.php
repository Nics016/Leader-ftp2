<?php 
	// Переменные настроек темы
	$input_youtube = get_theme_mod('input_youtube', 'http://youtube.com'); 
	$input_instagram = get_theme_mod('input_youtube', 'http://instagram.com'); 
	$input_vk = get_theme_mod('input_youtube', 'http://vk.com'); 

	$input_phone = get_theme_mod('input_phone', '8(800) 123 78 99'); 
?>

<footer id="main-footer">
	<div class="container">
		<div class="footer-down clearfix">
			<a href="<?= $input_youtube ?>" class="footer-down-youtube"></a>
			<a href="<?= $input_instagram ?>" class="footer-down-instagram"></a>
			<a href="<?= $input_vk ?>" class="footer-down-vk"></a>
			<a href="tel:<?= $input_phone ?>" class="footer-down-phone"><?= $input_phone ?></a>
		</div>
	</div>
</footer>

</div>
	<!-- END OF MAIN-WRAP -->
<?php wp_footer(); ?>
</body>
</html>