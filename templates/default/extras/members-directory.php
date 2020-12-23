<?php get_header(); ?>

<?php do_action( 'bbp_before_main_content' ); ?>

<?php do_action( 'bbp_template_notices' ); ?>

    <div id="forum-front" class="bbp-forum-front">
        <h1 class="entry-title"><?php echo gdmed()->get_page_title(); ?></h1>
        <div class="entry-content">

            <?php bbp_get_template_part( 'content', 'members-directory' ); ?>

        </div>
    </div>

<?php do_action( 'bbp_after_main_content' ); ?>

<?php get_sidebar(); ?>
<?php get_footer();
