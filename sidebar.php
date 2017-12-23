<?php
/**
 *  Sidebar for admin info and selfpromotion purposes.
 *  It incudes links to help docs and support site.
 *
 *
 */?>
<div id="postbox-container-1" class="postbox-container">
  <div class="shfs-improve-site" style="padding: 1rem; background: rgba(0, 0, 0, .02);">
    <h2>Improve Your Site!</h2>
    <p>Want to take your site to the next level? Look behind the scenes of BlogSynthesis to see what you can do!</p>
    <p><a href="http://www.blogsynthesis.com/go/shfs-plugin/" class="button" target="_blank">BlogSynthesis's Blueprint &raquo;</a></p>
  </div>
  <div class="shfs-support" style="padding: 1rem; background: rgba(0, 0, 0, .02);">
    <h2>Need Support?</h2>
    <p>For any help visit our <br /><strong><a href="http://www.blogsynthesis.com/plugins/header-and-footer-scripts/" target="_blank" class="button">Plugin Help</a></strong> or<br /><strong><a href="http://help.digitalliberation.org/contact/" target="_blank">Support Page</a></strong></p>
  </div>
  <div class="shfs-donate" style="padding: 1rem; background: rgba(0, 0, 0, .02);">
    <h3>Contribute or Donate!</h3>
    <p>Help us to make this plugin even better. Contribution doesn't always mean donation. Please follow the link to know more and contribute.</p>
    <p><a href="http://digitalliberation.org/contribute?utm_source=wpdash" target="_blank">Contribute</a></p>
  </div>
  <div class="shfs-wpb-recent" style="padding: 1rem; background: rgba(0, 0, 0, .02);">
  <h2>Latest From BlogSynthesis</h2>
    <?php
    $rss_items = $this->fetch_rss_items( 3, 'http://feeds.feedburner.com/blogsynthesis' );
    $content = '<ul>';
    if ( !$rss_items ) {
      $content .= '<li class="shfs-list">No news items, feed might be broken...</li>';
    } else {
      foreach ( $rss_items as $item ) {
        $url = preg_replace( '/#.*/', '', esc_url( $item->get_permalink(), null, 'display' ) );
        $content .= '<li class="shfs-list">';
        $content .= '<a href="' . $url . '#utm_source=wpadmin&utm_medium=sidebarwidget&utm_term=newsitem&utm_campaign=shfs" target="_blank">' . esc_html( $item->get_title() ) . '</a> ';
        $content .= '</li>';
      }}
      $content .= '<li class="facebook"><a href="https://www.facebook.com/blogsynthesis" target="_blank">Like BlogSynthesis on Facebook</a></li>';
      $content .= '<li class="twitter"><a href="http://twitter.com/blogsynthesis"target="_blank">Follow BlogSynthesis on Twitter</a></li>';
      $content .= '<li class="googleplus"><a href="https://plus.google.com/+BlogSynthesis/posts" target="_blank">Circle BlogSynthesis on Google+</a></li>';
      $content .= '<li class="email"><a href="http://www.blogsynthesis.com/newsletter/" target="_blank">Subscribe by email</a></li>';
      $content .= '</ul>';
      echo $content;
      ?>
  </div>
</div>
