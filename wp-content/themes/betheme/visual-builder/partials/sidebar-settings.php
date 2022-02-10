<?php
if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

echo '<div class="panel panel-settings" style="display: none;"><div class="mfn-form">';
    echo '<div class="mfn-form-row mfn-row">
      <div class="row-column row-column-12">';

      if(! apply_filters("betheme_disable_support", false) ): ?>
        <div class="form-content form-content-full-width">
          <div class="form-group segmented-options settings">

            <span class="mfn-icon mfn-icon-intro-slider"></span>

            <div class="setting-label">
              <h5>Introduction guide</h5>
              <p>See what`s new in <?php apply_filters('betheme_label','Muffin') ?> Live Builder</p>
            </div>

            <div class="form-control">
              <a href="#" class="introduction-reopen">Reopen</a>
            </div>

          </div>
        </div>
        <?php endif;

      echo '</div>
  </div>';


echo '<div class="mfn-form-row mfn-row">
  <div class="row-column row-column-12">
    <div class="form-content form-content-full-width">
      <div class="form-group segmented-options settings">

        <span class="mfn-icon mfn-icon-column"></span>

        <div class="setting-label">
          <h5>Column text editor</h5>
          <p>CodeMirror or TinyMCE</p>
          <a class="settings-info" href="javascript:void(0) title="Important info" data-tooltip="A page reload is required for this change. Please save your content." href="#">Important info</a>
        </div>

        <div class="form-control" data-option="column-visual">
          <ul>
            <li class="active" data-value="0"><a href="#"><span class="text">Code</span></a></li>
            <li data-value="1"><a href="#"><span class="text">Visual</span></a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>';


echo '</div></div>';


