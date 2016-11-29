<?php 

/*
Template Name Posts:Контакты
*/

get_header();
?>

<!-- MAIN -->
<main> 
	<!-- CONTACTS -->
	<div class="contacts">
		<?php 
			if (have_posts()):
				while(have_posts()):
					the_post();
		 ?>
		<div class="container">
			<span class="contacts-title">
				Контакты
			</span>
			<!-- CONTACTS-MEMBERS -->
			<div class="contacts-members">
				<?php 
					if (have_rows("contacts_curators")):
						while ( have_rows("contacts_curators")):
							the_row();
							$avatar = get_sub_field("contacts_curator_avatar");
							$name = get_sub_field("contacts_curator_name");
							$position = get_sub_field("contacts_curator_position");
							$email = get_sub_field("contacts_curator_email");
							$phone = get_sub_field("contacts_curator_phone");
							$about = get_sub_field("contacts_curator_about");
				?>
				<div class="contacts-members-man clearfix">
					<img src="<?= $avatar ?>" class="contacts-members-man-pic">

					<div class="contacts-members-man-info">
						<span class="name">
							<?= $name ?>
						</span>
						<span class="position">
							<?= $position ?>
						</span>
						<a href="mailto:<?= $email ?>" class="email">
							<?= $email ?>
						</a>
						<a href="tel:<?= $phone ?>" class="phone">
							<?= $phone ?>
						</a>
					</div>

					<span class="contacts-members-man-about">
						<?= $about ?>
					</span>
				</div>
				<?php 
					endwhile;
					endif;
				 ?>
			</div>
			<!-- CONTACTS-MEMBERS -->
		</div>
		<?php 
		// конец статьи
			endwhile;
			endif;
	 	?>
	</div>
	<!-- END OF CONTACTS -->
</main>
<!-- END OF MAIN -->
<?php get_footer(); ?>