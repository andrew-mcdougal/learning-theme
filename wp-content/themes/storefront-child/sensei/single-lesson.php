<?php
/**
 * The Template for displaying all single lessons.
 *
 * Override this template by copying it to yourtheme/sensei/single-lesson.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */
?>

<?php  get_header();  ?>

    <main class="main-fluid container"><!-- start the page containter -->
        <div id="primary" class="row-fluid">
            <div id="content" role="main" class="module-container">

                <?php the_post(); ?>

                <article <?php post_class( array( 'lesson', 'post' ) ); ?>>

                    <?php

                        /**
                         * Hook inside the single lesson above the content
                         *
                         * @since 1.9.0
                         *
                         * @param integer $lesson_id
                         *
                         * @hooked deprecated_lesson_image_hook - 10
                         * @hooked deprecate_sensei_lesson_single_title - 15
                         * @hooked Sensei_Lesson::lesson_image() -  17
                         * @hooked deprecate_lesson_single_main_content_hook - 20
                         */
                        do_action( 'sensei_single_lesson_content_inside_before', get_the_ID() );

                    ?>

                    <section class="entry fix">

                        <?php

                        if ( sensei_can_user_view_lesson() ) {

                            if( apply_filters( 'sensei_video_position', 'top', $post->ID ) == 'top' ) {

                                do_action( 'sensei_lesson_video', $post->ID );

                            }

                            the_content();


// if it has info slides then show stuff
if( have_rows('info_slide') ):

    // loop through the rows of data
    while ( have_rows('info_slide') ) : the_row();

        // show stuff
        $content = get_sub_field('info_content');

        echo '<h3>' . $content . '</h3>';

    endwhile;

// if it does not have info slides then show something else
else :

    // no data found
    echo 'it aint got nuffin';

endif;


                            

                        } else {
                            ?>

                                <p> <?php the_excerpt(); ?> </p>

                            <?php
                        }

                        ?>

                    </section>

                    <?php

                        /**
                         * Hook inside the single lesson template after the content
                         *
                         * @since 1.9.0
                         *
                         * @param integer $lesson_id
                         *
                         * @hooked Sensei()->frontend->sensei_breadcrumb   - 30
                         */
                        do_action( 'sensei_single_lesson_content_inside_after', get_the_ID() );

                    ?>

                </article><!-- .post -->

            </div><!-- #content .site-content -->
        </div><!-- #primary .content-area -->
    </main>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>



