<?php 

/*
Template Name Posts:О проекте
*/

get_header();

if ( have_posts() ):
	while ( have_posts() ): 
		the_post();

?>
<!-- MAIN -->
<main>
	<!-- PROJECT -->
	<?php 
	$president_avatar = get_field("president_avatar");
	$president_avatar = $president_avatar["url"];

	$president_name = get_field("president_name");
	?>
	<div class="project">
		<div class="container">
			<span class="project-title">О проекте</span>
			<div class="project-info-container">
				<div class="project-info clearfix">
					<span class="project-info-pic">	
						<img src="<?= $president_avatar ?>" alt="">
					</span>
					<span class="project-info-text">
						<?php the_content(); ?>
					</span>
				</div>
				<span class="project-info-subtext clearfix">
					<span class="project-info-subtext-text"> 
						Президент Фонда : <?= $president_name ?> 
					</span>
				</span>
				<div class="project-faces clearfix" id="contacts">
				<?php
				if ( have_rows("project_curators") ):
					$i = 0;

					while( have_rows("project_curators") ):
						the_row();
						$avatar = get_sub_field("curator_avatar");
						$avatar = $avatar["url"];
				?>
					<a href="#" class="project-faces-element" data-event="showModal" data-modal="<?= $i ?>">
						<img src="<?= $avatar ?>" alt="">
					</a>
				<?php
					$i++;
					endwhile;
				endif;
				?>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF PROJECT -->

	<!-- VIDEO -->
	<?php
	// end of category cycle
		endwhile;
	endif;
	$video_link = get_field("video_link");
	$video_title = get_field("video_title");
	$video_description = get_field("video_description");
	$video_description_link = get_field("video_description_link");
	?>
	<div class="video clearfix">
		<div class="container clearfix">
			<iframe class="youtube" width="700" height="450" src="<?= $video_link ?>" frameborder="0" allowfullscreen></iframe> 
			<div class="video-info">
				<span class="video-info-title">
					<?= $video_title ?>
				</span>
				<span class="video-info-text">
					<?= $video_description ?>
				</span>
				<a href="<?= $video_description_link ?>" class="video-info-readnext"></a>
			</div>
		</div>
	</div>
	<!-- END OF VIDEO -->

	<!-- CATEGORIES -->
	<div class="categories" id="archive">
		<div class="container clearfix">
		<?php 
			// запрашиваем категорию "Архив"
			$post_categories = wp_get_post_categories( get_the_ID() );
			$current_category_ID = $post_categories[0];
			$categories = get_categories( array(
			    'parent'  => $current_category_ID
			) );
			$catt = $categories[0];

			// выводим посты категории Архив
			$archive_posts = new WP_Query('cat='.$catt->term_id."&posts_per_page=18");
			$i = 0;
			while ( $archive_posts->have_posts() ):
				$archive_posts->the_post();
		 ?>
			<a class="categories-element" href="<?php the_permalink(); ?>" data-event="showArticleModal" data-modal="<?= $i ?>">
				<img src="<?php the_post_thumbnail_url(); ?>" class="categories-element-pic">
			</a>
		<?php 
			$i++;
			endwhile;
			wp_reset_postdata();
		 ?>
		</div>
	</div>
	<!-- END OF CATEGORIES -->
</main>
<!-- END OF MAIN -->

<!-- MODAL CURATORS -->
<div id="modal">
	
	<?php

	if ( have_rows("project_curators") ):
		$i = 0;

		while( have_rows("project_curators") ):
			the_row();

			$avatar = get_sub_field("curator_avatar");
			$avatar = $avatar["url"];

			$title = get_sub_field("curator_title");
			$about = get_sub_field("curator_about");
			$phone = get_sub_field("curator_phone");
			$email = get_sub_field("curator_email");
	?>

	<div class="modal-container" data-modal-id="<?= $i ?>">
		
		<div class="modal-content">

			<div class="modal-director-container clearfix">
				
				<div class="modal-director-avatar">
					<img src="<?= $avatar ?>" alt="">
				</div>

				<div class="modal-director-meta">
					
					<div class="modal-director-title-container clearfix">
						
						<span class="modal-director-title">
							<?= $title ?>
						</span>
					
						<span class="modal-close"></span>

					</div>

					<div class="modal-director-text-container">
						<span class="modal-director-text">
							<?= $about ?>
						</span>
					</div>

				</div>
	
			</div>
			
		</div>	

		<div class="modal-director-contacts-container clearfix">
				
			<div class="modal-director-phone">
				<a href="tel:<?= $phone ?>" class="modal-contacts-text"><i class="phone-icon"></i> <?= $phone ?></a>
			</div>

			<div class="modal-director-email">
				
				<a href="mailto:<?= $email ?>" class="modal-contacts-text"><img src="<?php echo get_template_directory_uri(); ?>/img/email.png"> <?= $email ?></a>
			</div>

		</div>

	</div>
	<?php
		$i++;
		endwhile;
	endif;
	?>

</div>
<!-- END OF MODAL CURATORS -->

<!-- ARTICLES MODAL -->
<div id="articles-modal">
	
	<?php 
		$archive_posts = new WP_Query('cat='.$catt->term_id."&posts_per_page=18");
		$i = 0;
		while ( $archive_posts->have_posts() ):
			$archive_posts->the_post();

			$content = get_the_content();
			$content = strip_shortcodes($content);
	        $content = str_replace(']]>', ']]&gt;', $content);
	        $content = strip_tags($content);
	        $excerpt_length = 25;
	        $words = explode(' ', $content, $excerpt_length + 1);
	        if(count($words) > $excerpt_length){
	            array_pop($words);
	        }
	        $content = implode(' ', $words);
	        $content .="..."
	?>
		

	<div class="articles-modal-container" data-modal-id="<?= $i ?>">
		<div class="articles-modal-content clearfix">
			<span class="articles-modal-close"></span>	
			<img src="<?php the_post_thumbnail_url(); ?>" class="articles-modal-content-pic">
			<div class="articles-modal-content-info">
				<span class="articles-modal-content-info-title">
					<?= the_title(); ?>
				</span>
				<div class="articles-modal-content-info-text-container">
					<span class="articles-modal-content-info-text">
						<?= $content ?>
					</span> 
				</div>
			</div>
		</div>
		<a href="<?php the_permalink(); ?>" class="articles-modal-content-info-readnext"></a>
	</div>
	<?php 
		$i++;
		endwhile;
		wp_reset_postdata();
	 ?>

</div>
<!-- END OF ARTICLES MODAL -->
<?php 
get_footer(); 
?>