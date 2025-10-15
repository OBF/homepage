# OBSOLETE - old OBF WordPress website

## Replaced in 2025 by https://github.com/OBF/OBF.github.io

**Installation Guidelines**

*Note:* So far the Wordpress version we've used was 5.0.3. The latest update is 5.1, and when importing, it might give a warning mentioning that you're importing from a site using PHP 5 to a site using PHP 7. I have tried importing to a local installation that is using WordPress 5.1, and the import was successful. It **should** work the same even when moving from the dev site to the live site.

*Note 2:* The email address in Settings -> General needs to be changed back to an OBF email!


  * ***Setup and Plugin Installation***

1. Login to wordpress installation.
2. Go to **Plugins->Add New** In case *Advanced Custom Fields* and *All-in-one WP Migration* plugins are already installed, skip to theme installation steps.
3. Search for '*Advanced Custom Fields*' and install plugin. Activate plugin.
4. Go to **Plugins->Add new** again and search for '*All-in-One WP Migration'* plugin and install. Activate plugin.
5. We're importing from file, and it is above 2 MB, but WP only allows files below that limit. So we will download and install the file extension. Go to [Import WP Migration](https://import.wp-migration.com/) and download the **Basic** version in any folder.
6. Go back to the **Plugins menu-> Add New**. Select '*Upload Plugin*' beside the *Add Plugins* heading. Choose the file extension .zip file that was downloaded from [Import WP Migration](https://import.wp-migration.com/) and click on *Install Now*.
7. Once it is installed, click on '*Activate Plugin*' to activate the extension.

***Theme Export***

1. On the dev site, go to the '*All-in-one WP Migration*' tab in the menu, and click on export.
2. Click on the *EXPORT* TO dropdown and select '*File*'.
3. Once the export is finished, download the file from the dialog box that shows up.


  * ***Theme Import***
 
1. In the admin dashboard of the actual live site, go to *All-in-One WP Migration menu* and select the *Import* option.
2. In the Import page that shows up, click on Import and import from **'File'**. Select the export file that was downloaded when exporting the theme. It will have a .WPRESS extension.
3. A dialog box that notifies that the previous theme will be erased might show up. Click on Proceed. 
4. A dialog box that notifies that the data has been imported successfully will show up. Click on the **Permalink Settings** link and login to the WP-admin dashboard through the window that opens up.
5. Use the same login credentials as the ones that have been used for logging in to the dev site before, as the database is imported as well.
6. Go to the bottom of the window and click on *Save Changes*. Do this twice.
7. Go back to the original window and close the dialog box.
8. Visit the site, it should be working now and the posts with custom fields should have the respective custom fields in the edit options. 
 

**Details**

*Update 04/03/2019*

-- Added widgets and then added categories and tags to navigate through the news posts. They show up as a category dropdown and tag cloud on single posts, right after the comments section. :)

-- Changed the colors for the blog page.

-- Metabox for ABout page editing instructions.

-- Added BOSC pages for keynotes, panel, Sponsors, and edited the OBF and BOSC footers.

-- Added the rest of the members' pictures :)


*Update 18/02/2019*

-- Fixed navbar added that stays at the top of the screen when scrolling. Used some JS to make it slightly transparent when scrolling and to fix the issue of navbar overlapping the content.

-- Added breadcrumbs making use of a fucntion from 

-- Created page for BOSC abstract submissions. If schedule is taken from Google Sheets, only the embed link has to be copied in the WP editor.

-- Fixed issue of images getting stretched out.

*Update 13/02/2019*

-- Page duplication option added, for replicating BOSC pages. This option can be used to duplicate any page! :) Credits for the duplication function go to [Hostinger](https://www.hostinger.in/tutorials/how-to-duplicate-wordpress-page-post).

-- replaced Board member bootstrap columns with CSS grid, the content was overlapping. Made the past members' list with smaller picture sizes. :)

-- Updated pictures on the homepage with BOSC pictures, except the fellowships section. That is to be replaced by a grid of awardees' photos.


*Update 09/02/2019*

-- Created a BOSC template. This template can be used for all BOSC pages, including the homepage and child pages, as loong as the template selected is the bosc template

-- Made a separate BOSC header and navbar, which has the BOSC and oBF logo. I have to fix this still, adding breadcrumbs so as to provide easier access.

-- Fixed issue of footer items not being centered.


*Update 07/02/2019*

-- Created Donate page and OBF Membership pages.Removed the temporary posts made as placeholders for these pages.

-- Added Bylaws menu item which links to the OBF Bylaws on Github.

-- Created folders within the images folder for making it better sorted.

-- Fixed some wordings on the homepage.

-- Fixed dropdown issue of GSoC overview overlapping the BOSC menu


*Update 31/01/2019*

-- Added GSoC menu page, overview and guidelines page. Made a gsoc page template so more pages and content can be added and styles will be maintained. 


*Update 28/01/2019*

-- Added page for events. Made a custom post type for events as well. :) I used custom fields to store the location, start date and end date fields of the event. Added appropriate filters so that event dates are checked against the current date, and events are classified as upcoming, ongoing or past events on this basis. Added stylesheet for this page too.

-- Updated single page for events.

-- Added icon credits to footer.


*Update 22/01/2019*

-- Made projects page! :) Projects are displayed according to taxonomy now, which can be seen fro admin dashboard too. Also, added stylesheet for projects page.

-- Made changes to front page so as to show dynamic content from the board of directors page and projects page.

-- Added support to show board and project taxonomy in the admin menu, when viewing list of items for these custom post types.

-- Changed some font sizes that seemed irregular through pages.


*Update 17/01/2019*
-- Updated pages so that no separate posts for page contents remain. Contents of About, Fellowships can be edited from the page editor itself. Member profiles can still be edited from the dashboard menu, but page content can be edited from the page editor. :)

-- News page shows all the blog posts and shows the latest post styled differently than the others. Comments section added to single blog posts. Added stylesheet for news page and single post page

-- Made custom post type for projects and taxonomies.


*Update 03/01/2019*
-- Added pages for fellowships, board of directors and the meeting minutes page. :) Member profiles can be edited from dashboard menu under the custom post type menu title 'Board Member Profiles'. Used taxonomies to classify if a member is a current member or a past member.

-- Added news page as main blog page, but the content is not added yet, it is still just dummy posts. The special categories used for the rest of the posts are excluded though, so actual blog posts will be the only posts seen in this page. 

-- Updated front page to reflect changes in board of directors page dynamically.

-- Mobile menu works now! I made some changes to the menu setup itself.

-- Added user 'yo' for Yo :)


*Update 27/12/2018*
-- Changed the homepage from index page to a static front page to be able to use the News page as a dedicated blog page in accordance with the WordPress model. The News tab is just temporary for now!

-- Fixed some design issues

-- Added use of plugin All-in-One WP Migration.


*Update 20/12/2018*
-- Moved files from wp-content to root directory.

-- Navbar styling issue resolved. Hamburger menu issue still stands. 

-- About page is done.
This is a very basic version, I haven't styled anything or linked to the proper pages. 

-- Separated the header and footer from the main content.

--The sections in the index page are kept as separate posts in the dasboard for easy editing. As of now, the lists of the fellowships and news sections with HTML are in the 'content' part of the post too. 

-- Used this https://github.com/wp-bootstrap/wp-bootstrap-navwalker navwalker class to add items in the navbar dynamically via the dash as required. There's an issue with the styling of the navbar, but it might be some minor fault in the CSS. The menu doesn't seem to be working in the mobile version of this. Need to figure that out as well.

-- As of now, I've added the about, news and fellowships sections as posts editable directly from the wordpress editor. The links don't lead to any valid pages. For the events and projects, it could be better to just use custom posts like Yo recommended?

--Path to the main theme files: OBF-Homepage-New -> obf-new -> wp-content -> themes -> obf-new

 

