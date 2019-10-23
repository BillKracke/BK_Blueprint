# Open Items and Notes

- [X] FIXME: Call to undefined function bkboiler_posted_on()
- [x] Add/Rework Icons
- [ ] Figure out SASSy way to build Editor Style that WORKS./÷÷÷÷÷÷÷
- [ ] Add accessible way to remove focus styles
- [X] FIXME: Grid Systems ... choose Jeet or... CSS Grid?  KEPT JEET
- [ ] ADD MAPS to butons.scss
- [ ] check template cascade to make sure that I have bare minimum of pages and no more
- [ ] add a front-page, because that always seems to be needed
- [ ] consider a way to add recommended plugins
- [ ] add ARIA labels -- https://a11yproject.com/posts/aria-landmark-roles/ --- https://a11yproject.com/checklist



Things I need to add

WIDTHS
  navWidth
  contentWidth
GRID SYSTEM?
  basic one .... halves, thirds, quarters, 2/3, 3/4 THAT'S IT



/**
 * Enqueue block editor style
 */
function legit_block_editor_styles() {
    wp_enqueue_style( 'legit-editor-styles', get_theme_file_uri( '/css/style-editor.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'legit_block_editor_styles' );







div#page-wrapper.site-wrapper

  header.site-header
    div.site-branding
    nav#site-navigation.main-navigation
      .menu-toggle
      #primary-menu.menu
  main#content.site-content
    #primary.content-area
        article.[post-class]
          header.entry-header
          .entry-content
          footer.entry-footer
    #secondary.widget-area
  footer.site-footer
