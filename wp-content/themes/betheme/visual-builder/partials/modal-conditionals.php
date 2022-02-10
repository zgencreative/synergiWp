<!-- modal: template display conditions -->

<div class="mfn-modal has-footer modal-display-conditions">

	<div class="mfn-modalbox mfn-form mfn-form-verical mfn-shadow-1">

		<div class="modalbox-header">

			<div class="options-group">
				<div class="modalbox-title-group">
					<span class="modalbox-icon mfn-icon-shop"></span>
					<div class="modalbox-desc">
						<h4 class="modalbox-title">Display Conditions</h4>
					</div>
				</div>
			</div>

			<div class="options-group">
				<a class="mfn-option-btn mfn-option-blank btn-large btn-modal-close" title="Close" href="#">
					<span class="mfn-icon mfn-icon-close"></span>
				</a>
			</div>

		</div>

		<div class="modalbox-content">
<img class="icon" alt="" src="<?php echo get_theme_file_uri( '/muffin-options/svg/others/display-conditions.svg' ); ?>">
			<h3>Where Do You Want to Display Your Template?</h3>
			<p>Set the conditions that determine where your Template is used throughout your site.<br>For example, choose 'Entire Site' to display the template across your site.</p>

			<?php $conditions = (array) json_decode( get_post_meta($post->ID, 'mfn_template_conditions', true) ); 

			// echo '<pre>';
			// print_r($conditions);
			// echo '</pre>';
			?>

			<form id="tmpl-conditions-form">
			<div class="mfn-dynamic-form mfn-form">

				<?php 

				$cats = array();
				$tags = array();

				if (function_exists('is_woocommerce')) {
					$cats = get_terms( 'product_cat', array( 'hide_empty' => false, ) ); 
					$tags = get_terms( 'product_tag', array( 'hide_empty' => false, ) ); 
				}else{
					echo '<p style="color: red;">Activate WooCommerce plugin to see category and tags options.</p>';
				}
				?>



				<?php if( isset($conditions) && count($conditions) > 0){ $x = 0; foreach($conditions as $c=>$cond){ ?>
					<div class="mfn-df-row">
					<div class="df-row-inputs">
						<select name="mfn_template_conditions[<?php echo $x; ?>][rule]" class="mfn-form-control df-input df-input-rule <?php if($cond->rule == 'exclude'){ echo 'minus'; } ?>">
							<option <?php if($cond->rule == 'include'){ echo 'selected'; } ?> value="include">Include</option>
							<option <?php if($cond->rule == 'exclude'){ echo 'selected'; } ?> value="exclude">Exclude</option>
						</select>
						<select name="mfn_template_conditions[<?php echo $x; ?>][var]" class="mfn-form-control df-input df-input-var">
							<option <?php if($cond->var == 'shop'){ echo 'selected'; } ?> value="shop">Shop</option>
							<option <?php if($cond->var == 'productcategory'){ echo 'selected'; } ?> value="productcategory">Product Category</option>
							<option <?php if($cond->var == 'producttag'){ echo 'selected'; } ?> value="producttag">Product Tag</option>
						</select>
						<select name="mfn_template_conditions[<?php echo $x; ?>][productcategory]" class="mfn-form-control df-input df-input-opt df-input-productcategory <?php if($cond->var == 'productcategory') {echo 'show';} ?>">
							<option value="all">All</option>
							<?php if(count($cats) > 0): foreach($cats as $cat){ ?>
							<option <?php if($cond->var != 'shop' && $cond->productcategory == $cat->term_id){ echo 'selected'; } ?> value="<?php echo $cat->term_id ?>"><?php echo $cat->name; ?></option>
							<?php } endif; ?>
						</select>
						<select name="mfn_template_conditions[<?php echo $x; ?>][producttag]" class="mfn-form-control df-input df-input-opt df-input-producttag <?php if($cond->var == 'producttag') {echo 'show';} ?>">
							<option value="all">All</option>
							<?php if(count($tags) > 0): foreach($tags as $tag){ ?>
							<option <?php if($cond->var != 'shop' && $cond->producttag == $tag->term_id){ echo 'selected'; } ?> value="<?php echo $tag->term_id ?>"><?php echo $tag->name; ?></option>
							<?php } endif; ?>
						</select>
					</div>
					<a class="mfn-option-btn mfn-option-blank btn-large df-remove" title="Close" href="#"><span class="mfn-icon mfn-icon-close"></span></a>
				</div>
				<?php $x++; }} ?>
				
				<div class="mfn-df-row clone">
					<div class="df-row-inputs">
						<select data-name="mfn_template_conditions[0][rule]" class="mfn-form-control df-input df-input-rule">
							<option value="include">Include</option>
							<option value="exclude">Exclude</option>
						</select>
						<select data-name="mfn_template_conditions[0][var]" class="mfn-form-control df-input df-input-var">
							<option value="shop">Shop</option>
							<option value="productcategory">Product Category</option>
							<option value="producttag">Product Tag</option>
						</select>
						<select data-name="mfn_template_conditions[0][productcategory]" class="mfn-form-control df-input df-input-opt df-input-productcategory">
							<option value="all">All</option>
							<?php if(count($cats) > 0): foreach($cats as $cat){ ?>
							<option value="<?php echo $cat->term_id ?>"><?php echo $cat->name; ?></option>
							<?php } endif; ?>
						</select>
						<select data-name="mfn_template_conditions[0][producttag]" class="mfn-form-control df-input df-input-opt df-input-producttag">
							<option value="all">All</option>
							<?php if(count($tags) > 0): foreach($tags as $tag){ ?>
							<option value="<?php echo $tag->term_id ?>"><?php echo $tag->name; ?></option>
							<?php } endif; ?>
						</select>
					</div>
					<a class="mfn-option-btn mfn-option-blank btn-large df-remove" title="Close" href="#"><span class="mfn-icon mfn-icon-close"></span></a>
				</div>

			</div>

			<a class="mfn-btn btn-icon-left  df-add-row" href="#"><span class="btn-wrapper"><span class="mfn-icon mfn-icon-add"></span>Add condition</span></a>
			</form>
		</div>


		<div class="modalbox-footer">
			<div class="options-group right">
				<a class="mfn-btn mfn-btn-blue btn-modal-save" href="#"><span class="btn-wrapper">Save</span></a> 
				<a class="mfn-btn btn-modal-close" href="#"><span class="btn-wrapper">Cancel</span></a>
			</div>
		</div>

	</div>

</div>