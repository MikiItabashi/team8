<li class="c-category-list__item">
  <?php
  $this_terms_obj = get_queried_object(); //現在のタクソノミー情報取得
  $this_terms_id = $this_terms_obj->term_id; //現在のタクソノミーID取得
  $term_link = get_term_link($term); //ループ中の各タームリンク取得

  if ($term->term_id == $this_terms_id) :
    echo '<a class="c-category-list__link current" href="' . esc_url($term_link) . '">';
  else :
    echo '<a class="c-category-list__link" href="' . esc_url($term_link) . '">';
  endif;
  ?>
  <span><?php echo esc_html($term->name); ?></span>
  </a>

</li>