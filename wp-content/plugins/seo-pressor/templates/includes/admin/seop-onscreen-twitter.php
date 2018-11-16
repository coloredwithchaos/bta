<div class="seop_onscreen_subtab_inner_head">
    <div class="seop_onscreen_schema_node">
        <p>Enable Twitter Card</p>
        <input class="seop_status_switch" type="checkbox" name="seop_attr[tw_enable]" value="1" />
    </div>
    <div class="seop_onscreen_schema_node">
        <p>Type:</p>
        <select name="seop_attr[tw_type]">
            <option value="summary">Summary</option>
            <option value="summary_large_image">Summary with Large Image</option>
        </select>
    </div>
</div>
<div class="seop_onscreen_subtab_inner_body">
	<div class="pb20">
        <div class="seop_onscreen_schema_node">
            <p>Site <span class="seop_red">*</span></p>
            <div class="seops_prefix_wrap">
            	<span class="seops_prefix">@</span>
                <input class="seops_prefix_field" name="seop_attr[tw_site]" placeholder="Publisher's Twitter ID" type="text" value="" />
            </div>
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Creator</p>
            <div class="seops_prefix_wrap">
            	<span class="seops_prefix">@</span>
                <input class="seops_prefix_field" name="seop_attr[tw_creator]" placeholder="Author's Twitter ID" type="text" value="" />
            </div>
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Title <span class="seop_red">*</span></p>
            <input name="seop_attr[tw_title]" placeholder="Default title will be used if left blank." type="text" value="" />
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Description <span class="seop_red">*</span></p>
            <textarea name="seop_attr[tw_description]" placeholder="Briefly describe what your page is about."></textarea>
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Image</p>
            <div class="seop_onscreen_uploader_wrap">
                <div class="seop_onscreen_uploader_image"></div>
                <a class="seop_onscreen_uploader_remove seops_hide"></a>
                <input type="hidden" name="seop_attr[tw_image]" value="" />
                <?php _e('Pick From Gallery', 'seo-pressor'); ?>
            </div>
        </div>
    </div>
</div>