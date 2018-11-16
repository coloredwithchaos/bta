<div class="sfrd_green_box1" >
            <p>If you're a former Feedburner user make sure to also <strong>redirect your Feedburner feed</strong> to your original feed. <strong class="inc_pop" style="cursor: pointer;"><u>Need instructions?</u></strong></p>
            <p>We also suggest that you connect your feed to an account on SpecificFeeds (it's FREE):</p>
            <ul>
                <li>You'll be able to <strong>import email subscribers</strong> (important if you had Feedburner email subscribers) </li>
                <li>You'll get <strong>access to enlightening statistics</strong></li>
                <li>You'll get <strong>listed in our blog directory</strong> - getting you more readers!</li>
            </ul>

            <form id="calimingOptimizationForm" method="get" action="https://www.specificfeeds.com/wpclaimfeeds/getFullAccess" target="_blank">
                <div class="sfsi_plus_inputbtn">
                    <input type="hidden" name="feed_id" value="<?php if(isset($feedId)) { echo $feedId; } ?>" />
                    <input type="email" name="email" value="<?php echo bloginfo('admin_email'); ?>"  />
                </div>
                <div class='sfsi_plus_more_services_link'>
                    <a class="pop-up" href="javascript:" id="mainRssconnect" title="Connect feed to a SpecificFeeds account >">
                        Connect feed to a SpecificFeeds account >
                    </a> 
                </div>
                <p>
                    This will create you FREE account on SpecificFeeds, using above email<br>
                    All data will be treated highly confidentially, see the <a href="https://www.specificfeeds.com/page/privacy-policy" target="_blank">Privacy Policies</a>
                </p>
            </form>
</div>