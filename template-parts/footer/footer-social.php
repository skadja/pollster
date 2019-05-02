<?php
/**
 * The template for displaying social links
 */

?>

<div class="social font-size-larger">
    <a rel="nofollow" data-rel="external" href="//www.facebook.com/sharer/sharer.php?u=<?php bloginfo('url'); ?>&t=<?php bloginfo('name'); ?>&caption=<?php bloginfo('name') ?>&description=<?php bloginfo('description'); ?>" class="d-inline-block text-center text-facebook">
        <span class="sr-only">facebook</span>
        <span class="fa-2x">
            <i class="fab fa-facebook-f" data-fa-transform="shrink-8" data-fa-mask="fas fa-circle"></i>
        </span>
    </a>
    <a rel="nofollow" data-rel="external" href="//twitter.com/share?url=<?php bloginfo('url');?>&text=<?php bloginfo('name');?> - <?php bloginfo('description');?>" class="d-inline-block text-center text-twitter mx-1">
        <span class="sr-only">twitter</span>
        <span class="fa-2x">
            <i class="fab fa-twitter" data-fa-transform="shrink-8" data-fa-mask="fas fa-circle"></i>
        </span>
    </a>
</div>
