���[<?php exit; ?>a:1:{s:7:"content";a:4:{s:5:"child";a:1:{s:0:"";a:1:{s:3:"rss";a:1:{i:0;a:6:{s:4:"data";s:3:"


";s:7:"attribs";a:1:{s:0:"";a:1:{s:7:"version";s:3:"2.0";}}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:1:{s:7:"channel";a:1:{i:0;a:6:{s:4:"data";s:61:"
	
	
	
	




















































";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:1:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:16:"WordPress Planet";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:28:"http://planet.wordpress.org/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:8:"language";a:1:{i:0;a:5:{s:4:"data";s:2:"en";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:47:"WordPress Planet - http://planet.wordpress.org/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"item";a:50:{i:0;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"Dev Blog: WordPress 5.0 Beta 5";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"https://wordpress.org/news/?p=6250";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2018/11/wordpress-5-0-beta-5/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4742:"<p>WordPress 5.0 Beta 5 is now available!</p>



<p><strong>This software is still in development,</strong>&nbsp;so we don’t recommend you run it on a production site. Consider setting up a test site to play with the new version.</p>



<p>There are two ways to test this WordPress 5.0 Beta: try the&nbsp;<a href="https://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester</a>&nbsp;plugin (you’ll want “bleeding edge nightlies”), or you can&nbsp;<a href="https://wordpress.org/wordpress-5.0-beta5.zip">download the beta here</a>&nbsp;(zip).</p>



<p><strong>Reminder: the WordPress 5.0 release date has changed</strong>. It is now scheduled for release on&nbsp;<a href="https://make.wordpress.org/core/5-0/">November 27</a>, and we need your help to get there. Here are some of the big issues that we’ve fixed since Beta 4:</p>



<h2>Block Editor</h2>



<p>The block editor has been updated to match the <a href="https://make.wordpress.org/core/2018/11/15/whats-new-in-gutenberg-15th-november-2/">Gutenberg 4.4 release</a>, the major changes  include:</p>



<ul><li>&nbsp;A <a href="https://github.com/WordPress/gutenberg/pull/11874">permalink panel has been added to the document sidebar</a> to make it easier to find.</li><li>Editor document panels can now be <a href="https://github.com/WordPress/gutenberg/pull/11802">programmatically removed</a>.</li><li>The uploading indicator for images and galleries has been replaced with a&nbsp;<a href="https://github.com/WordPress/gutenberg/pull/11876">spinner and faded out image</a>.</li><li>The text and code editing blocks will now <a href="https://github.com/WordPress/gutenberg/pull/11750">use the full width of the editor</a>.</li><li>Image handling has been improved. Images now  take up the right amount of space for <a href="https://github.com/WordPress/gutenberg/pull/11846">themes with wider editors</a> (like Twenty Nineteen).<br /></li><li>Hover styles are now <a href="https://github.com/WordPress/gutenberg/pull/10333">correctly disabled for mobile devices</a>.</li><li>The i18n module has been refactored to benefit from <a href="https://github.com/WordPress/gutenberg/pull/11493">significant performance gains</a>.</li></ul>



<p>Additionally, there have been some pesky bugs fixed:</p>



<ul><li>Better handling for <a href="https://github.com/WordPress/gutenberg/pull/11590">links without an href</a> attribute, which were showing as <code>undefined</code>.</li><li>Japanese text (double byte characters) are <a href="https://github.com/WordPress/gutenberg/pull/11908">now usable in the list block</a>.</li><li>Better handling for different text encodings (e.g. emoji) within a block <a href="https://github.com/WordPress/gutenberg/pull/11771">in block validation</a>.</li></ul>



<p>A full list of changes can be found in the <a href="https://make.wordpress.org/core/2018/11/15/whats-new-in-gutenberg-15th-november-2/">Gutenberg 4.4 release post</a>.<br /></p>



<h2>PHP 7.3 Support</h2>



<p>The final known PHP 7.3 compatibility issue has been fixed. You can brush up on what you need to know about PHP 7.3 and WordPress by checking out the <a href="https://make.wordpress.org/core/2018/10/15/wordpress-and-php-7-3/">developer note on the Make WordPress Core blog</a>.<br /></p>



<h2>Twenty Nineteen</h2>



<p>Work on making Twenty Nineteen ready for prime time continues on its <a href="https://github.com/WordPress/twentynineteen">GitHub repository</a>. This update includes <a href="https://core.trac.wordpress.org/changeset/43904">a host of tweaks and bug fixes</a>, including:</p>



<ul><li>Add <code>.button</code> class support.</li><li>Fix editor font-weights for headings.</li><li>Improve support for sticky toolbars in the editor.</li><li>Improve text-selection custom colors for better contrast and legibility.</li><li>Fix editor to prevent Gutenberg&#8217;s meta boxes area from overlapping the content.</li></ul>



<h2>How to Help</h2>



<p>Do you speak a language other than English?&nbsp;<a href="https://translate.wordpress.org/projects/wp/dev">Help us translate WordPress into more than 100 languages!</a>&nbsp;</p>



<p><strong><em>If you think you’ve found a bug</em></strong><em>, you can post to the&nbsp;</em><a href="https://wordpress.org/support/forum/alphabeta"><em>Alpha/Beta area</em></a><em>&nbsp;in the support forums. We’d love to hear from you! If you’re comfortable writing a reproducible bug report,&nbsp;</em><a href="https://make.wordpress.org/core/reports/"><em>file one on WordPress Trac</em></a><em>, where you can also find&nbsp;</em><a href="https://core.trac.wordpress.org/tickets/major"><em>a list of known bugs</em></a><em>.</em></p>



<hr class="wp-block-separator" />



<p></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 16 Nov 2018 01:09:20 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:19:"Jonathan Desrosiers";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:1;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:135:"WPTavern: Full Gutenberg Compatibility Coming Soon to Automattic’s Free Themes on WordPress.org, Including Storefront for WooCommerce";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85613";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:142:"https://wptavern.com/full-gutenberg-compatibility-coming-soon-to-automattics-free-themes-on-wordpress-org-including-storefront-for-woocommerce";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3720:"<p>If your site is hosted on <a href="http://WordPress.com" rel="noopener noreferrer" target="_blank">WordPress.com</a> and you are trying out the new Gutenberg editor, there are currently <a href="https://github.com/Automattic/themes" rel="noopener noreferrer" target="_blank">24 themes with full Gutenberg support</a> available and more on the way. In response to questions about how to find Gutenberg themes on WordPress.com, <a href="https://themeshaper.com/" rel="noopener noreferrer" target="_blank">Automattic&#8217;s Theme Team</a> has <a href="https://twitter.com/MRWweb/status/1062491404373356544" rel="noopener noreferrer" target="_blank">given an update</a> about the status of the .com themes, as well as the company&#8217;s free themes on WordPress.org.</p>
<p>There is currently no way to search for Gutenberg-ready themes on WordPress.com themes because there is no filter set up for this. However, the team said users should not any experience any issues with themes breaking with the new editor:</p>
<blockquote><p>All existing themes should still work with Gutenberg. At worst styles in the editor might not exactly match styles on the site itself, and styling for individual blocks might cause conflicts if the theme treats that type of content in a specific way. But that is true of all WordPress themes, not just the ones on WordPress.com.</p></blockquote>
<p>Users can activate any theme they want with Gutenberg. The new editor is not going to break any themes, but a theme does need to <a href="https://wordpress.org/gutenberg/handbook/extensibility/theme-support/" rel="noopener noreferrer" target="_blank">add support</a> for users to take advantage of specific features like wide alignments and block color palettes. Gutenberg-ready themes also include editor styles to ensure a consistent editing experience between frontend and backend.</p>
<p>Automattic is also working to bring some of those updates from its current set of Gutenberg-ready themes to its free themes hosted on WordPress.org. The company has <a href="https://wordpress.org/themes/author/automattic/" rel="noopener noreferrer" target="_blank">109 themes</a> in the directory, which have cumulatively been downloaded more than <a href="http://wptally.com/?wpusername=automattic" rel="noopener noreferrer" target="_blank">17 million times</a>. The majority of its more popular themes fall into the business category, such as <a href="https://wordpress.org/themes/dara/" rel="noopener noreferrer" target="_blank">Dara</a> (10K active installs), <a href="https://wordpress.org/themes/argent/" rel="noopener noreferrer" target="_blank">Argent</a> (10K), <a href="https://wordpress.org/themes/edin/" rel="noopener noreferrer" target="_blank">Edin</a> (6K), and <a href="https://wordpress.org/themes/karuna/" rel="noopener noreferrer" target="_blank">Karuna (5K)</a>. Several of these themes are already Gutenberg-ready with the code <a href="https://github.com/Automattic/themes" rel="noopener noreferrer" target="_blank">available on GitHub</a>.</p>
<p><a href="https://wordpress.org/themes/storefront/" rel="noopener noreferrer" target="_blank">Storefront</a> is by far Automattic&#8217;s most popular free theme on WordPress.org with 200,000+ installs and is well on its way towards being ready to support Gutenberg&#8217;s new features. Development towards this goal is <a href="https://github.com/woocommerce/storefront/tree/feature/gutenberg" rel="noopener noreferrer" target="_blank">happening on GitHub</a>. Users can run beta versions of the Storefront theme ahead of time using the <a href="https://github.com/seb86/Storefront-Beta-Tester" rel="noopener noreferrer" target="_blank">Storefront Beta Tester</a> plugin.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 16 Nov 2018 00:27:19 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:2;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:78:"WPTavern: WPWeekly Episode 338 – Inflation, WordPress Release Dates, WP GDPR";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:58:"https://wptavern.com?p=85642&preview=true&preview_id=85642";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:83:"https://wptavern.com/wpweekly-episode-338-inflation-wordpress-release-dates-wp-gdpr";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1871:"<p>In this episode, <a href="http://jjj.me">John James Jacoby</a> and I discuss the news of the week. We talk about the delayed release of WordPress 5.0 and which day would be a suitable release date. We share our opinions on Matt&#8217;s answers from his Q&amp;A appearance at WordCamp in Portland, Oregon. We also talk about the changes in WordPress core development, Automatticians in leadership roles, and last, but not least, WordCamp budgeting.</p>
<h2>Stories Discussed:</h2>
<p><a href="https://wptavern.com/wordpress-5-0-release-date-update-to-november-27">WordPress 5.0 Release Date Update to November 27</a></p>
<p><a href="https://wptavern.com/matt-mullenweg-addresses-controversies-surrounding-gutenberg-at-wordcamp-portland-qa">Matt Mullenweg Addresses Controversies Surrounding Gutenberg at WordCamp Portland Q&amp;A</a></p>
<p><a href="https://wptavern.com/wp-gdpr-compliance-plugin-patches-privilege-escalation-vulnerability">WP GDPR Compliance Plugin Patches Privilege Escalation Vulnerability</a></p>
<p><a href="https://wptavern.com/maximum-ticket-prices-for-wordcamps-will-increase-to-25-per-day-in-2019">Maximum Ticket Prices for WordCamps Will Increase to $25 per Day in 2019</a></p>
<h2>WPWeekly Meta:</h2>
<p><strong>Next Episode:</strong> Wednesday, November 21st 3:00 P.M. Eastern</p>
<p>Subscribe to <a href="https://itunes.apple.com/us/podcast/wordpress-weekly/id694849738">WordPress Weekly via Itunes</a></p>
<p>Subscribe to <a href="https://www.wptavern.com/feed/podcast">WordPress Weekly via RSS</a></p>
<p>Subscribe to <a href="http://www.stitcher.com/podcast/wordpress-weekly-podcast?refid=stpr">WordPress Weekly via Stitcher Radio</a></p>
<p>Subscribe to <a href="https://play.google.com/music/listen?u=0#/ps/Ir3keivkvwwh24xy7qiymurwpbe">WordPress Weekly via Google Play</a></p>
<p><strong>Listen To Episode #338:</strong><br />
</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 15 Nov 2018 17:23:30 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:3;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:80:"WPTavern: NextGEN Gallery Plugin to Add Gutenberg Support Ahead of WordPress 5.0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85609";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:91:"https://wptavern.com/nextgen-gallery-plugin-to-add-gutenberg-support-ahead-of-wordpress-5-0";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4139:"<p>If you&#8217;re a <a href="https://wordpress.org/plugins/nextgen-gallery/" rel="noopener noreferrer" target="_blank">NextGEN Gallery plugin</a> user and have been wondering about Gutenberg compatibility, Imagely CEO Erick Danzer announced today that the plugin will ship a gallery block in a release planed for next week. The plugin is currently used on nearly a million WordPress sites (900,000+ active installs). NextGEN Gallery&#8217;s Gutenberg block has been in <a href="https://www.imagely.com/gutenberg-block/" rel="noopener noreferrer" target="_blank">beta testing since May</a> and the plugin will support users who update to use the new editor as well as those who stick with the Classic Editor plugin.</p>
<p>In a post titled &#8220;<a href="https://www.imagely.com/defer-gutenberg/" rel="noopener noreferrer" target="_blank">A Plea to Defer the Release of Gutenberg</a>,&#8221; Danzer outlined his concerns with the timeline for WordPress 5.0. His thoughts echo many other prominent members of the development community who have written their own <a href="https://wptavern.com/calls-to-delay-wordpress-5-0-increase-developers-cite-usability-concerns-and-numerous-bugs-in-gutenberg" rel="noopener noreferrer" target="_blank">calls to delay the release</a>. He cites feedback on WordPress.org and urges the Gutenberg team not to discount the validity of these reviews:</p>
<blockquote><p>Some people have been dismissive of those reviews and questioned whether they are a legitimate reflection of user experiences with Gutenberg. The reviews often lack detail and can be quite harsh.</p>
<p>But that’s the experience of ALL plugin developers on the WordPress repository. Gutenberg is being reviewed in precisely the same way as every other plugin on the repository. If any other major plugin maintained a 2.3 star rating and refused to accept the feedback as legitimate, it would not be a major plugin for long.</p>
<p>Even without detail, reviews on the repository represent a fair reflection of overall user feelings about a plugin. In the case of Gutenberg, it is clear the plugin is not ‘wowing’ potential users.</p></blockquote>
<p>Danzer also referenced a release the NextGEN Gallery team shipped in 2013 that included &#8220;major and breaking changes&#8221; that had been &#8220;tested aggressively but in limited ways.&#8221; This release broke an estimated 10 percent of the plugin&#8217;s installations as well as compatibility with many extensions. It has had a lasting impact on NextGEN&#8217;s reputation for the past five years. Danzer said he fears WordPress may be headed in the same direction, except at a much larger scale.</p>
<p>As a postscript to his plea, Danzer assured users reading his post that NextGEN Gallery will have support for Gutenberg in time for the WordPress 5.0 release:</p>
<blockquote><p>Despite the concerns expressed in this post, I want to assure NextGEN Gallery users that we&#8217;ll be ready regardless of the final release decision for Gutenberg. We&#8217;ll be officially  in the next week. We&#8217;ve tested and ensured that your existing galleries will work when you update. We&#8217;ve developed our block so that if you add galleries via Gutenberg, they will continue to work if you roll back or install the classic editor. And we&#8217;ll have all hands on deck to deal with any issues that arise when Gutenberg is released.</p></blockquote>
<p>NextGEN Gallery&#8217;s Gutenberg support includes a block that launches a modal where users can select a gallery to insert. Unless it has significantly changed from the <a href="https://www.youtube.com/watch?v=ZCazFfYz49s" rel="noopener noreferrer" target="_blank">beta preview video</a> published, the gallery block doesn&#8217;t seem to offer a preview of the gallery inside the Gutenberg editor once it has been selected and placed within the content. Users who want to test the beta version of Gutenberg support in the plugin can download the latest from the <a href="https://www.imagely.com/wordpress-gallery-plugin/nextgen-gallery/beta/" rel="noopener noreferrer" target="_blank">NextGEN Gallery beta page</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 14 Nov 2018 23:54:51 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:4;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:60:"WPTavern: Drupal Gutenberg Showcased at DrupalCamp Oslo 2018";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85542";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:71:"https://wptavern.com/drupal-gutenberg-showcased-at-drupalcamp-oslo-2018";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4727:"<p>Gutenberg appreciation is running high across the CMS pond in the Drupal world. DrupalCamp Oslo 2018, Norway&#8217;s biggest national camp to date, was held over the weekend. The event featured two sessions on Gutenberg &#8211; one for site builders and one for block developers. <a href="https://www.frontkom.no/" rel="noopener noreferrer" target="_blank">Frontkom</a>, the team behind <a href="https://drupalgutenberg.org/" rel="noopener noreferrer" target="_blank">Drupal Gutenberg</a>, took home two <a href="https://splashawards.org/" rel="noopener noreferrer" target="_blank">Splash Awards</a> for &#8220;Best Module&#8221; and &#8220;Best Integration&#8221; for 2018.</p>
<blockquote class="twitter-tweet">
<p lang="en" dir="ltr">The Splash Awards for Best integration and Best module was awarded to Drupal Gutenberg this weekend @ <a href="https://twitter.com/hashtag/dcoslo?src=hash&ref_src=twsrc%5Etfw">#dcoslo</a>! Big smile from <a href="https://twitter.com/perandre?ref_src=twsrc%5Etfw">@perandre</a> on behalf of the <a href="https://twitter.com/frontkom?ref_src=twsrc%5Etfw">@frontkom</a> team. <img src="https://s.w.org/images/core/emoji/11/72x72/1f3c6.png" alt="🏆" class="wp-smiley" /><img src="https://s.w.org/images/core/emoji/11/72x72/1f3c6.png" alt="🏆" class="wp-smiley" /> <a href="https://t.co/Sx0NLv3rWY">pic.twitter.com/Sx0NLv3rWY</a></p>
<p>&mdash; drupalgutenberg (@drupalgutenberg) <a href="https://twitter.com/drupalgutenberg/status/1061973657470337024?ref_src=twsrc%5Etfw">November 12, 2018</a></p></blockquote>
<p></p>
<p>The <a href="https://wptavern.com/gutenberg-cloud-plugin-for-wordpress-is-now-in-beta" rel="noopener noreferrer" target="_blank">Cloud Blocks plugin for WordPress</a> was released in beta two weeks ago to begin testing the Gutenberg Cloud API, which enables blocks to be shared across CMS&#8217;s. The Drupal version of this connector plugin was introduced at DrupalCamp Oslo. Frontkom&#8217;s Per André Rønsen and Thor Andre Gretland hosted a session called &#8220;Build your pages build with Drupal Gutenberg&#8221; where they gave attendees a look at Gutenberg Cloud for D8. It runs as submodule of Drupal Gutenberg.</p>
<p><a href="https://cloudup.com/c5wZ7ylbkvN"><img src="https://i2.wp.com/cldup.com/9giVOkXdC3.gif?resize=627%2C407&ssl=1" alt="Drupal pagebuilder gutenberg" width="627" height="407" /></a></p>
<h3>Changes Coming to Gutenberg Cloud: All Blocks Will Undergo Code Review before Publishing</h3>
<p>One of the speakers at the event was a member of the Drupal.org security team. Rønsen said after their session they had good participation during the Q&amp;A time.</p>
<p>&#8220;There was some push back on Gutenberg Cloud for letting any developer add new blocks,&#8221; Rønsen said. &#8220;We explained that this is only during beta phase, and that we do code review of new blocks coming in. However, this led to the decision of switching to white listing instead. Starting next week, block authors will need to email us and ask for code review before we accept the blocks. This will go hand in hand with an upcoming browser on gutenbergcloud.org  – meaning each block will get it&#8217;s own little landing page online. We think this will be useful for people to see how Gutenberg Cloud can be useful for their site.&#8221;</p>
<p>Overall, the Frontkom team saw a positive reception to Gutenberg Cloud at DrupalCamp Oslo and they are working to incorporate some of the valuable feedback they received.</p>
<blockquote class="twitter-tweet">
<p lang="en" dir="ltr">Totally impressed by <a href="https://twitter.com/drupalgutenberg?ref_src=twsrc%5Etfw">@drupalgutenberg</a> demo at <a href="https://twitter.com/hashtag/dcoslo?src=hash&ref_src=twsrc%5Etfw">#dcoslo</a>. Good work <a href="https://twitter.com/frontkomtech?ref_src=twsrc%5Etfw">@frontkomtech</a> <a href="https://twitter.com/hashtag/drupalgutenberg?src=hash&ref_src=twsrc%5Etfw">#drupalgutenberg</a> <a href="https://twitter.com/hashtag/drupalnorge?src=hash&ref_src=twsrc%5Etfw">#drupalnorge</a> <a href="https://t.co/qXbX8mXhnp">pic.twitter.com/qXbX8mXhnp</a></p>
<p>&mdash; Baddy Sonja Breidert (@baddysonja) <a href="https://twitter.com/baddysonja/status/1060881025813934085?ref_src=twsrc%5Etfw">November 9, 2018</a></p></blockquote>
<p></p>
<p>&#8220;The interest was amazing,&#8221; Rønsen said. &#8220;This week, we&#8217;ve been in contact with two big dev teams who wants to help out getting the Drupal module a stable release.&#8221;</p>
<p>The session for site builders was not filmed but there is an unofficial video from the developer day where Frontkom&#8217;s Marco Fernandes and Frank Gjertsen gave a technical session on how to build custom blocks.</p>
<p></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 14 Nov 2018 19:56:06 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:5;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:82:"WPTavern: Maximum Ticket Prices for WordCamps Will Increase to $25 per Day in 2019";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85570";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:92:"https://wptavern.com/maximum-ticket-prices-for-wordcamps-will-increase-to-25-per-day-in-2019";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4485:"<p>For the last seven years, the maximum amount of money WordCamp organizers could charge for ticket prices was $20 per day. In 2019, this <a href="https://make.wordpress.org/community/2018/11/12/increase-in-wordcamp-maximum-ticket-price-for-2019/">will increase</a> to $25 per day.</p>
<p>The new amount accounts for inflation and provides breathing room for organizers. According to the Bureau of Labor Statistics <a href="https://data.bls.gov/cgi-bin/cpicalc.pl?cost1=20.00&year1=200601&year2=201808">inflation calculator</a>, $20 in January of 2006 is equal to $25.51 in October of 2018.</p>
<p>Organizers don&#8217;t have to charge this amount and are encouraged to keep the ticket price as low as possible. The increase is also part of a delicate balancing act between not being a financial burden and getting 80% or more of attendees to show up.</p>
<p>&#8220;The ticket price does not reflect on the value of the event,&#8221; Andrea Middleton, Community organizer said.</p>
<p>&#8220;In an ideal world, all WordCamp tickets would be free just like WordPress is free but to avoid organizing a conference for 500 registrants and only having 50 people show up on the day of the event, we <a href="https://make.wordpress.org/community/handbook/wordcamp-organizer/planning-details/selling-tickets/#the-reasons-behind-pricing-tickets-as-low-as-possible">charge as little as we possibly can</a> for tickets, but just enough that people will show up for the event if they’re sleepy that morning or got a last-minute invitation to a pool party or something.&#8221;</p>
<p>When the <a href="https://make.wordpress.org/community/2018/09/17/proposal-to-increase-the-maximum-ticket-price-for-wordcamps/">proposal </a>to increase the maximum ticket price was published in September, many commenters approved of the increase with <a href="https://make.wordpress.org/community/2018/09/17/proposal-to-increase-the-maximum-ticket-price-for-wordcamps/#comment-25918">some suggesting</a> an even higher amount to account for inflation for the next few years. <a href="https://make.wordpress.org/community/2018/09/17/proposal-to-increase-the-maximum-ticket-price-for-wordcamps/#comment-25885">Ian Dunn questioned</a> whether or not budget shortfalls were due to organizing teams spending money on extra things.</p>
<p>&#8220;Beyond that, though, I’m curious why camps are having more trouble today than they were 5 or even 10 years ago?&#8221; Dunn said.</p>
<p>&#8220;Is it harder to get sponsorships? It seems like the opposite is true, especially given how much the global sponsorship program covers.</p>
<p>&#8220;Based on experiences in my local community, I suspect that the primary reason for budget shortfalls is that the organizing team is choosing to do extra things, beyond what’s necessary to meet the goals of a WordCamp. For example, holding after-parties at trendy venues, expensive speaker gifts, professional A/V (which I’ve advocated for in the past, but not at the cost of higher ticket prices), etc.&#8221;</p>
<p>It is interesting to ponder how much money WordCamps could save globally by eliminating the materialistic aspects of the event such as t-shirts, speaker gifts, lanyards, badges, signs, etc.</p>
<p>At there core, WordCamps are about gathering the local community together in a physical location to share knowledge. Not every WordPress event needs to mimic WordCamp US or WordCamp Europe, two of the largest events in the world.</p>
<p>Although the WordPress Community team tracks data such as how much each WordCamp charges for ticket prices, the information is not readily available. This is because of the large volume of data that would need to be calculated and displayed. It would be interesting to see an info-graphic of this data where you can compare the average ticket price for WordCamps per country.</p>
<p>Hugh Lashbrooke, a WordPress Community team contributor who has access to the data says that, &#8220;globally the majority of camps have lower prices.&#8221;</p>
<p>WordCamp organizers are highly encouraged to <a href="https://make.wordpress.org/community/handbook/wordcamp-organizer/first-steps/web-presence/using-camptix-event-ticketing-plugin/#tracking-attendance">keep track</a> of attendance as the data is used to help make better informed decisions. The team will review the no-show rates at WordCamps at the end of 2019 to determine if the price increase had any effect. If not, the team may increase the price again for 2020.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 14 Nov 2018 19:25:47 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:6;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:92:"WPTavern: Google Developers Demo AMP Stories Integration with Gutenberg at Chrome Dev Summit";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85548";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:103:"https://wptavern.com/google-developers-demo-amp-stories-integration-with-gutenberg-at-chrome-dev-summit";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2929:"<p><a href="https://i2.wp.com/wptavern.com/wp-content/uploads/2018/11/Screen-Shot-2018-11-13-at-1.18.48-PM.png?ssl=1"><img /></a></p>
<p>Alberto Medina and Weston Ruter gave a presentation on Progressive Content Management Systems yesterday at <a href="https://developer.chrome.com/devsummit/" rel="noopener noreferrer" target="_blank">Chrome Dev Summit 2018</a> in San Francisco. Medina is a developer advocate at Google and Ruter recently transitioned into a new role as a Developer Programs Engineer after eight years at XWP.</p>
<p>Medina began the session with a quick overview of the increasingly complex CMS space, which is growing, according to figures he cited from w3techs: 54% of sites are built with some kind of CMS (11% YoY growth). Many CMS&#8217;s face common challenges when it comes to integrating modern web technologies into their platforms, such as large code bases, legacy code, and technical debt.</p>
<p>In addressing the challenges that WordPress faces, Google is looking to make an impact on a large swath of the web. Medina outlined the two-part approach Google is using with the WordPress ecosystem. This includes AMP integration via the AMP plugin for WordPress. It&#8217;s currently at <a href="https://make.xwp.co/2018/11/05/amp-plugin-release-v1-0-rc2/" rel="noopener noreferrer" target="_blank">version 1.0 RC2</a> and the stable version is scheduled for release at the end of this month.</p>
<p>The second part of the approach is integration of modern web capabilities and APIs in core, so that things like service workers and background sync are supported natively in a way that the entire ecosystem can take advantage of them. Google has invested resources to get these features added to core.</p>
<p>Ruter demonstrated a single page application built in WordPress using a standard theme as the basis and the AMP plugin as a foundation. Medina said the team plans to continue expanding this work integrating AMP content into WordPress, specifically in the context of Gutenberg. He gave a quick demo of how they are working to help content creators easily take advantage of features like <a href="https://www.ampproject.org/stories/" rel="noopener noreferrer" target="_blank">AMP stories</a> via a Gutenberg integration.</p>
<p><a href="https://i2.wp.com/wptavern.com/wp-content/uploads/2018/11/Screen-Shot-2018-11-13-at-2.08.41-PM.png?ssl=1"><img /></a></p>
<p>Medina said AMP stories are formed by components and work well with Gutenberg, since everything in the new editor corresponds to a block.</p>
<p>&#8220;We want powerful components like these to become available across all CMS&#8217;s,&#8221; Medina said. &#8220;The CMS space is moving steadily along the progressive web road.&#8221;</p>
<p>Check out the video below to learn more about Google&#8217;s experience integrating modern web capabilities and progressive technologies into the WordPress platform and ecosystem.</p>
<p></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 14 Nov 2018 00:27:58 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:7;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"Dev Blog: WordPress 5.0 Beta 4";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"https://wordpress.org/news/?p=6241";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2018/11/wordpress-5-0-beta-4/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3706:"<p>WordPress 5.0 Beta 4 is now available!</p>



<p><strong>This software is still in development,</strong>&nbsp;so we don’t recommend you run it on a production site. Consider setting up a test site to play with the new version.</p>



<p>There are two ways to test the WordPress 5.0 Beta: try the&nbsp;<a href="https://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester</a>&nbsp;plugin (you’ll want “bleeding edge nightlies”), or you can&nbsp;<a href="https://wordpress.org/wordpress-5.0-beta4.zip">download the beta here</a>&nbsp;(zip).</p>



<p><strong>The WordPress 5.0 release date has changed</strong>, it is now scheduled for release on&nbsp;<a href="https://make.wordpress.org/core/5-0/">November 27</a>, and we need your help to get there. Here are some of the big issues that we’ve fixed since Beta 3:</p>



<h2>Block Editor</h2>



<p>The block editor has been updated to match the <a href="https://make.wordpress.org/core/2018/11/12/whats-new-in-gutenberg-12th-november/">Gutenberg 4.3 release</a>, the major changes  include:</p>



<ul><li>An <a href="https://github.com/WordPress/gutenberg/pull/7718">Annotations API</a>, allowing plugins to add  contextual data as you write.</li><li>More consistent keyboard navigation between blocks, as well as back-and-forth between different areas of the interface.</li><li>Improved accessibility, with additional  labelling and speech announcements.</li></ul>



<p>Additionally, there have been some bugs fixed that popped up in beta 3:</p>



<ul><li>Better support for plugins that have more advanced meta box usage.</li><li>Script concatenation is now supported.</li><li>Ajax calls could occasionally cause PHP errors.</li></ul>



<h2>Internationalisation</h2>



<p>We&#8217;ve added an API for translating your plugin and theme strings in JavaScript files! The block editor is now using this, and you can start using it, too. Check out the <a href="https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/">developer note</a>&nbsp;to get started.</p>



<h2>Twenty Nineteen</h2>



<p>Twenty Nineteen is being polished over on its <a href="https://github.com/WordPress/twentynineteen">GitHub repository</a>. This update includes <a href="https://core.trac.wordpress.org/changeset/43892">a host of tweaks and bug fixes</a>, including:</p>



<ul><li>Menus now  properly support keyboard and touch interactions.</li><li>A footer menu has been added for secondary page links.</li><li>Improved backwards compatibility with older versions of WordPress.</li></ul>



<h2>Default Themes</h2>



<p>All of the older default themes—from Twenty Ten through to Twenty Seventeen—have polished  styling in the block editor.</p>



<h2>How to Help</h2>



<p>Do you speak a language other than English?&nbsp;<a href="https://translate.wordpress.org/projects/wp/dev">Help us translate WordPress into more than 100 languages!</a>&nbsp;</p>



<p><strong><em>If you think you’ve found a bug</em></strong><em>, you can post to the&nbsp;</em><a href="https://wordpress.org/support/forum/alphabeta"><em>Alpha/Beta area</em></a><em>&nbsp;in the support forums. We’d love to hear from you! If you’re comfortable writing a reproducible bug report,&nbsp;</em><a href="https://make.wordpress.org/core/reports/"><em>file one on WordPress Trac</em></a><em>, where you can also find&nbsp;</em><a href="https://core.trac.wordpress.org/tickets/major"><em>a list of known bugs</em></a><em>.</em></p>



<hr class="wp-block-separator" />



<p><em>International-<br />isation is a word with<br />many syllables.</em></p>



<p><em>Meta boxes are<br />the original style block.<br />Old is new again.</em></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 13 Nov 2018 01:27:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:15:"Gary Pendergast";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:8;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:87:"WPTavern: WordCamp Nordic Tickets Now on Sale, Sponsorship Packages Sold Out in Minutes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85193";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:97:"https://wptavern.com/wordcamp-nordic-tickets-now-on-sale-sponsorship-packages-sold-out-in-minutes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2086:"<p><a href="https://2019.nordic.wordcamp.org/tickets/" rel="noopener noreferrer" target="_blank">Tickets</a> for the first ever <a href="https://wptavern.com/wordcamp-nordic-2019-to-be-held-in-helsinki-march-7-8" rel="noopener noreferrer" target="_blank">WordCamp Nordic</a> went on sale today and 100 seats sold within 20 minutes. The event is scheduled to be held in Helsinki, Finland, March 7-8, 2019. There are currently 97 regular tickets and 59 micro-sponsor tickets remaining in the first batch, but more will be released in another round.</p>
<p>If there was any question about whether this new regional WordCamp would gain support, the record-setting buy up of all the <a href="https://2019.nordic.wordcamp.org/call-for-sponsors/" rel="noopener noreferrer" target="_blank">sponsor packages</a> has put them to rest. All of the Gold packages (3000 €) were purchased within one minute. Silver packages (1500 €) and Bronze packages (750 €) were all purchased within four minutes and 35 minutes, respectively.</p>
<p>&#8220;Sponsor packages tend to go in a few hours whenever there’s a WordCamp in Finland, largely thanks to our communications team and the fact that most companies involved with WordPress follow the conversations on our local Slack/Twitter where these things get announced,&#8221; co-organizer Niko Pettersen said. &#8220;But this must have been a record even for us. WordCamp Nordic seems to be drawing a lot of interest.&#8221;</p>
<p>The <a href="https://2019.nordic.wordcamp.org/call-for-speakers/" rel="noopener noreferrer" target="_blank">call for speakers</a> opened on November 7 and submissions close January 7, 2019. All of the sessions will be held in English and the camp is planning to have two tracks. Those interested to speak may apply for a long talk (40 minutes) or a lightning talk (15 minutes). Selections will be made by mid-January and speakers will be announced in February. Follow <a href="https://twitter.com/WordCampNordic" rel="noopener noreferrer" target="_blank">@WordCampNordic</a> for all the latest news from the event.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 13 Nov 2018 00:30:56 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:9;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:78:"WPTavern: WP GDPR Compliance Plugin Patches Privilege Escalation Vulnerability";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85459";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:89:"https://wptavern.com/wp-gdpr-compliance-plugin-patches-privilege-escalation-vulnerability";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5052:"<p>At the end of last week, a plugin called <a href="https://wordpress.org/plugins/wp-gdpr-compliance/" rel="noopener noreferrer" target="_blank">WP GDPR Compliance</a> sent out a security update for a privilege escalation vulnerability that was reported to the WordPress Plugin Directory team on November 6. The plugin was temporarily removed and then reinstated after the issues were patched within 24 hours by its creators, <a href="https://www.van-ons.nl/" rel="noopener noreferrer" target="_blank">Van Ons</a>, a WordPress development shop based in Amsterdam.</p>
<p>The changelog for the most recent release states that previous versions are vulnerable to SQL injection due to &#8220;wrong handling of possible user input in combination with unsafe unserialization.&#8221; The fixes are in version 1.4.3, which includes the following:</p>
<ul>
<li>Security fix: Removed base64_decode() function</li>
<li>Security fix: Correctly escape input in $wpdb->prepare() function</li>
<li>Security fix: Only allow modifying WordPress options used by the plugin and by the user capabilities</li>
</ul>
<p>Van Ons said they requested the Plugin Directory team do a forced update but they said it was not an option in this case.</p>
<p><a href="https://wordpress.org/plugins/wp-gdpr-compliance/" rel="noopener noreferrer" target="_blank">WP GDPR Compliance</a> has more than 100,000 active installs. According to Wordfence, the vulnerability is being actively exploited in the wild and many users are reporting new administrator accounts being created on their affected sites. The <a href="https://www.wordfence.com/blog/2018/11/privilege-escalation-flaw-in-wp-gdpr-compliance-plugin-exploited-in-the-wild/">Wordfence blog</a> has a breakdown of how attackers are taking advantage of these sites:</p>
<blockquote><p>We’ve already begun seeing cases of live sites infected through this attack vector. In these cases, the ability to update arbitrary options values is being used to install new administrator accounts onto the impacted sites.</p>
<p>By leveraging this flaw to set the users_can_register option to 1, and changing the default_role of new users to “administrator”, attackers can simply fill out the form at /wp-login.php?action=register and immediately access a privileged account. From this point, they can change these options back to normal and install a malicious plugin or theme containing a web shell or other malware to further infect the victim site.</p></blockquote>
<p>Wordfence has seen multiple malicious administrator accounts present on sites that have been compromised, with variations of the username t2trollherten. Several WP GDPR Compliance plugin users have commented on the Wordfence post saying they were victims of the exploit, having found new admin users with a backdoor and file injections added.</p>
<p>The plugin has its own <a href="https://www.wpgdprc.com/" rel="noopener noreferrer" target="_blank">website</a> where the vulnerability was announced. Its creators recommend that anyone who didn&#8217;t update right away on November 7, 2018, should look for changes in their databases. The most obvious symptom of attack is likely to be new users with administrator privileges. Any unrecognized users should be deleted. They also recommend restoring a complete backup of the site before November 6 and then updating to version 1.4.3 right away.</p>
<p>The WP GDPR Compliance plugin lets users add a GDPR checkbox to Contact Form 7, Gravity Forms, WooCommerce, and WordPress comments. It allows visitors and customers to opt into allowing the site to handle their personal data for a defined purpose. It also allows visitors to request data stored in the website&#8217;s database through a Data Request page that allows them to request data to be deleted.</p>
<p>While the name of the plugin includes the word &#8220;compliance,&#8221; users should note that the plugin details includes a disclaimer:</p>
<p>&#8220;ACTIVATING THIS PLUGIN DOES NOT GUARANTEE YOU FULLY COMPLY WITH GDPR. PLEASE CONTACT A GDPR CONSULTANT OR LAW FIRM TO ASSESS NECESSARY MEASURES.&#8221;</p>
<p>A relatively new amendment to <a href="https://developer.wordpress.org/plugins/wordpress-org/detailed-plugin-guidelines/#9-developers-and-their-plugins-must-not-do-anything-illegal-dishonest-or-morally-offensive" rel="noopener noreferrer" target="_blank">section 9 of the plugin development guidelines</a> restricts plugin authors from implying that a plugin can create, provide, automate, or guarantee legal compliance. Heather Burns, a member of WordPress Privacy team, worked together with Mika Epstein last April to <a href="https://make.wordpress.org/plugins/2018/04/12/legal-compliance-added-to-guidelines/" rel="noopener noreferrer" target="_blank">put this change into effect</a>. This guideline is especially important for users to remember when a plugin author uses GDPR Compliance in the name of the plugin. It isn&#8217;t a guarantee of compliance, just a useful tool as part of larger plan to protect users&#8217; privacy.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 12 Nov 2018 20:20:48 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:10;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:69:"Akismet: Version 4.1 of the Akismet WordPress Plugin Is Now Available";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:31:"http://blog.akismet.com/?p=2031";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:97:"https://blog.akismet.com/2018/11/12/version-4-1-of-the-akismet-wordpress-plugin-is-now-available/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:826:"<p>Version 4.1 of <a href="http://wordpress.org/plugins/akismet/">the Akismet plugin for WordPress</a> is now available and contains the following changes:</p>

<ul><li>We added a WP-CLI method for retrieving Akismet stats: <code>wp akismet stats</code><br /></li><li>Akismet now hooks into the  new &#8220;Personal Data Eraser&#8221; functionality from WordPress 4.9.6 to ensure that any personal data stored by Akismet is erased when requested.<br /></li><li>We&#8217;ve updated the plugin to more quickly clear outdated alert messages.</li></ul>

<p>To upgrade, visit the Updates page of your WordPress dashboard and follow the instructions. If you need to download the plugin zip file directly, links to all versions are available in <a href="http://wordpress.org/plugins/akismet/">the WordPress plugins directory</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 12 Nov 2018 19:51:28 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:17:"Christopher Finke";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:11;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:99:"WPTavern: Matt Mullenweg Addresses Controversies Surrounding Gutenberg at WordCamp Portland Q&amp;A";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85433";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:105:"https://wptavern.com/matt-mullenweg-addresses-controversies-surrounding-gutenberg-at-wordcamp-portland-qa";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:8531:"<p>Matt Mullenweg joined attendees at WordCamp Portland, OR, for a Q&amp;A session last weekend and the recording is now <a href="https://wordpress.tv/2018/11/08/matt-mullenweg-qa-at-wordcamp-portland-2018/" rel="noopener noreferrer" target="_blank">available on WordPress.tv</a>.</p>
<p>The first question came from a user who tried Gutenberg and turned it off because of a plugin conflict. She asked if users will have to use Gutenberg when 5.0 is released. Mullenweg said one of the reasons Gutenberg has been tested so early is to give plugin developers time to get their products compatible. He also said that it has been the fastest growing plugin in WordPress&#8217; history, with more than 600,000 installations since it was first made available.</p>
<p>In response to her question he said users will have the option to use the Classic Editor and that the team is considering updating it to include per-user controls and the possibility to turn it on/off for different post types.</p>
<p>Subsequent questions went deeper into recent controversies surrounding Gutenberg, which Mullenweg addressed more in depth.</p>
<p>&#8220;The tough part of any open source project &#8211; there&#8217;s kind of a crucible of open source development which can sometimes be more adversarial and sometimes even acrimonious,&#8221; he said. &#8220;Working within the same company, you can kind of assume everyone is rowing in the same direction. In a wide open source ecosystem, some people might actually want the opposite of what you&#8217;re doing, because it might be in their own economic self-interest, or for any number of reasons.</p>
<p>&#8220;I liken it much more to being a mayor of a city than being a CEO of a company. I&#8217;ve done WordPress now for 15 years so I&#8217;m pretty used to it. It might seem kind of controversial if you&#8217;re just coming in, but this is not the most controversial thing we have ever brought into WordPress. The last time we had a big fork of WordPress was actually when we brought in WYSIWYG the first time. Maybe there&#8217;s something about messing with the editor that sets people off.&#8221;</p>
<p>Mullenweg commented on how polarizing Twitter can be as a medium and how that can impact conversations in negatives ways. He said people tend to read the worst into things that have been said and that has been a new challenge during this particular time in WordPress&#8217; history. WordPress tweets are sprinkled into timelines along with politics and current events in a way that can cause people to react differently than if the discussion was held in a trac ticket, for example.</p>
<p>One attendee asked, &#8220;With Gutenberg there&#8217;s a lot of uncertainty. Where do you see the tipping point where you see people become more favorable to Gutenberg than the Classic Editor?&#8221;</p>
<p>&#8220;Part of getting these two plugins, Gutenberg and Classic Editor, out early, was that it could remove uncertainty for people,&#8221; Mullenweg said. &#8220;Months before they were released you could kind of choose your path. The hope is that the 5.0 release day is the most anti-climactic thing ever. Because we have over a million sites that have either chosen to not use Gutenberg, which is totally ok, or have already opted in and have been getting these sometimes weekly updates. We have hosts that have been actually been pre-installing, pre-activating Gutenberg with all of their sites.&#8221;</p>
<p>Mullenweg said hosts that have pre-installed Gutenberg have not reported a higher than normal support load and that it has basically been &#8220;a non-event.&#8221; It&#8217;s the users who are updating to 5.0 after many years of using WordPress who will have the most to learn.</p>
<p>&#8220;Gutenberg does by some measures five or ten measures more than what you could really accomplish in the classic editor,&#8221; Mullenweg said. &#8220;That also means there&#8217;s more buttons, there&#8217;s more blocks. That is part of the idea &#8211; to open up people&#8217;s flexibility and creativity to do things they would either need code or a crazy theme to do in the past. And now we&#8217;re going to open that up to do WordPress&#8217; mission, which is to democratize publishing and make it accessible to everyone.&#8221;</p>
<p>Gutenberg&#8217;s current state of accessibility has been a hot topic lately and one attendee asked for his thoughts about the recent discussions. Mullenweg said there is room for improvement in how this aspect of the project was handled and that WordPress can work better across teams in the future:</p>
<blockquote><p>Accessibility has been core to WordPress from the very beginning. It&#8217;s part of why we started &#8211; adoption of web standards and accessibility things. We&#8217;ve been a member of the web standards project for many many years. We did kind of have some project management fails in this process where we had a team of volunteers that felt like they were disconnected from the rapid development that was happening with Gutenberg. Definitely there were some things we could do better there. In the future I think that we need &#8211; I don&#8217;t know if it makes sense to have separate accessibility as a separate kind of process from the core development. It really needs to be integrated at every single stage. We did do a lot, as Matias did a big long post on it. We&#8217;ve done a ton of keyboard accessibility stuff, there&#8217;s ARIA elements on everything. One of their feedbacks was that we did it wrong, but we did it the best that we knew how to and it&#8217;s been in there for awhile. There&#8217;s been over 200 closed issues from really the very beginning. We also took the opportunity to fix some things that had been poorly accessible in WordPress from the beginning. It&#8217;s not that WordPress is perfectly accessible and all WCAG AA and it&#8217;s reverting. It&#8217;s actually that huge swaths of WP are inaccessible &#8211; they just might not be considered core paths from the current accessibility team but I consider them core.</p></blockquote>
<p>In response to a question about the future of React in WordPress, Mullenweg went more in depth on the vision he had when he urged the WordPress community to <a href="https://wptavern.com/state-of-the-word-2015-javascript-and-api-driven-interfaces-are-the-future-of-wordpress">learn JavaScript deeply in 2015</a>. At that time he said &#8220;it is the future of the web.&#8221; He described how each block can be a launching point for something else &#8211; via a modal, such as updating settings, doing advanced things with an e-commerce store, zooming in and out of those screens from the editor. This was perhaps the most inspirational part of the Q&amp;A where the potential of Gutenberg shines as bright as it did in the early demos.</p>
<p>&#8220;The other beautiful thing is that because Gutenberg essentially allows for translation into many different formats,&#8221; Mullenweg said. &#8220;It can publish to your web page, your RSS feed, AMP, blocks can be translated into email for newsletters, there&#8217;s so much that the structured nature of Gutenberg and the semantic HTML it creates and the grammar that&#8217;s used to parse it, can enable for other applications. It becomes a little bit like a lingua franca that perhaps even crosses CMS&#8217;s. There&#8217;s now these new cross-CMS Gutenberg blocks will be possible. It&#8217;s not just WordPress anymore. It may be a JavaScript block that was written for Drupal that you install on your WordPress site. I mean, hot diggity! How would that have ever happened before? That&#8217;s why we took two years off; it&#8217;s why we&#8217;ve had everyone in the world working on this thing.&#8221;</p>
<p>JavaScript is what makes this cross-platform collaboration possible and it&#8217;s already evident in the work the Drupal Gutenberg contributors are doing, as well as the platform-agnostic Gutenberg Cloud project. When Gutenberg is released in 5.0, it will enable more for WordPress and the web than we can predict right now.</p>
<p>&#8220;This is not the finish line,&#8221; Mullenweg said. &#8220;5.0 is almost like the starting point. Expect just as much time invested into Gutenberg after the 5.0 release as before &#8211; to get it to that place where we don&#8217;t think it&#8217;s just better than what we have today but it&#8217;s actually like a world-class web-defining experience, which is what we want to create and what you all deserve.&#8221;</p>
<p></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 10 Nov 2018 15:30:46 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:12;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:58:"WPTavern: WordPress 5.0 Release Date Update to November 27";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85475";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:69:"https://wptavern.com/wordpress-5-0-release-date-update-to-november-27";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2548:"<p>The WordPress 5.0 release date has been pushed back to November 27. The <a href="https://make.wordpress.org/core/2018/10/03/proposed-wordpress-5-0-scope-and-schedule/" rel="noopener noreferrer" target="_blank">previous schedule</a> outlined the possibility of a slip date where the first target date could slip by up to eight days if necessary.</p>
<p>&#8220;As discussed during the Core devchat this week, the initial November 19th target date is looking a bit too soon for a release date,&#8221; Gutenberg technical lead Matias Ventura said in today&#8217;s announcement on the <a href="https://make.wordpress.org/core/2018/11/09/update-on-5-0-release-schedule/" rel="noopener noreferrer" target="_blank">make.wordpress.org/core</a> blog. &#8220;After listening to a lot of feedback — as well as looking at current issues, ongoing pull requests, and general progress — we’re going to take an extra week to make sure everything is fully dialed in and the release date is now targeted for November 27th.&#8221;</p>
<p>Ventura outlined a new plan where beta 4 and beta 5 releases will coincide with Gutenberg 4.3 and 4.4 releases. RC1 is expected to be released November 19. He said contributors will be posting daily high level updates on the current status of the release, including things like open pull requests to be reviewed and outstanding bugs, to the #core-editor channel.</p>
<p>The announcement also includes a short video demonstration of Gutenberg fully integrated with the new default Twenty Nineteen theme.</p>
<p></p>
<p>Given the recent <a href="https://wptavern.com/calls-to-delay-wordpress-5-0-increase-developers-cite-usability-concerns-and-numerous-bugs-in-gutenberg" rel="noopener noreferrer" target="_blank">pushback on the timeline</a> from prominent WordPress developers and business owners, the updated November 27 timeline may still not offer enough time to resolve the issues remaining and allow the ecosystem to prepare training materials that accurately reflect late stage UI changes.</p>
<p>At a spontaneous Q&amp;A session at WordCamp Portland this weekend, Matt Mullenweg said WordPress 5.0 was branched from 4.9.8 so this release has been tightly wound to the previous one to allow for a more seamless transition.</p>
<p>The next targeted release day falls on the Tuesday after Cyber Monday, which should be a relief to anyone running a WordPress-powered e-commerce site. If WordPress misses the updated November 27 release date, it will be pushed back to the secondary target date of January 22, 2019.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Nov 2018 20:06:54 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:13;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:104:"WPTavern: WPWeekly Episode 337 – Gutenberg User Experiences, Release Timelines, and the Classic Editor";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:58:"https://wptavern.com?p=85470&preview=true&preview_id=85470";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:109:"https://wptavern.com/wpweekly-episode-337-gutenberg-user-experiences-release-timelines-and-the-classic-editor";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2142:"<p>In this episode, <a href="http://jjj.me">John James Jacoby</a> and I break down what&#8217;s happening with Gutenberg. We discuss our trials and tribulations with the editor, the release timeline, and calls from members of the community to delay WordPress 5.0 until January. We also share details on how long the Classic Editor plugin will be supported. Last but not least, we talk about the possible release strategy of shipping point releases every two weeks after WordPress 5.0 is released.</p>
<h2>Stories Discussed:</h2>
<p><a href="https://wptavern.com/how-to-add-an-image-to-a-paragraph-block-in-gutenberg">How to Add an Image to A Paragraph Block in Gutenberg</a></p>
<p><a href="https://wptavern.com/adding-aligned-images-to-paragraphs-in-gutenberg-is-not-as-tough-as-i-thought">Adding Aligned Images to Paragraphs in Gutenberg Is Not as Tough as I Thought</a></p>
<p><a href="https://wptavern.com/wordpress-5-0-beta-3-released-rc-1-expected-november-12">WordPress 5.0 Beta 3 Released, RC 1 Expected November 12</a></p>
<p><a href="https://joost.blog/wordpress-5-0-needs-a-different-timeline/">WordPress 5.0 needs a different timeline    </a></p>
<p><a href="https://mrwweb.com/wordpress-5-0-is-not-ready/">WordPress 5.0 is Not Ready</a></p>
<p><a href="https://wptavern.com/classic-editor-plugin-may-be-included-with-5-0-updates-support-window-set-to-end-in-2021">Classic Editor Plugin May Be Included with 5.0 Updates, Support Window Set to End in 2021</a></p>
<h2>WPWeekly Meta:</h2>
<p><strong>Next Episode:</strong> Wednesday, November 14th 3:00 P.M. Eastern</p>
<p>Subscribe to <a href="https://itunes.apple.com/us/podcast/wordpress-weekly/id694849738">WordPress Weekly via Itunes</a></p>
<p>Subscribe to <a href="https://www.wptavern.com/feed/podcast">WordPress Weekly via RSS</a></p>
<p>Subscribe to <a href="http://www.stitcher.com/podcast/wordpress-weekly-podcast?refid=stpr">WordPress Weekly via Stitcher Radio</a></p>
<p>Subscribe to <a href="https://play.google.com/music/listen?u=0#/ps/Ir3keivkvwwh24xy7qiymurwpbe">WordPress Weekly via Google Play</a></p>
<p><strong>Listen To Episode #337:</strong><br />
</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Nov 2018 17:21:30 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:14;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:47:"Matt: Gutenberg in Portland Oregon and Podcasts";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:22:"https://ma.tt/?p=48589";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:64:"https://ma.tt/2018/11/gutenberg-in-portland-oregon-and-podcasts/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1192:"<p>I&#8217;ve had the opportunity to talk about Gutenberg at two great venues recently. The first was at WordCamp Portland which graciously allowed me to join for a Q&amp;A at the end of the event. The questions were great and covered a lot of the latest and greatest about Gutenberg and WordPress 5.0:</p>



<div class="wp-block-embed__wrapper">

</div>



<p>Last week I also joined <a href="https://wpbuilds.com/2018/11/08/episode-101-matt-mullenweg-why-gutenberg-and-why-now/">Episode 101 of the WP Builds podcast</a>, where as Nathan put it: &#8220;We talk about Gutenberg, why Matt thinks that we need it, and why we need it now. We go on to chat about how it’s divided the WordPress community, especially from the perspective of users with accessibility needs.&#8221;</p>



<p>They may be out of seats already, but <a href="https://www.meetup.com/Southern-Maine-WordPress-Meetup/events/256212528/">I&#8217;ll be on the other coast to do a small meetup in Portland, Maine</a> this week. As we lead up to release and <a href="https://2018.us.wordcamp.org/">WordCamp US</a> I&#8217;m really enjoying the opportunity to hear from WordPress users of all levels all over the country.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Nov 2018 04:45:33 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Matt";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:15;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:114:"WPTavern: Calls to Delay WordPress 5.0 Increase, Developers Cite Usability Concerns and Numerous Bugs in Gutenberg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85371";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:124:"https://wptavern.com/calls-to-delay-wordpress-5-0-increase-developers-cite-usability-concerns-and-numerous-bugs-in-gutenberg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:9585:"<p>Developers and business owners are waiting anxiously in the wings, as Gutenberg is 11 days away from its debut in WordPress 5.0. There is still a chance that the release could be delayed to the secondary date (January 22, 2019), but the decision has not yet been announced.</p>
<p>&#8220;I am lukewarm on the 19th, but not because of the number of open issues (which isn&#8217;t a good measure or target) — more that we&#8217;ve been a day or two behind a few times now,&#8221; 5.0 release lead Matt Mullenweg said during yesterday&#8217;s dev chat. He said that reports &#8220;from the field&#8221; continue to be good and companies that have already installed and activated the plugin haven&#8217;t reported a higher than normal support burden.</p>
<p>&#8220;My concern can be summed up as this,&#8221; Aaron Jorbin said. &#8220;There are approximately 400 issues that need either code or a decision to punt. Assuming five minutes per issue, that means there are about 33 hours worth of bug scrubs that need to take place between now and RC.&#8221;</p>
<p>&#8220;I don’t think we can make a decision on moving the date in the next 45 minutes,&#8221; Gary Pendergast said in response to concerns raised at the meeting. &#8220;I do think it’s fair to say that the Gutenberg and 5.0 leadership teams are hearing all the feedback, and are actively looking whether the timeline is still correct.&#8221;</p>
<p>Mullenweg said open issues are not a good measure of whether the release is on target but the numerous bugs the community is encountering has precipitated a flurry of posts advocating for the release to be delayed.</p>
<p>In a post titled &#8220;<a href="https://joost.blog/wordpress-5-0-needs-a-different-timeline/" rel="noopener noreferrer" target="_blank">WordPress 5.0 needs a different timeline</a>,&#8221; Joost de Valk, author of <a href="https://wordpress.org/plugins/wordpress-seo/" rel="noopener noreferrer" target="_blank">Yoast SEO</a>, cites accessibility concerns and the stability of the project as reasons for a delay. de Valk identifies himself a strong supporter of Gutenberg and his team has already built compatibility and <a href="https://wptavern.com/yoast-seo-8-2-adds-how-to-and-faq-gutenberg-blocks-with-structured-data" rel="noopener noreferrer" target="_blank">Gutenberg-first features</a> into their plugin, which has more than 5 million active installs.</p>
<p>&#8220;It’s arguably one of the biggest leaps forward in WordPress’ editing experience and its developer experience in this decade,&#8221; de Valk said. &#8220;It’s also not done yet, and if we keep striving for its planned November 19th release date, we are setting ourselves up for failure.&#8221;</p>
<p>de Valk gave two reasons for why he believes the November 19th timeline to be untenable:</p>
<blockquote><p>There are some <a href="https://make.wordpress.org/accessibility/2018/10/29/report-on-the-accessibility-status-of-gutenberg/" rel="noopener noreferrer" target="_blank">severe accessibility concerns</a>. While these aren’t new and a few people are working hard on them, I actually think we can get a better handle on fixing them if we push the release back. Right now it looks to me as though keyboard accessibility has regressed in the last few releases of Gutenberg.</p>
<p>The most important reason: the overall stability of the project isn’t where it needs to be yet. There are so many open issues for the 5.0 milestone that even fixing all the blockers before we’d get to Release Candidate stage next week is going to prove impossible. We have, at time of writing <a href="https://github.com/wordpress/gutenberg/issues?utf8=%E2%9C%93&q=is%3Aissue+is%3Aopen+no%3Amilestone+label%3A%22%5BType%5D+Bug%22+-label%3A%22future%22+" rel="noopener noreferrer" target="_blank">212 untriaged bugs</a> and <a href="https://github.com/wordpress/gutenberg/issues?q=is%3Aopen+is%3Aissue+milestone%3A%22WordPress+5.0%22" rel="noopener noreferrer" target="_blank">165 issues on the WordPress 5.0 milestone</a>.</p></blockquote>
<p>WordPress developer Mark Root-Wiley published a post the same day titled &#8220;<a href="https://mrwweb.com/wordpress-5-0-is-not-ready/" rel="noopener noreferrer" target="_blank">WordPress 5.0 is Not Ready</a>.&#8221; He outlined why he believes the release needs to be delayed and suggested the project pursue more auditing and quality assurance testing before shipping it out.</p>
<p>&#8220;WordPress 5.0 can and should be a positive change to WordPress, but if it is released in late November as planned, it won’t be,&#8221; Root-Wiley said. &#8220;There are simply too many bugs in the editor, and the experience is not polished enough. This is because the rate of development has prevented systematic quality assurance (QA) and user testing. Both types of testing are required to ensure the editor is ready and to increase the community’s confidence in the update.&#8221;</p>
<p>Root-Wiley describes a buggy experience when attempting to write blog posts with the new editor, which echoes many others&#8217; <a href="https://jjj.blog/2018/10/wordpress-5-0-beta-1/" rel="noopener noreferrer" target="_blank">recent</a> <a href="https://twitter.com/mor10/status/1060255182552854528" rel="noopener noreferrer" target="_blank">experiences</a>.</p>
<p>&#8220;I’m doing my best to give feedback, but it’s exhausting and there are so many little bugs that I struggle to isolate and replicate the one I’m reporting without running into another,&#8221; Root-Wiley said. &#8220;How is it possible for me to find so many bugs without trying from just writing 1.5 blog posts?&#8221;</p>
<p>Root-Wiley also suggested removing what he deemed to be unnecessary features in order to streamline the editing experience and focus on the fundamentals. These features include the tables block, paragraph background colors, spotlight and fullscreen mode, dropcaps, verse block, among others.</p>
<p>&#8220;The pace of development has been blistering,&#8221; Root-Wiley said. &#8220;That speed has been great for developing a lot of features and iterating on those features quickly, but it hasn’t allowed for sufficient testing. What’s needed now is more time for people to find and report bugs with the editor features in their proposed final state.&#8221;</p>
<p>Gutenberg criticism is often characterized as coming from people who are resistant to change, but these strong messages about delaying the release come from developers who believe the new editor is the future and have heavily invested in contributing to its success.</p>
<p>Both de Valk and Root-Wiley&#8217;s posts seem to have resonated with many who have had similar experiences with the editor. Other core developers and committers have also publicly lent their voices to the call to delay the release.</p>
<blockquote class="twitter-tweet">
<p lang="en" dir="ltr">My thoughts are very much aligned here. I'm super excited for the release &#8212; I think it's crucial for WordPress' success. But I don't think it, nor the ecosystem, are quite ready following the shortened release cycle. <a href="https://t.co/R0nZt0mk41">https://t.co/R0nZt0mk41</a></p>
<p>&mdash; Mike Schroder (@GetSource) <a href="https://twitter.com/GetSource/status/1060238359660912640?ref_src=twsrc%5Etfw">November 7, 2018</a></p></blockquote>
<p></p>
<blockquote class="twitter-tweet">
<p lang="en" dir="ltr">This: <a href="https://t.co/wpcQ02qcTw">https://t.co/wpcQ02qcTw</a>  They are missing almost every milestone on their release schedule, leaving me 1 week to test with RC before Thanksgiving, and plugin/theme authors no time to develop/test with stabler code. It should just come out with their backup January date.</p>
<p>&mdash; Lisa Woodruff (@lisa_m_woodruff) <a href="https://twitter.com/lisa_m_woodruff/status/1060533833899171841?ref_src=twsrc%5Etfw">November 8, 2018</a></p></blockquote>
<p></p>
<p>Opinions on Gutenberg&#8217;s readiness vary wildly depending on the person&#8217;s perspective and involvement in the project. Those who are working on it full-time have not publicly offered opinions indicating that it might not be ready for the November 19 timeline.</p>
<p>&#8220;The 5.0 milestone is in a very manageable place, but if the volume becomes more worrying in the next couple days or it becomes clear milestones won’t be made, we’ll revise as needed,&#8221; Gutenberg technical lead Matias Ventura Ventura said during yesterday&#8217;s dev chat. He confirmed that the fast pace of development will continue.</p>
<p>Regardless of when 5.0 is released, users can count on getting minor releases every two weeks to address bugs and issues that pop up after Gutenberg is in the hands of millions more users.</p>
<p>&#8220;Hopefully as people get used to the more regular cadence they can plan around it, much like they used to complain a ton about, but then got used to, 3 major releases a year,&#8221; Mullenweg said during the dev chat.</p>
<p>In 2016, Mullenweg began describing how WordPress could become &#8220;the operating system of the web,&#8221; with open APIs that others can build on. While that idea encompasses a lot more than just release schedules, WordPress seems to be moving in the direction of shipping updates that come more frequently and eventually more invisibly in the background, similar to how users update their browsers. Releasing Gutenberg in its current state, with frequent updates following, could prove to be a major testing ground to see if greater world of WordPress users are ready to embrace this new era of rapid iteration.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 09 Nov 2018 00:03:55 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:16;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:87:"WPTavern: Adding Aligned Images to Paragraphs in Gutenberg Is Not as Tough as I Thought";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85417";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:98:"https://wptavern.com/adding-aligned-images-to-paragraphs-in-gutenberg-is-not-as-tough-as-i-thought";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4126:"Last week, I published <a href="https://wptavern.com/how-to-add-an-image-to-a-paragraph-block-in-gutenberg">an article</a> that describes the process I went through in Gutenberg to try to add an aligned image to a paragraph block. I concluded that performing the task in the Classic Editor was easier than in Gutenberg.



In response to the article, William Earnhardt <a href="https://wearnhardt.com/2018/11/the-gutenberg-complexity-fallacy/">compared the process</a> and showed how it can be accomplished in two steps in Gutenberg.




<ol><li>Drag an image into editor where you want it to go. </li><li>Click align right. </li></ol>




Dragging and dropping images into WordPress is not something I do. It&#8217;s not how I write. His method is simpler but I prefer to work within the interface. His second suggestion of accomplishing the task is the method I&#8217;ll use from now on.




<ol><li>Click the block inserter above the paragraph you want to insert the image before.</li><li>Select the image block.</li><li>Drag the image onto the block.</li><li>Click align right.</li></ol>




In the last few months of using Gutenberg, I&#8217;ve become accustomed to adding new blocks by pressing enter at the end of a paragraph block or by clicking the plus sign to the left of a block. I haven&#8217;t used the plus sign between blocks but it makes sense and indeed, it&#8217;s quicker to accomplish the task.



According to Earnhardt, there are even more ways to complete the task in Gutenberg. This brings up an important question, how many different ways and user interfaces should there be to accomplish a task? If you don&#8217;t do it a certain way, are you <a href="https://developer.wordpress.org/reference/functions/_doing_it_wrong/">doing_it_wrong</a>?




<div class="wp-block-image"><img /></div>




Take for example, adding captions to images. In Gutenberg, there are at least two opportunities to add a caption. The first is the attachment details screen after uploading or selecting an image from the media library.



The second is the Image block user interface. When using the Image block interface, my cursor gets stuck in the caption area and I need to click outside of the block in order to continue. If I use the attachment details screen, it automatically puts the caption text into the image block, bypassing the hurdle. Which interface am I supposed to use and which method is considered doing_it_wrong?<br />




<div class="wp-block-image"><a href="https://i2.wp.com/wptavern.com/wp-content/uploads/2018/11/2018-11-08_00-56-29-1.gif?ssl=1"><img /></a>Adding a Caption via the Image Block Interface</div>





<h2>I&#8217;m Willing to Learn</h2>




I understand the long vision of Gutenberg and what it means for the future of WordPress. For the past several months, I&#8217;ve used the plugin and interface exclusively to craft content.



I&#8217;ve been learning things along the way and trying to readjust my workflows but the question I keep coming back to when doing things in Gutenberg is why?



Why is this button hidden? Why are there three differently located buttons to add blocks when it would be nice to memorize one? Why does this do that and vice versa? Where is all of the research and usability testing that explains the why behind so many of the interactions and flows? Am I just a moron or is it the interface that guides me in the wrong direction?



Many of my experiences in using Gutenberg this past year have been <a href="https://mrwweb.com/wordpress-5-0-is-not-ready/">echoed by Mark Root-Wiley</a>. He does a great job of saying what I&#8217;ve been feeling and thinking for a long time.



When I and thousands of others watched Matías Ventura‏ perform a <a href="https://www.youtube.com/watch?v=XOY3ZUO6P0k&feature=youtu.be">live demo</a> of Gutenberg at the 2017 State of Word, people were blown away. But this is someone who has been creating Gutenberg from the core and is proficient in all that it offers. Is this the level of Gutenberg proficiency I and others need in order to get things done? Probably not, but at times, it sure feels that way. <br />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 08 Nov 2018 07:37:40 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:17;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:99:"WPTavern: Classic Editor Plugin May Be Included with 5.0 Updates, Support Window Set to End in 2021";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85387";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:109:"https://wptavern.com/classic-editor-plugin-may-be-included-with-5-0-updates-support-window-set-to-end-in-2021";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:6806:"<p>Gary Pendergast <a href="https://make.wordpress.org/core/2018/11/07/classic-editor-plugin-support-window/" rel="noopener noreferrer" target="_blank">announced</a> this morning that the <a href="https://wordpress.org/plugins/classic-editor/" rel="noopener noreferrer" target="_blank">Classic Editor</a> plugin will be officially supported until December 31, 2021. The plugin eases the transition for sites where plugins or themes are not yet compatible with Gutenberg and gives users the opportunity to preserve their existing workflows.</p>
<p>&#8220;Since the Classic Editor plugin is central in this transition, we are considering including it with upgrades to WordPress 5.0,&#8221; Pendergast said. &#8220;New WordPress installs would still add it manually, and we’ve included it in the Featured Plugins list to increase visibility. If you have thoughts on this idea, please leave a comment.&#8221;</p>
<p>Pendergast clarified that &#8220;officially supported&#8221; means that the plugin &#8220;will be guaranteed to work as expected in the most recent major release of WordPress, and the major release before it.&#8221; He also said the project will evaluate the continuing maintenance of the plugin in 2021 and may possibly extend the date.</p>
<p>The post has already received quite a bit of feedback and generally positive reactions to the prospect of including the Classic Editor along with 5.0 updates for existing sites.</p>
<p>WordPress Core Committer Pascal Birchler asked for a clarification on what &#8220;we&#8221; referred to in Pendergast&#8217;s post, and Pendergast clarified that he is speaking on behalf of the WordPress project. Other commenters pressed for more information, as the announcement was delivered as something that had already been decided and the conversation surrounding the decision was not public.</p>
<p>&#8220;I’m grateful for the communication on a hard date for support of the classic editor,&#8221; Darren Ethier commented on the post. &#8220;It helps many people depending on WordPress for their livelihood to make plans surrounding things depending on it. But for volunteers who &#8216;show up&#8217; at meetings and in contributing, the process for arriving at these kinds of decisions in an open source project is very opaque and seems to be increasingly so.&#8221;</p>
<p>This announcement highlights a trend in recent decision making for the project where decisions on important items appear to have been made behind closed doors without community input. Matthew MacPherson&#8217;s <a href="https://wptavern.com/gutenberg-accessibility-audit-postponed-indefinitely" rel="noopener noreferrer" target="_blank">proposal for an independent accessibility audit</a>, which had broad support from the community, was shut down in a similar way. MacPherson was named WordPress 5.0&#8217;s accessibility lead but didn&#8217;t seem to be fully vested with the power to lead that aspect of the release in the community&#8217;s best interests. I asked MacPherson if he could further clarify how the decision to forego the audit was reached, as it seemed even a surprise to him in the GitHub issue thread. He said he had &#8220;no comment&#8221; on how the decision came about.</p>
<p>WPCampus is now <a href="https://wptavern.com/wpcampus-is-pursuing-an-independent-accessibility-audit-of-gutenberg" rel="noopener noreferrer" target="_blank">pursuing an accessibility audit</a> in order to better serve its community of more than 800 web professionals, educators, and others who work with WordPress in higher education.</p>
<p>&#8220;We&#8217;re receiving a lot of interest and I&#8217;m holding meetings with potential vendors to answer their questions,&#8221; WPCampus director Rachel Cherry said. &#8220;We&#8217;ve received a lot of messages from individuals and organizations wanting to contribute financially.&#8221;</p>
<p>The <a href="https://wptavern.com/wordpress-accessibility-team-delivers-sobering-assessment-of-gutenberg-we-have-to-draw-a-line" rel="noopener noreferrer" target="_blank">recent report from the accessibility team</a> demonstrates critical issues that prevent the team from recommending Gutenberg to users of assistive technology. These issues also have a major impact on those using WordPress for higher education, as the law requires them to meet certain standards. Several in this particular industry commented on Pendergast&#8217;s post to advocate for shipping the Classic Editor plugin with new installs as well.</p>
<p>&#8220;Many organizations who use WordPress are required by law to provide accessible software under Section 508,&#8221; Rachel Cherry said. &#8220;Until such a time when the accessibility of Gutenberg has been improved, and Section 508 compliance is clear, these organizations will require use of the Classic Editor.</p>
<p>&#8220;Not to mention the users who will be dependent upon the Classic Editor to have an accessible publishing experience.</p>
<p>&#8220;Please consider bundling Classic Editor with all versions of core, new and updated, going forward so that every end user has the easy and inclusive option of using it from day one.&#8221;</p>
<p>Elaine Shannon, another WordPress user who works in academia, also commented on the Pendergast&#8217;s post to recommend having the Classic Editor bundled with new versions of WordPress, due to many education sites running on multisite installations.</p>
<p>&#8220;Some institutions are on managed hosts, where they’ll receive 5.0 without initiating the update themselves,&#8221; Shannon said. &#8220;Others are managed by on-campus IT services, where one campus admin will push the update and affect thousands of users. In many cases, these are MultiSites where end users – the ones who need the choice of whether to use Gutenberg or Classic Editor – do not have the ability to add a plugin. So regardless of whether these users are in a brand-new shiny install or just an updated existing one, many users are going to need to fall back to the Classic Editor, and if it’s not bundled with Core there will be some folks left having to contact their administrator.&#8221;</p>
<p>Pendergast&#8217;s post said the WordPress project is considering including the plugin with upgrades to 5.0 but did not identify where or when that decision will be made. However, users who depend on the plugin now have a clear idea of how long it will be supported.</p>
<p>&#8220;As for the EOL on Classic Editor support, that’s probably more clarity than [the core team] has ever really given on a feature-to-plugin transition and I’m in favor of having that hard date,&#8221; WordPress core developer Drew Jaynes said. &#8220;It sets the right tone that the plugin is not intended as a long-term solution, rather a stopgap with a definitive EOL.&#8221;</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 07 Nov 2018 20:13:35 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:18;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:66:"WPTavern: Nidhi Jain Is Awarded the Kim Parsell Travel Scholarship";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85390";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:77:"https://wptavern.com/nidhi-jain-is-awarded-the-kim-parsell-travel-scholarship";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1553:"In 2015, the WordPress Foundation <a href="https://wptavern.com/the-wordpress-foundation-creates-a-traveling-scholarship-in-memory-of-kim-parsell">created a travel scholarship</a> in memory of <a href="https://wptavern.com/kim-parsell-affectionately-known-as-wpmom-passes-away">Kim Parsell</a>. The <a href="https://2018.us.wordcamp.org/kim-parsell-memorial-scholarship-2018/">scholarship</a> covers travel expenses, lodging, and a ticket to the event. This year&#8217;s recipient is <a href="https://twitter.com/jainnidhi03">Nidhi Jain</a> from Udaipur, Rajasthan, India. 



Jain is a volunteer organizer for WordCamp Udaipur, a WordPress developer, contributor, and a seasoned traveler. <br />



&#8220;Being selected for the Kim Parsell Memorial Scholarship is an honor, achievement and a proud moment for me,&#8221; Jain told the WordCamp US organizing team when asked what it means to be selected.  



&#8220;I will try my best to make the most out of it and give back to the community in all possible ways. Since I have been a WordCamp volunteer and organizer in the last few years, I am excited to see and learn from WordCamp US. I am sure, I will have a lot of sweet memories and wonderful learnings to take back home.&#8221;



Previous winners include Elizabeth Shilling in 2016 and Bianca Welds in 2017. If you&#8217;re not familiar with who Kim Parsell is, I recommend reading <a href="https://heropress.com/essays/family-well-loved/">this essay</a> which provides some context as to why the scholarship was created in her memory. <br />";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 07 Nov 2018 13:59:48 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:19;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"HeroPress: Accidental Activist";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:56:"https://heropress.com/?post_type=heropress-essays&p=2648";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:112:"https://heropress.com/essays/accidental-activist/#utm_source=rss&utm_medium=rss&utm_campaign=accidental-activist";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:12230:"<img width="960" height="480" src="https://s20094.pcdn.co/wp-content/uploads/2019/11/110618-1024x512.jpg" class="attachment-large size-large wp-post-image" alt="Pull Quote: Imagine a world where more kinds of people are speaking up. That's a world I'm excited to see." /><p>I never meant to become an activist. I swear. It was an accident.</p>
<p>And yet here I am, celebrating my one year anniversary of leading the Diversity Outreach Speaker Training working group in the WordPress Community team. We are causing waves in the number of women and other underrepresented groups who are stepping up to become speakers at WordPress Meetups, WordCamps, and events. Pretty cool, right?</p>
<p>How did this happen?</p>
<p>Let’s start this story with how I got into WordPress. Back in 2011, I was looking for a practicum placement for the New Media Design and Web Development college program I was in in Vancouver, BC. We had touched on WordPress only briefly in class. I was curious about it, so I got a Practicum placement working on a higher education website that was built in WordPress. (It was in BuddyPress, even! Ooh. Aah.) As a thank you, my practicum advisor bought me a ticket to WordCamp Vancouver 2011: Developer’s Edition. That event was the start of my love affair with WordPress and I began taking on freelancing gigs. I’ve been a WordPress solopreneur for most of the time since.</p>
<p>The following year my practicum advisor, who had become a client, was creating the first ever BuddyCamp for BuddyPress. He asked me to be on his organizing team. (Side note: I was especially excited to moderate a panel with Matt Mullenweg and other big names on it!) I was noticed and I was invited to be on the core organizing team for the next year’s WordCamp Vancouver by the lead organizer. I was thrilled. It was quite an honour!</p>
<p>This is where the real story begins… after an important disclaimer.</p>
<blockquote><p>Disclaimer: For simplicity in this story, I’ll be using the terms women and men, though in reality gender is not a simple binary and is actually a wide spectrum of different identities.</p></blockquote>
<h3>The Real Beginning</h3>
<p>There were three of us—myself and two men—and it was our first time any of us were organizing a WordCamp. We were having dinner in one of our apartments and we had 40 speaker applications spread out before us. The plan was to pick 14 to speak. It was hard. They were all really good.</p>
<p>The lead organizer grabbed 6 out of the 7 that came from the women and said, &#8220;Well, we are accepting all of these.&#8221;</p>
<p>At this point I didn’t know that not many women were applying to speak at tech conferences at the time.</p>
<blockquote><p>So I was the one saying, &#8220;Wait, wait. Who cares what gender they are? Let’s go through them and pick based on the topics that would fit the conference’s flow.&#8221;</p></blockquote>
<p>They both said that the 6 of the women’s pitches were really good, fit with the flow, and frankly, we needed to accept as many as we could or we’d get called out. (This is embarrassing to say now, but that was the conversation back in 2013.)</p>
<p>Here’s how it went down:</p>
<p>After we accepted the six, two of the women dropped out for family emergencies. (Guess how many men dropped out for family emergencies?) Also we had added a third speakers’ track. Now there were only 4 women out of 28 speakers. Only 1 in 7. That is 14%, my friends. That is not great.</p>
<p>So not great, in fact, that we did get called out. People did talk about it, question us about it, and even wrote blog posts about it.</p>
<h3>More Experience</h3>
<p>So when later that year I went to WordCamp San Francisco—the biggest WordCamp at the time (before there was a WordCamp US)—I took the opportunity to chat with other organizers at a WordCamp organizer brunch.</p>
<blockquote><p>I found out that many of the organizers had trouble getting enough women presenters.</p></blockquote>
<p>I was surprised to find that we actually had a high number of women applicants in comparison to others, as many of them had zero! They were asking me how we got such a high number. They all said they would happily accept more if only more would apply.</p>
<p>So then I needed to know, why was this happening? Why weren’t we getting more women applicants? I started researching, reading, and talking to people.</p>
<p>Though this issue is complex, one thing that came up over and over was that when we would ask the question, &#8220;Hey, will you speak at my conference?&#8221; we would get two answers:</p>
<ul>
<li>&#8220;What would I talk about?&#8221;</li>
<li>&#8220;I’m not an expert on anything. I don’t know enough about anything to give a talk on it.&#8221;</li>
</ul>
<p>That’s when the idea happened.</p>
<h3>The Idea</h3>
<p>As it goes, the idea happened while I was at a feminist blanket-fort slumber party. Yes, you heard right. And as one does at all feminist blanket-fort slumber parties, we talked about feminist issues.</p>
<p>When I brought up my issue about the responses we were getting, one of the ladies said, &#8220;Why don’t you get them in a room and have them brainstorm topics?&#8221;</p>
<blockquote><p>And that was it. That set me on the path.</p></blockquote>
<p>I became the lead of a small group creating a workshop in Vancouver. In one of the exercises, we invited the participants to brainstorm ideas and show them that they have literally a hundred ideas. (Then the biggest problem becomes picking one. <img src="https://s.w.org/images/core/emoji/11/72x72/1f642.png" alt="🙂" class="wp-smiley" /> )</p>
<p>In our first iteration, we covered:</p>
<ul>
<li>Why it matters that women (<em>added later: diverse groups</em>) are in the front of the room</li>
<li>The myths of what it takes to be the speaker at the front of the room (aka beating impostor syndrome)</li>
<li>Different speaking formats, especially story-telling</li>
<li>Finding and refining a topic</li>
<li>Tips to becoming a better speaker</li>
<li>Practising leveling up speaking in front of the group throughout the afternoon</li>
</ul>
<p>Other cities across North America got wind of our workshop and started running it as well, and they added their own material.</p>
<p>Our own participants wanted more support, so the next year we added material created from the other cities as well as generated more of our own:</p>
<ul>
<li>Coming up with a great title</li>
<li>Writing a pitch that is more likely to get accepted</li>
<li>Writing a bio</li>
<li>Creating an outline</li>
<li>Creating better slides</li>
</ul>
<p>We did it! In 2014—in only one year since we started—we had 50% women speakers and 3 times the number of women applicants! Not only that, but it was a Developer’s Edition. It&#8217;s more challenging it is to find women developers in general, let alone those who will step up to speak.</p>
<h3>Building On</h3>
<p>Impressive as that is, the reason I am truly passionate about this work is because of what happened next:</p>
<ul>
<li>Some of the women who did our workshop and started publicly speaking stepped up to be leaders in our community and created new things for us. For example, a couple of them created a new Meetup track with a User focus.</li>
<li>A handful of others became WordCamp organizers. One year Vancouver had an almost all-female organizing team – 5 out of 6!</li>
<li>It also influenced local businesses. One local business owner loved what one of the women speakers said so much that he hired her immediately. She was the first woman developer on the team, and soon after she became the Senior Developer.</li>
</ul>
<p>It is results like these that ignited my passion. I’ve now seen time and again what happens when different kinds of folks speak in the front of the room. More kinds of people feel welcome in the community. The speakers and the new community members bring new ideas and new passions that help to make the technology we are creating more inclusive as well as generate new ideas that benefit everyone.</p>
<p>This workshop has been so successful, with typical results of 40-60% women speakers at WordCamps, that the WordPress Community Team asked me to promote it and train it for women and all diverse groups around the world. We created the Diversity Outreach Speaker Training working group. I started creating and leading it in late 2017.</p>
<blockquote><p>Thanks to our group, our workshop has been run in 17 cities so far this year, 32 have been trained to run it, and 53 have expressed interest in 24 countries. Incredible!</p></blockquote>
<p>I love this work so much that I’m now looking at how to do this for a living. I’m proud of how the human diversity represented on the stage adds value not only to the brand but also in the long-term will lead to the creation of a better product. I’m inspired by seeing the communities change as a result of the new voices and new ideas at the WordPress events.</p>
<p><strong>&#8220;Jill’s leadership in the development and growth of the Diversity Outreach Speaker Training initiative has had a positive, measurable impact on WordPress community events worldwide. When WordPress events are more diverse, the WordPress project gets more diverse — which makes WordPress better for more people.&#8221;</strong></p>
<p><em>&#8211; Andrea Middleton, Community organizer on the WordPress open source project</em></p>
<p>I’m exploring sponsorships, giving conference and corporate trainings, and looking at other options so that I can be an Accidental Activist full-time and make a bigger impact. Imagine a world where more kinds of people are speaking up. That’s a world I’m excited to see.</p>
<h3>Resources:</h3>
<p>Workshop: <a href="http://diversespeakers.info/">http://diversespeakers.info/</a></p>
<p>More info and please let us know if you use it or would like help using it: <a href="https://tiny.cc/wpwomenspeak">https://tiny.cc/wpwomenspeak</a></p>
<p>Diversity Outreach Speaker Training Team—Join us! <a href="https://make.wordpress.org/community/2017/11/13/call-for-volunteers-diversity-outreach-speaker-training/">https://make.wordpress.org/community/2017/11/13/call-for-volunteers-diversity-outreach-speaker-training/</a></p>
<p>How to build a diverse speaker roster: Coming soon. Contact Jill for it.</p>
<div class="rtsocial-container rtsocial-container-align-right rtsocial-horizontal"><div class="rtsocial-twitter-horizontal"><div class="rtsocial-twitter-horizontal-button"><a title="Tweet: Accidental Activist" class="rtsocial-twitter-button" href="https://twitter.com/share?text=Accidental%20Activist&via=heropress&url=https%3A%2F%2Fheropress.com%2Fessays%2Faccidental-activist%2F" rel="nofollow" target="_blank"></a></div></div><div class="rtsocial-fb-horizontal fb-light"><div class="rtsocial-fb-horizontal-button"><a title="Like: Accidental Activist" class="rtsocial-fb-button rtsocial-fb-like-light" href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fheropress.com%2Fessays%2Faccidental-activist%2F" rel="nofollow" target="_blank"></a></div></div><div class="rtsocial-linkedin-horizontal"><div class="rtsocial-linkedin-horizontal-button"><a class="rtsocial-linkedin-button" href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A%2F%2Fheropress.com%2Fessays%2Faccidental-activist%2F&title=Accidental+Activist" rel="nofollow" target="_blank" title="Share: Accidental Activist"></a></div></div><div class="rtsocial-pinterest-horizontal"><div class="rtsocial-pinterest-horizontal-button"><a class="rtsocial-pinterest-button" href="https://pinterest.com/pin/create/button/?url=https://heropress.com/essays/accidental-activist/&media=https://heropress.com/wp-content/uploads/2019/11/110618-150x150.jpg&description=Accidental Activist" rel="nofollow" target="_blank" title="Pin: Accidental Activist"></a></div></div><a rel="nofollow" class="perma-link" href="https://heropress.com/essays/accidental-activist/" title="Accidental Activist"></a></div><p>The post <a rel="nofollow" href="https://heropress.com/essays/accidental-activist/">Accidental Activist</a> appeared first on <a rel="nofollow" href="https://heropress.com">HeroPress</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 07 Nov 2018 12:00:14 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:11:"Jill Binder";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:20;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:114:"WPTavern: Authors of Popular WordPress.org Themes Rolling Out Gutenberg Compatibility Updates Ahead of 5.0 Release";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85247";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:125:"https://wptavern.com/authors-of-popular-wordpress-org-themes-rolling-out-gutenberg-compatibility-updates-ahead-of-5-0-release";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5506:"<p><a href="https://wordpress.org/themes/astra/" rel="noopener noreferrer" target="_blank">Astra</a>, a free theme that has steadily been growing in popularity, is now <a href="https://wpastra.com/gutenberg-compatible/" rel="noopener noreferrer" target="_blank">fully compatible with Gutenberg</a>. The theme was first released in May 2017 and has more than 100,000 active installations. It was downloaded approximately 2,000 &#8211; 4,500 times per day over the past month and currently maintains a 5-star average rating on WordPress.org after 844 reviews.</p>
<p>Astra&#8217;s creators advertise the theme as fast, lightweight (less than 50KB on frontend), and compatible with many page builders. These features have been key to its rapid growth. Last week they announced full Gutenberg compatibility, which means sites built with Astra will be able to take advantage of all the new features in the editor when 5.0 is released.  </p>
<p>Astra&#8217;s Gutenberg compatibility update includes front-end styles displayed in the editor and support for the full-width alignment option. The width of the content in the editor matches that of the frontend, and the same is true for the typography, colors, and background.</p>
<p><a href="https://i0.wp.com/wptavern.com/wp-content/uploads/2018/11/gutenberg-full-width.gif?ssl=1"><img /></a></p>
<p>The theme also ensures that the default Gutenberg blocks, i.e. quotes and galleries, will inherit Astra customizer styles to match the rest of the site. </p>
<p>Astra&#8217;s creators support the theme by offering commercial <a href="https://wpastra.com/pricing/" rel="noopener noreferrer" target="_blank">packages</a> that include additional features and plugins, <a href="https://wpastra.com/ready-websites/" rel="noopener noreferrer" target="_blank">starter sites</a>, add-ons for page builders, and support. They plan to offer additional Gutenberg features in commercial add-ons. Astra&#8217;s Ultimate Addons product will introduce custom blocks, such as Section, Heading, Info Box, Post Grid, Google Map, Table, Social Share, Menu, Buttons, along with pre-made starter templates.</p>
<p>After two months of weekend work, Anders Norén reported that <a href="https://wordpress.org/themes/author/anlino/" rel="noopener noreferrer" target="_blank">all 18 of his free themes on WordPress.org</a> have been <a href="http://www.andersnoren.se/the-gutenberg-update/" rel="noopener noreferrer" target="_blank">updated to be compatible with Gutenberg</a>. Norén&#8217;s popular minimalist style themes have a cumulative rating of 4.97 out of 5 stars and have been downloaded more than <a href="http://wptally.com/?wpusername=anlino" rel="noopener noreferrer" target="_blank">2.2 million times</a>. They are active on an estimated 100,000 WordPress installations.</p>
<p>&#8220;There are no custom blocks or other fancy stuff to be found in the updates, but if you’re running one of my themes, you should be able to update to WordPress 5.0 and start using Gutenberg without any hitches, in the editor or on the front-end,&#8221; Norén said. &#8220;If you plan to keep using the classic editor, things should look mostly the same after you install the update.&#8221;</p>
<p>The Gutenberg compatibility update for Norén&#8217;s themes includes editor styles, with layout, typography and colors matching the theme, styles for core blocks and new alignment options, and custom font sizes and color palette in the editor. Norén also took the opportunity to do an overall code cleanup and add improvements for older versions of PHP, accessibility and localization improvements, and bug fixes, amounting to 17,525 lines of code added or modified.</p>
<p>&#8220;The past couple of weekends have been grueling, but knowing that my themes will be ready for WordPress 5.0 – whether it hits the November 20th release date or not – was worth it,&#8221; Norén said.</p>
<p>Themeisle has updated <a href="https://wordpress.org/themes/hestia/" rel="noopener noreferrer" target="_blank">Hestia</a> with Gutenberg compatibility in the theme&#8217;s <a href="https://themeisle.com/blog/hestia-2-0/" rel="noopener noreferrer" target="_blank">2.0 release</a>. The popular Material Design WordPress theme is the company&#8217;s flagship product and is installed on more than 100,000 WordPress sites. The company is planning to release a brand new theme that will be fully Gutenberg compatible. They have not yet announced if <a href="https://wordpress.org/themes/zerif-lite/" rel="noopener noreferrer" target="_blank">Zerif Lite</a> (100,000+ installs) will be updated for the new editor.</p>
<p>Six weeks ago, <a href="https://wordpress.org/themes/search/Gutenberg/" rel="noopener noreferrer" target="_blank">searching the WordPress.org Theme Directory for “Gutenberg”</a> produced 26 results where compatibility is mentioned in the theme descriptions. That number has jumped to 53. Support for the new editor seems to have happened much faster in the commercial theme space where <a href="https://themeforest.net/category/wordpress?term=Gutenberg" rel="noopener noreferrer" target="_blank">searching for Gutenberg on Envato</a> already turns up hundreds of results before the editor has even landed in core. Authors of free themes on WordPress.org don&#8217;t always have the same motivation. Those who support popular themes are more likely to have their themes compatible by the time WordPress 5.0 arrives, especially if the free theme is connected to a paid product.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 06 Nov 2018 04:34:25 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:21;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:66:"WPTavern: WordPress 5.0 Beta 3 Released, RC 1 Expected November 12";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85224";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:76:"https://wptavern.com/wordpress-5-0-beta-3-released-rc-1-expected-november-12";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:6909:"<p><a href="https://wordpress.org/news/2018/11/wordpress-5-0-beta-3/" rel="noopener noreferrer" target="_blank">WordPress 5.0 Beta 3</a> was released this morning. This beta incorporates all the changes from <a href="https://make.wordpress.org/core/2018/10/31/whats-new-in-gutenberg-31st-october-2/" rel="noopener noreferrer" target="_blank">Gutenberg 4.2 RC1</a>, which was released last week. It fixes a bug with the display of the custom fields meta box and also improves REST API requests.</p>
<p>Gutenberg has undergone a few UI tweaks and introduces a <a href="https://github.com/WordPress/gutenberg/pull/10209" rel="noopener noreferrer" target="_blank">Formatting API</a> for adding new RichText components. The inserter between blocks was updated to provide a more consistent experience that matches the other “add block” buttons. Version 4.2 also adds support for displaying icons in new block categories to better organize groups of blocks. The example pictured in the release post shows the Jetpack icon. The Jetpack team has been <a href="https://wptavern.com/jetpack-6-6-improves-site-verification-tools-asset-cdn-module-now-in-beta-gutenberg-blocks-coming-soon" rel="noopener noreferrer" target="_blank">working on a number of blocks for existing features</a> and is expected to release those soon.</p>
<p><a href="https://i0.wp.com/wptavern.com/wp-content/uploads/2018/11/block-categories.png?ssl=1"><img /></a></p>
<p>WordPress 5.0 Beta 3 brings in updates from Twenty Nineteen&#8217;s GitHub repository, including support for selective refresh widgets in the customizer, support for responsive embeds, and tweaks to improve the experience on mobile devices.</p>
<h3>Updates to WordPress 5.0 Schedule: More Beta Releases and a Shortened RC Period</h3>
<p>WordPress 5.0 is now two weeks away from its <a href="https://make.wordpress.org/core/5-0/" rel="noopener noreferrer" target="_blank">projected release date</a> of November 19. Last week Gary Pendergast announced some <a href="https://make.wordpress.org/core/2018/10/31/wordpress-5-0-schedule-updates/" rel="noopener noreferrer" target="_blank">updates to the 5.0 release schedule</a> that build in extra time for betas. After pushing out Beta 3 Pendergast said he expects to release Beta 4 later this week. He also offered an explanation for why RC1 is scheduled for release on November 12, allowing for just one week of last-minute testing following RC.</p>
<p>&#8220;The block editor has been available for over a year,&#8221; Pendergast said. &#8220;It’s already had a longer testing period, with 30 times the number of sites using it, than any previous WordPress release. The primary purpose of the beta and release candidate periods is to ensure that it’s been correctly merged into Core.&#8221;</p>
<p>Initial feedback on the schedule changes indicate that some user would appreciate a longer RC period, since the code being tested has changed so often. </p>
<p>&#8220;The API freeze just happened in version 4.2, so saying the editor has been available for over a year in anywhere near its current state doesn’t make sense for a 7-day RC period on such a major change,&#8221; WordPress trainer and developer Brian Hogg <a href="https://make.wordpress.org/core/2018/10/31/wordpress-5-0-schedule-updates/#comment-34292" rel="noopener noreferrer" target="_blank">said</a>.</p>
<p>&#8220;As an example, just in the last version or two the hover-over menu to remove a block has been taken out and tucked away at the top menu (which was available as shown in <a href="https://youtu.be/yjqW_IS6Q7w?t=80" rel="noopener noreferrer" target="_blank">https://youtu.be/yjqW_IS6Q7w?t=80</a>), with little time for anyone to provide usability feedback on changes like this.&#8221;</p>
<p>Those who are creating training materials and videos have been waiting for a bit of a reprieve in Gutenberg development to make sure their materials are accurate and ready for 5.0.</p>
<p>&#8220;Knowing it’s an RC means we can assume a level of &#8216;this is how it will be&#8217; that just isn’t necessarily with pre-RC versions,&#8221; Modern Tribe developer George Gecewicz <a href="https://make.wordpress.org/core/2018/10/31/wordpress-5-0-schedule-updates/#comment-34278" rel="noopener noreferrer" target="_blank">commented</a> on the post. &#8220;That relative certainty is useful for testing aggressively, finalizing design/UI stuff, and revealing post-merge bugs.&#8221;</p>
<p>Gutenberg 4.1 was supposed to be the &#8220;<a href="https://github.com/WordPress/gutenberg/milestone/66" rel="noopener noreferrer" target="_blank">UI freeze</a>&#8221; milestone, but that hasn&#8217;t happened yet with several changes introduced in 4.2. </p>
<blockquote class="twitter-tweet">
<p lang="en" dir="ltr">The "freeze" in "UI freeze" doesn't mean you can thaw it and change it willy nilly. Some of us rely on such landmarks to do our work.</p>
<p>&mdash; Morten Rand-Hendriksen (@mor10) <a href="https://twitter.com/mor10/status/1059269623944642560?ref_src=twsrc%5Etfw">November 5, 2018</a></p></blockquote>
<p></p>
<p>There should be short window of time before 5.0 is released where training materials can be finalized. However, the Gutenberg team plans to continue on from there with its same pace of development.</p>
<p>&#8220;Over the past six months, there has been a release every two weeks,&#8221; Pendergast said. &#8220;We’ll plan to continue that over the first few WordPress 5.0.x releases, to ensure that bug fixes are available as quickly as possible. How soon should we expect WordPress 5.0.1? Approximately two weeks after WordPress 5.0, unless we see bug reports that indicate a need for a faster release.&#8221;</p>
<p>WordPress 5.0 is on schedule for its original release date, but there is still a possibility for the the release to be delayed. Matt Mullenweg, <a href="https://wptavern.com/wordpress-accessibility-team-delivers-sobering-assessment-of-gutenberg-we-have-to-draw-a-line#comment-266997" rel="noopener noreferrer" target="_blank">commenting</a> on responses to the accessibility team&#8217;s assessment of Gutenberg, said that delaying the release has &#8220;definitely been considered&#8221; and that it may still happen. His response also indicates that WordPress users can expect the pace of core development to continue along the path Gutenberg has carved. </p>
<p>&#8220;Despite some differences that still need be resolved, there’s general consensus that the long-term way to create the best WP experience for all types of users is not something you can tack on with 5-6 weeks at the end, but will be the result of continuing the continuous iteration we’ve had with the 42 public releases of Gutenberg so far,&#8221; Mullenweg said. &#8220;It means we can get improvements into the hands of users within weeks following a release, not months (or years) as was the old model with WordPress.&#8221;</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 05 Nov 2018 18:39:49 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:22;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"Dev Blog: WordPress 5.0 Beta 3";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"https://wordpress.org/news/?p=6236";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2018/11/wordpress-5-0-beta-3/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3164:"<p>WordPress 5.0 Beta 3 is now available!</p>



<p><strong>This software is still in development,</strong>&nbsp;so we don’t recommend you run it on a production site. Consider setting up a test site to play with the new version.</p>



<p>There are two ways to test the WordPress 5.0 Beta: try the&nbsp;<a href="https://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester</a>&nbsp;plugin (you’ll want “bleeding edge nightlies”), or you can&nbsp;<a href="https://wordpress.org/wordpress-5.0-beta3.zip">download the beta here</a>&nbsp;(zip).</p>



<p>WordPress 5.0 is slated for release on&nbsp;<a href="https://make.wordpress.org/core/5-0/">November 19</a>, and we need your help to get there. Here are some of the big issues that we&#8217;ve fixed since Beta 2:</p>



<h2>Block Editor</h2>



<p>The block editor has been updated to include all of the features and bug fixes from the upcoming <a href="https://make.wordpress.org/core/2018/10/31/whats-new-in-gutenberg-31st-october-2/">Gutenberg 4.2 release</a>. Additionally, there are some newer bug fixes and features, such as:</p>



<ul><li>Adding support for the &#8220;Custom Fields&#8221; meta box.</li><li>Improving the reliability of REST API requests.</li><li>A myriad of minor tweaks and improvements.</li></ul>



<h2>Twenty Nineteen</h2>



<p>Twenty Nineteen has been updated from its <a href="https://github.com/WordPress/twentynineteen">GitHub repository</a>, this version is full of new goodies to check out:</p>



<ul><li>Adds support for Selective Refresh Widgets in the Customiser.</li><li>Adds support for Responsive Embeds.</li><li>Tweaks to improve readability and functionality on mobile devices.</li><li>Fixes nested blocks appearing wider than they should be.</li><li>Fixes some errors in older PHP versions, and in IE11.</li></ul>



<h2>How to Help</h2>



<p>Do you speak a language other than English? <a href="https://translate.wordpress.org/projects/wp/dev">Help us translate WordPress into more than 100 languages!</a> </p>



<p>If you&#8217;re able to contribute with coding or testing changes, we have <a href="https://make.wordpress.org/core/2018/11/02/upcoming-5-0-bug-scrubs/">a multitude of bug scrubs</a> scheduled this week, we&#8217;d love to have as many people as we can ensuring all bugs reported get the attention they deserve.</p>



<p><strong><em>If you think you’ve found a bug</em></strong><em>, you can post to the&nbsp;</em><a href="https://wordpress.org/support/forum/alphabeta"><em>Alpha/Beta area</em></a><em>&nbsp;in the support forums. We’d love to hear from you! If you’re comfortable writing a reproducible bug report,&nbsp;</em><a href="https://make.wordpress.org/core/reports/"><em>file one on WordPress Trac</em></a><em>, where you can also find&nbsp;</em><a href="https://core.trac.wordpress.org/tickets/major"><em>a list of known bugs</em></a><em>.</em></p>



<hr class="wp-block-separator" />



<p><em>WordPress Five Point Oh<br />is just two short weeks away.<br />Thank you for helping!</em> <img src="https://s.w.org/images/core/emoji/11/72x72/1f496.png" alt="💖" class="wp-smiley" /><em><br /></em></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 05 Nov 2018 00:20:08 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:15:"Gary Pendergast";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:23;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:80:"WPTavern: GitHub Rolls Out More Small Improvements as Part of Project Paper Cuts";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85245";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:91:"https://wptavern.com/github-rolls-out-more-small-improvements-as-part-of-project-paper-cuts";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4625:"<p>In August, GitHub <a href="https://blog.github.com/2018-08-28-announcing-paper-cuts/" rel="noopener noreferrer" target="_blank">announced</a> Project Paper Cuts, an effort aimed at bringing small improvements to the developer and project maintainer experiences. These are fixes for issues that don&#8217;t generally fall within larger initiatives. Some of the first improvements that have already been implemented include the following:</p>
<ul>
<li>Unselect markers when copying and pasting the contents of a diff</li>
<li>Edit a repository’s README from the repository root</li>
<li>Access your repositories straight from the profile dropdown</li>
<li>Highlight permalinked comments</li>
<li>Remove files from a pull request with a button</li>
<li>Branch names in merge notification emails</li>
<li>Create new pull requests from your repository’s Pull Requests Page</li>
<li>Add a teammate from the team discussions page</li>
<li>Collapse all diffs in a pull request at once</li>
<li>Copy the URL of a comment</li>
</ul>
<p>One of the latest improvements allows repository admins to transfer an issue that has been misfiled to another repository where it belongs. At the moment it only works within the same GitHub organization account. Initial <a href="https://twitter.com/asmeurer/status/1057741387108560897" rel="noopener noreferrer" target="_blank">feedback</a> from users indicates many would appreciate this feature require push permissions, instead of admin permissions, as there are likely more users who can help in the bug tracker with moving issues, setting labels, and closing bugs.</p>
<blockquote class="twitter-tweet">
<p lang="en" dir="ltr">Issue filed in the wrong repo? </p>
<p>We know your pain! And now we've got a fix. </p>
<p>Repo admins can transfer issues to wherever they belong. <img src="https://s.w.org/images/core/emoji/11/72x72/1f3d8.png" alt="🏘" class="wp-smiley" /> <a href="https://t.co/rPwNng7ZOl">pic.twitter.com/rPwNng7ZOl</a></p>
<p>&mdash; GitHub (@github) <a href="https://twitter.com/github/status/1057678791764467712?ref_src=twsrc%5Etfw">October 31, 2018</a></p></blockquote>
<p></p>
<p>The &#8220;<a href="https://blog.github.com/2018-11-01-suggested-changes-update/" rel="noopener noreferrer" target="_blank">suggested changes</a>&#8221; feature GitHub introduced in beta two weeks ago seems to have been adopted fairly quickly by users. Suggested Changes lets users suggest a change to code in a pull request. These changes can be accepted by the author or assignees with one click and then committed.</p>
<p><a href="https://i1.wp.com/wptavern.com/wp-content/uploads/2018/11/suggested-changes.png?ssl=1"><img /></a></p>
<p>GitHub reports more than 10 percent of all reviewers suggested at least one change. They have received 100,000 suggestions and estimate that 4% of all review commits created have included a suggestion. Based on feedback so far, GitHub put the following improvements on the roadmap for the Suggested Changes feature: </p>
<ul>
<li>The ability to suggest changes to multiple lines at once</li>
<li>The ability to accept multiple changes in a single commit</li>
</ul>
<p>Project Paper Cuts is borrowing heavily from <a href="https://github.com/sindresorhus/refined-github/" rel="noopener noreferrer" target="_blank">Refined GitHub</a>, a browser extension that simplifies the GitHub interface and adds useful features. </p>
<p>&#8220;Full-time open source developer <a href="https://github.com/sindresorhus/" rel="noopener noreferrer" target="_blank">Sindre Sorhus</a> has built a great browser extension that builds on and improves the GitHub experience, along with a fantastic community that has come together to discuss workflows and build their favorite features,&#8221; GitHub product manager Luke Hefson said. &#8220;Project Paper Cuts has taken inspiration from a lot of Refined GitHub’s additions, and we’re building some of the most-loved features right into GitHub itself.&#8221;</p>
<p>GitHub is aiming to be more open and transparent with user feedback after the <a href="https://wptavern.com/open-source-project-maintainers-confront-github-with-open-letter-on-issue-management" rel="noopener noreferrer" target="_blank">2016 fiasco with disgruntled open source project maintainers</a>. These fixes for small annoyances add up in the grand scheme of things to improve project workflow for millions of developers and project maintainers. The improvements are shipping out regularly and are all outlined in <a href="https://blog.github.com/changelog/" rel="noopener noreferrer" target="_blank">GitHub&#8217;s public changelog</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 02 Nov 2018 18:58:42 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:24;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:92:"WPTavern: WPWeekly Episode 336 – Interview With Andrew Roberts, CEO and Co-founder of Tiny";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:58:"https://wptavern.com?p=85267&preview=true&preview_id=85267";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:98:"https://wptavern.com/wpweekly-episode-336-interview-with-andrew-roberts-ceo-and-co-founder-of-tiny";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2772:"<p>In this episode, <a href="http://jjj.me">John James Jacoby</a> and I are joined by <a href="https://twitter.com/andrew_roberts?lang=en">Andrew Roberts</a>, CEO and Co-founder of <a href="https://www.tiny.cloud/">Tiny</a>. Tiny is the company behind the popular open source library <a href="https://www.tiny.cloud/features/">TinyMCE</a>. Roberts shares his entrepreneurial journey, what the company plans on doing with its recent <a href="https://wptavern.com/tiny-raises-4m-in-series-a-funding-publishes-gutenberg-faq">round of funding</a>, and the relationship between TinyMCE and Gutenberg.</p>
<p>Here is an excerpt from the show on what Roberts thinks about Gutenberg.</p>
<blockquote><p>I think that ultimately Gutenberg will be more innovative than just incrementally changing from the old editor experience toward block-based editing.</p>
<p>I think you know Matt&#8217;s probably had a tough year with some of the criticisms around Gutenberg but I admire his courage and leadership because if he hadn&#8217;t put his brand equity on the line, if he hadn&#8217;t invested his goodwill in doing this, this would never be launching in a month from now.</p>
<p>There may be a painful year or two but in the grand scheme of things this will turn out for the better. It&#8217;s taken a lot of courage and bravery for him to do that. He&#8217;s taken a lot of shots in the back, but you know that&#8217;s why he gets paid the big bucks as they say.</p></blockquote>
<h2>Stories Discussed:</h2>
<p><a href="https://jjj.blog/2018/10/wordpress-5-0-beta-1/">WordPress 5.0 Beta 1</a><br />
<a href="https://wptavern.com/wordpress-accessibility-team-delivers-sobering-assessment-of-gutenberg-we-have-to-draw-a-line">WordPress Accessibility Team Delivers Sobering Assessment of Gutenberg: “We have to draw a line.”</a><br />
<a href="https://wptavern.com/woocommerce-3-5-introduces-rest-api-v3-improves-transactional-emails">WooCommerce 3.5 Introduces REST API v3, Improves Transactional Emails</a><br />
<a href="https://wptavern.com/wp-engine-acquires-array-themes">WP Engine Acquires Array Themes</a></p>
<h2>WPWeekly Meta:</h2>
<p><strong>Next Episode:</strong> Wednesday, November 7th 3:00 P.M. Eastern</p>
<p>Subscribe to <a href="https://itunes.apple.com/us/podcast/wordpress-weekly/id694849738">WordPress Weekly via Itunes</a></p>
<p>Subscribe to <a href="https://www.wptavern.com/feed/podcast">WordPress Weekly via RSS</a></p>
<p>Subscribe to <a href="http://www.stitcher.com/podcast/wordpress-weekly-podcast?refid=stpr">WordPress Weekly via Stitcher Radio</a></p>
<p>Subscribe to <a href="https://play.google.com/music/listen?u=0#/ps/Ir3keivkvwwh24xy7qiymurwpbe">WordPress Weekly via Google Play</a></p>
<p><strong>Listen To Episode #336:</strong><br />
</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 02 Nov 2018 13:25:36 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:25;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:63:"WPTavern: How to Add an Image to A Paragraph Block in Gutenberg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85201";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:74:"https://wptavern.com/how-to-add-an-image-to-a-paragraph-block-in-gutenberg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2393:"<p>WordPress 5.0 is on the horizon and with it comes a number of opportunities to explain how to get things done in the new editor. <br /></p>



<h2>Testing Scenario<br /></h2>



<p>A user has written three paragraphs and decides to add an image to the second paragraph. This user wants the image to be aligned to the right. </p>



<h2>Accomplishing the Task in the Classic Editor</h2>



<p>The classic editor is essentially one big block. Adding media to a paragraph is as quick as placing the mouse cursor at the beginning of a paragraph, clicking the add new media button, selecting or uploading an image, and choosing its alignment. </p>



<h2 id="mce_6">Accomplishing the Task in Gutenberg</h2>



<p>In Gutenberg, each paragraph is a block and each block has its own toolbar. This is important because after writing three paragraphs, you can&#8217;t click on an add media button. Instead, you need to create an image block. </p>



<p>Once you&#8217;ve selected an image, you need to move the image block above the paragraph block where you want to insert it. At first, you might try to drag and drop the image into the paragraph but that doesn&#8217;t work. You need to use the up and down arrows or drag the block into position. </p>



<p>Once the image block is in the correct location, click the align right icon. The image will be inserted into the right side of the paragraph block. </p>



<img />A Right Aligned Image Inside of A Paragraph Block



<p>If you want to move the image to a different paragraph block, you&#8217;ll need to click the Align center button which turns the image back into its own block and repeat the process described above. </p>



<h2>Adding Images to Paragraphs in the Classic Editor Is Easier<br /></h2>



<p>The task I described above is one I think millions of users will have trouble completing when WordPress 5.0 is released. In the Classic editor, the writing flow doesn&#8217;t feel disjointed when you want to add images or embed content into posts. </p>



<p>In Gutenberg, everything is a block which in many cases, causes the flow to be disrupted as you need to figure out what block you need, how to manipulate it, where to move it, find where the options are, etc. </p>



<p>The process of adding images to paragraphs will likely improve after WordPress 5.0 is released but until then, the Classic editor wins this use case. </p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 02 Nov 2018 11:35:29 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:26;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:79:"WPTavern: Google’s reCAPTCHA v3 Promises a “Frictionless User Experience”";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85145";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:81:"https://wptavern.com/googles-recaptcha-v3-promises-a-frictionless-user-experience";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3218:"<p>Google <a href="https://webmasters.googleblog.com/2018/10/introducing-recaptcha-v3-new-way-to.html" rel="noopener noreferrer" target="_blank">introduced reCAPTCHA v3</a> this week, which promises a new &#8220;frictionless user experience.&#8221; Earlier versions of the API stopped bots but also drew the ire of internet users across the globe. Users were regularly inconvenienced with distorted text challenges, street sign puzzles, click requirements, and other actions to prove their humanity. </p>
<p>v3 offers a marked improvement by detecting bots in the background and returning a score that tells the admin if the interaction is suspicious. It scores traffic with its <a href="https://patents.google.com/patent/US20110054961A1/en">Adaptive Risk Analysis Engine</a> instead of forcing human users to perform interactive challenges. The score can be used three different ways:</p>
<ul>
<li>Set a threshold that determines when a user is let through or when further verification needs to be done, i.e. two-factor authentication or phone verification.</li>
<li>Combine the score with your own signals that reCAPTCHA can’t access, such as user profiles or transaction histories.</li>
<li>Use the reCAPTCHA score as one of the signals to train your machine learning model to fight abuse.</li>
</ul>
<p>v3 give site owners more options to customize the thresholds and actions for different types of traffic. The video below explains how it works and the <a href="https://developers.google.com/recaptcha/docs/v3" rel="noopener noreferrer" target="_blank">developer docs</a> have more information on frontend integration and score interpretation.</p>
<p></p>
<p>Site owners can view their traffic in the <a href="https://www.google.com/recaptcha/admin" rel="noopener noreferrer" target="_blank">reCAPTCHA admin console</a>. It also displays a list of all of your sites and what version of the API they are using.</p>
<p><a href="https://i1.wp.com/wptavern.com/wp-content/uploads/2018/10/Screen-Shot-2018-11-01-at-5.08.11-PM.png?ssl=1"><img /></a></p>
<p>The admin console also has a form for registering new sites:</p>
<p><a href="https://i2.wp.com/wptavern.com/wp-content/uploads/2018/10/Screen-Shot-2018-11-01-at-5.09.18-PM.png?ssl=1"><img /></a></p>
<p>The WordPress Plugin Directory has <a href="https://wordpress.org/plugins/search/reCAPTCHA/" rel="noopener noreferrer" target="_blank">dozens of standalone plugins and contact forms</a> that make use of reCAPTCHA in some way. Sites that are already set up to use v2 or the Invisible CAPTCHA, will not automatically update to use v3. There&#8217;s a different signup and implementation process that the site owner has to perform before having it integrated on the site.</p>
<p>WordPress plugin developers who offer reCAPTCHA will have to decide if they want to update existing plugins to use v3 or package a v3 offering in a new plugin. The reCAPTCHA v1 API was shut down earlier this year in March. Google&#8217;s <a href="https://github.com/google/recaptcha/" rel="noopener noreferrer" target="_blank">reCAPTCHA PHP client library on GitHub</a> is still actively encouraging use of both v2 and v3. A date has not been announced for v2 to be deprecated. </p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 02 Nov 2018 00:09:59 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:27;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:37:"Dev Blog: Quarterly Updates | Q3 2018";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"https://wordpress.org/news/?p=6206";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:61:"https://wordpress.org/news/2018/11/quarterly-updates-q3-2018/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:14624:"<p><em>To keep everyone aware of big projects and efforts across WordPress contributor teams, I&#8217;ve reached out to each team&#8217;s <a href="https://make.wordpress.org/updates/team-reps/">listed representatives</a>. I asked each of them to share their Top Priority (and when they hope for it to be completed), as well as their biggest Wins and Worries. Have questions? I&#8217;ve included a link to each team&#8217;s site in the headings.</em></p>


<h2><a href="https://make.wordpress.org/accessibility/">Accessibility</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/joedolson/" class="mention"><span class="mentions-prefix">@</span>joedolson</a>, <a href="https://profiles.wordpress.org/audrasjb/" class="mention"><span class="mentions-prefix">@</span>audrasjb</a>, <a href="https://profiles.wordpress.org/arush/" class="mention"><span class="mentions-prefix">@</span>arush</a></li>
<li><strong>Priority</strong>: Work on authoring a manual for assistive technology users on Gutenberg, led by Claire Brotherton (<a href="https://profiles.wordpress.org/abrightclearweb/" class="mention"><span class="mentions-prefix">@</span>abrightclearweb</a>). Continue to work on improving the overall user experience in Gutenberg. Update and organize the WP A11y handbook.</li>
<li><strong>Struggle</strong>: Lack of developers and accessibility experts to help test and code the milestone issues. Still over 100 outstanding issues, and developing the Gutenberg AT manual helps expose additional issues. The announcement of an accessibility focus on 4.9.9 derailed our planning for Gutenberg in September with minimal productivity, as that goal was quickly withdrawn from the schedule.</li>
<li><strong>Big Win</strong>: Getting focus constraint implemented in popovers and similar components in Gutenberg.</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/cli/">CLI</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: @danielbachhuber, <a href="https://profiles.wordpress.org/schlessera/" class="mention"><span class="mentions-prefix">@</span>schlessera</a></li>
<li><strong>Priority</strong>: Current priority is v2.1.0 of WP-CLI, to polish the major refactoring v2.0.0 introduced. You can <a href="https://make.wordpress.org/cli/good-first-issues/">join in or follow progress</a> on their site.</li>
<li><strong>Struggle</strong>: Getting enough contributors to make peer-review possible/manageable.</li>
<li><strong>Big Win</strong>: The major refactoring of v2 was mostly without any negative impacts on existing installs. It provided substantial improvements to maintainability including: faster and more reliable testing, more straight-forward changes to individual packages, and simpler contributor on-boarding.</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/community/">Community</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/francina/" class="mention"><span class="mentions-prefix">@</span>francina</a>, <a href="https://profiles.wordpress.org/hlashbrooke/" class="mention"><span class="mentions-prefix">@</span>hlashbrooke</a></li>
<li><strong>Priority</strong>: Supporting contributors of all levels via: monthly <a href="https://make.wordpress.org/community/2018/10/08/announcement-monthly-chat-for-wordcamp-organisers/">WordCamp Organizers chat</a>, better onboarding with a translated <a href="https://make.wordpress.org/community/2017/08/11/global-community-team-welcome-pack/">welcome pack</a>, and Contribution Drive documentation.</li>
<li><strong>Struggle</strong>: Fewer contributors than usual.</li>
<li><strong>Big Win</strong>: <a href="https://make.wordpress.org/community/2018/09/21/meetup-application-vetting-sprint-26-27-september/">Meetup Vetting Sprint</a>! </li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/core/">Core</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/jeffpaul/" class="mention"><span class="mentions-prefix">@</span>jeffpaul</a></li>
<li><strong>Priority</strong>: Continued preparation for the 5.0 release cycle and Gutenberg.</li>
<li><strong>Struggle</strong>: Identifying tasks for first time contributors, as well as for new-to-JS contributors.</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/design/">Design</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/melchoyce/" class="mention"><span class="mentions-prefix">@</span>melchoyce</a>, <a href="https://profiles.wordpress.org/karmatosed/" class="mention"><span class="mentions-prefix">@</span>karmatosed</a>, <a href="https://profiles.wordpress.org/boemedia/" class="mention"><span class="mentions-prefix">@</span>boemedia</a>, <a href="https://profiles.wordpress.org/joshuawold/" class="mention"><span class="mentions-prefix">@</span>joshuawold</a>, <a href="https://profiles.wordpress.org/mizejewski/" class="mention"><span class="mentions-prefix">@</span>mizejewski</a></li>
<li><strong>Priority</strong>: Preparing for WordPress 5.0 and continuing to work on better onboarding practices.</li>
<li><strong>Struggle</strong>: Identifying tasks for contributor days, especially for small- to medium-sized tasks that can be fit into a single day.</li>
<li><strong>Big Win</strong>: Regular contributions are starting to build up.</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/docs/">Documentation</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/kenshino/" class="mention"><span class="mentions-prefix">@</span>kenshino</a></li>
<li><strong>Priority</strong>: Getting HelpHub out before WordPress 5.0&#8217;s launch to make sure Gutenberg User Docs have a permanent position to reside</li>
<li><strong>Struggle</strong>: Getting the documentation from HelpHub into WordPress.org/support is more manual than initially anticipated.</li>
<li><strong>Big Win</strong>: Had a good discussion with the Gutenberg team about their docs and how WordPress.org expects documentation to be distributed (via DevHub, Make and HelpHub). Getting past the code blocks to release HelpHub (soon)</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/hosting/">Hosting</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/mikeschroder/" class="mention"><span class="mentions-prefix">@</span>mikeschroder</a>, <a href="https://profiles.wordpress.org/jadonn/" class="mention"><span class="mentions-prefix">@</span>jadonn</a></li>
<li><strong>Priority</strong>: Helping Gutenberg land well at hosts for users in 5.0.</li>
<li><strong>Struggle</strong>: Short time frame with few resources to accomplish priority items.</li>
<li><strong>Big Win</strong>: Preparing Try Gutenberg support guide for hosts during the rollout and good reception from users following it.</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/marketing/">Marketing</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/bridgetwillard/" class="mention"><span class="mentions-prefix">@</span>bridgetwillard</a></li>
<li><strong>Priority</strong>: Continuing to write and publish case studies from the community.</li>
<li><strong>Big Win</strong>: Onboarding guide is going well and is currently being <a href="https://translate.wordpress.org/projects/meta/get-involved">translated</a>.</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/meta/">Meta</a> (WordPress.org Site)</h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/tellyworth/" class="mention"><span class="mentions-prefix">@</span>tellyworth</a>, <a href="https://profiles.wordpress.org/coffee2code/" class="mention"><span class="mentions-prefix">@</span>coffee2code</a></li>
<li><strong>Priority</strong>: Support for other teams in the lead up to, and the follow-up of, the release of WP 5.0. ETA is the WP 5.0 release date (Nov 19) and thereafter, unless it gets bumped to next quarter.</li>
<li><strong>Struggle</strong>: Maintaining momentum on tickets (still).</li>
<li><strong>Big Win</strong>: Launch of front-end demo of Gutenberg on https://wordpress.org/gutenberg/</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/mobile/">Mobile</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/elibud/" class="mention"><span class="mentions-prefix">@</span>elibud</a></li>
<li><strong>Priority</strong>: Have an alpha version of Gutenberg in the WordPress apps, ETA end of year 2018.</li>
<li><strong>Struggle</strong>: Unfamiliar tech stack and the goal of reusing as much of Gutenberg-web&#8217;s code as possible.</li>
<li><strong>Big Win</strong>: Running mobile tests on web&#8217;s PRs.</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/plugins/">Plugins</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/ipstenu/" class="mention"><span class="mentions-prefix">@</span>ipstenu</a></li>
<li><strong>Priority</strong>: Cleaning up &#8216;inactive&#8217; users, which was supposed to be complete but some work preparing for 5.0 was necessary.</li>
<li><strong>Struggles</strong>: Devnotes are lacking for the upcoming release which slows progress.</li>
<li><strong>Big Win</strong>: No backlog even though a lot were out!</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/polyglots/">Polyglots</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/petya/" class="mention"><span class="mentions-prefix">@</span>petya</a>, <a href="https://profiles.wordpress.org/ocean90/" class="mention"><span class="mentions-prefix">@</span>ocean90</a>, <a href="https://profiles.wordpress.org/nao/" class="mention"><span class="mentions-prefix">@</span>nao</a>, <a href="https://profiles.wordpress.org/chantalc/" class="mention"><span class="mentions-prefix">@</span>chantalc</a>, <a href="https://profiles.wordpress.org/deconf/" class="mention"><span class="mentions-prefix">@</span>deconf</a>, <a href="https://profiles.wordpress.org/casiepa/" class="mention"><span class="mentions-prefix">@</span>casiepa</a></li>
<li><strong>Priority</strong>: Help re-activating inactive locale teams.</li>
<li><strong>Struggle</strong>: Many GTEs are having a hard time keeping up with incoming translation <a href="https://make.wordpress.org/polyglots/?resolved=unresolved&tags=editor-requests">validation and PTE requests</a>.</li>
<li><strong>Big Win</strong>: Made some progress in locale research and reassigning new GTEs.</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/support/">Support</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/clorith/" class="mention"><span class="mentions-prefix">@</span>clorith</a></li>
<li><strong>Priority:</strong> Preparing for the upcoming 5.0 release</li>
<li><strong>Struggle</strong>: Finding a good balance between how much we want to help people and how much we are able to help people. Also, contributor recruitment (always a crowd favorite!)</li>
<li><strong>Big Win</strong>: How well the team, on a global level, has managed to maintain a good flow of user engagement through support.</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/themes/">Theme Review</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/acosmin/" class="mention"><span class="mentions-prefix">@</span>acosmin</a>, <a href="https://profiles.wordpress.org/rabmalin/" class="mention"><span class="mentions-prefix">@</span>rabmalin</a>, <a href="https://profiles.wordpress.org/thinkupthemes/" class="mention"><span class="mentions-prefix">@</span>thinkupthemes</a>, <a href="https://profiles.wordpress.org/williampatton/" class="mention"><span class="mentions-prefix">@</span>williampatton</a></li>
<li><strong>Priority</strong>: Implementing the Theme Sniffer plugin on WordPress.org which is one step forward towards automation. ETA early 2019</li>
<li><strong>Struggle</strong>: Not having so many contributors/reviewers.</li>
<li><strong>Big Win</strong>: Implementing <a href="https://make.wordpress.org/themes/2018/10/25/new-requirements/">multiple requirements</a> into our review flow, like screenshots and readme.txt requirements.</li>
</ul>
<p><!-- /wp:list --><!-- wp:heading --></p>
<p><!-- /wp:list --><!-- wp:heading --></p>
<h2><a href="https://make.wordpress.org/training/">Training</a></h2>
<p><!-- /wp:heading --><!-- wp:list --></p>
<ul>
<li><strong>Contacted</strong>: <a href="https://profiles.wordpress.org/bethsoderberg/" class="mention"><span class="mentions-prefix">@</span>bethsoderberg</a>, <a href="https://profiles.wordpress.org/juliek/" class="mention"><span class="mentions-prefix">@</span>juliek</a></li>
<li><strong>Priority:</strong> Getting the learn.wordpress.org site designed, developed, and being able to publish lesson plans to it.</li>
<li><strong>Struggle:</strong> Getting contributors onboard and continually contributing. Part of that is related to the learn.wordpress.org site. People like to see their contributions.</li>
<li><strong>Big Win</strong>: We have our new workflow and tools in place. We are also streamlining that process to help things go from idea to publication more quickly.</li>
</ul>
<p><!-- /wp:list --><!-- wp:paragraph --></p>
<p><em>Interested in updates from the last quarter? You can find those here: <a href="https://wordpress.org/news/2018/07/quarterly-updates-q2-2018/">https://wordpress.org/news/2018/07/quarterly-updates-q2-2018/</a></em></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 01 Nov 2018 16:46:16 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:7:"Josepha";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:28;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:46:"Dev Blog: The Month in WordPress: October 2018";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"https://wordpress.org/news/?p=6230";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:71:"https://wordpress.org/news/2018/11/the-month-in-wordpress-october-2018/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:8136:"<p>Teams across the WordPress project are working hard to make sure everything is ready for the upcoming release of WordPress 5.0. Find out what’s going on and how you can get involved.</p>



<hr class="wp-block-separator" />



<h2>The Plan for WordPress 5.0</h2>



<p>Early this month, <a href="https://make.wordpress.org/core/2018/10/03/proposed-wordpress-5-0-scope-and-schedule/">the planned release schedule was announced</a> for WordPress 5.0, which was <a href="https://make.wordpress.org/core/2018/10/31/wordpress-5-0-schedule-updates/">updated</a> a few weeks later. WordPress 5.0 is a highly anticipated release, as it’s the official &nbsp;launch of Gutenberg &#8212; the new block editor for WordPress Core. For more detail, check out this <a href="https://make.wordpress.org/core/2018/10/12/granular-timeline/">&nbsp;granular timeline</a>.<br /></p>



<p>Along with the planned release schedule, <a href="https://profiles.wordpress.org/matt/" class="mention"><span class="mentions-prefix">@</span>matt</a>, who is heading up this release, <a href="https://make.wordpress.org/core/2018/10/03/a-plan-for-5-0/">announced leads for critical focuses on the project</a>, including <a href="https://profiles.wordpress.org/matveb/" class="mention"><span class="mentions-prefix">@</span>matveb</a>, <a href="https://profiles.wordpress.org/karmatosed/" class="mention"><span class="mentions-prefix">@</span>karmatosed</a>, <a href="https://profiles.wordpress.org/laurelfulford/" class="mention"><span class="mentions-prefix">@</span>laurelfulford</a>, <a href="https://profiles.wordpress.org/allancole/" class="mention"><span class="mentions-prefix">@</span>allancole</a>, <a href="https://profiles.wordpress.org/lonelyvegan/" class="mention"><span class="mentions-prefix">@</span>lonelyvegan</a>, <a href="https://profiles.wordpress.org/omarreiss/" class="mention"><span class="mentions-prefix">@</span>omarreiss</a>, <a href="https://profiles.wordpress.org/antpb/" class="mention"><span class="mentions-prefix">@</span>antpb</a>, <a href="https://profiles.wordpress.org/pento/" class="mention"><span class="mentions-prefix">@</span>pento</a>, <a href="https://profiles.wordpress.org/chanthaboune/" class="mention"><span class="mentions-prefix">@</span>chanthaboune</a>, <a href="https://profiles.wordpress.org/danielbachhuber/" class="mention"><span class="mentions-prefix">@</span>danielbachhuber</a>, and <a href="https://profiles.wordpress.org/mcsf/" class="mention"><span class="mentions-prefix">@</span>mcsf</a>.<br /></p>



<p><a href="https://wordpress.org/news/2018/10/wordpress-5-0-beta-2/">WordPress 5.0 is currently in its second beta phase</a> and will soon move to the release candidate status. Help test this release right now by installing the <a href="https://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester plugin</a> on your site.<br /></p>



<p>Want to get involved in building WordPress Core? Follow <a href="https://make.wordpress.org/core/">the Core team blog</a> and join the #core channel in <a href="https://make.wordpress.org/chat/">the Making WordPress Slack group</a>. You can also help out by <a href="https://make.wordpress.org/test/">testing</a> or <a href="https://make.wordpress.org/polyglots/2018/10/24/wordpress-5-0-gutenberg-and-twenty-nineteen/">translating</a> the release into a local language.</p>



<h2>New Editor for WordPress Core</h2>



<p>Active development continues on <a href="https://wordpress.org/gutenberg">Gutenberg</a>, the new editing experience for WordPress Core. <a href="https://make.wordpress.org/core/2018/10/31/whats-new-in-gutenberg-31st-october-2/">The latest release</a> is feature complete, meaning that all further development on it will be to improve existing features and fix outstanding bugs.<br /></p>



<p>Some have raised concerns about Gutenberg’s accessibility, prompting the development team <a href="https://make.wordpress.org/core/2018/10/18/regarding-accessibility-in-gutenberg/">to detail some areas</a> in which the new editor is accessible. To help improve things further, the team has made <a href="https://make.wordpress.org/core/2018/10/19/call-for-testers-community-gutenberg-accessibility-tests/">a public call for accessibility testers</a> to assist.<br /></p>



<p>Want to get involved in building Gutenberg? Follow <a href="https://make.wordpress.org/core/tag/gutenberg">the Gutenberg tag</a> on the Core team blog and join the #core-editor channel in <a href="https://make.wordpress.org/chat/">the Making WordPress Slack group</a>. Read <a href="https://make.wordpress.org/test/2018/10/19/gutenberg-needs-testing-areas/">this guide</a> to find areas where you can have the most impact.</p>



<h2>Migrating HelpHub to WordPress.org</h2>



<p>HelpHub is an ongoing project to move all of WordPress’ user documentation from the <a href="https://codex.wordpress.org/">Codex</a> to the <a href="https://wordpress.org/support/">WordPress Support portal</a>.<br /></p>



<p>HelpHub has been developed on <a href="https://wp-helphub.com/">a separate staging server</a> and it’s now time to migrate the new documentation to its home on WordPress.org. The plan is to have everything moved over &nbsp;before WordPress 5.0 is released, so that all the new documentation will be available on the new platform from the start.<br /></p>



<p>The HelpHub team has published <a href="https://make.wordpress.org/docs/2018/11/01/call-for-volunteers-helphub-migration/">a call for volunteers</a> to help with the migration. If you would like to get involved, join the #docs channel in <a href="https://make.wordpress.org/chat/">the Making WordPress Slack group</a>, and contact <a href="https://profiles.wordpress.org/atachibana/" class="mention"><span class="mentions-prefix">@</span>atachibana</a> to get started.</p>



<h2>A New Default Theme for WordPress</h2>



<p><a href="https://make.wordpress.org/core/2018/10/16/introducing-twenty-nineteen/">A brand new default theme &#8212; Twenty Nineteen &#8212; has been announced</a>&nbsp;with development being led by <a href="https://profiles.wordpress.org/allancole/" class="mention"><span class="mentions-prefix">@</span>allancole</a>. The theme is packaged with WordPress 5.0, so it will be following the same release schedule as Core.<br /></p>



<p>The new theme is designed to integrate seamlessly with Gutenberg and showcase how you can build a theme alongside the new block editor and take advantage of the creative freedom that it offers.<br /></p>



<p>Want to help build Twenty Nineteen? Join in on <a href="https://github.com/WordPress/twentynineteen">the theme’s GitHub repo</a> and join the #core-themes channel in <a href="https://make.wordpress.org/chat/">the Making WordPress Slack group</a>.<br /></p>



<hr class="wp-block-separator" />



<h2>Further Reading:</h2>



<ul><li>The Support team are putting together more formal <a href="https://github.com/Clorith/wporg-support-guidelines">Support Guidelines</a> for the WordPress Support Forums.</li><li>The group focused on privacy tools in Core <a href="https://make.wordpress.org/core/2018/10/11/whats-new-in-core-privacy/">has released some details</a> on the work they have been doing recently, with a roadmap for their plans over the next few months.</li><li>The Core team <a href="https://make.wordpress.org/core/2018/10/15/wordpress-and-php-7-3/">released an update</a> about how WordPress will be compatible with PHP 7.3.</li><li>The Theme Review Team have published <a href="https://make.wordpress.org/themes/2018/10/25/new-requirements/">some new requirements</a> regarding child themes, readme files and trusted authors in the Theme Directory.</li><li>The WordCamp Europe team <a href="https://make.wordpress.org/community/2018/10/23/progressive-web-app-for-wordcamps/">are working on a PWA service</a> for all WordCamp websites.</li></ul>



<p><em>If you have a story we should consider including in the next “Month in WordPress” post, please </em><a href="https://make.wordpress.org/community/month-in-wordpress-submissions/"><em>submit it here</em></a><em>.</em><br /></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 01 Nov 2018 08:40:03 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:15:"Hugh Lashbrooke";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:29;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:61:"WPTavern: Gutenberg Cloud Plugin for WordPress is Now in Beta";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85115";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:72:"https://wptavern.com/gutenberg-cloud-plugin-for-wordpress-is-now-in-beta";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5938:"<p><a href="https://www.frontkom.no/" rel="noopener noreferrer" target="_blank">Frontkom</a>, the team behind the <a href="https://gutenbergcloud.org/" rel="noopener noreferrer" target="_blank">Gutenberg Cloud</a> project, has published the beta version of its WordPress plugin to the official repository. <a href="https://wordpress.org/plugins/cloud-blocks/" rel="noopener noreferrer" target="_blank">Cloud Blocks</a> serves as a connector, allowing WordPress users to browse and install open source blocks from Gutenberg Cloud. The blocks are hosted on NPM and their assets are served from CloudFlare using <a href="https://unpkg.com" rel="noopener noreferrer" target="_blank">unpkg.com</a>.</p>
<p><a href="https://i0.wp.com/wptavern.com/wp-content/uploads/2018/10/gutenberg-cloud-wp-plugin.gif?ssl=1"><img /></a></p>
<p>Gutenberg Cloud&#8217;s online library of blocks is CMS agnostic, offering blocks for both Drupal and WordPress sites, and more CMSs in the future. The service advertises three key benefits for developers who host blocks on Gutenberg Cloud:</p>
<ul>
<li>Wider adoption: Your blocks can be used outside of WP</li>
<li>Discoverability: Your blocks will pop up in the Cloud Blocks UI</li>
<li>Faster development: No plugin/SVN needed, just publish to NPM</li>
</ul>
<p>Frontkom is actively recruiting WordPress developers to add blocks to the cloud to test the process. Documentation for <a href="https://github.com/front/cloud-blocks/blob/master/docs/migrate-block.md" rel="noopener noreferrer" target="_blank">migrating blocks from a plugin</a> is available on GitHub. Frontkom has also produced a new <a href="https://github.com/front/create-cloud-block" rel="noopener noreferrer" target="_blank">boilerplate generator for building Gutenberg Cloud blocks</a>.</p>
<p>Users should note that the team is still ironing out the experience for developers adding blocks to the cloud, so the plugin isn&#8217;t yet ready for general use. It&#8217;s currently under active development. </p>
<h3>WordPress Developers Say Gutenberg Cloud May Not be the Best Way to Release Blocks but Platform has Potential</h3>
<p>I contacted some WordPress developers who have tested sending their blocks to Gutenberg Cloud to get their initial reactions to the platform. </p>
<p>&#8220;The idea that folks will be able to install blocks a la carte is interesting,&#8221; <a href="https://coblocks.com/" rel="noopener noreferrer" target="_blank">CoBlocks</a> author and ThemeBeans founder Rich Tabor said. &#8220;It’s pretty much as easy as installing plugins.&#8221;</p>
<p>Tabor experimented with migrating his Block Gallery blocks and said the process was not difficult but he foresees difficulties in maintaining blocks across parent plugins and Gutenberg Cloud.</p>
<p>&#8220;As a developer, I’m still not entirely convinced Gutenberg Cloud is the best way to release blocks, aside from relatively simple blocks,&#8221; Tabor said. &#8220;I personally lean towards building suites of blocks that share a relative purpose, instead of one plugin (or one Cloud Block instance) per block. For one, it cuts down on maintenance quite a bit, as custom components can be shared between blocks. And there’s much better discoverability on getting relative blocks in the hands of users — if they’re grouped together.&#8221;</p>
<p>Block collections have been criticized for making it difficult to search for and discover individual blocks, but Tabor makes some good arguments for improving block discoverability by grouping together features users often need. That is the whole point of successful plugins like Jetpack, but this type of packaging also lends itself to criticism about bloat.</p>
<p>&#8220;It’s a similar conundrum when we look at grouped/not grouped shortcode plugins,&#8221; Tabor said. &#8220;I suppose the main difference is that the nature of blocks is much more complicated than that of shortcodes. History seems to repeat itself.&#8221;</p>
<p>Tabor said he is considering distributing a few of his free blocks through Gutenberg Cloud but he hasn&#8217;t fully decided yet.</p>
<p>WordPress core contributor, <a href="https://joshpress.net/" rel="noopener noreferrer" target="_blank">Josh Pollock</a>, who has worked extensively with React and Gutenberg, also tested the Gutenberg Cloud platform. He said he thinks it has a lot of potential for developers who write blocks that are mainly JavaScript already.</p>
<p>&#8220;I could see how an agency that builds WordPress sites could save a lot of time and hassle building out a block library,&#8221; Pollock said. &#8220;As a plugin developer with a lot of little ideas, the pain and time of setting up a block and block environment, which no one has gotten right yet, makes me very excited about this.&#8221;</p>
<p>Pollock also reported a positive experience with the <a href="https://github.com/front/create-cloud-block" rel="noopener noreferrer" target="_blank">create-cloud-block</a> generator.</p>
<p>&#8220;The code that create-cloud-block generates is well-written, but not too opinionated,&#8221; Pollock said. &#8220;The developer experience is both really cool &#8212; you preview your block in a functional Gutenberg-powered editor with no WordPress site attached &#8212; and a little frustrating as there is no live reload yet. I know they are just getting started and the tool doesn&#8217;t lock you into any structure, which is great. I&#8217;ll be keeping my eye on this project.&#8221;</p>
<p>Frontkom CTO Per André Rønsen said his team will continue testing the cloud internally until they get more developer feedback on the corresponding WordPress plugin. For Drupal users, Gutenberg Cloud will be shipped as a submodule of Gutenberg, which means all sites that install Gutenberg will also get the Cloud module. It can, however, be disabled. Rønsen said his team plans to showcase Gutenberg Cloud for D8 at DrupalCamp Oslo in November.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 31 Oct 2018 23:12:09 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:30;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:38:"Matt: What’s in My Bag, 2018 Edition";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:22:"https://ma.tt/?p=48557";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:51:"https://ma.tt/2018/10/whats-in-my-bag-2018-edition/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:12451:"<a href="https://i2.wp.com/ma.tt/files/2018/10/bag-v4.jpg?ssl=1" target="_blank" rel="noreferrer noopener"><img /></a>



<ol><li><a href="https://sdrtraveller.com/collections/accessories/products/travel-folio">SDR Kashmir Travel Folio</a>, made with this super-cool material called Dyneema, which is twice as strong as Kevlar and 15 times as strong as steel, but virtually weightless.</li><li><a href="https://www.amazon.com/dp/B06XGD6CS4/?tag=photomatt08-20">Garmin Forerunner 935</a> which is a triathlon watch, so it can tell me how much I don’t run, how much I don’t bike, and how much I don’t swim. Crazy sensors on it, and it’s lighter than an Apple Watch, which I tried again to use this year but wasn’t able to handle another device in my life that I had to charge daily. It has a weird charger, pictured next to it, but only needs charging once every few weeks so I don’t mind at all.</li><li>This is the latest 15” grey touchbar MacBook Pro, customized by <a href="https://www.uncovermac.com/">Uncover</a> to have the <a href="https://jetpack.com/">Jetpack</a> logo on it. I like the keyboard quietness and performance improvements of latest generation.</li><li><a href="https://www.aersf.com/fit-pack-2-black">Fit Pack 2 from Aer</a> is the same I wrote a whole blog post about last year, and I still love and adore it every day. They have a few bigger and smaller packs, but the quality is just fantastic and I love all the pockets. Mine is starting to tear a little bit by one of the shoulder straps, but I do keep ~18lbs in it regularly.</li><li>This is a <a href="https://www.amazon.com/dp/B0035N09CS/?tag=photomatt08-20">grey wool buff</a>, which works as a scarf, a hat, or an eye cover if I’m trying to sleep. I tried this out because of one of <a href="http://tynan.com/gear2017">Tynan’s also-great gear posts</a>.</li><li>Passport, because you never know when you’ll need to leave the country.</li><li><a href="https://www.amazon.com/gp/product/B06VTJWRJW/?tag=photomatt08-20">Kindle Oasis</a> with this <a href="https://www.amazon.com/gp/product/B07B7H4L8F/?tag=photomatt08-20">random case on it</a>. I dig that this one is apparently waterproof — which I’ve never tested — but doesn’t feel like we’ve found the perfect size and weight balance yet. Reading is my favorite activity right now so this is my most-loved item.</li><li><a href="https://www.amazon.com/gp/product/B01EN9QK6G/?tag=photomatt08-20">Imazing 10k charger</a>. Great capacity, charges via USB-C. (2nd year)</li><li>I’ve started carrying around some stationery so I can write notes to people when I’m on the road. Now I just need better handwriting&#8230;</li><li><a href="http://www.delfonics.com">Delfonics</a> is a funky-cool Japanese stationery, and <a href="https://www.amazon.com/dp/B003N1XRYY/?tag=photomatt08-20">this 3”x4” Rollbahn notebook is tops</a>, and actually fits in my pocket. The Amazon one linked might be larger, I found it at <a href="http://paper-ya.com/">Paper-Ya on Granville Island</a>.</li><li>A small leather bracelet I got in Seoul, Korea.</li><li>Two things here: a <a href="https://www.amazon.com/gp/product/B00CM589B8/?tag=photomatt08-20">rolled-up chamois cloth</a> for cleaning glasses, inspired by <a href="https://ma.tt/2018/01/r-i-p-dean/">my late friend Dean</a>, and <a href="https://twitter.com/helenhousandi/status/746057671531429889">a WordPress ring I wear sometimes</a>.</li><li>Three pens here: A <a href="https://matt.blog/2018/09/30/new-automattic-pen/">cool customized one we did for Automatticians</a>; a <a href="https://www.amazon.com/dp/B00J2S5JNY/?tag=photomatt08-20">Lamy Accent 4pen</a> which has red, blue, black, and a mechanical pencil built in; a Sharpie for signing stuff.</li><li>Have gone away from the carbon fiber clip and now using this <a href="https://www.paulsmith.com/us/mens/accessories/wallets?style=205">small Paul Smith card wallet</a>.</li><li><a href="https://www.amazon.com/dp/B016QO5YNG/?tag=photomatt08-20">Apple Magic Mouse 2</a>. When this one breaks I’ll switch it out for a black one.</li><li>Charger for the MacBook Pro.</li><li>A super small international adapter, which is also nice for converting the 3-prong in the next item into a 2-prong. It’s Lenmar but I’m not going to link Amazon because they’re charging too much, just picked up in an airport store.</li><li><strong>Probably my favorite new item of the year:</strong> I have given Native Union a hard time in the past but super love <a href="https://www.amazon.com/gp/product/B075LPVWBS/?tag=photomatt08-20">this combo extension cord and USB charger</a>. It is an 8-foot extension cord, which is remarkably handy, has two AC outlets, 3 USB ports, and one USB-C. Total life-saver.</li><li>A <a href="https://sdrtraveller.com/collections/accessories/products/accessory-pouch">dyneema accessory pouch</a>, <a href="https://retaw.tokyo/en/">retaW aoyama / tokyo fragrance lipcream</a>, <a href="https://www.amazon.com/gp/product/B005LVYSKQ/?tag=photomatt08-20">Aveda Peppymint breath refresher</a>, <a href="https://www.amazon.com/dp/B000IB0H8G/?tag=photomatt08-20">Aesop Ginger Flight Therapy</a> roller, a spray hand cleanser, and <a href="https://www.amazon.com/dp/B003J35X9I/?tag=photomatt08-20">Mintia COLDSMASH</a>.</li><li><a href="https://www.districtvision.com/about">District Vision</a> makes these <a href="https://www.sportique.com/products/district-vision-nagata-gray-sunglasses-district-black-rose">these running sunglasses</a> in Japan, which I found at the <a href="https://snowpeak.com/">Snow Peak</a> store in NYC.</li><li>These sunglasses are a collaboration between <a href="https://saltoptics.com/">Salt</a> and <a href="https://www.aetherapparel.com/">Aether</a>.</li><li>A single-use packet of Sriracha. Hot sauce in your bag? Swag.</li><li>A <a href="https://www.amazon.com/dp/B00JDUCSD0/?tag=photomatt08-20">palo santo smudge stick</a>, smells great when you burn it. I’m turning into a hippie.</li><li>Hermes business card holder.</li><li>iPhone XS with a Jetpack <a href="https://www.popsockets.com/">Popsocket</a>.</li><li>Pixel 2, now replaced by a Pixel 3 XL.</li><li>This is a bag with some small opals I gave as a Burning Man gift.</li><li>iPad Pro 10.5 and <a href="https://www.amazon.com/dp/B071WLK8GY/?tag=photomatt08-20">Apple sleeve with Pencil holder</a>, which is still one of my favorite gadgets of the year. Everything about this device just works and is a pleasure to use, and I&#8217;ve already ordered the new 11&#8243; Pro and related accessories.</li><li><a href="https://www.amazon.com/gp/product/B013VL4W58/?tag=photomatt08-20">Half meter (the perfect size) lightning cable</a>.</li><li>Apple USB-C dongle.</li><li><a href="https://www.amazon.com/gp/product/B01M8PYE5X/?tag=photomatt08-20">Cool multi-function USB cable with lightning, two micro-USBs, and USB-C</a>. I give these away all the time now and it’s nice to pair with the battery in #8 because I know I can charge anybody with this thing.</li><li>Short USB-C.</li><li>Combo micro-USB and Lightning.</li><li>Short lightning cable, just like 29.</li><li><a href="https://www.amazon.com/gp/product/B001E1Y5O6/?tag=photomatt08-20">Velcro cable ties</a>, great for tidying pretty much anything. I just take a few out of the big pack and roll them up to travel with.</li><li><a href="https://www.amazon.com/gp/product/B06XTXLNCW/?tag=photomatt08-20">Retractable USB-C</a>, don’t love these as they break but it’s the best of what’s out there.</li><li>USB-C to Lightning, great for super-fast charging.</li><li>My favorite USB-C hub so far, the <a href="https://www.amazon.com/gp/product/B07B87BN1M/?tag=photomatt08-20">Satechi Aluminum Type-C Multimedia Adapter with 4K HDMI, Mini DP, USB-C PD, Gigabit Ethernet, USB 3.0, Micro/SD Card Slots</a>. Pretty much everything you could possibly need.</li><li>A pretty handy <a href="https://www.amazon.com/dp/B00OWBHE9I/?tag=photomatt08-20">Ventev dashport car port charger that’s small and light</a>. (2nd year)</li><li>A few spare SIM cards, some SD cards, thingy to poke SIM card holder, and <a href="https://www.amazon.com/gp/product/B010HWCFDA/?tag=photomatt08-20">combo USB-C / USB-A 64gb stick</a>.</li><li>Lockpick set. (4th year)</li><li><a href="https://www.bragi.com/thedashpro/customize/">Bragi Pro custom earphones</a>. For many years I had custom in-ear monitors, but the convenience of wireless overcame that, even before they started taking headphone jacks out of phones. Bragi now allows you to send in ear molds from an audiologist and they’ll make these custom true wireless headphones that fit and sound great, but I have trouble recommending because the case is so heavy and once got so jammed I almost thought I’d have to throw the whole thing away, and the app has never been able to “connect” for me because it gets stuck on turning on some fitness sensors. If it could connect I think I could turn off the other feature that is annoying, which is the touch controls that I find get triggered by my hat or when my head is against a chair. So, a qualified “maybe try this.”</li><li><a href="http://www.amazon.com/gp/product/B00D4LBOV6/?tag=photomatt08-20">Sennheiser Culture Series Wideband Headset</a>, which I use for podcasts, Skype, Facetime, Zoom, and Google Hangout calls with external folks and teams inside of Automattic. Light, comfortable, great sound quality, and great at blocking out background noise so you don’t annoy other people on the call. I’d love to replace this with something wireless but haven’t found one with as high fidelity audio.</li><li><a href="https://www.amazon.com/gp/product/B07712LKJM/?tag=photomatt08-20">GL.iNet GL-AR750 Travel AC Router</a> which I use to create wifi networks different places I go, which is often faster than hotel/etc wifi, and I can also VPN encrypt all my traffic through it. Pretty handy! But not user-friendly. Often keep it in my suitcase and not my backpack. I have a retractable Ethernet and micro-USB attached to it.</li><li>Matte black Airpods. I love Airpods and these look super cool, I think these were from BlackPods which looks shut down now but <a href="https://www.colorware.com/p-743-apple-airpods.aspx">Colorware has some alternatives</a>. (2nd year)</li><li><a href="http://www.westoneaudio.com/index.php/products/hearing-protection/es49-custom-hearing-protection.html">Westone ES49 custom earplugs</a>, for if I go to concerts or anyplace overly loud. (4th year)</li><li>An ultralight running jacket I think I got at Lululemon Lab in Vancouver. They don’t have anything like it available online right now but it folds up ultra-tiny, weighs nothing, and is a nice layer for on an airplane. My only complaint (as with all Lululemon products) is the low quality of the zipper. (2nd year)<br /></li></ol>



<p>That’s it for this year. As a bonus I’ll link some of my favorite other-bag items including toiletries: <a href="http://www.muji.us/store/4549738743743.html">Muji dopp kit bag</a>, <a href="https://www.amazon.com/gp/product/B00JRK8VAU/?tag=photomatt08-20">these amazing travel bottles for creams</a>, <a href="https://www.amazon.com/gp/product/B0091JL3IO/?tag=photomatt08-20">travel atomizer</a>, <a href="http://www.elysiumhealth.com/">Elysium Basis</a>, <a href="http://www.amazon.com/dp/B00GHDK32Y/?tag=photomatt08-20">Muji q-tips</a>, <a href="https://www.aesop.com/us/p/skin/hydrate/in-two-minds-facial-hydrator/">Aesop Two Minds Facial Hydrator</a>, <a href="https://www.amazon.com/gp/product/B00375P3IE/?tag=photomatt08-20">Sunleya Sun Care SPF 15</a>, <a href="https://www.amazon.com/dp/B00G63D2XC/?tag=photomatt08-20">folding brush / comb</a>, <a href="http://www.amazon.com/gp/product/B00CUG273A/?tag=photomatt08-20">Philips Sonicare Brush</a>, <a href="https://www.aesop.com/us/p/body/personal-care/toothpaste/">Aesop toothpaste</a>, <a href="https://www.amazon.com/dp/B008QMWKES/?tag=photomatt08-20">Tom&#8217;s SLS-free toothpaste</a>, <a href="https://www.amazon.com/dp/B019J13OCQ/?tag=photomatt08-20">Orabrush cleaner</a>.</p>



<p>If you&#8217;re curious, here are the previous years: <a href="https://ma.tt/2015/01/whats-in-my-bag-2014/">2014</a>, <a href="https://ma.tt/2016/03/whats-in-my-bag-2016-edition/">2016</a>, <a href="https://ma.tt/2017/05/whats-in-my-bag-2017/">2017</a>.</p>



<p>If you have any questions please leave them in the comments!<br /></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 31 Oct 2018 03:44:13 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Matt";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:31;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:94:"WPTavern: WordPress.com and Jetpack Launch New Activity Feature for Monitoring Website Changes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85171";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:105:"https://wptavern.com/wordpress-com-and-jetpack-launch-new-activity-feature-for-monitoring-website-changes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3652:"<p><a href="https://en.blog.wordpress.com/2018/10/30/introducing-activity/" rel="noopener noreferrer" target="_blank">WordPress.com launched a new Activity feature</a> today, a tool for monitoring changes that occur on the site and actions initiated through the admin. It&#8217;s also available for Jetpack-enabled sites and the activity log can be viewed on WordPress.com or on the WordPress mobile apps. </p>
<p><a href="https://i0.wp.com/wptavern.com/wp-content/uploads/2018/10/activity-feature.png?ssl=1"><img /></a></p>
<p>Activity logs the following actions and presents them in an easy-to-read timeline on WordPress.com:</p>
<ul>
<li>Published or updated posts and pages</li>
<li>Comment submission and management activity</li>
<li>Settings and options modifications</li>
<li>Login attempts by registered site users</li>
<li>Plugin installations, updates, and removals</li>
<li>Theme switches, installations, updates, and deletions</li>
</ul>
<p>The Activity log can be useful for debugging client sites where the client cannot remember the actions they performed that changed their website. Users can also update plugins and themes directly from the activity log. </p>
<p><a href="https://i1.wp.com/wptavern.com/wp-content/uploads/2018/10/Screen-Shot-2018-10-30-at-8.02.41-PM.png?ssl=1"><img /></a></p>
<p>WordPress.com&#8217;s new Activity feature is reminiscent of XWP&#8217;s <a href="https://wordpress.org/plugins/stream/" rel="noopener noreferrer" target="_blank">Stream</a> plugin, which launched in 2013 with similar admin logging features stored locally. It offers support for multisite as well as several popular plugins, such as ACF, bbPress, BuddyPress, EDD, Gravity Forms, WooCommerce, Yoast SEO, and Jetpack. Stream hasn&#8217;t gained much traction in recent years with just 30,000 active installations. </p>
<p>In 2014, Stream&#8217;s creators explored offering <a href="https://wptavern.com/stream-morphs-from-a-plugin-into-a-service" rel="noopener noreferrer" target="_blank">Stream as a service</a> where the logs were stored in AWS and included configurable SMS notifications. The service was <a href="https://wptavern.com/stream-is-shutting-down-its-cloud-data-storage-october-1st" rel="noopener noreferrer" target="_blank">shut down in 2015</a> in favor of storing the activity logs locally due to the expense of cloud storage. Shortly after that it was acquired by XWP.</p>
<p>Automattic is also exploring offering its new Activity feature as a paid service. Currently sites on the Free plan only have access to the last 20 most recent events. Access is tiered based on the plan. Personal and Premium users have access to activities from the last 30 days and Professional users can see all activities for the past year. The ability to filter activities by type is also restricted to paid users only.</p>
<p>Jetpack site owners should note that Activity is activated by default &#8211; it&#8217;s not a module that can be turned on or off. The feature doesn&#8217;t send any new data to WordPress.com but rather offers a new interface for data that is already synced.</p>
<p>The full list of activities the feature collects, as well as privacy information related to data retention, is available for <a href="https://en.support.wordpress.com/activity/" rel="noopener noreferrer" target="_blank">WordPress.com</a> and <a href="https://jetpack.com/support/activity-log/" rel="noopener noreferrer" target="_blank">Jetpack sites</a> in the documentation for the feature. Users can report bugs to the <a href="https://github.com/Automattic/wp-calypso" rel="noopener noreferrer" target="_blank">Calypso GitHub repository</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 31 Oct 2018 03:04:32 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:32;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:111:"WPTavern: WordPress Accessibility Team Delivers Sobering Assessment of Gutenberg: “We have to draw a line.”";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85082";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:114:"https://wptavern.com/wordpress-accessibility-team-delivers-sobering-assessment-of-gutenberg-we-have-to-draw-a-line";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:9807:"<a href="https://i2.wp.com/wptavern.com/wp-content/uploads/2018/10/accessibility-team-assessment-gutenberg.jpg?ssl=1"><img /></a>photo credit: classroomcamera <a href="http://www.flickr.com/photos/155535822@N07/27792517478">DSC03657</a> &#8211; <a href="https://creativecommons.org/licenses/by/2.0/">(license)</a>
<p>WordPress&#8217; accessibility team has published a <a href="https://make.wordpress.org/accessibility/2018/10/29/report-on-the-accessibility-status-of-gutenberg/" rel="noopener noreferrer" target="_blank">statement on the level of overall accessibility of Gutenberg</a>. The team, largely a group of unpaid volunteers, collaborated on a detailed assessment that publicly challenges Gutenberg&#8217;s readiness for core in a way that no other WordPress team has done through official channels to date. After a week of testing the most recent version of the plugin, the team concluded that they cannot recommend Gutenberg to be used by anyone who relies on assistive technology.</p>
<blockquote><p>The Accessibility team – like any team in WordPress – has no specific authority over the project. Because we’re a small team of volunteers, we’ve been pragmatic in how we apply the guidelines. We have made tradeoffs in prioritization. Gutenberg is a place where we feel it is necessary to draw a line. The ability to author, edit, and publish posts is the primary purpose of WordPress.</p></blockquote>
<p>Accessibility team rep Joe Dolson, speaking on behalf of the team, cited cognitive load and complexity, inconsistent user interface behavior, heavy reliance on keyboard shortcuts, and difficulties with keyboard navigation through blocks, among other concerns about Gutenberg. He outlined an example of the keyboard sequence required to do something as simple as change the font size in a paragraph block. It currently requires 34 separate keyboard stops, and even more if the tester doesn&#8217;t have prior knowledge of how to navigate Gutenberg.</p>
<p>&#8220;Because the complexity of interaction with Gutenberg is an order of magnitude greater than in the classic editor, we believe that Gutenberg is less accessible than the existing classic editor, though it offers many great features that are not available in the current editor,&#8221; Dolson said. </p>
<p>This assessment echoes many of the common themes found in <a href="https://wordpress.org/support/plugin/gutenberg/reviews/" rel="noopener noreferrer" target="_blank">Gutenberg&#8217;s reviews on WordPress.org</a>, even among the most recent reviews of the latest version. Ratings are currently hovering at 2.3 out of 5 stars. Users have repeatedly said the interface is &#8220;<a href="https://wordpress.org/support/topic/gutenberg-is-a-clear-winner/" rel="noopener noreferrer" target="_blank">far too heavily reliant on hover based functionality</a>.&#8221; Even those without accessibility needs find it <a href="https://wordpress.org/support/topic/blocks-concept-seems-great-but-still-so-confusing/" rel="noopener noreferrer" target="_blank">confusing</a>, <a href="https://wordpress.org/support/topic/rage-inducing/" rel="noopener noreferrer" target="_blank">unintuitive</a>, and <a href="https://wordpress.org/support/topic/an-unusable-codewreck/" rel="noopener noreferrer" target="_blank">difficult to navigate content</a>. Some testers find it <a href="https://wordpress.org/support/topic/fixing-what-isnt-broken-w-broken-tools/" rel="noopener noreferrer" target="_blank">nearly impossible to do what they want to do with it</a>.</p>
<p>The positive reviews recognize the software as <a href="https://wordpress.org/support/topic/much-needed-update-2/" rel="noopener noreferrer" target="_blank">a work in progress</a> and testers seem more aware of the overall vision for the plugin. They are excited about some of the <a href="https://wordpress.org/support/topic/my-experience-with-gutenberg-the-good-and-not-so-good/" rel="noopener noreferrer" target="_blank">more advanced features that blocks offer</a>, but many positive reviewers urge WordPress to give it more time before making it the default editor.</p>
<p>The accessibility team is convinced that the main accessibility issues in Gutenberg stem from design issues. </p>
<p>&#8220;Gutenberg is the way of the future in WordPress, but the direction it has taken so far has been worrying,&#8221; Dolson said. &#8220;We do not want to miss the opportunity to build a modern and inclusive application for WordPress, but in order to achieve that goal, accessibility needs to incorporated in all design processes in the project.</p>
<p>&#8220;These problems are solvable. Retrofitting accessibility is not an effective process. It is costly in terms of time and resources.&#8221;</p>
<p>In a recent post titled <a href="https://pento.net/2018/10/26/iterating-on-merge-proposals/" rel="noopener noreferrer" target="_blank">Iterating on Merge Proposals</a>, Gary Pendergast, who is leading the merge of Gutenberg into core, acknowledged that they could have asked for the accessibility team&#8217;s help much earlier in the process. </p>
<p>&#8220;The Accessibility team should’ve been consulted more closely, much earlier in the process, and that’s a mistake I expect to see rectified as the Gutenberg project moves into its next phase after WordPress 5.0,&#8221; Pendergast said. &#8220;While Gutenberg has always aimed to prioritize accessibility, both providing tools to make the block editor more accessible, as well as encouraging authors to publish accessible content, there are still areas where we can improve.&#8221;</p>
<p>At this time there has been no official response to the accessibility team&#8217;s assessment. It does not look like it will meaningfully impact the release date, as <a href="https://wordpress.org/news/2018/10/wordpress-5-0-beta-2/" rel="noopener noreferrer" target="_blank">Beta 2</a> went out last night and RC 1 is planned for release today. If the core dev chats are any indication, contributors involved in 5.0 seem to be on board with the ambitious timeline for its release. </p>
<p>In a post titled &#8220;<a href="https://werdswords.com/accessibility-in-gutenberg-is-not-a-one-more-feature/" rel="noopener noreferrer" target="_blank">Accessibility in Gutenberg is not a one-more feature</a>,&#8221; core developer Drew Jaynes urges the project&#8217;s leadership and contributors not to compromise core accessibility standards for the sake of an expedited timeline.</p>
<p>&#8220;Please let&#8217;s not make the &#8216;new standard&#8217; be that we&#8217;re willing to ship technically accessible but perhaps not entirely usable-for-all features; let&#8217;s not define it as one that sacrifices standards core to the WordPress experience in the name of perceived expediency; let&#8217;s not define it as the new default authoring experience for all users when not all users can use it well,&#8221; Jaynes said.</p>
<p>WordPress 5.0 release lead Matt Mullenweg has frequently said the release will ship when it&#8217;s ready. He contends that the interface has been continually modified for accessibility needs throughout the process of developing Gutenberg. </p>
<blockquote class="twitter-tweet">
<p lang="en" dir="ltr">Modifying the interface to accomodate a11y is the compromise, it has been continuous throughout the process. I don't know how to achieve the imaginary bar you're setting up.</p>
<p>&mdash; Matt Mullenweg (@photomatt) <a href="https://twitter.com/photomatt/status/1055889800119508992?ref_src=twsrc%5Etfw">October 26, 2018</a></p></blockquote>
<p></p>
<p>Matthew MacPherson, Gutenberg&#8217;s accessibility lead, was not immediately available for comment on the team&#8217;s assessment. Ultimately, the decision to delay the release will fall to Mullenweg and his leadership team. The accessibility team, however, will not lend its endorsement of Gutenberg at this time:</p>
<blockquote><p>The accessibility team will continue to work to support Gutenberg to the best of our ability. However, based on its current status, we cannot recommend that anybody who has a need for assistive technology allow it to be in use on any sites they need to use at this time.</p></blockquote>
<p>Gutenberg is now 20 days away from landing in WordPress 5.0, but this does not leave enough time to solve the design and architectural issues the accessibility team has identified. They have <a href="https://core.trac.wordpress.org/ticket/44671" rel="noopener noreferrer" target="_blank">proposed a notice</a> on the 5.0 release to inform administrators of Gutenberg&#8217;s inadequacy for users of assistive technology, with a prompt to install the Classic Editor plugin. Many people with accessibility needs depend on the WordPress editor in order to do their work and will need to stick with the old interface. The proposal has been closed with a note indicating that 5.0 will point users to the Classic Editor plugin if they need it.</p>
<p>The mistake of not having consulted accessibility experts in the design phase cannot be easily rectified at this point, but the Classic Editor is still available for those who need to preserve their same workflow. The conflict lies in whether WordPress should ship a new editor that those with accessibility needs cannot immediately use. It is a somewhat painful and frustrating outcome for those users when the entire ecosystem is rapidly moving towards Gutenberg as the standard. </p>
<p>Either the accessibility and usability issues the team identified are not as bad as they purport or this document is a last-minute clarion call that could prevent WordPress from shipping an editor that excludes users who rely on assistive technology. Due to the gravity of their claims, the accessibility team&#8217;s statement on Gutenberg demands an official response.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 30 Oct 2018 19:16:07 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:33;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"Dev Blog: WordPress 5.0 Beta 2";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"https://wordpress.org/news/?p=6222";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2018/10/wordpress-5-0-beta-2/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2230:"<p>WordPress 5.0 Beta 2 is now available!</p>



<p><strong>This software is still in development,</strong>&nbsp;so we don’t recommend you run it on a production site. Consider setting up a test site to play with the new version.</p>



<p>There are two ways to test the WordPress 5.0 Beta: try the&nbsp;<a href="https://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester</a>&nbsp;plugin (you’ll want “bleeding edge nightlies”), or you can&nbsp;<a href="https://wordpress.org/wordpress-5.0-beta2.zip">download the beta here</a>&nbsp;(zip).</p>



<p>WordPress 5.0 is slated for release on&nbsp;<a href="https://make.wordpress.org/core/5-0/">November 19</a>, and we need your help to get there. Here are some of the big issues that we fixed since Beta 1:</p>



<h2>Block Editor</h2>



<p>We&#8217;ve updated to the latest version of the block editor from the Gutenberg plugin, which includes the new <a href="https://github.com/WordPress/gutenberg/pull/10209">Format API</a>, embedding improvements, and <a href="https://github.com/WordPress/gutenberg/milestone/71">a variety of bug fixes</a>.</p>



<p>Meta boxes had a few bugs, and they weren&#8217;t showing at all in the block editor, so we&#8217;ve fixed and polished there.</p>



<h2>Internationalisation</h2>



<p>We&#8217;ve added support for <a href="https://core.trac.wordpress.org/ticket/45103">registering and loading JavaScript translation files</a>.</p>



<h2>Twenty Nineteen</h2>



<p>The <a href="https://github.com/WordPress/twentynineteen">Twenty Nineteen repository</a> is a hive of activity, there have been a stack of minor bugs clean up, and some notable additions:</p>



<ul><li>There&#8217;s now a widget area in the page footer.</li><li>Navigation submenus have been implemented for mobile devices.</li><li>Customiser options have been added for changing the theme colours and feature image filters.</li></ul>



<h2>Everything Else</h2>



<p>The REST API has a couple of bug fixes and performance improvements. PHP 7.3 compatibility has been improved.</p>



<hr class="wp-block-separator" />



<p><em>We&#8217;re fixing the bugs:<br />All the ones you&#8217;ve reported.<br />Some that we&#8217;ve found, too.</em></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 30 Oct 2018 05:04:12 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:15:"Gary Pendergast";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:34;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:76:"WPTavern: php[world] 2018 to Feature Full-Day Gutenberg Development Workshop";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85120";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:85:"https://wptavern.com/phpworld-2018-to-feature-full-day-gutenberg-development-workshop";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:4715:"<p>The fourth annual <a href="https://world.phparch.com/" rel="noopener noreferrer" target="_blank">php[world]</a> conference is just two weeks away. The event is dedicated to uniting the PHP community and will be held November 14-15, 2018, in Washington, D.C. </p>
<p>This year the organizing team created a &#8220;Content Advisory Board&#8221; to ensure the event included sessions that will appeal to everyone. The board includes two WordPress Developers, two Drupal developers, and two more more general PHP developers. They reviewed all incoming talk submissions and gave organizers ideas on what they thought would be of greatest interest to each community.</p>
<p>php[world] has traditionally included several topics and speakers from the WordPress world. This year the program features a full-day training workshop on Gutenberg development led by Josh Pollock and Zac Gordon. The workshop is called <a href="https://world.phparch.com/sessions/modern-wordpress/" rel="noopener noreferrer" target="_blank">The Future of WordPress Development</a> and is available through a <a href="https://world.phparch.com/register/" rel="noopener noreferrer" target="_blank">separate day ticket</a>. </p>
<p>&#8220;We&#8217;ve always tried to focus php[world] on being the PHP conference that appeals to WordPress and Drupal developers as well,&#8221; conference co-chair Eli White said.  &#8220;We all write PHP (and JavaScript) code, and the DC area is full of WordPress and Drupal development shops. In fact, the majority of people in the local PHP user groups are doing WordPress development anyway. So we should all just be learning from each other. </p>
<p>&#8220;For WordPress, that was obviously Gutenberg. Currently the release date for WordPress 5.0 and Gutenberg is November 19th, just a few days after php[world], and so it&#8217;s a really important topic for any developer who works with WordPress to be familiar with.&#8221;</p>
<p>Workshop attendees can expect to become better acquainted with extending Gutenberg. The instructors plan to cover the basics of block creation as well as more advanced topics like making blocks dynamic and creating advanced blocks with the WordPress REST API and Redux.</p>
<p>&#8220;For the workshop, our goal is to get folks comfortable with what they could do with Gutenberg,&#8221; Josh Pollock said. &#8220;We&#8217;ll cover the anatomy of a block, and different patterns for creating simple and complex blocks. We&#8217;ll go over each of the types of block types you can create and have hands-on time to play with these new skills and ask real time questions.</p>
<p>&#8220;Developers should leave with an understanding of the different types of blocks they can build and why. They&#8217;ll also get plenty of example code, links, and advice they can use when it&#8217;s time to build blocks for their own WordPress projects.&#8221;</p>
<p>The event includes a few other sessions geared towards WordPress developers: David Wolfpaw is giving a workshop called &#8220;<a href="https://world.phparch.com/sessions/building-wordpress-themes-a-primer/" rel="noopener noreferrer" target="_blank">Building WordPress Themes: A Primer</a>&#8221; and Mo Jangda from Automattic is giving a talk on &#8220;<a href="https://world.phparch.com/sessions/handle-an-outage/" rel="noopener noreferrer" target="_blank">How to Handle a Site Outage</a>.&#8221; There is another full-day training on modern PHP security that happens the day before the Gutenberg workshop that White said the WordPress Developers on the content board urged them to include.</p>
<p>The main conference is also hosting many sessions that would benefit WordPress developers who want to sharpen their PHP skills. A few highlights include:</p>
<ul>
<li>Steve Grunwell is giving a &#8220;<a href="https://world.phparch.com/sessions/a-crash-course-in-php-namespaces-for-wordpress-developers/" rel="noopener noreferrer" target="_blank">Crash-Course in PHP Namespaces</a>.&#8221;</li>
<li>Sara Goleman, a core PHP contributor, will be talking about &#8220;<a href="https://world.phparch.com/sessions/php-now-and-tomorrow/" rel="noopener noreferrer" target="_blank">PHP: Now and Tomorrow</a>,&#8221; discussing the PHP roadmap for 7.4 and 8.0.</li>
<li>Brandon Savage is giving a two-hour workshop on &#8220;<a href="https://world.phparch.com/sessions/practical-object-oriented-design-principles/" rel="noopener noreferrer" target="_blank">Object-Oriented Design Principles</a>,&#8221; designed to be a an introduction or refresher on OOP best practices.</li>
</ul>
<p>Check out the <a href="https://world.phparch.com/schedule/" rel="noopener noreferrer" target="_blank">full schedule</a> on the php[world] website.  </p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Mon, 29 Oct 2018 22:36:35 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:35;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:79:"WPTavern: WooCommerce 3.5 Introduces REST API v3, Improves Transactional Emails";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=84995";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:89:"https://wptavern.com/woocommerce-3-5-introduces-rest-api-v3-improves-transactional-emails";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3596:"<p><a href="https://woocommerce.wordpress.com/2018/10/23/woocommerce-3-5-is-here/" rel="noopener noreferrer" target="_blank">WooCommerce 3.5</a> was released this week. It&#8217;s a minor update that has been in development since May and began testing in September. The release should be backwards compatible to version 3.0 of the plugin but users are always advised to test all of their themes and extensions before updating.</p>
<p>Store owners can expect to see a change in the copy of the default transactional emails. They have been <a href="https://github.com/woocommerce/woocommerce/pull/21288" rel="noopener noreferrer" target="_blank">updated to be friendlier and more human</a>. This is particularly important for the customer-facing emails. All of the following have been updated: on-hold, processing, completed, refunded both full and partially, invoice both with a pending and non-pending status, customer notes, password reset, new account. The default content in the store admin emails has also been improved.</p>
<p><a href="https://i1.wp.com/wptavern.com/wp-content/uploads/2018/10/payment-received.png?ssl=1"><img /></a></p>
<p>The WooCommerce team anticipates that the updates to the transactional emails will reduce the need for store owners to customize their email templates. It also gives customers a better, friendlier connection to the store. More updates to the email content editing experience are planned for 2019. </p>
<p>Store owners may also benefit from the new option to set a low stock threshold in the inventory tab for individual products, export products by category to the CSV exporter, and define custom product placeholder images that will resize to correct store aspect ratio. </p>
<p>The WooCommerce REST API continues to evolve with v3 introduced in this release. It adds new endpoints required for the <a href="https://github.com/woocommerce/wc-admin" rel="noopener noreferrer" target="_blank">wc-admin feature plugin</a>, the React-powered WooCommerce admin interface that was <a href="https://wptavern.com/the-new-woo-adopts-gutenberg-components-user-interface-driven-by-react" rel="noopener noreferrer" target="_blank">featured at last week&#8217;s WooSesh</a>. REST API v3 also adds new features to existing endpoints while maintaining backwards compatibility with legacy API versions.</p>
<p>WooCommerce 3.5 introduces support for the <a href="https://wptavern.com/woocommerce-custom-product-tables-plugin-now-in-beta-boasts-30-faster-page-loads" rel="noopener noreferrer" target="_blank">Custom Product Tables feature plugin</a>, which is being developed to improve store performance and scalability. In some cases storing product data in custom tables has brought <a href="https://woocommerce.wordpress.com/2018/07/17/woocommerce-custom-product-tables-beta/" rel="noopener noreferrer" target="_blank">30% faster page loads</a>. </p>
<p>In version 3.5 the &#8220;Preview Changes&#8221; button was <a href="https://github.com/woocommerce/woocommerce/pull/20650" rel="noopener noreferrer" target="_blank">removed from the publish meta box when editing products</a>. If you&#8217;re missing it, <a href="https://www.remicorson.com/woocommerce-3-5-bring-me-that-preview-button-back/" rel="noopener noreferrer" target="_blank">Rémi Corson published a quick CSS snippet</a> to bring it back.</p>
<p>Check out the <a href="https://woocommerce.wordpress.com/2018/10/23/woocommerce-3-5-is-here/" rel="noopener noreferrer" target="_blank">release post</a> for a full rundown of all the updates, deprecations, and template file changes in version 3.5. </p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Sat, 27 Oct 2018 02:15:47 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:36;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:41:"WPTavern: WP Engine Acquires Array Themes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85078";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:52:"https://wptavern.com/wp-engine-acquires-array-themes";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5848:"<p>WP Engine <a href="https://wpengine.com/blog/bringing-array-themes-into-the-wp-engine-family/">has acquired</a> <a href="https://arraythemes.com/">Array Themes</a> and <a href="https://atomicblocks.com/">Atomic Blocks</a> from Mike McAlister for an undisclosed amount. McAlister has been developing WordPress themes since 2009. He initially sold his themes on ThemeForest. In 2011, he founded Array Themes.</p>
<p>I reached out to McAlister to learn why he chose to be acquired, what excites him most about Gutenberg, and what the plans are going forward.</p>
<h2>Interview with Mike McAlister</h2>
<h4><strong>What ultimately made you decide to move on from managing your own theme and products company to a larger, more established company?</strong></h4>
<p>The catalyst was when Brian Gardner reached out this summer and started a conversation about joining his team at <a href="https://wpengine.com">WP Engine</a>. As I told him at the time, he certainly wasn&#8217;t the first to make that offer, but he was definitely the most interesting. I had always respected Brian&#8217;s ethos on quality and design and really enjoyed our chats over the years.</p>
<p>Once I started meeting folks at WP Engine like Jason Cohen and David Vogelpohl, it became obvious that we were all striving for the same future and outcome for customers. It just made sense to join forces to make it happen together.</p>
<p>This was also a unique opportunity for me to start fresh and focus on crafting products with a stellar team. Although I was able to create an industry-respected theme collection and recently the <a href="https://wordpress.org/plugins/atomic-blocks/">Atomic Blocks</a> plugin for Gutenberg, I wanted a new challenge. </p>
<h4><strong>Couldn&#8217;t Array Themes have been built to directly support the Genesis framework without being acquired by WP Engine?</strong></h4>
<p>It would be a lot of work to infuse the Array Themes collection and Genesis. The idea wasn&#8217;t exactly to bring Genesis to Array, rather to bring the expertise and craft of Array and Atomic Blocks to WP Engine, StudioPress and Gutenberg. </p>
<p>StudioPress already has one of the biggest and best theme collections out there and is doubling down on Gutenberg support. I&#8217;m going to contribute what I&#8217;ve learned building Array Themes and Atomic Blocks to make the StudioPress offering even better.</p>
<h4><strong>Will future themes require the Genesis framework?</strong></h4>
<p>Although there will not be any new themes released under the Array Themes brand, some of the designs will live on as <a href="https://my.studiopress.com/themes/">StudioPress themes</a> in the future and those will be powered by the Genesis framework. </p>
<p>We&#8217;re working on some really exciting new themes and features for Genesis that are going to continue making it the go-to solution for creating beautiful websites on WordPress, especially in the Gutenberg era.</p>
<h4><strong>What do you think of the consolidation of brands in the WordPress space?</strong></h4>
<p>We&#8217;re seeing a very unique and transitional time in the WordPress industry. The old way of doing things is going out the window as WordPress and its community changes before our eyes. </p>
<p>Now, more than ever, WordPress needs companies with stellar talent to help usher it through to the next era and contribute to its long term success. I&#8217;m excited to be part of a team that is willing to take on that challenge!</p>
<p>I can&#8217;t speak to the motivations of other businesses in the WordPress space, but the WP Engine acquisition of the Array product suite makes a lot of sense. </p>
<p>With their recent acquisition of StudioPress, Array Themes, and Atomic Blocks, WP Engine is showing its customers and the WordPress community that they are doubling down on quality, design, Gutenberg, and an unmatched customer experience. These are all shared qualities between these individual entities and part of the long term strategy at WP Engine.</p>
<h4><strong>What excites you most about Gutenberg?</strong></h4>
<p>I&#8217;ve been excited about Gutenberg for over a year now. I was one of the first WordPress product developers to release a <a href="https://wordpress.org/plugins/atomic-blocks/">blocks plugin</a>, a <a href="https://wordpress.org/themes/atomic-blocks/">Gutenberg-friendly theme</a>, <a href="https://atomicblocks.com/blog/">a blog with tutorials</a>, and the <a href="http://gutenberg.news/">Gutenberg News</a> site. </p>
<p>I created all of these resources as a way of learning Gutenberg as well as contributing back to the community, and I will continue to do that with WP Engine and StudioPress!</p>
<p>Gutenberg unlocks the WordPress editor and the endless opportunities that follow for content creators, developers, and everyone in between. Gutenberg is already responsible for a flood of new products and new solutions to problems the classic editor couldn&#8217;t solve and it hasn&#8217;t even been merged into core yet! </p>
<p>The reality here is that Gutenberg isn&#8217;t just the future of WordPress, it&#8217;s the future of the Internet.</p>
<h2>Discounts Available for Array Themes Customers<br /></h2>
<p>McAlister is joining WP Engine as a full-time employee. In addition, <a href="https://arraythemes.com/about/">John Parris</a>, a code wrangler for Array Themes has also joined WP Engine. </p>
<p>StudioPress and WP Engine are offering discounts to single theme and theme club members. Those who purchased a lifetime membership will receive free access to the StudioPress Pro Plus All-Theme package with support and updates.</p>
<p>To learn more about these discounts and how the acquisition came about, check out <a href="https://arraythemes.com/onward/">McAlister&#8217;s post</a> where he says thanks and farewell to his customers. </p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 26 Oct 2018 23:08:14 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:37;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:34:"Gary: Iterating on Merge Proposals";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:25:"https://pento.net/?p=2535";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:58:"https://pento.net/2018/10/26/iterating-on-merge-proposals/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5759:"<p>Developing new WordPress features as plugins has been a wonderfully valuable process for all sorts of features to come into being, from the MP6 Dashboard Redesign, to oEmbed endpoints, and including multiple Customiser enhancements over the years. Thanks to the flexibility that this model offers, folks have been able to iterate rapidly on a wide range of features, touching just about every part of WordPress.</p>



<p>The &#8220;Features as Plugins&#8221; idea was first introduced during the WordPress 3.7 development cycle, during which the features were merged after a short discussion during a core chat: it was only in the WordPress 3.8 cycle that the idea of a merge proposal post (called &#8220;Present Your Feature&#8221; back then) came into being. It was envisioned as a way to consult with WordPress leaders, key contributors, and the wider WordPress community on the readiness of this feature to be released. Ultimately, WordPress leaders would make a decision on whether the feature was right for WordPress, and the release lead would decide if it was ready for that release.</p>



<p>Since then, most feature plugins have published some form of merge proposal post before they were ultimately merged into WordPress, and they&#8217;ve nearly all benefited to some degree from this process.</p>



<p class="has-large-font-size">The merge proposal process has worked well for smaller features, but it struggled with larger changes.</p>



<p>The REST API is a great example of where the merge proposal process didn&#8217;t work. The REST API was a significant change, and trying to communicate the scope of that change within the bounds of a single merge proposal post didn&#8217;t really do it justice. It was impossible to convey everything that was changing, how it all worked together, and what it meant for WordPress.</p>



<p>I&#8217;d go so far as to say that the shortcomings of the merge proposal process are at least partially responsible for why the REST API hasn&#8217;t seen the level of adoption we&#8217;d hoped for. It&#8217;s managed to gain a moderate amount of popularity with WordPress development agencies, and a handful of plugins use it in some ways, but it never really entered into mainstream usage in the ways it could&#8217;ve.</p>



<p class="has-large-font-size">In a project that prides itself on being willing to try new ideas, the merge proposal process has remained largely static for many years.</p>



<p>Gutenberg is the first opportunity since the REST API was merged where we can examine the shortcomings of the merge proposal process, and see how we can apply the original intent of it to the Gutenberg project&#8217;s scope and long term vision.</p>



<h2>Merge Consultation</h2>



<p>Over the last six months, Gutenberg project leads have been consulting with teams across the WordPress project. Helping them get involved when they didn&#8217;t have any Gutenberg experience, explaining how their focus fit into the vision for Gutenberg, and listening to feedback on where things needed to be improved. In many circumstances, this consultation process has been quite successful: the WordPress Media and REST API teams are great examples of that. Both teams have got up to speed on the Gutenberg project, and have provided their valuable experience to make it even better.</p>



<p>That&#8217;s not to say it&#8217;s been entirely successful. There&#8217;s been a lot of discussion about Gutenberg and Accessibility recently, much of it boils down to what <a href="https://www.joedolson.com/2018/10/some-gutenberg-accessibility-clarifications/">Joe Dolson summarised</a> as being &#8220;too little, too late&#8221;. He&#8217;s correct, the Accessibility team should&#8217;ve been consulted more closely, much earlier in the process, and that&#8217;s a mistake I expect to see rectified as the Gutenberg project moves into its next phase after WordPress 5.0. While Gutenberg has always aimed to prioritise accessibility, both <a href="https://make.wordpress.org/core/2018/10/18/regarding-accessibility-in-gutenberg/">providing tools to make the block editor more accessible, as well as encouraging authors to publish accessible content</a>, there are still areas where we can improve.</p>



<p>While there&#8217;s much to be discussed following WordPress 5.0, we can already see now that different teams needed to be consulted at different points during the project. Where Gutenberg has aimed to consult with teams earlier than a previous feature plugin would&#8217;ve, we need to push that further, ensuring that teams are empowered to get involved earlier still in the process.</p>



<p class="has-large-font-size">All feature plugins in the future, great and small, will benefit from this iteration.</p>



<p>Creating a framework for more fluid feedback over the entire lifecycle of a feature project is beneficial for everyone. WordPress teams can ensure that their feedback is taken on board at the right time, project leads gain experience across the broad range of teams that work on WordPress, and projects themselves are able to produce a better resulting feature.</p>



<p>They important thing to remember throughout all of this is that everything is an experiment. We can try an approach, discover the weaknesses, and iterate. We&#8217;re all only human, we all make mistakes, but every mistake is an opportunity to ensure the same mistake can&#8217;t happen again. Sometimes that means changing the software, and sometimes that means changing the processes that help build the software. Either way, we&#8217;re always able to iterate further, and make WordPress fun for everyone. <img src="https://s.w.org/images/core/emoji/11/72x72/1f642.png" alt="🙂" class="wp-smiley" /></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 26 Oct 2018 03:30:06 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:4:"Gary";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:38;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:82:"WPTavern: WPWeekly Episode 335 – Introduction to BigCommerce with Topher DeRosia";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:58:"https://wptavern.com?p=85070&preview=true&preview_id=85070";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:89:"https://wptavern.com/wpweekly-episode-335-introduction-to-bigcommerce-with-topher-derosia";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1798:"<p>In this episode, <a href="http://jjj.me">John James Jacoby</a> and I are joined by <a href="https://topher1kenobe.com/">Topher DeRosia</a>, a developer evangelist for <a href="https://www.bigcommerce.com/">BigCommerce</a>. DeRosia introduces what BigCommerce is, why users and developers should take a look at it, and why they&#8217;re making a big push into the WordPress space. He also provides an update on HeroPress and why next year, you&#8217;ll be seeing him at a lot more WordPress events.</p>
<h2>Stories Discussed:</h2>
<p><a href="https://wptavern.com/polldaddy-rebrands-to-crowdsignal" rel="bookmark">Polldaddy Rebrands to Crowdsignal</a><br />
<a href="https://wptavern.com/the-new-woo-adopts-gutenberg-components-user-interface-driven-by-react" rel="bookmark">The New Woo Adopts Gutenberg Components, User Interface Driven by React</a><br />
<a href="https://wptavern.com/gutenberg-team-addresses-accessibility-concerns-highlights-tools-and-features-that-surpass-the-classic-editor" rel="bookmark">Gutenberg Team Addresses Accessibility Concerns, Highlights Tools and Features that Surpass the Classic Editor</a></p>
<h2>WPWeekly Meta:</h2>
<p><strong>Next Episode:</strong> Wednesday, October 31st 3:00 P.M. Eastern</p>
<p>Subscribe to <a href="https://itunes.apple.com/us/podcast/wordpress-weekly/id694849738">WordPress Weekly via Itunes</a></p>
<p>Subscribe to <a href="https://www.wptavern.com/feed/podcast">WordPress Weekly via RSS</a></p>
<p>Subscribe to <a href="http://www.stitcher.com/podcast/wordpress-weekly-podcast?refid=stpr">WordPress Weekly via Stitcher Radio</a></p>
<p>Subscribe to <a href="https://play.google.com/music/listen?u=0#/ps/Ir3keivkvwwh24xy7qiymurwpbe">WordPress Weekly via Google Play</a></p>
<p><strong>Listen To Episode #335:</strong><br />
</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 25 Oct 2018 20:06:35 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:39;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:78:"WPTavern: WPCampus is Pursuing an Independent Accessibility Audit of Gutenberg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=85035";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:89:"https://wptavern.com/wpcampus-is-pursuing-an-independent-accessibility-audit-of-gutenberg";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:11736:"<p>WPCampus is looking to hire a company to perform an accessibility audit of the Gutenberg editor. The organization is a community of more than 800 web professionals, educators, and others who work with WordPress in higher education. WPCampus director Rachel Cherry <a href="https://wpcampus.org/2018/10/gutenberg-a11y-audit-rfp/" rel="noopener noreferrer" target="_blank">published a request for proposals</a> detailing the organization&#8217;s specific concerns:</p>
<blockquote><p>Our organization is sensitive to the legal requirements set by <a href="https://section508.gov/" rel="noopener noreferrer" target="_blank">Section 508 of the Rehabilitation Act</a>. The recent 508 refresh brought these requirements in line with <a href="https://www.w3.org/WAI/standards-guidelines/wcag/" rel="noopener noreferrer" target="_blank">WCAG 2.0 level AA</a>, an industry standard that helps ensure accessibility. WCAG 2.0 is also <a href="https://www.w3.org/WAI/policies/" rel="noopener noreferrer" target="_blank">commonly used as a baseline for policies</a> governing many WPCampus participants outside the United States, with the <a href="https://www.w3.org/blog/2018/09/wcag-2-1-adoption-in-europe/" rel="noopener noreferrer" target="_blank">European Union already moving to WCAG 2.1</a>.</p></blockquote>
<p>The audit is aimed at determining potential legal risk for institutions upgrading to WordPress 5.0 and will also identify specific challenges that Gutenberg introduces for assistive technology users and others with accessibility needs.</p>
<p>WPCampus is funding the audit and is not soliciting contributions from the community at this time. However, Pagely has <a href="https://twitter.com/Pagely/status/1055289065883365377" rel="noopener noreferrer" target="_blank">offered to donate $1,000 to the organization</a> in order to offset the costs of the audit.</p>
<p>&#8220;Contributions wise, at this point, we’d love for folks to share to help ensure we receive a wide variety of proposals,&#8221; Cherry said. WPCampus will publish the results of the audit to share with the greater WordPress community. </p>
<p>&#8220;Beyond our institutions’ legal obligations, colleges and universities worldwide have committed to providing an accessible digital experience to their diverse communities,&#8221; Cherry said. &#8220;This is consistent with the broader culture of higher education, which values inclusivity and an exchange of ideas free from artificial barriers.</p>
<p>&#8220;While the WordPress accessibility coding standards require new code to meet WCAG 2.0 AA, the new editor has not received a full accessibility audit. Lacking such an audit, the overall accessibility of Gutenberg is unclear. This makes it difficult for colleges and universities to determine the best course of action once WordPress 5.0 is released with Gutenberg as the default editor.&#8221;</p>
<h3>The Accessibility Team is Preparing a Statement on Gutenberg&#8217;s Current Level of Accessibility</h3>
<p>Accessibility has been one of the most pressing concerns regarding Gutenberg&#8217;s readiness for the world. The accessibility team met Monday and established a new weekly meeting time:&nbsp;15:00 UTC on Fridays. They discussed a communication plan for&nbsp;Gutenberg accessibility feedback, particularly in regards to&nbsp;Matthew<a href="https://make.wordpress.org/core/2018/10/19/call-for-testers-community-gutenberg-accessibility-tests/"> MacPherson&#8217;s call for accessibility testing</a> on the plugin. User testing was conducted in March but a lot has changed since then. MacPherson has called for another round of tests from the community after <a href="https://wptavern.com/gutenberg-accessibility-audit-postponed-indefinitely" rel="noopener noreferrer" target="_blank">Automattic decided to forego his proposed independent audit</a> on Gutenberg.</p>
<p>The discussion became somewhat contentious after Gutenberg phase 2 lead Riad Benguella urged the accessibility team not to make its assessment in comparison to the classic editor but instead look at the larger picture.</p>
<p>&#8220;Gutenberg is meant for the whole site editing (even if it’s not at the moment) which means it’s the customizer + editor + menus + widgets at the same time,&#8221; Benguella said. &#8220;Just compare apples to apples, please, and if you see Gutenberg as an editor, you missed it. For the sake of iteration, it’s being shipped as an editor for now.&#8221;</p>
<p>Several members of the accessibility team took issue with statement because Gutenberg will replace the classic editor in WordPress 5.0 (even if users can bring it back with a plugin).</p>
<p>&#8220;It is <em>crucial</em> we compare these two experiences, because the one completely replaces the other,&#8221; Joe Dolson said. &#8220;It doesn’t matter that the new editor aims to do a lot more, it still must accomplish the same tasks effectively.&#8221;</p>
<p>Amanda Rush, a blind WordPress user and accessibility specialist, concurred with Dolson&#8217;s assessment.</p>
<p>&#8220;As someone trying to use Gutenberg as it currently stands with a screen reader, I promise you that future goals for the project are the absolute furthest thing away from my brain at the time,&#8221; Rush said.</p>
<p>&#8220;Let’s put it this way. Imagine that you are someone who must use assistive technology, or is otherwise reliant on something to do with Accessibility, and you have Gutenberg in front of you and you are trying to accomplish a task. Right now, the only task you can accomplish is writing or editing a post. So, as you are becoming more and more frustrated with the state of things, and trying to get your work done at the same time, imagine what it would be like if someone walked up to you in the middle of this frustrating experience and said well, if you’re calling as an editor you’ve missed it. Because this is going to be so much more than that. That is completely useless, doesn’t have any bearing on what you were trying to accomplish at the time, and promises, whether fairly or not, just more frustration down the road.&#8221;</p>
<p><a href="https://wptavern.com/wordpress-5-0-beta-1-now-available-for-testing" rel="noopener noreferrer" target="_blank">Beta 1</a> has arrived before the next round of accessibility testing has been completed, and Gutenberg has only recently arrived at UI freeze within the last week. The accessibility team is collaborating on a detailed article with a general and professional statement on the level of overall accessibility in Gutenberg. They plan to publish the statement on Friday.</p>
<p>In the meantime, WPCampus has taken it upon themselves to spearhead an independent audit to determine if Gutenberg is in compliance with the industry standard WCAG 2.0 level AA, a standard which the accessibility team <a href="https://wptavern.com/wordpress-adopts-accessibility-coding-standards-for-all-new-and-updated-code" rel="noopener noreferrer" target="_blank">adopted as a requirement for all new or updated code released in WordPress</a>. WPCampus&#8217; submission deadline for proposals is November 7, and the organization will select a vendor by November 30. The goal is to release the audit no later than January 17, 2019. </p>
<p>The timeline WPCampus has identified would not deliver results in time to meaningfully impact WordPress 5.0&#8217;s release date. As Gutenberg has already been merged into core, it seems neither the accessibility team&#8217;s assessment nor an independent third-party audit would be considered a factor in delaying the release. </p>
<p>&#8220;The goal with the timeline is to allow adequate time to do it right,&#8221; Cherry said. </p>
<p>The WordPress community has responded positively to this independent effort to get more information on Gutenberg&#8217;s accessibility issues. </p>
<p>&#8220;I&#8217;m excited for this process as an example of how the community can tackle large tasks like this in creative ways,&#8221; Jeremy Felt <a href="https://twitter.com/jeremyfelt/status/1055176432861634560" rel="noopener noreferrer" target="_blank">said</a> in response to WPCampus&#8217; taking the initiative to get an audit. &#8220;It also has an opportunity to provide great insight and instruction on the accessibility of a complex React application with many interacting pieces.&#8221;</p>
<blockquote class="twitter-tweet">
<p lang="en" dir="ltr">This <a href="https://twitter.com/hashtag/Gutenberg?src=hash&ref_src=twsrc%5Etfw">#Gutenberg</a> / <a href="https://twitter.com/hashtag/WordPress?src=hash&ref_src=twsrc%5Etfw">#WordPress</a> <a href="https://twitter.com/hashtag/accessibility?src=hash&ref_src=twsrc%5Etfw">#accessibility</a> audit, spearheaded by <a href="https://twitter.com/wpcampusorg?ref_src=twsrc%5Etfw">@wpcampusorg</a>, is exciting. Now that we power 32% of the web, we need independent verification that we're doing it right, building a better web. <a href="https://t.co/cXRwcXWQlN">https://t.co/cXRwcXWQlN</a></p>
<p>&mdash; Morten Rand-Hendriksen (@mor10) <a href="https://twitter.com/mor10/status/1055506088567627776?ref_src=twsrc%5Etfw">October 25, 2018</a></p></blockquote>
<p></p>
<p>Accessibility is part of <a href="https://wordpress.org/about/" rel="noopener noreferrer" target="_blank">WordPress&#8217; stated mission</a>: &#8220;WordPress is software designed for everyone, emphasizing accessibility, performance, security, and ease of use.&#8221; The <a href="https://wordpress.org/about/accessibility/" rel="noopener noreferrer" target="_blank">accessibility pages</a> on the project&#8217;s website advertise WordPress as committed to ensuring all new and updated code conforms with WordPress Accessibility Coding Standards. Many in the community have expressed concern that if WordPress 5.0 ships a critically inaccessible new editor, it will be violating both its stated mission and its standards.</p>
<p>A great deal of friction has surrounded Gutenberg&#8217;s journey towards becoming an accessible tool for millions of users. The struggle has highlighted areas where the WordPress project can improve its collaboration across teams. It has inspired many to <a href="https://twitter.com/mor10/status/1054962217022640128" rel="noopener noreferrer" target="_blank">share</a> their personal stories and some have even <a href="https://twitter.com/ryanwelcher/status/1055158337057239040" rel="noopener noreferrer" target="_blank">pledged</a> to <a href="https://jonathandesrosiers.com/2018/10/accessibility-a-developers-pledge/" rel="noopener noreferrer" target="_blank">ramp up their accessibility contributions</a>.</p>
<p>Many contributors were disappointed after Automattic decided to forego the independent accessibility audit on Gutenberg, given the company&#8217;s strong messaging about their passion for inclusive design. However, one positive outcome is that the company is now looking to <a href="https://automattic.com/work-with-us/product-designer-accessibility/" rel="noopener noreferrer" target="_blank">hire a product designer who specializes in accessibility</a>. </p>
<p>Rian Rietveld&#8217;s <a href="https://wptavern.com/wordpress-accessibility-team-lead-resigns-cites-political-complications-related-to-gutenberg" rel="noopener noreferrer" target="_blank">resignation from the accessibility team</a> was a great loss for the project but it served as a catalyst to bring more visibility to the efforts of WordPress&#8217; accessibility contributors. WPCampus&#8217; initiative to get an accessibility audit for Gutenberg is one example of how the community is rallying around the accessibility team and working to help make the new editor a success for all users, including those with accessibility needs.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 25 Oct 2018 19:53:31 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:40;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:56:"WPTavern: WordPress 5.0 Beta 1 Now Available for Testing";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=84914";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:67:"https://wptavern.com/wordpress-5-0-beta-1-now-available-for-testing";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2404:"<p>WordPress 5.0 is marching forward with <a href="https://wordpress.org/news/2018/10/wordpress-5-0-beta-1/">beta 1 released</a> this evening. Major items that need testing include the Gutenberg editor, the new Twenty Nineteen default theme, and all previous default themes, which have been updated to be compatible with the new editor.</p>
<p>You&#8217;ll want to make sure you are using Gutenberg version 4.1 before updating your site to WordPress 5.0 beta 1. Gutenberg is now considered feature complete as of the <a href="https://make.wordpress.org/core/2018/10/19/whats-new-in-gutenberg-19th-october/">4.1 release</a>. It is active on more than 580,000 installations.</p>
<p>WordPress 5.0 beta 1 has arrived five days after its expected release on October 19. Contributors expressed concern in today&#8217;s dev chat over the large number of issues on GitHub in milestones related to 5.0.</p>
<p>Gary Pendergast, who is responsible for leading the merge, said the dates for RC can be changed if necessary.</p>
<p>&#8220;We can shift RC if we need to, which won’t necessarily affect the final release date,&#8221; Pendergast said. &#8220;If we have to shift RC a long way, that would be a good time to have another look at the release date.&#8221;</p>
<p>The Gutenberg team has not published a merge proposal to date. In September, Pendergast <a href="https://wordpress.slack.com/archives/C02RQBWTW/p1537994851000100">said</a> &#8220;the Gutenberg leads are ultimately responsible for the merge proposal&#8221; but the timeline was still to be determined. Unless a proposal is forthcoming, the project seems to have bypassed this stage, which has frequently been a requirement for new themes, APIs, and feature plugins in the past.</p>
<p>Volunteers contributing to the Gutenberg handbook met for the first time today in the #core-docs channel. Chris Van Patten is coordinating the documentation effort to clean up and prepare Gutenberg-related docs for 5.0 over the next  five weeks.</p>
<p>Testers are advised to <a href="https://core.trac.wordpress.org/tickets/major">consult the list of known bugs</a> before reporting to the <a href="https://wordpress.org/support/forum/alphabeta">Alpha/Beta forum</a> or <a href="https://make.wordpress.org/core/reports/">filing a bug on trac</a>.</p>
<p>If this release stays on schedule, Gutenberg is now 26 days away from shipping in WordPress 5.0.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 25 Oct 2018 00:35:57 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:41;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:30:"Dev Blog: WordPress 5.0 Beta 1";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:34:"https://wordpress.org/news/?p=6209";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:56:"https://wordpress.org/news/2018/10/wordpress-5-0-beta-1/";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3698:"<p>WordPress 5.0 Beta 1 is now available!</p>



<p><strong>This software is still in development,</strong>&nbsp;so we don’t recommend you run it on a production site. Consider setting up a test site to play with the new version, and if you are using an existing test site be sure to update the Gutenberg plugin to v4.1. </p>



<p>There are two ways to test the WordPress 5.0 beta: try the&nbsp;<a href="https://wordpress.org/plugins/wordpress-beta-tester/">WordPress Beta Tester</a>&nbsp;plugin (you’ll want “bleeding edge nightlies”), or you can&nbsp;<a href="https://wordpress.org/wordpress-5.0-beta1.zip">download the beta here</a>&nbsp;(zip).</p>



<p>WordPress 5.0 is slated for release on&nbsp;<a href="https://make.wordpress.org/core/5-0/">November 19</a>, and we need your help to get there. Here are some of the big items to test so we can find as many bugs as possible in the coming weeks.</p>



<h2>The Block Editor</h2>



<p>The new Gutenberg block editor is now the default post editor!</p>



<p>The block editor provides a modern, media-rich editing experience. You can create flexible, beautiful content without writing a single line of code, or you can dive into the <a href="https://wordpress.org/gutenberg/handbook/">modern programming APIs</a> that the block editor provides.</p>



<p>Even before you install WordPress 5.0, you can <a href="https://wordpress.org/gutenberg/">try the block editor here</a>.</p>



<p>Of course, we recognise you might not be ready for this change quite yet. If that&#8217;s the case, you can install the <a href="https://wordpress.org/plugins/classic-editor/">Classic Editor plugin</a> now, which will keep the editor you&#8217;re familiar with as the default, even after you upgrade to WordPress 5.0.</p>



<h2>Twenty Nineteen</h2>



<p>Along with the new block editor, we have a new default theme, called Twenty Nineteen, which takes advantage of the new features the block editor provides.</p>



<p>You can read more about Twenty Nineteen in its <a href="https://make.wordpress.org/core/2018/10/16/introducing-twenty-nineteen/">introduction post</a>, and follow along with development over on the <a href="https://github.com/WordPress/twentynineteen">GitHub repository</a>.</p>



<h2>Default Themes</h2>



<p>Of course, we couldn&#8217;t release a beautiful new default theme, and leave all of our old ones behind. All the way back to Twenty Ten, we&#8217;ve updated every default them to look good in the new block editor.</p>



<h2>How to Help</h2>



<p>Do you speak a language other than English? <a href="https://translate.wordpress.org/projects/wp/dev">Help us translate WordPress into more than 100 languages!</a> <strong>A known issue</strong>: the block autocompleter fails for blocks whose names contain  characters in non-Latin scripts. Adding blocks via the plus sign works, and this bug is fixed in the Gutenberg 4.1 plugin. <img src="https://s.w.org/images/core/emoji/11/72x72/1f642.png" alt="🙂" class="wp-smiley" /></p>



<p><strong><em>If you think you’ve found a bug</em></strong><em>, you can post to the&nbsp;</em><a href="https://wordpress.org/support/forum/alphabeta"><em>Alpha/Beta area</em></a><em>&nbsp;in the support forums. We’d love to hear from you! If you’re comfortable writing a reproducible bug report,&nbsp;</em><a href="https://make.wordpress.org/core/reports/"><em>file one on WordPress Trac</em></a><em>, where you can also find&nbsp;</em><a href="https://core.trac.wordpress.org/tickets/major"><em>a list of known bugs</em></a><em>.</em></p>



<hr class="wp-block-separator" />



<p><em>Minor bug fixes<br />Add up one by one by one<br />Then you change the world</em></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 24 Oct 2018 21:59:04 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:15:"Gary Pendergast";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:42;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:71:"WPTavern: WCEU Team is Working on PWA Support for All WordCamp Websites";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=84992";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:82:"https://wptavern.com/wceu-team-is-working-on-pwa-support-for-all-wordcamp-websites";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:3605:"<p><a href="https://i2.wp.com/wptavern.com/wp-content/uploads/2018/06/venue-map.png?ssl=1"><img /></a>WordCamp Europe&#8217;s new PWA (Progressive Web App) was one of the highlights of the 2018 event in Belgrade. It allowed attendees to view the schedule, venue map, create bookmarks for sessions, and provided offline access in case of network failure. Attendees could add the app to their home screens and opt to receive push notifications for important updates about the event.</p>
<p>The first iteration of the PWA was not ready to be scaled for use at other WordCamps across the community, but <a href="https://make.wordpress.org/community/2018/10/23/progressive-web-app-for-wordcamps/">volunteers from the WCEU organizing team are working towards that goal</a>.&nbsp; The app was originally built using React on the frontend and was hosted on a node server. It used WordPress for content management on the backend, along with the&nbsp;<a href="https://wordpress.org/plugins/wp-pwa/">WordPress PWA</a>&nbsp;plugin and&nbsp;<a href="https://wordpress.org/plugins/onesignal-free-web-push-notifications/">OneSignal Push Notifications</a>. The team working on scaling the app for use at other WordCamps is still debating the technologies they will use moving forward.</p>
<p>Hugh Lashbrooke <a href="https://make.wordpress.org/community/2018/10/23/progressive-web-app-for-wordcamps/">posted</a> about the app&#8217;s progress and invited the community to contribute to <a href="https://github.com/wceu/pwa">WCEU&#8217;s PWA repository</a> on GitHub.&nbsp;</p>
<p>&#8220;The next stage in the process is for the WCEU Design team to create some designs and wireframes for what the app could look like, posting them for feedback,&#8221; Lashbrooke said. &#8220;We will keep posting updates here as things progress; for now it would be helpful to gather some input from other WordCamp organizers.&#8221;</p>
<p>Lashbrooke said the goal is that each WordCamp site will have its own PWA so the app is unique for each camp. Since it loads in a mobile browser, it doesn&#8217;t require additional app installations.</p>
<p>Weston Ruter, one of the collaborators on the <a href="https://github.com/xwp/pwa-wp/">PWA for WordPress</a> feature plugin, emphasized in the comments that the PWA should not be separate from the main site and that users need not even know about the app.</p>
<p>&#8220;After all, a PWA is just a website,&#8221; Ruter said.&nbsp;&nbsp;&#8220;A PWA does not have to be installed to their homescreen to take advantage of PWA capabilities. They just continue go to their WordCamp website as they do normally, except that it also works when they are offline. The interactive schedule is important, but it’s not really PWA territory: rather it’s just a JavaScript component used on a page.&#8221;</p>
<p>Ruter encouraged those working on the app to view it as a progressive enhancement on top of the existing WordCamp sites, not an entirely separate application. Ideally it will use the same style and theme used on the main website.</p>
<p>Lashbrooke asked for developers and WordCamp organizers to leave feedback and feature requests in the comments of his <a href="https://make.wordpress.org/community/2018/10/23/progressive-web-app-for-wordcamps/">post</a>. Requests submitted so far include a &#8220;you are here&#8221; feature and the capability for users to log in with their WordPress.org account to sync schedule favorites across devices. Not every feature request will make it into the first version, but the team will consult the list for future versions of the project.</p></p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 24 Oct 2018 15:08:26 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:43;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:65:"WPTavern: New Plugin Adds Elementor Templates as Gutenberg Blocks";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=84998";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:76:"https://wptavern.com/new-plugin-adds-elementor-templates-as-gutenberg-blocks";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:5217:"<p>One of the most pressing concerns for users in the Gutenberg era is how page builder plugins will respond. Speculation about the new editor &#8220;killing off page builders&#8221; has run rampant, but these plugins are slowly evolving ahead of Gutenberg&#8217;s imminent inclusion in WordPress 5.0.</p>
<p>In February, <a href="https://wordpress.org/plugins/elementor/" rel="noopener noreferrer" target="_blank">Elementor</a>, one of WordPress&#8217; most popular page builders, <a href="https://elementor.com/blog/upcoming-elementor-v2/" rel="noopener noreferrer" target="_blank">announced</a> the plugin would be completely compatible with Gutenberg beginning with its 2.0 version that was released a few months later. Like many other plugins, that meant a nominal compatibility without any custom blocks built specifically for the new editor.</p>
<p>This week marks a major milestone for the page builder, as Elementor <a href="https://elementor.com/blog/blocks-for-gutenberg/" rel="noopener noreferrer" target="_blank">introduced</a> its new <a href="https://wordpress.org/plugins/block-builder/" rel="noopener noreferrer" target="_blank">Elementor Blocks for Gutenberg</a> plugin. The plugin goes beyond basic compatibility, allowing users to insert any Elementor template into Gutenberg with one click. Its custom block functions as a pipeline to the Elementor library, pulling in content and designs the user has already created in the Elementor interface.</p>
<p><a href="https://i1.wp.com/wptavern.com/wp-content/uploads/2018/10/Screen-Shot-2018-10-23-at-9.29.14-PM.png?ssl=1"><img /></a></p>
<p>Elementor Blocks for Gutenberg lets users compose with the new editor while maintaining convenient access to items designed in the page builder. It makes it possible to bring more advanced layouts into Gutenberg and preview them inside the editor. Users can select from more than 300+ pre-designed blocks and 100+ pre-designed pages. The plugin will eventually be incorporated into Elementor&#8217;s core plugin.</p>
<p>The availability of this new plugin demonstrates Elementor&#8217;s commitment to evolving with WordPress as it adopts the editor and tackles customization in Phase 2. The page builder has more than a million active installations and a 4.8-star average on WordPress.org. Achieving this level of success in the page builder market has required a certain level of tenacity and perseverance. Elementor CMO Ben Pines made it clear their product is not going to be sidelined by Gutenberg.</p>
<p>&#8220;Elementor was launched in a saturated market, with many page builder and website builder alternatives,&#8221; Pines said. &#8220;We managed to become the leaders of our market by offering the best solution, and we plan to continue to lead the way. We will continue in our mission in full collaboration with WordPress.&#8221;</p>
<p>Elementor and Gutenberg share similar goals in helping WordPress users design their websites without having to touch the code. Pines also emphasized the benefits for developers.</p>
<p>&#8220;Elementor, Gutenberg, and the veer towards code-free website customization, presents a huge improvement for developers,&#8221; he said.</p>
<p>&#8220;Instead of being tied up in endless menial tasks like button or headline customization, and having to hand-hold the designer every step of the process – developers can now focus on greater challenges.</p>
<p>&#8220;This improvement creates a positive loop. Developers have time to build more tools, which in turn help the designers workflow.&#8221;</p>
<p>Other popular page builder plugins, like <a href="https://www.elegantthemes.com/blog/theme-releases/divi-feature-update-introducing-initial-gutenberg-support" rel="noopener noreferrer" target="_blank">Divi Builder</a> (500k+ installs) and <a href="https://kb.wpbeaverbuilder.com/article/588-how-beaver-builder-works-with-gutenberg" rel="noopener noreferrer" target="_blank">Beaver Builder</a> (500k+ installs), have announced initial support for Gutenberg but in both instances this constitutes a button that lets users toggle between the builder and the new editor.</p>
<p>Elementor is leading the way among page builders by making its content available inside Gutenberg. It essentially builds in an extra step so users can continue with their existing workflow in the page builder and insert those designs into the new editor.</p>
<p>Gutenberg&#8217;s current customization capabilities pale in comparison to what popular page builders offer, but phase 2 of the project may precipitate another avalanche of blocks pouring into the WordPress ecosystem &#8211; the same way it did after Gutenberg&#8217;s roadmap was unveiled in June at WordCamp Europe.</p>
<p>Page builders may not reproduce all of their exiting features in custom blocks until WordPress core is more advanced on its road to Gutenberg-powered customization. This would split the creation interface across two admin screens. At some point users may want to see a deeper integration between the editor and page building capabilities. The exciting thing about Elementor&#8217;s new blocks plugin is that its users don&#8217;t have to choose between Gutenberg and their favorite page builder.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Wed, 24 Oct 2018 03:58:53 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:44;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:56:"WPTavern: Upcase Developer Learning Platform is Now Free";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=84859";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:67:"https://wptavern.com/upcase-developer-learning-platform-is-now-free";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:1943:"<p><a href="https://i0.wp.com/wptavern.com/wp-content/uploads/2018/10/upcase-thoughtbot.png?ssl=1"><img /></a></p>
<p><a href="https://thoughtbot.com/upcase" rel="noopener noreferrer" target="_blank">Upcase</a>, a subscription learning platform for developers, is now free and open to the public. The content, which includes workshops, videos, flash cards, and coding exercises, was built by <a href="https://thoughtbot.com/" rel="noopener noreferrer" target="_blank">thoughtbot</a>, a design and development consultancy.</p>
<p>&#8220;We’ve loved building Upcase, both as a business and as a way to share what we’ve learned with the community,&#8221; thoughtbot development director Chris Toomey said. &#8220;But while we’d love to keep investing in Upcase and producing tons of new content, we’ve been moving in a different direction—back to our roots, in fact, as we focus on our core consulting business.&#8221;</p>
<p>Thoughtbot employees work four days a week and Friday is devoted to learning new skills, working on open source, blogging, and other projects. The company found there was a lack of quality learning resources for intermediate and advanced topics, so they built Upcase with the content they wished had existed. Topics and courses include Git, intro to React, React Native, Unit Testing JavaScript, Ruby on Rails, Haskell, workflow and developer tooling, and techniques and patterns for building maintainable large scale applications.</p>
<p>Upcase creators said they have seen thousands of customers improve their skills and gain new levels in their careers since launching the site in 2012. The consultancy has created hundreds of hours of videos and screencasts based on their collective expertise. To start on any of the <a href="https://thoughtbot.com/upcase" rel="noopener noreferrer" target="_blank">Upcase</a> learning &#8220;trails&#8221; you can sign in with your GitHub credentials for free access.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 23 Oct 2018 15:10:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:45;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:43:"WPTavern: Polldaddy Rebrands to Crowdsignal";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=84964";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:54:"https://wptavern.com/polldaddy-rebrands-to-crowdsignal";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2040:"<p>Polldaddy&nbsp;was founded in 2006 by David Lenehan in Sligo, Ireland and was <a href="http://blog.polldaddy.com/2008/10/15/automattic-acquires-polldaddy/">acquired by Automattic</a> in 2008. Polldaddy is a platform agnostic service providing users with the ability to create polls and surveys.</p>
<div class="wp-block-image">
<img />Crowdsignal Logo
</div>
<p>Today, 12 years later, Automattic is <a href="https://blog.polldaddy.com/2018/10/18/introducing-crowdsignal/">retiring the Polldaddy</a> name and replacing it with Crowdsignal. Outside of some minor color changes, and updated graphics, the service will largely remain the same. </p>
<p>Redirects are in place so that bookmarked links to edit surveys, polls, and quizzes will continue to work. Beginning October 24th, visitors to Polldaddy.com will be redirected to Crowdsignal.com.</p>
<p>There are a few notable changes to keep in mind regarding the transition. The Polldaddy dashboard will automatically redirect to the Crowdsignal version. Polldaddy&#8217;s API will live on <a href="https://api.crowdsignal.com/v1/">https://api.crowdsignal.com/v1/</a> instead of <a href="https://api.polldaddy.com/">https://api.polldaddy.com/</a>. Surveys and quizzes will be served from survey.fm and polls will be served from poll.fm.&nbsp; </p>
<p>According to Donncha Ó Caoimh, some networks and hosts may need to whitelist the following domains to prevent interruptions in service. The domains are:</p>
<ul>
<li>api.crowdsignal.com</li>
<li>app.crowdsignal.com</li>
<li>crowdsignal.com</li>
<li>survey.fm</li>
<li>poll.fm</li>
</ul>
<p>Surveys, quizzes, and polls that are embedded will continue to function normally. </p>
<p>It&#8217;s the end of an era for the Polldaddy name but what the announcement doesn&#8217;t include is <a href="https://twitter.com/jeffr0/status/1053013327834681344">why the rebranding was necessary</a>. Whatever the reasons are for rebranding, Crowdsignal is a more accurate way to describe what the service provides without being tied to a gender. </p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Tue, 23 Oct 2018 02:48:36 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:46;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:115:"WPTavern: Genesis Framework and StudioPress Themes Add Gutenberg Compatibility, More Gutenberg Features Coming Soon";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=84464";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:125:"https://wptavern.com/genesis-framework-and-studiopress-themes-add-gutenberg-compatibility-more-gutenberg-features-coming-soon";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2380:"<p>After <a href="https://wptavern.com/wp-engine-acquires-studiopress" rel="noopener noreferrer" target="_blank">WP Engine acquired StudioPress</a> in June, the company began investing in expanding the Genesis team. WP Engine is hiring new people to work on the <a href="https://wpengine.com/themes/genesis-framework/" rel="noopener noreferrer" target="_blank">framework</a> and expand support and community activities.</p>
<p>On the latest episode of the newly revived <a href="https://studiopress.blog/studiopressfm-season2/" rel="noopener noreferrer" target="_blank">StudioPress.fm</a> podcast, StudioPress founder Brian Gardner said one of the reasons he sold the company was because he needed outside help to take it where it needed to go in the Gutenberg era. The Genesis community has nothing to worry about when the new editor launches in WordPress 5.0, because <a href="https://wpengine.com/blog/gutenberg-believe-in-beauty-of-dreams/" rel="noopener noreferrer" target="_blank">StudioPress has already made its framework and themes Gutenberg-ready</a>.</p>
<p>&#8220;With regards to Genesis, the good news is that it has no substantial backwards-compatibility issues with Gutenberg,&#8221; WP Engine CTO Jason Cohen said. &#8220;The main focus of updates to the StudioPress themes are focused on adding styles for the new Gutenberg blocks. However, what we’re most excited about are the brand new features we will be adding to Genesis and the StudioPress themes, that Gutenberg helps enable.&#8221;</p>
<p>Cohen said the Genesis community can expect their entire product line to become Gutenberg-first themes that add new features to enhance users&#8217; experience in the editor.</p>
<p>&#8220;Beyond just being &#8216;compatible,&#8217; Genesis will play a big role in being Gutenberg-First,&#8221; Cohen said. &#8220;That means not only supporting the software and ideals of Gutenberg, but using them for new features. In doing so, it’s our intention to light the way for the countless agencies and developers who use WordPress to fuel incredible digital experiences that are made even easier with Gutenberg.&#8221;</p>
<p>Cohen said WP Engine will update all StudioPress themes to include additional features for Gutenberg once the new editor launches in WordPress 5.0. If the release stays on its current schedule, users can expect to see 5.0 on November 19.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 19 Oct 2018 22:41:21 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:47;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:120:"WPTavern: Gutenberg Team Addresses Accessibility Concerns, Highlights Tools and Features that Surpass the Classic Editor";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=84857";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:130:"https://wptavern.com/gutenberg-team-addresses-accessibility-concerns-highlights-tools-and-features-that-surpass-the-classic-editor";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:8021:"<p>The Gutenberg team has officially <a href="https://make.wordpress.org/core/2018/10/18/regarding-accessibility-in-gutenberg/" rel="noopener noreferrer" target="_blank">responded to recent concerns about the new editor&#8217;s accessibility</a>. Matias Ventura, the project&#8217;s technical lead, published a post with examples of the accessibility efforts the team has made, many which may not be easy to discover. These include features such as keyboard shortcuts, slash command and insertion, high-contrast mode, and mechanisms for navigating regions and blocks with the keyboard.</p>
<p><a href="https://i2.wp.com/wptavern.com/wp-content/uploads/2018/10/keyboard-shortcuts.png?ssl=1"><img /></a></p>
<p>Ventura highlighted the audible messages feature that works with screen readers and posted a demo of the fully automated end-to-end testing. It allows contributors to test a sequence of operations with the keyboard (without mouse controls). He also identified several fixes landing in the next releases, including accessibility improvements to the date and color picker features, block navigation, and better focus management.</p>
<p>&#8220;A large amount of work and effort has gone in building mechanisms necessary to make the editor accessible for a wide user base,&#8221; Ventura said. &#8220;For example, it is entirely possible right now to recreate the &#8216;demo post&#8217; that comes with the Gutenberg plugin using the keyboard. In many ways, these tools are better and more sophisticated than what we offer in the current editor.&#8221;</p>
<p>Although 270 accessibility-specific tickets have been closed to date, Ventura acknowledged there are still more than 90 remaining. &#8220;The goal is to make this experience as seamless as possible for all users,&#8221; he said.</p>
<p>Early reactions to the post do not dispute that accessibility work has been done but concerns about Gutenberg&#8217;s overall complexity remain. Fixing this may not be as simple as targeting isolated interactions in the editor.</p>
<p>&#8220;We need to continue to develop close feedback loops with different users interacting through their preferred tools to make sure what we build is relevant to their experiences,&#8221; Ventura said. Throughout the process of building and testing Gutenberg, contributors have referenced &#8220;short feedback loops,&#8221; an agile process term that seems to make its way into these conversations.</p>
<p>However, the frequent built-in checkpoints don&#8217;t seem to have served accessibility needs well, as the accessibility team in convinced that having their input much earlier in the design process would have made a bigger difference further downstream.</p>
<p>&#8220;We’ve been begging for React development assistance focused on accessibility since the beginning,&#8221; Accessibility specialist Joe Dolson said in a post addressing what he perceives to be <a href="https://www.joedolson.com/2018/10/some-gutenberg-accessibility-clarifications/" rel="noopener noreferrer" target="_blank">common myths about Gutenberg&#8217;s accessibility</a>. &#8220;None of us were already primarily JavaScript-focused, let alone React-focused, and with limited time (spread across Gutenberg, the rest of WordPress, all of the WordPress sites themselves, and theme concerns), managing to keep up with the breakneck pace of development was never feasible.&#8221;</p>
<p>WordPress core contributor John James Jacoby commented on Ventura&#8217;s post, calling attention to the complexity of the interface for all users, including those with and without accessibility needs.</p>
<p>&#8220;My concern is that many of the above things do not really improve accessibility in the broader sense,&#8221; Jacoby said. &#8220;Instead, they make a complex user interface more complicated by littering the landscape with hidden keyboard shortcuts that are likely to be undiscoverable by regular-bodied folks, let alone folks who lack dexterity in their hands or fingers or eyes to find/understand/navigate/enjoy them.</p>
<p>&#8220;These are users who demand a semantically simpler application to get their jobs done. Though they’re used to quickly navigating the useless mixed-up garbage-markup soup that comes from web development as a whole, it doesn’t help to add extra &#8216;accessibility-centric&#8217; approaches – we should be making the existing approaches accessible first, and adding new approaches after.&#8221;</p>
<p>Dolson echoes that sentiment in his recent post. &#8220;Where Gutenberg falls down is on the overall use of the system,&#8221; he said. &#8220;Even though most individual interactions are handled effectively, the overall complexity of the system creates an enormous barrier to users if they are keyboard dependent or using a screen reader.&#8221;</p>
<p>The community has advocated for a myriad of different needs and wishes during the course of Gutenberg&#8217;s development, but any interface created for the millions of people that WordPress aims to serve will inevitably have to deliver some compromises. Matt Mullenweg answered the feedback regarding complexity from his perspective as the project lead:</p>
<p>&#8220;We think that the current interface could be a ton more streamlined, but we’ve compromised a lot of the alternative approaches we’ve wanted to take based on accessibility feedback and trying to have a single interface that serves all types of users,&#8221; Mullenweg said. &#8220;If we branched, it would be a different discussion and possibly serve multiple audiences better. There’s a lot of FUD though, ie, that’s going to be illegal in EU.&#8221;</p>
<p>Ventura&#8217;s post is tightly focused on Gutenberg&#8217;s existing accessibility features and makes no mention of the audit that would have measured if it meets <a href="https://wptavern.com/wordpress-adopts-accessibility-coding-standards-for-all-new-and-updated-code" rel="noopener noreferrer" target="_blank">WordPress&#8217; own stated accessibility standards</a>. These standards require that all new or updated code released in WordPress must conform with the WCAG 2.0 guidelines at level AA. Without an examination of how the product meets these standards, much of the the discussion revolves around subjective opinions about complexity. It&#8217;s difficult to quantify issues like cognitive overload.</p>
<p>&#8220;It is entirely possible that Gutenberg will come within a hair of passing WCAG (Web Content Accessibility Guidelines) 2.0 at level AA at release, but still be inaccessible,&#8221; Dolson said. &#8220;This is because the micro-interactions are being managed well but the macro-interactions are not. This is a flaw with using WCAG 2.0 as a standard; it does not handle address large scale issues effectively. The cognitive load inherent in the current navigation requirements for assistive technology is overwhelming, and that is an accessibility issue – just not one effectively reflected in our current standards requirements.&#8221;</p>
<p>One of the myths Dolson&#8217;s post dispelled is that the Gutenberg team doesn’t care about accessibility. Ventura&#8217;s post calls attention what he believes to be &#8220;a significant volume of accessibility-specific tools and functionalities&#8221; in Gutenberg that surpass those of the Classic Editor. The team has worked hard to address accessibility concerns but needs better communication across teams in order to continue serving the wider community of WordPress users with accessibility needs.</p>
<p>&#8220;There have been a lot of issues on the way that could have been avoided if a React developer had been available to assist with significant dedicated time earlier than 6 weeks before the proposed release; but those were issues coming from ignorance, not a lack of compassion,&#8221; Dolson said.</p>
<p>&#8220;I don’t know what Gutenberg will be at release. But the accessibility team and the Gutenberg team are working hard to try and reach the best solutions we can.&#8221;</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 19 Oct 2018 18:00:07 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:48;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:81:"WPTavern: The New Woo Adopts Gutenberg Components, User Interface Driven by React";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=84854";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:91:"https://wptavern.com/the-new-woo-adopts-gutenberg-components-user-interface-driven-by-react";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2865:"<p><a href="https://woosesh.com/">WooSesh</a>, the free virtual conference devoted to WooCommerce kicked off earlier today. Todd Wilkins, Head of eCommerce at Automattic, Kelly Hoffman, Head of Design for eCommerce at Automattic, and Aviva Pinchas, Product Lead of the WooCommerce Marketplace at Automattic got things started with the keynote presentation.</p>
<p>Wilkins highlighted what the team has accomplished since last year and outlined what users can expect in 2019. Pinchas shared a wealth of data from a survey that was sent to WooCommerce users and to end the presentation, Hoffman described how the team designed the new interfaces.</p>
<p>One of the major changes <a href="https://woocommerce.wordpress.com/2018/10/18/wc-admin/">coming to WooCommerce</a> is a redesigned backend. The project is being developed on GitHub as a feature plugin called <a href="https://github.com/woocommerce/wc-admin">WC-Admin</a>.</p>
<img />New WooCommerce Dashboard
<p>The dashboard is a landing page where store owners will be able to see at a glance how their store is doing. The new interface is powered by the React JavaScript framework, specifically the React components that are part of the Gutenberg project. It&#8217;s modular, allowing users to add, move, and remove blocks. Developers will be able to extend the dashboard and provide custom blocks.</p>
<p>In addition to the new interface, reports are being overhauled. Store owners will be able to filter data, compare date records, have easy access to important data points, and download reports in CSV format. The Activity Panel has been completely redesigned and will be accessible from any page in the WooCommerce backend.</p>
<img />WooCommerce Activity Panel
<p>The activity panel will also house a Notifications area that acts as an email Inbox. Developers will be able to add notifications from their extensions using the WooCommerce REST API endpoints.</p>
<img />WooCommerce Notifications Panel
<p>To see WC-Admin in action, you&#8217;ll need to download the <a href="https://github.com/woocommerce/wc-admin">feature plugin</a> and run it in a test environment. The WooCommerce team does not recommend using it in a production environment.</p>
<p>Once it reaches beta, the plugin will be made available on WordPress.org to allow a larger audience to test it before being merged into WooCommerce core. The plugin is scheduled to hit beta in early 2019 with new features being merged in the first quarter of 2019.</p>
<p>Similar to Gutenberg development where progress updates were published to the Make Core Developer blog every week or every other week, the WooCommerce team plans to publish progress updates every two weeks on its <a href="https://woocommerce.wordpress.com/">developer blog</a>. With these improvements, WooCommerce is another reason for developers to learn JavaScript deeply.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Fri, 19 Oct 2018 02:49:41 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Jeff Chandler";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}i:49;a:6:{s:4:"data";s:13:"
	
	
	
	
	
	
";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";s:5:"child";a:2:{s:0:"";a:5:{s:5:"title";a:1:{i:0;a:5:{s:4:"data";s:111:"WPTavern: Learn How to Build an Interactive Prototype with Dave Martin’s Free JavaScript for Designers Course";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"guid";a:1:{i:0;a:5:{s:4:"data";s:29:"https://wptavern.com/?p=84685";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:4:"link";a:1:{i:0;a:5:{s:4:"data";s:119:"https://wptavern.com/learn-how-to-build-an-interactive-prototype-with-dave-martins-free-javascript-for-designers-course";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:11:"description";a:1:{i:0;a:5:{s:4:"data";s:2439:"<p><a href="https://i1.wp.com/wptavern.com/wp-content/uploads/2018/10/Screen-Shot-2018-10-18-at-1.23.18-PM.png?ssl=1"><img /></a></p>
<p>Product designer <a href="http://davemart.in/" rel="noopener noreferrer" target="_blank">Dave Martin</a> has published a free video course called <a href="http://jsfordesigners.davemart.in/" rel="noopener noreferrer" target="_blank">JavaScript for Designers</a>. The course is made up of 46 bite-sized videos that walk students through the basics via a hands-on tutorial for building an interactive HTML prototype.</p>
<p>Martin said he created the course specifically for designers who have been putting off learning how to code with JavaScript. He focused on concepts that are applicable to designers in their jobs, teaching skills that help them communicate to developers exactly how they want an app to behave.</p>
<p>Coming from a designer&#8217;s perspective, Martin said most JavaScript tutorials are &#8220;dry and boring,&#8221; because they are written by developers. Ordinarily, these types of courses begin with JavaScript&#8217;s historical roots and progress from variables to arrays to objects, losing many learners along the way. Martin&#8217;s course is built more like a tutorial. Students will replicate some of the functionality found in a site like Dribbble. At the end, students should have a sufficient foundation of JavaScript that enables them to build an interactive HTML prototype.</p>
<p>One of the other important ways this course is different is that the giant &#8220;Get Started&#8221; button on the page doesn&#8217;t take you to a registration form or make you sign up for dripped emails. It simply scrolls down the page so you can dive into the videos. Participants can download the code and follow along with the tutorial.</p>
<p>Today&#8217;s announcement from WooSesh that WooCommerce is testing its new Javascript-driven interface is just another reminder that JavaScript is overtaking modern UI design and architecture. JavaScript knowledge is going to become increasingly in demand, and designers who have a decent grasp of it will land themselves higher paying positions. Even if you&#8217;re not a designer, Martin&#8217;s course may hold your interest better than traditional JavaScript beginners&#8217; courses. Check out the videos at <a href="http://jsfordesigners.davemart.in/" rel="noopener noreferrer" target="_blank">jsfordesigners.davemart.in</a>.</p>";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}s:7:"pubDate";a:1:{i:0;a:5:{s:4:"data";s:31:"Thu, 18 Oct 2018 19:13:34 +0000";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}s:32:"http://purl.org/dc/elements/1.1/";a:1:{s:7:"creator";a:1:{i:0;a:5:{s:4:"data";s:13:"Sarah Gooding";s:7:"attribs";a:0:{}s:8:"xml_base";s:0:"";s:17:"xml_base_explicit";b:0;s:8:"xml_lang";s:0:"";}}}}}}}}}}}}}}}}s:4:"type";i:128;s:7:"headers";O:42:"Requests_Utility_CaseInsensitiveDictionary":1:{s:7:" * data";a:8:{s:6:"server";s:5:"nginx";s:4:"date";s:29:"Fri, 16 Nov 2018 02:14:02 GMT";s:12:"content-type";s:8:"text/xml";s:4:"vary";s:15:"Accept-Encoding";s:13:"last-modified";s:29:"Fri, 16 Nov 2018 02:00:30 GMT";s:15:"x-frame-options";s:10:"SAMEORIGIN";s:4:"x-nc";s:9:"HIT ord 2";s:16:"content-encoding";s:4:"gzip";}}s:5:"build";s:14:"20180402224038";}}