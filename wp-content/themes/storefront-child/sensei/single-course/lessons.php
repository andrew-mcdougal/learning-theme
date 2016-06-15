<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * The Template for displaying all single course meta information.
 *
 * Override this template by copying it to yourtheme/sensei/single-course/course-lessons.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */
?>

<section class="course-lessons">

    <?php

        /**
         * Actions just before the sensei single course lessons loop begins
         *
         * @hooked WooThemes_Sensei_Course::load_single_course_lessons_query
         * @since 1.9.0
         */
        do_action( 'sensei_single_course_lessons_before' );

    ?>

    <?php

    //lessons loaded into loop in the sensei_single_course_lessons_before hook
    if( have_posts() ):

        // start course lessons loop
        while ( have_posts() ): the_post();  ?>

    <article class="lesson-box">
        <?php echo WooThemes_Sensei_Lesson::the_lesson_meta(); ?>
        <?php the_excerpt(); ?>
    </article>

        <?php endwhile; // end course lessons loop  ?>

    <?php endif; ?>

    <?php

        /**
         * Actions just before the sensei single course lessons loop begins
         *
         * @hooked WooThemes_Sensei_Course::reset_single_course_query
         *
         * @since 1.9.0
         */
        do_action( 'sensei_single_course_lessons_after' );

    ?>

</section>
