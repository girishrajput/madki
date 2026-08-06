# ACF field map

Fields are registered in `inc/acf.php` (homepage) and `inc/acf-pages.php` (remaining pages). They appear automatically when ACF Pro is active; no JSON import is required.

## FAQ page

| Field | Type |
|---|---|
| `faq_hero_image` | Image (URL) |
| `faq_breadcrumb_home`, `faq_breadcrumb_current` | Text |
| `faq_hero_subtitle`, `faq_hero_title` | Text |
| `faq_hero_description` | Textarea |
| `faq_list` | Repeater |
| `faq_list.faq_question` | Text |
| `faq_list.faq_answer` | WYSIWYG |

## Blog/posts page

| Field | Type |
|---|---|
| `blog_hero_background` | Image (URL) |
| `blog_hero_title` | Text |
| `blog_breadcrumb_home`, `blog_breadcrumb_current` | Text |
| `blog_posts_per_page` | Number |
| `blog_read_more_text`, `blog_previous_text`, `blog_next_text`, `blog_empty_text` | Text |

## Products page

| Field | Type |
|---|---|
| `products_page_title` | Text |
| `products_page_subtitle` | Textarea |
| `products_filter_label` | Text |
| `products_filters` | Repeater |
| `products_filters.value`, `products_filters.label` | Text |
| `products_per_page` | Number |
| `products_sale_badge`, `products_button_text` | Text |
| `products_previous_text`, `products_next_text`, `products_empty_text` | Text |

Product card title, image, excerpt, price, sale state, and URL remain dynamic WooCommerce product data.

## Default page template

| Field | Type |
|---|---|
| `default_page_title` | Text; falls back to the WordPress title |
| `default_page_subtitle` | Textarea; falls back to the excerpt |

The body remains the WordPress block/editor content, so it is fully editable without duplicating it in ACF.

## Homepage additions

The existing homepage field map remains in `inc/acf.php`. This conversion adds `featured_product_button_text` and `featured_products_empty_text`; the existing `why_choose_features` repeater is now read using its registered name.

## Assignment

- FAQ fields are shown on the page whose slug is `faq`.
- Blog fields are shown on the page selected under **Settings > Reading > Posts page**, or on the Blog Page template.
- Products fields are shown on the Products Page template.
- Default fields are shown on the Default Template.
