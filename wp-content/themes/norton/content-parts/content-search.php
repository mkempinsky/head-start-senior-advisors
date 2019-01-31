<?php 
/* For Search Results
*/
?>
    
  <div class="image-box">
          <?php if(has_post_thumbnail()) : ?>
          <div>
             <?php the_post_thumbnail('norton-page-thumbnail', array('class' => 'img-responsive')); ?>
            </div>
          <?php endif; ?>
          <div class="overlay"></div>
        </div> <!-- /.image-box -->
        <div class="post-meta">
          <h5 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
          <ul class="meta-left">
            <li><a href="" class="date">
                <span class="fa fa-calendar" aria-hidden="true"></span><?php echo get_the_date();?></a>
            </li>
            <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="date">
                <span class="fa fa-user" aria-hidden="true"></span><?php echo esc_html__( 'By', 'norton' ); ?> <?php the_author(); ?></a>
            </li>
            <li><a href="" class="date">
                <span class="fa fa-comment-o" aria-hidden="true"></span><?php comments_number( __('0', 'norton'), __('1', 'norton'), __('%', 'norton') ); ?></a>
            </li>
          </ul>
          <p><?php the_excerpt(); ?></p>
          <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__( 'READ MORE', 'norton' ); ?></a>
        </div> <!-- /.post-meta -->
      




