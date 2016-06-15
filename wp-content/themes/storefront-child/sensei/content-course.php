<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Content-course.php template file
 *
 * responsible for content on archive like pages. Only shows the course excerpt.
 *
 * For single course content please see single-course.php
 *
 * @author 		Automattic
 * @package 	Sensei
 * @category    Templates
 * @version     1.9.0
 */
?>

<div class="emodule-box row" >

    <?php
    /**
     * This action runs before the sensei course content. It runs inside the sensei
     * content-course.php template.
     *
     * @since 1.9
     *
     * @param integer $course_id
     */
    do_action( 'sensei_course_content_before', get_the_ID() );
    ?>
    <div class="module-div module-icon">
        <?php echo Sensei()->course->course_image(  ); ?>
    </div>
    <div class="module-div module-info">
        <h4><?php the_title(); ?></h4>
        <p><?php the_excerpt(); ?></p>
        <?php echo Sensei()->course->the_course_meta(); ?>
    </div>

    <?php
    /**
     * Fires after the course block in the content-course.php file.
     *
     * @since 1.9
     *
     * @param integer $course_id
     *
     * @hooked  Sensei()->course->the_course_free_lesson_preview - 20
     */
    do_action('sensei_course_content_after', get_the_ID() );
    ?>


</div> <!-- article .(<?php esc_attr_e( join( ' ', get_post_class( array( 'course', 'post' ) ) ) ); ?>  -->