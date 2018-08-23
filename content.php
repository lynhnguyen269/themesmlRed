<?php
/**
 * @package redbiz
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
	<div class="main-post entry-border">
		<?php $layout = themesflat_choose_opt('blog_archive_layout');
		if ($layout == 'blog-grid' || $layout == 'blog-list' || $layout == 'blog-list-small') :
			get_template_part('tpl/feature-post');
		endif; ?>
		<div class="content-post">
			<div class="entry-box-title clearfix">
				<div class="wrap-entry-title">
					<?php
					if ( is_singular('post') ) :						
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
					?>
					<?php themesflat_render_meta(); ?>	
				</div><!-- /.wrap-entry-title -->
			</div>		
			<?php if ( (themesflat_choose_opt( 'blog_archive_readmore' ) == 1 && is_home() ) || (themesflat_choose_opt('blog_archive_readmore') == 1 && is_archive() ) ) : ?>
				<?php themesflat_render_post(themesflat_choose_opt('blog_archive_layout'),themesflat_choose_opt( 'blog_archive_readmore_text'));?>
			<?php else :  ?>
				<?php  themesflat_render_post(themesflat_choose_opt('blog_archive_layout')) ?>
			<?php  endif; ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'redbiz' ),
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- /.entry-post -->
	</div><!-- /.main-post -->
</article><!-- #post-## -->