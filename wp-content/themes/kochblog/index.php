<?php get_header(); ?>

<div class="container"> 
	<div class="row">
		<div class="col-md-9">
<?php 
if (!have_posts()) {
	echo "Keine Rezepte gefunden!";
}

while (have_posts()){
	the_post(); ?>
	<article class="clearfix <?php if(is_single()) {echo "post-single";} ?>">
		<div class="date pull-right"><?php the_date(); ?></div>
	<?php if (has_post_thumbnail()) {
		the_post_thumbnail(is_single()? "large" : "thumbnail");
	} ?>
		<a href="<?php the_permalink(); ?>">
			<h1> <?php the_title(); ?> </h1>
		</a>
		<?php the_content(); ?>
	</article>
<?php } ?> 
		</div>
		<div class="col-md-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
