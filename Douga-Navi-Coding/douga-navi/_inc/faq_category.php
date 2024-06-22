<li class="p-faq-category__item  p-faq-category__item--all">
 <a href="<?php echo esc_url(home_url('/faq/')); ?>">全てのカテゴリ</a>
</li>

<?php
$terms = get_terms('faq_menu');
foreach ($terms as $term) {
 echo '<li class="p-faq-category__item"><a class="js-category-link" href="' . get_term_link($term->slug, 'faq_menu') . '">' . $term->name . '</a></li>';
}