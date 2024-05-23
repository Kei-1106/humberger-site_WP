<?php get_header(); ?>
        <main>
            <?php if(have_posts()):
                while(have_posts()):
                the_post(); ?>
                <div id = "post-<?php the_ID(); ?>>"<?php post_class(); ?>>
                <?php 
                    $url = wp_get_attachment_url(get_post_thumbnail_id( $post -> ID ));
                    $noimage = get_template_directory_uri() . '/img/noimage.png';
                ?>
                <?php if( $url ): ?>
                    <div class = "p-common p-common__mainvisual c-background-color__black" style = "background-image: url('<?php echo $url; ?>');">
                        <h1 class = "p-common__title c-title--product"><?php echo get_the_title(); ?></h1>
                    </div>
                <?php else: ?>
                    <div class = "p-common p-common__mainvisual c-background-color__black" style="background-image: url('<?php echo $noimage; ?>');">
                        <h1 class = "p-common__title c-title--product"><?php echo get_the_title(); ?></h1>
                    </div>
                <?php endif; ?>
                    <div class = "l-wrapper--sub">
                        <?php the_content(); ?>
                    </div>
                    <div class="p-pagelink">
                        <?php wp_link_pages( 'before=<p>&after=</p>&next_or_number=number&pagelink= %' ); ?>
                    </div>
                    <?php get_footer(); ?>
                </div>
            <?php endwhile; else: ?>
                    <div class = "l-wrapper--sub">
                        <p>表示する記事はありません</p>
                    </div>
                    <?php get_footer(); ?>
                </div>
            <?php endif; ?>
        </main>
    </div>
<?php get_sidebar(); ?>
