<div class="seop_onscreen_subtab_inner_head">
    <div class="seop_onscreen_schema_node">
        <p>Enable Facebook Open Graph</p>
        <input class="seop_status_switch" type="checkbox" name="seop_attr[fb_enable]" value="1" />
    </div>
    <div class="seop_onscreen_schema_node">
        <p>Type:</p>
        <select name="seop_attr[fb_type]">
            <option value="Article">Article</option>
            <option value="Website">Website</option>
            <option value="Blog">Blog</option>
        </select>
    </div>
</div>
<div class="seop_onscreen_subtab_inner_body">
	<div class="pb20">
        <div class="seop_onscreen_schema_node">
            <p>URL <span class="seop_red">*</span></p>
            <input name="seop_attr[fb_url]" type="text" value="" />
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Site Name</p>
            <input name="seop_attr[fb_site_name]" type="text" value="" />
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Title <span class="seop_red">*</span></p>
            <input name="seop_attr[fb_title]" placeholder="Default title will be used if left blank." type="text" value="" />
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Image <span class="seop_red">*</span></p>
            <div class="seop_onscreen_uploader_wrap">
                <div class="seop_onscreen_uploader_image"></div>
                <a class="seop_onscreen_uploader_remove seops_hide"></a>
                <input type="hidden" name="seop_attr[fb_img]" value="" />
                <?php _e('Pick From Gallery', 'seo-pressor'); ?>
            </div>
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Description</p>
            <textarea name="seop_attr[fb_description]" placeholder="Briefly describe what your page is about."></textarea>
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Publisher</p>
            <input name="seop_attr[fb_publisher]" placeholder="Insert publisher's Facebook ID." type="text" value="" />
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Author</p>
            <input name="seop_attr[fb_author]" placeholder="Insert author's Facebook ID." type="text" value="" />
        </div>
        <div class="seop_onscreen_schema_node">
            <p>FB Admin</p>
            <textarea class="seop_s2" name="seop_attr[fb_admin]" placeholder="Insert admin(s) Facebook ID (seperate line by line)"></textarea>
        </div>
        <div class="seop_onscreen_schema_node">
            <p>FB App ID</p>
            <input name="seop_attr[fb_appid]" placeholder="Insert your Facebook App ID." type="text" value="" />
        </div>
    </div>
</div>