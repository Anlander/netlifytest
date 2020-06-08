<h2><?php _e('Media Folder Settings','wpmf') ?></h2>
<form name="form1" id="form_list_size" action="" method="post">
    <h3 class="title"><?php _e('Gallery parameters','wpmf'); ?></h3>
    <div class="usegellery">
        <div class="box-usegellery">
            <label class="title" style="float: left;"><?php _e('Gallery feature','wpmf'); ?></label>
            <input type="checkbox" class="btngallery cb_option" data-label="wpmf_usegellery" <?php if(isset($usegellery) && $usegellery== 1) echo 'checked' ?>>
            <label style="float: left;"><?php _e('Enable the gallery feature','wpmf'); ?></label>
            <input type="hidden" name="wpmf_usegellery" value="<?php echo $usegellery; ?>">
        </div>
    </div>
    
    <!--    setting sizes     -->
    <div class="wpmf-config-gallery">
        <div class="box-select">
            <div id="gallery_image_size">
                <ul class="image_size">
                    <li class="gallery_image_size accordion-section control-section control-section-default open">
                        <h3 class="accordion-section-title wpmf-section-title sizes_title" data-title="sizes" tabindex="0"><?php _e('Gallery image sizes available','wpmf') ?></h3>
                        <ul class="content_list_sizes">
                            <?php
                            //global $_wp_additional_image_sizes;
                                $sizes = apply_filters( 'image_size_names_choose',array(
                                    'thumbnail' => __('Thumbnail'),
                                    'medium'    => __('Medium'),
                                    'large'     => __('Large'),
                                    'full'      => __('Full Size'),
                                ) );
                            foreach ($sizes as $key => $size):
                            ?>

                            <li class="customize-control customize-control-select" style="display: list-item;">
                                <input type="checkbox" name="size_value[]" value="<?php echo $key ?>" <?php if(in_array($key, $size_selected )) echo 'checked' ?> >
                                <span><?php echo $size ?></span>
                            </li>
                            <?php endforeach; ?>

                        </ul>
                        <p class="description"><?php _e('Select the image size you can load in galleries. Custom image size available here can be generated by 3rd party plugins','wpmf'); ?></p>
                    </li>
                </ul>
            </div>

            <!--    setting padding     -->
            <div id="gallery_image_padding">
                <ul class="image_size">
                    <li class="gallery_image_padding accordion-section control-section control-section-default open">
                        <h3 class="accordion-section-title wpmf-section-title padding_title" data-title="padding" tabindex="0"><?php _e('Gallery themes settings','wpmf') ?></h3>
                        <ul class="content_list_padding">
                            <li class="customize-control customize-control-select" style="display: list-item;">
                                <span><?php _e('Masonry Theme','wpmf'); ?></span>
                                <label><?php _e('Space between images (padding)','wpmf') ?></label>
                                <input name="padding_gallery[wpmf_padding_masonry]" class="padding_gallery small-text" type="number" min="0" max="30" value="<?php echo $padding_masonry ?>" >
                                <label><?php _e('px','wpmf') ?></label>
                            </li>

                            <li class="customize-control customize-control-select" style="display: list-item;">
                                <span><?php _e('Portfolio Theme','wpmf'); ?></span>
                                <label><?php _e('Space between images (padding)','wpmf') ?></label>
                                <input name="padding_gallery[wpmf_padding_portfolio]" class="padding_gallery small-text" type="number" min="0" max="30" value="<?php echo $padding_portfolio ?>" >
                                <label><?php _e('px','wpmf') ?></label>
                            </li>
                        </ul>
                        <p class="description"><?php _e('Determine the space between images','wpmf'); ?></p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   
    <div class="content-box">
        <div class="btnoption">
            <h3 class="title"><?php _e('Advanced parameters','wpmf'); ?></h3>
            <input style="float: left;" name="btnTaxonomy" type="button" placeholder="Recherche" class="button <?php if (@$btnoption == 0) echo 'button-primary' ?> cb_option" data-label="wpmf_use_taxonomy" data-value="0" value="<?php _e('WordPress taxonomy', 'wpmf') ?>" >
            <input style="float: left;margin-left: 5px;" name="btnWpTaxonomy" type="button" placeholder="Recherche" class="button <?php if (@$btnoption == 1) echo 'button-primary' ?> cb_option" data-label="wpmf_use_taxonomy" data-value="1"   value="<?php _e('WP Media Folder Taxonomy', 'wpmf') ?>" >
            <span class="spinner" style="float: left;display:none"></span>
            <span class="wpmf_info_update"><?php _e('Settings saved.', 'wpmf') ?></span>
        </div>
        
        <div class="btnoption">
            <a href="#" class="button <?php if($btn_import_categories && $btn_import_categories == 'yes') echo 'button-primary'; ?>" id="wmpfImpoBtn"><?php _e('Import WP media categories', 'wpmf') ?></a>
            <?php if(in_array('nextgen-gallery/nggallery.php',get_option( 'active_plugins' ))): ?>
            <input type="button" id="btn_import_gallery" class="button btn_import_gallery button-primary" value="<?php _e('Sync/Import NextGEN galleries','wpmf'); ?>">
            <?php endif; ?>
            <span class="spinner" style="float: left;display:none"></span>
            <span class="wpmf_info_update"><?php _e('Settings saved.', 'wpmf') ?></span>
        </div>
        

        <div class="cboption">
            <h3 class="title"><?php _e('Access management','wpmf'); ?></h3>
            <p><input data-label="wpmf_folder_option1" type="checkbox" name="cb_option_1" class="cb_option" id="cb_option_1" <?php if ($option1 == 1) echo 'checked' ?> value="<?php echo @$option1 ?>">
                <?php _e('Auto create one folder per editor', 'wpmf'); ?></p>
            
            <p><input data-label="wpmf_active_media" type="checkbox" name="cb_option_active_media" class="cb_option" id="cb_option_active_media" <?php if ($wpmf_active_media == 1) echo 'checked' ?> value="<?php echo $$wpmf_active_media ?>">
                <?php _e('Show only own user media (an option will be added for admin in the media manager)', 'wpmf'); ?>
            </p>
            
            <input type="hidden" name="wpmf_folder_option1" value="<?php echo $option1; ?>">
            <input type="hidden" name="wpmf_active_media" value="<?php echo $wpmf_active_media; ?>">
        </div>
    </div>
    
    <div class="btn_wpmf_saves">
        <input type="submit" name="btn_wpmf_save" id="btn_wpmf_save" class="button btn_wpmf_save button-primary" value="<?php _e('Save Changes','wpmf'); ?>">
    </div>
        
</form>