(function($) {

  /* globals jQuery */

  "use strict";

  function mfnFieldAjax() {

    var $group = $('.mfn-ui .form-group.ajax');

    $group.on('click', '.mfn-btn', function(e) {

      e.preventDefault();

      if ( confirm( "Continue?" ) ) {

        var el = $(this),
          ajax = el.attr('data-ajax'),
          param = el.attr('data-param'),
          action = el.attr('data-action'),
          nonce = el.attr('data-nonce'),
          button_text = el.text();

        var post = {
          'mfn-builder-nonce': nonce,
          action: action,
          post_type: param
        };

        $.post(ajax, post, function(data) {
          $('.btn-wrapper', el).text(data);

          setTimeout(function(){
            $('.btn-wrapper', el).text(button_text);
          },2000)

        });

      } else {
        return false;
      }

    });

  }

  /**
   * $(document).ready
   * Specify a function to execute when the DOM is fully loaded.
   */

  $(function() {
    mfnFieldAjax();
  });

})(jQuery);
