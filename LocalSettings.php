<?php
# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.

# If you customize your file layout, set $IP to the directory that contains
# the other MediaWiki files. It will be used as a base to locate files.


error_reporting(E_ALL);
ini_set("display_errors",1);

if( defined( 'MW_INSTALL_PATH' ) ) {
  $IP = MW_INSTALL_PATH;
} else {
	$IP = dirname( __FILE__ );
}

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );
require_once( "includes/DefaultSettings.php" );
# Our super cool forum extension

$wgStylePath = "/mathimages/skins/";
$wgLogo = "{$wgStylePath}/common/kochLogoSmallWhite.png";

# If PHP's memory limit is very low, some operations may fail.
#ini_set( 'memory_limit', '20M' );
ini_set( 'memory_limit', '64M' );


if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
} elseif ( empty( $wgNoOutputBuffer ) ) {
	## Compress output if the browser supports it
	if( !ini_get( 'zlib.output_compression' ) ) @ob_start( 'ob_gzhandler' );
}

$wgSitename         = "Math Images";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
$wgScriptPath       = "/mathimages";

#require_once('metadata/ImageInfo.php');
#$list = getInfo();
#$wgImageList = makeImageMap($list);

## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL

$wgEnableEmail      = true;
$wgEnableUserEmail  = true;

$wgEmergencyContact = "sweimar@21pstem.org";
$wgPasswordSender = "sweimar@21pstem.org";

## For a detailed description of the following switches see
## http://meta.wikimedia.org/Enotif and http://meta.wikimedia.org/Eauthent
## There are many more options for fine tuning available see
## /includes/DefaultSettings.php
## UPO means: this is also a user preference option
$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;
$wgEmailConfirmToEdit = true;
$wgDefaultUserOptions['watchcreations'] = 1;
$wgDefaultUserOptions['enotifwatchlistpages'] = 1;
$wgDefaultUserOptions['math'] = 0;


$wgDBtype           = "mysql";
$wgDBserver         = "localhost";
$wgDBname           = "math_images";
$wgDBuser           = "math_img_user";
$wgDBpassword       = "AnnieGetYourGun";
$wgDBport           = "3306";
$wgDBprefix         = "";

# Schemas for Postgres
$wgDBmwschema       = $wgDBname;
$wgDBts2schema      = "public";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads       = true;
$wgUseImageResize      = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";
$wgFileExtensions[] = 'mov';
$wgFileExtensions[] = 'avi';
$wgFileExtensions[] = 'swf';
$wgFileExtensions[] = 'jar';
$wgFileExtensions[] = 'class';
$wgFileExtensions[] = 'psd';
$wgStrictFileExtensions = false;

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented
$wgHashedUploadDirectory = false;
#Default Directory
$wgUploadDirectory = '/var/www/html/mathimages/images';
$wgUploadPath = '/mathimages/imgUpload';
#Hopefully the REAL Directory
include_once( 'UploadDirectory.php' );
##echo("UD set to: ".$wgUploadDirectory);
## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX           = true;

$wgLocalInterwiki   = $wgSitename;

$wgLanguageCode = "en";

$wgProxyKey = "ce3b7aadf56c2c1166b6e5990cc7828f2d5ffddae46527ac1359190f47fd8a0d";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook':
$wgDefaultSkin = 'bluebook';

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "http://www.gnu.org/copyleft/fdl.html";
$wgRightsText = "GNU Free Documentation License 1.2";
$wgRightsIcon = "${wgScriptPath}/skins/common/images/gnu-fdl.png";
# $wgRightsCode = "gfdl"; # Not yet used

$wgDiff3 = "/usr/bin/diff3";

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
$configdate = gmdate( 'YmdHis', @filemtime( __FILE__ ) );
$wgCacheEpoch = max( $wgCacheEpoch, $configdate );

# Disable anonymous account creation.
$wgGroupPermissions['*']['createaccount'] = false;

# Disable anonymous editing
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['staff']['block'] = true;
$wgGroupPermissions['dte']['edit'] = true;
$wgGroupPermissions['math_doctor']['edit'] = true;
# allow user styles
$wgAllowUserJs  = true;
$wgAllowUserCss = true;

#Disable anonymous read access
$wgGroupPermissions['*']['read'] = false;
# But allow them to read e.g., these pages:
#$wgWhitelistRead =  [ "Main Page", "Help:Contents" ];
#$wgWhitelistRead = array( "Main Page", "Stereographic Projection" );

# # Override the server name. This way all URL's generated by this wiki
# # will be of the form 'mathforum.org', and NOT 'nickel.mathforum.org'.
# $wgServerName = "mathforum.org";
# $wgServer = $wgProto . "://" . $wgServerName; 

## SKIPPED SKINS
# To remove a skin from the User Preferences choices, add it here
$wgSkipSkins = array("monobook", "standardwiki", "modern", "stellarbook", "testskin");

## EXTENSIONS
### StubManager extension. Put dependences below this line.
# wfLoadExtension( 'StubManager' );
# wfLoadExtension( 'PageRestrictions' );
# wfLoadExtension( 'awc_forum' ); 

# include("extensions/quicktime.php");
# wfLoadExtension( 'SF_Settings' );
#require_once("extensions/WikiChat.php");
$wgGroupPermissions['*']['viewedittab']=true;
$wgExtraNamespaces[250] = 'Author';
$wgExtraNamespaces[251] = 'Author_talk';
$wgExtraNamespaces[252] = 'Field';
$wgExtraNamespaces[253] = 'Field_talk';
$wgExtraNamespaces[254] = 'SubjectPortal';
$wgExtraNamespaces[255] = 'SubjectPortal_talk';
$wgExtraNamespaces[256] = 'MathTool';
$wgExtraNamespaces[257] = 'MathTool_talk';
$wgExtraNamespaces[258] = 'AskDrMath';
###############################################################
## NSDL Data Repository Extension:
## To use the NSDL Data Repository extension
## UNCOMMEMT the three variables and one require statement below
##
## NSDL Data Repository Extension include
#require_once("extensions/NDRExtension.php");
##
## Creates group NDRUsers to publish to NDR 
#$wgGroupPermissions['NDRUsers']['ndr:publish'] = true;
##
## Specify special page which user groups have access to
#$wgSpecialPageLockdown['RepositoryManager'] = array('sysop');
##
## Allows for some of the images to work in the NDR extension 
$wgAllowExternalImages = true;

## Search and Slug extensions are uncommented by default.
# Resources path where the javascript and css live.
#$nsdlResourcePath = "/extensions/nsdl/resources";

## NSDL Search - inserting links to NSDL resources
#require_once("extensions/NSDLSearchExtension.php");

## Slug extension - the NSDL icons labeling NSDL resources
#require_once("extensions/NSDLSlugExtension.php");

#################################################################
#include_once( 'htmlets/randomFromHash.php' );
# include_once( 'extensions/NumTeachingMaterials.php' );
# include_once( 'extensions/HeadingNotInTOC.php' );
# include_once( 'extensions/SpecialExtendedGallery.php' );
# include_once( 'extensions/SpecialUploadImage.php' );
# include_once( 'extensions/SpecialUploadSuccess.php' );
# include_once( 'extensions/SpecialThumb.php' );
# include_once( 'extensions/SpecialFields.php' );
# include_once( 'extensions/SpecialAuthorGallery.php' );
# include_once( 'extensions/SpecialDiscussionWatch.php' );
# include_once( 'extensions/SpecialAddTeachingMaterial.php' );
# include_once( 'includes/SpecialPage.php' );
# include_once( 'extensions/SpecialRandomImagePage.php' );
# include_once( 'extensions/SpecialWatchPage.php' );
# include_once( 'extensions/SemanticMediaWiki/includes/SMW_Settings.php' );
# #include_once( 'extensions/SemanticForms/includes/SF_Settings.php' );
# enableSemantics('http://mathforum.org/mathimages');
#require_once( 'extensions/SimpleForms.php' );
# require_once( 'extensions/HTMLets/HTMLets.php' );
$wgHTMLetsDirectory = "$IP/htmlets";
require_once( 'extensions/ParserFunctions/ParserFunctions.php' );
#require_once("extensions/SimpleForms.php");
#require_once("extensions/include.php");
# wfLoadExtension( 'MultiCategorySearch' );
# wfLoadExtension("JavaApplet");
# wfLoadExtension("Flash");
# wfLoadExtension("PauseGIF");

# this was letting anonymous users comment
# require_once("extensions/ArticleComments.php");

#Rating extension
#require_once( "extensions/Ratings/Ratings.php" );
#$wgRatingsUseCaptcha = false;

#Rating again
#include("extensions/source/poll.php"); 

#Edit Login Form Extension
#require_once("extensions/customUserCreateForm/customUserCreateForm.php");

#Thumbnail Gallery Extensions
# require_once("$IP/extensions/DynamicPageList/DynamicPageList2.php");
#require_once("extensions/CategoryOnUpload/CategoryOnUpload.php");

#SmoothGallery Extension
    #include("extensions/SmoothGallery.php");
    #$wgSmoothGalleryExtensionPath = "extensions/SmoothGallery";
    #$wgSmoothGalleryDelimiter = "\n"; 
# require_once("extensions/LinkedImage.php");
#require_once("htmlets/writeHome.php");

#echo("UD: ".$wgUploadDirectory);
#echo("UP: ".$wgUploadPath);

$wgShowExceptionDetails = true;

# Profile Extension
/*require_once("$IP/extensions/SocialProfile/SocialProfile.php");
$wgExtraNamespaces[NS_USER_PROFILE] = "User_profile";
$wgExtraNamespaces[NS_USER_WIKI] = "UserWiki";
$wgUserBoard = true;
$wgUserProfileDisplay['board'] = true;
$wgUserProfileDisplay['stats'] = false;
$wgUserProfileDisplay['friends'] = true;
$wgUserProfileDisplaay['foes'] = false;
require_once("$IP/extensions/RandomUsersWithAvatars/RandomUsersWithAvatars.php");*/

# require_once("$IP/extensions/AskDrMathImages.php");
# require_once("$IP/extensions/balloons2/balloon2.php");
# require_once("$IP/extensions/EmbedVideo.php");
# require_once("$IP/extensions/EmbedQuicktime.php");
# require_once("$IP/extensions/Iframes.php");
# require_once("$IP/extensions/TemplateExtension.php");
# require_once("$IP/extensions/ImageExtension.php");
# require_once("$IP/extensions/JSExtension.php");
# require_once("$IP/extensions/Preview.php");
# require_once("$IP/extensions/NoSpaces.php");
# require_once("$IP/extensions/UserName.php");
# require_once("$IP/extensions/Condensed.php");
# require_once("$IP/extensions/Cite/Cite.php");
# Spam Filter Stuff
# require_once("$IP/extensions/ConfirmEdit/ConfirmEdit.php");
#require_once("$IP/extensions/ConfirmEdit/FancyCaptcha.php"); # old CAPTCHA

#$require_once( "$IP/extensions/ConfirmEdit/MathCaptcha.php"); 
#$wgCaptchaClass = 'MathCaptcha';
$wgCaptchaClass = 'SimpleCaptcha';

# reCAPTCHA stuff:
#require_once("$IP/extensions/ConfirmEdit/ReCaptcha.php");
#$recaptcha_public_key = '6Lcl7wYAAAAAACaMmzENE0QIrjTBsUmcTUU2G-D-';
#$recaptcha_private_key = '6Lcl7wYAAAAAALLNljon93dyifP_7_BdS27kiMSr'; #keep secret

# require_once("$IP/extensions/Newuserlog/Newuserlog.php");
# require_once("$IP/extensions/UserMerge/UserMerge.php");
$wgGroupPermissions['bureaucrat']['usermerge'] = true;

#Spam Blacklist Extension
# require_once("$IP/extensions/SpamBlacklist/SpamBlacklist.php");

#Title Blacklist Extension
# require_once("$IP/extensions/TitleBlacklist/TitleBlacklist.php");

#Localized Math Images Pages for User Groups
# require_once( 'extensions/AccessControl/accesscontrolSettings.php' );
# require_once( 'extensions/AccessControl/accesscontrol.php' );

# require_once( 'extensions/SpecialUserGroups.php' );
# require_once( 'extensions/SpecialMyUserGroups.php' );
# require_once( "extensions/PdfBook/PdfBook.php" );

# The following lines disable CACHE-ing.
$wgMainCacheType = CACHE_NONE;
$wgMessageCacheType = CACHE_NONE;
$wgParserCacheType = CACHE_NONE;
$wgCachePages = false;

# include_once( 'includes/DatabaseFunctions.php' );
#include( './extensions/bad-behavior/bad-behavior-mediawiki.php' );


#Set Default Timezone
$wgLocaltimezone = "America/New_York";
$oldtz = getenv("TZ");
putenv("TZ=$wgLocaltimezone");
# Versions before 1.7.0 used $wgLocalTZoffset as hours.
# After 1.7.0 offset as minutes
$wgLocalTZoffset = date("Z") / 60;
putenv("TZ=$oldtz");

$wgUseGzip = false;

$wgShowDBErrorBacktrace = true;

?>

