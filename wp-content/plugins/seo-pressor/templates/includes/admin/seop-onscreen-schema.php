<div class="seop_onscreen_subtab_inner_head">
    <div class="seop_onscreen_schema_node">
        <p>Enable Schema.org Structured Data</p>
        <input class="seop_status_switch" type="checkbox" name="seop_attr[schema_enable]" value="1" />
    </div>
    <div class="seop_onscreen_schema_node">
        <p>Schema.org Data Type:</p>
        <select name="seop_attr[schema_type]" class="seop_onscreen_selection_tab">
            <option value="NewsArticle">Article</option>
            <option value="Product">Products (Single Offer)</option>
            <option value="Service">Service</option>
            <option value="Recipe">Recipe</option>
            <option value="Review">Review</option>
            <option value="Event">Event</option>
            <option value="SoftwareApplication">Software Application</option>
            <option value="VideoObject">Video</option>
        </select>
    </div>
</div>
<div class="seop_onscreen_subtab_inner_body">
	<div class="seop_onscreen_selection_content">
        <div class="seop_onscreen_schema_node">
            <p>Article Type</p>
            <select name="seop_attr[schema_NewsArticle_type]">
                <option value="NewsArticle">News Article</option>
                <option value="BlogPosting">Blog Posting</option>
            </select>
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Article Headline <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_NewsArticle_headline]" placeholder="Default title will be used if left blank." />
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Article Description <span class="seop_red">*</span></p>
            <textarea name="seop_attr[schema_NewsArticle_description]" placeholder="Briefly describe your content."></textarea>
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Article Image <span class="seop_red">*</span></p>
            <div class="seop_onscreen_uploader_wrap">
                <div class="seop_onscreen_uploader_image"></div>
                <a class="seop_onscreen_uploader_remove seops_hide"></a>
                <input type="hidden" name="seop_attr[schema_NewsArticle_image]" value="" />
                <?php _e('Pick From Gallery', 'seo-pressor'); ?>
            </div>
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Publisher Name</p>
            <input type="text" name="seop_attr[schema_NewsArticle_pubname]" placeholder="" />
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Publisher Logo</p>
            <div class="seop_onscreen_uploader_wrap">
                <div class="seop_onscreen_uploader_image"></div>
                <a class="seop_onscreen_uploader_remove seops_hide"></a>
                <input type="hidden" name="seop_attr[schema_NewsArticle_publogo]" value="" />
                <?php _e('Pick From Gallery', 'seo-pressor'); ?>
            </div>
        </div>
    </div>
	<div class="seop_onscreen_selection_content seops_hide">
		<div class="seop_onscreen_schema_node">
        	<p>Name of Product <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_Product_name]" placeholder="Post title will be used if left blank." value="" />
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Image</p>
            <div class="seop_onscreen_uploader_wrap">
                <div class="seop_onscreen_uploader_image"></div>
                <a class="seop_onscreen_uploader_remove seops_hide"></a>
                <input type="hidden" name="seop_attr[schema_Product_image]" value="" />
                <?php _e('Pick From Gallery', 'seo-pressor'); ?>
            </div>
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Description</p>
            <textarea name="seop_attr[schema_Product_description]" placeholder="Briefly describe your product."></textarea>
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Brand Name</p>
            <input type="text" name="seop_attr[schema_Product_brand]" placeholder="Insert your brand/company name." />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Rating</p>
            <input type="text" name="seop_attr[schema_Product_rating]" placeholder="Insert value of 1.0 - 5.0." />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Total Number of Reviews</p>
            <input type="text" name="seop_attr[schema_Product_review]" placeholder="Insert value in whole number." />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Price <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_Product_price]" placeholder="Eg: 67.90" />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Currency <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_Product_currency]" placeholder="Eg: USD, GBP, RMB" />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Availability</p>
            <select name="seop_attr[schema_Product_availability]">
            	<option value="InStock">In Stock</option>
            	<option value="OutOfStock">Out Of Stock</option>
            	<option value="Discontinued">Discontinued</option>
            	<option value="PreOrder">Pre Order</option>
            </select>
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Item Condition</p>
            <select name="seop_attr[schema_Product_condition]">
            	<option value="NewCondition">New</option>
            	<option value="UsedCondition">Used</option>
                <option value="RefurbishedCondition">Refurbished</option>
            	<option value="DamagedCondition">Damaged</option>
            </select>
        </div>
    </div>
    <div class="seop_onscreen_selection_content seops_hide">
    	<div class="seop_onscreen_schema_node">
        	<p>Service Type <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_Service_type]" placeholder="" value="" />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Provider Name <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_Service_provider_name]" placeholder="" value="" />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Provider Type</p>
            <select name="seop_attr[schema_Service_provider_type]">
            	<option value="Airline">Airline</option>
            	<option value="Corporation">Corporation</option>
            	<option value="EducationalOrganization">Educational Organization</option>
            	<option value="GovernmentOrganization">Government Organization</option>
            	<option value="LocalBusiness">Local Business</option>
            	<option value="MedicalOrganization">Medical Organization</option>
            	<option value="NGO">NGO</option>
            	<option value="PerformingGroup">Performing Group</option>
            	<option value="SportsOrganization">Sports Organization</option>
            </select>
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Rating</p>
            <input type="text" name="seop_attr[schema_Service_rating]" placeholder="Insert value of 1.0 - 5.0." />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Total Number of Reviews</p>
            <input type="text" name="seop_attr[schema_Service_review]" placeholder="Insert value in whole number." />
        </div>
    </div>
	<div class="seop_onscreen_selection_content seops_hide">
		<div class="seop_onscreen_schema_node">
        	<p>Name of Recipe <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_Recipe_name]" placeholder="Post title will be used if left blank." value="" />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Type of Dishes</p>
            <input type="text" name="seop_attr[schema_Recipe_category]" placeholder="Eg: appetizer, main course, dessert" />
        </div>
        <div class="seop_onscreen_schema_node">
            <p>Image of Dish</p>
            <div class="seop_onscreen_uploader_wrap">
                <div class="seop_onscreen_uploader_image"></div>
                <a class="seop_onscreen_uploader_remove seops_hide"></a>
                <input type="hidden" name="seop_attr[schema_Recipe_image]" value="" />
                <?php _e('Pick From Gallery', 'seo-pressor'); ?>
            </div>
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Description</p>
            <textarea name="seop_attr[schema_Recipe_description]" placeholder="Briefly describe your dish."></textarea>
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Rating</p>
            <input type="text" name="seop_attr[schema_Recipe_rating]" placeholder="Insert value of 1.0 - 5.0." />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Total Number of Reviews</p>
            <input type="text" name="seop_attr[schema_Recipe_review]" placeholder="Insert values in whole number." />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Preparation Time (minutes)</p>
            <input type="text" name="seop_attr[schema_Recipe_time_preparation]" placeholder="Eg: 20" />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Cook Time (minutes)</p>
            <input type="text" name="seop_attr[schema_Recipe_time_cook]" placeholder="Eg: 30" />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Total Time (minutes)</p>
            <input type="text" name="seop_attr[schema_Recipe_time_total]" placeholder="Eg: 50" />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Calories (Cal)</p>
            <input type="text" name="seop_attr[schema_Recipe_calories]" placeholder="Insert value in whole numbers." />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Serving Size</p>
            <input type="text" name="seop_attr[schema_Recipe_size]" placeholder="Eg: One plate" />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Number of Servings</p>
            <input type="text" name="seop_attr[schema_Recipe_yield]" placeholder="Eg: 8 pax" />
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>List of Ingredients (one per line)</p>
            <textarea class="seop_textarea_placeholder" name="seop_attr[schema_Recipe_ingredients]" placeholder="Eg: Sugar"></textarea>
        </div>
    </div>
	<div class="seop_onscreen_selection_content seops_hide">
		<div class="seop_onscreen_schema_node">
        	<p>Type of Item Reviewed <span class="seop_red">*</span></p>
            <select name="seop_attr[schema_Review_item]" class="seop_schema_review_selection">
                <option value="Article" data-group="seop_attr_group_article">Article</option>
                <option value="Blog">Blog</option>
                <option value="Book" data-group="seop_attr_group_book">Book</option>
                <option value="Diet">Diet</option>
                <option value="Episode">Episode</option>
                <option value="ExercisePlan">Exercise Plan</option>
                <option value="Game">Game</option>
                <option value="Movie" data-group="seop_attr_group_movie">Movie</option>
                <option value="MusicPlaylist">Music Playlist</option>
                <option value="MusicRecording">Music Recording</option>
                <option value="Photograph">Photograph</option>
                <option value="Recipe">Recipe</option>
                <option value="Series">Series</option>
                <option value="SoftwareApplication" data-group="seop_attr_group_software">Software Application</option>
                <option value="VisualArtwork">Visual Artwork</option>
                <option value="Webpage">Webpage</option>
                <option value="WebSite">Website</option>
            </select>
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Rating</p>
            <input type="text" name="seop_attr[schema_Review_rating]" placeholder="Insert value of 1.0 - 5.0." />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Total Number of Reviews</p>
            <input type="text" name="seop_attr[schema_Review_review]" placeholder="Insert value in whole number." />
        </div>
        <div class="seop_attr_group seop_attr_group_article">
        	<div class="seop_onscreen_schema_node">
                <p>Article Headline</p>
                <input type="text" name="seop_attr[schema_Review_article_headline]" placeholder="Default title will be used if left blank." />
            </div>
            <div class="seop_onscreen_schema_node">
            	<p>Article Image</p>
            	<div class="seop_onscreen_uploader_wrap">
                    <div class="seop_onscreen_uploader_image"></div>
                    <a class="seop_onscreen_uploader_remove seops_hide"></a>
                    <input type="hidden" name="seop_attr[schema_Review_article_image]" value="" />
                    <?php _e('Pick From Gallery', 'seo-pressor'); ?>
                </div>
            </div>
            <div class="seop_onscreen_schema_node">
                <p>Author</p>
                <input type="text" name="seop_attr[schema_Review_article_author]" />
            </div>
            <div class="seop_onscreen_schema_node">
                <p>Publisher</p>
                <input type="text" name="seop_attr[schema_Review_article_publisher]" />
            </div>
            <div class="seop_onscreen_schema_node">
            	<p>Publisher Logo</p>
            	<div class="seop_onscreen_uploader_wrap">
                    <div class="seop_onscreen_uploader_image"></div>
                    <a class="seop_onscreen_uploader_remove seops_hide"></a>
                    <input type="hidden" name="seop_attr[schema_Review_article_publisherlogo]" value="" />
                    <?php _e('Pick From Gallery', 'seo-pressor'); ?>
                </div>
            </div>
        </div>
        <div class="seop_attr_group seop_attr_group_book">
        	<div class="seop_onscreen_schema_node">
                <p>Book Author</p>
                <input type="text" name="seop_attr[schema_Review_book_author]" />
            </div>
            <div class="seop_onscreen_schema_node">
                <p>Book Author URL</p>
                <input type="text" name="seop_attr[schema_Review_book_authorsameas]" />
            </div>
        	<div class="seop_onscreen_schema_node">
                <p>ISBN</p>
                <input type="text" name="seop_attr[schema_Review_book_isbn]" />
            </div>
            <div class="seop_onscreen_schema_node">
                <p>Description</p>
                <textarea type="text" name="seop_attr[schema_Review_book_description]" placeholder="Briefly describe your book."></textarea>
            </div>
            <div class="seop_onscreen_schema_node">
                <p>Publisher</p>
                <input type="text" name="seop_attr[schema_Review_book_publisher]" />
            </div>
        </div>
        <div class="seop_attr_group seop_attr_group_movie">
        	<div class="seop_onscreen_schema_node">
                <p>Movie URL</p>
                <input type="text" name="seop_attr[schema_Review_movie_sameas]" placeholder="Eg. http://youtube.com/watch?v=HsuAGKA-A" />
            </div>
            <div class="seop_onscreen_schema_node">
                <p>Description</p>
                <textarea name="seop_attr[schema_Review_movie_description]" placeholder="Briefly describe your movie."></textarea>
            </div>
            <div class="seop_onscreen_schema_node">
                <p>Publisher</p>
                <input type="text" name="seop_attr[schema_Review_movie_publisher]" />
            </div>
        </div>
        <div class="seop_attr_group seop_attr_group_software">
        	<div class="seop_onscreen_schema_node">
                <p>Application Category</p>
                <input type="text" name="seop_attr[schema_Review_software_category]" placeholder="Eg. Game" />
            </div>
            <div class="seop_onscreen_schema_node">
                <p>Operating System</p>
                <input type="text" name="seop_attr[schema_Review_software_os]" placeholder="Eg. Windows 7" />
            </div>
        </div>
    </div>
	<div class="seop_onscreen_selection_content seops_hide">
		<div class="seop_onscreen_schema_node">
        	<p>Name <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_Event_name]" placeholder="Post title will be used if left blank." />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Event Location <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_Event_location]" placeholder="Eg: Googleplex" />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Event Address <span class="seop_red">*</span></p>
            <textarea name="seop_attr[schema_Event_address]" placeholder="Eg: 9 S. Broadway, Denver, CO 80209"></textarea>
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Event Date <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_Event_date]" class="seop_datepicker" />
        </div>
    </div>
	<div class="seop_onscreen_selection_content seops_hide">
		<div class="seop_onscreen_schema_node">
        	<p>Name of Software <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_SoftwareApplication_name]" placeholder="Post title will be used if left blank." value="" />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Category</p>
            <select name="seop_attr[schema_SoftwareApplication_category]">
                <option value="MobileApplication">Mobile Application</option>
                <option value="DesktopApplication">Desktop Application</option>
                <option value="WebApplication">Web Application</option>
            </select>
        </div>
        <div class="seop_onscreen_schema_node">
        	<p>Operating System</p>
            <input type="text" name="seop_attr[schema_SoftwareApplication_os]" placeholder="Eg: Windows 10, Android 6.1, iOS 9.3" />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Rating</p>
            <input type="text" name="seop_attr[schema_SoftwareApplication_rating]" placeholder="Insert value of 1.0 - 5.0." />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Total Number of Reviews</p>
            <input type="text" name="seop_attr[schema_SoftwareApplication_review]" placeholder="Insert value in whole number." />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Price</p>
            <input type="text" name="seop_attr[schema_SoftwareApplication_price]" placeholder="Eg: 37.90" />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Currency</p>
            <input type="text" name="seop_attr[schema_SoftwareApplication_currency]" placeholder="Eg: USD, GBP, RMB" />
        </div>
        
    </div>
	<div class="seop_onscreen_selection_content seops_hide">
		<div class="seop_onscreen_schema_node">
        	<p>Name of Video <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_Video_name]" placeholder="Post title will be used if left blank." value="" />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Description <span class="seop_red">*</span></p>
            <textarea name="seop_attr[schema_Video_description]" placeholder="Briefly describe your video."></textarea>
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Thumbnail <span class="seop_red">*</span></p>
            <div class="seop_onscreen_uploader_wrap">
                <div class="seop_onscreen_uploader_image"></div>
                <a class="seop_onscreen_uploader_remove seops_hide"></a>
                <input type="hidden" name="seop_attr[schema_Video_thumbnail]" value="" />
                <?php _e('Pick From Gallery', 'seo-pressor'); ?>
            </div>
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Upload Date <span class="seop_red">*</span></p>
            <input type="text" name="seop_attr[schema_Video_date]" class="seop_datepicker" />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Duration (hh:mm:ss)</p>
            <input type="text" name="seop_attr[schema_Video_duration]" placeholder="Eg: 01:47:30" />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Video URL (actual video file)</p>
            <input type="text" name="seop_attr[schema_Video_url]" placeholder="Eg: http://example.com/video123.flv" />
        </div>
		<div class="seop_onscreen_schema_node">
        	<p>Embed URL</p>
            <input type="text" name="seop_attr[schema_Video_url_embed]" />
        </div>
    </div>
</div>