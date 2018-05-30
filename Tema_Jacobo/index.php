<?php get_header(); ?>

<div class="row">

    <div class="col-md-2">


        <div class="row">
            <div class="col-md-12">
                <div id="myCarousel" class="carousel slide animated rollIn" data-ride="carousel">
                    <!-- Indicators -->


                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item ">
                            <img src="https://i.pinimg.com/736x/93/ae/d6/93aed6e1b3941ca4e96e56993585d8fb.jpg
                        " alt="Chicago">
                        </div>
                        <div class="item active">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lion.jpg" alt="Chicago">
                        </div>

                        <div class="item">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/eagle.jpg"
                                 alt="New York">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 menu_lateral">
                <h3>Menu lateral</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'second'

                ));
                ?>
            </div>
        </div>
    </div>


    <article id="main" class="col-md-6 col-md-push-1">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <small>Publicado el <?php the_time('j/m/Y') ?> por <?php the_author_posts_link() ?>  </small>
            <div>
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail();
                }
                ?>
            </div>


            <?php the_content(); ?>

        <?php endwhile; else: ?>
            <p><?php _e('No hay entradas .'); ?></p>
        <?php endif; ?>


    </article>
    <article class="col-md-2 col-md-push-1 animated rollIn">
        <?php get_sidebar() ?>
    </article>
</div>


<?php get_footer(); ?>
