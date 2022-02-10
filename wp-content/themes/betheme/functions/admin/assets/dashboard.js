(function($) {

  /* globals jQuery */

  "use strict";

  /**
   * $(document).ready
   * Specify a function to execute when the DOM is fully loaded.
   */

  $(function($) {

    /**
     * Dashboard | Deregister theme | Confirmation
     */

    $('.form-deregister .confirm.deregister').on('click', 'a', function(e) {
      e.preventDefault();

      $(this).parent().hide()
        .next().fadeIn();
    });

    $('.form-deregister .question').on('click', 'a.cancel', function(e) {
      e.preventDefault();

      $(this).parent().hide()
        .prev().fadeIn();
    });

    /**
     * Tools | Regenerate
     */

    $('.tools-do-ajax').on('click', function(e) {
      e.preventDefault();

      var $btn = $(this);

      var btn_txt = $btn.text(),
        action = $btn.attr('data-action');

      if( $btn.hasClass('loading') ){
        return;
      }

      $btn.addClass('loading').text('Please wait...');

      $.ajax({
        url: ajaxurl,
        data: {
          'mfn-builder-nonce': $btn.attr('data-nonce'),
          action: action
        },
        type: 'POST',
        success: function(response){
          $btn.removeClass('loading').text('Done');
          setTimeout(function() { $btn.text(btn_txt); }, 2000);
        }
      });

    });

  });

})(jQuery);
