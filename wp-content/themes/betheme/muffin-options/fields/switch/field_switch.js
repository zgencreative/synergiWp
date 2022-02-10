(function($) {

  /* globals jQuery, ajaxurl */

  "use strict";

  var group = '.form-group.segmented-options:not(.settings) ';

  function mfnFieldSwitch() {

    $('.mfn-ui').on('click', group + '.form-control li a', function(e) {

      e.preventDefault();

      var $li = $(this).closest('li');
      var $oldValue = $li.siblings('input.old-value');

      $li.addClass('active').find('input').prop('checked', 'checked');
      $li.siblings('li').removeClass('active').find('input').prop('checked', false);

      // divided in two if's, for better readibility == USED FOR CACHE OPTION NOW

      if ( $oldValue.length ) {

        var name = $oldValue.data('id');

        if ( $li.find('input').val() === $oldValue.val() ) {

          $.ajax({
            url: ajaxurl,
            data: {
              action: 'mfn_delete_transient',
              name: name
            }
          });

        } else {

          $.ajax({
            url: ajaxurl,
            data: {
              action: 'mfn_set_transient',
              name: name
            }
          });

        }

      }
    });

  }

  /**
   * $(document).ready
   * Specify a function to execute when the DOM is fully loaded.
   */

  $(function($) {
    mfnFieldSwitch();
  });

})(jQuery);
