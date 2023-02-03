<?php

/****************************************************************************

   LEFT 4 DEAD (2) PLAYER STATISTICS ©2019-2020 PRIMEAS.DE
   BASED ON THE PLUGIN FROM MUUKIS MODIFIED BY FOXHOUND FOR SOURCEMOD

 - https://forums.alliedmods.net/showthread.php?p=2678290#post2678290
 - https://www.primeas.de/

****************************************************************************/
// MySQL DATA
$mysql_server = "10.0.0.4";
$mysql_db = "l4d2stats";
$mysql_user = "morzlee";
$mysql_password = "anne123";
$mysql_tableprefix = "";

// SITE SETTINGS
$site_name = "Welcome to the jail？"; // Clan Name
$site_url = "https://sb.trygek.com/l4d_stats_EN/"; // Clan URL
$site_style = "default"; // Site Style
$site_game = "left4dead2"; // Site Game
$site_statsurl = "https://sb.trygek.com/l4d_stats_EN/"; // Site Stats URL
$site_description = "Welcome to morzlee's AnneHappywithCompetive server"; // Site Description
$site_keywords = "left 4 dead 2, left4dead2, l4d2, survivor, survival horror, apocalypse, online gaming, multiplayer"; // Site Keywords

// SITE LOGO
$site_logo = "_source/images/logo.png"; // Logo Image URL - Options: Empty for only Clan Name
$site_logo_height = "60"; // Logo Image Height
$site_logo_width = "325"; // Logo Image Width

// COMMUNITY SETTINGS
$site_steamgroup = "https://steamcommunity.com/groups/AnneZonemod"; // Steamgroup URL
$site_welcome = "Welcome to morzlee's server<br>server enable lilac anti-cheat system，aimlock will be banned，softwarely bunnyjump will be banned in month</br><br>Thanks all players who supprt my server running：piguuuuu, 纳村, 血红, TwisttZz, 慕容狗剩, 小月亮，南岸末阴，辅导员レディー ,喵斯同学@提不起劲<br>Support will give a period time of admin and vip </br>"; // Welcome Message
$site_welcome_intro = ""; // Welcome Intro Movie URL - Empty for only Welcome Message

// PLUGIN SETTING
$top3_site = "enabled"; // Top3 Ranking - Options: enabled, disabled

// Gameserver
$gameserver = "enabled"; // Gameserver Page - Options: enabled, disabled


// YOUTUBE PLAYER
$youtube = "disabled"; // Youtube - Options: enabled, disabled
$youtube_title = "Youtube Player"; // Youtube Title Name
$yt_movie1_embed = "4KA9YSkM7VE"; // Youtube Movie 1 Embed Code
$yt_movie1_title = "Left 4 Dead 2: Intro (Full HD)"; // Youtube Movie 1 Title
$yt_movie2_embed = "Pn7NeE83418"; // Youtube Movie 2 Embed Code
$yt_movie2_title = "Left 4 Dead 2: Dead Center #1 - Full Campaign (Full HD)"; // Youtube Movie 2 Title
$yt_movie3_embed = "KWubAsMwRz4"; // Youtube Movie 3 Embed Code
$yt_movie3_title = "Left 4 Dead 2: Dark Carnival #2 - Full Campaign (Full HD)"; // Youtube Movie 3 Title
$yt_movie4_embed = "qUDUsq9Vzy4"; // Youtube Movie 4 Embed Code
$yt_movie4_title = "Left 4 Dead 2: Swamp Fever #3 - Full Campaign (Full HD)"; // Youtube Movie 4 Title
$yt_movie5_embed = "strvCrGZKUg"; // Youtube Movie 5 Embed Code
$yt_movie5_title = "Left 4 Dead 2: Hard Rain #4 - Full Campaign (Full HD)"; // Youtube Movie 5 Title
$yt_movie6_embed = "Btv51AOzAYw"; // Youtube Movie 6 Embed Code
$yt_movie6_title = "Left 4 Dead 2: The Parish #5 - Full Campaign (Full HD)"; // Youtube Movie 6 Title
$yt_movie7_embed = "vkHV3mdE65I"; // Youtube Movie 7 Embed Code
$yt_movie7_title = "Left 4 Dead 2: The Passing #6 - Full Campaign (Full HD)"; // Youtube Movie 7 Title
$yt_movie8_embed = "BAS7K3L6vks"; // Youtube Movie 8 Embed Code
$yt_movie8_title = "Left 4 Dead 2: The Sacrifice #7 - Full Campaign (Full HD)"; // Youtube Movie 8 Title
$yt_movie9_embed = "A4IK4C-j8X0"; // Youtube Movie 9 Embed Code
$yt_movie9_title = "Left 4 Dead 2: No Mercy #8 - Full Campaign (Full HD)"; // Youtube Movie 9 Title
$yt_movie10_embed = "gUGJbs_RCw0"; // Youtube Movie 10 Embed Code
$yt_movie10_title = "Left 4 Dead 2: Crash Course #9 - Full Campaign (Full HD)"; // Youtube Movie 10 Title
$yt_movie11_embed = "Su6P_rdLIM8"; // Youtube Movie 11 Embed Code
$yt_movie11_title = "Left 4 Dead 2: Death Toll #10 - Full Campaign (Full HD)"; // Youtube Movie 11 Title
$yt_movie12_embed = "CXDuINVjsAI"; // Youtube Movie 12 Embed Code
$yt_movie12_title = "Left 4 Dead 2: Dead Air #11 - Full Campaign (Full HD)"; // Youtube Movie 12 Title
$yt_movie13_embed = "j0UzDX38bAI"; // Youtube Movie 13 Embed Code
$yt_movie13_title = "Left 4 Dead 2: Blood Harvest #12 - Full Campaign (Full HD)"; // Youtube Movie 13 Title
$yt_movie14_embed = "0cEK5YXdDjI"; // Youtube Movie 14 Embed Code
$yt_movie14_title = "Left 4 Dead 2: Cold Stream #13 - Full Campaign (Full HD)"; // Youtube Movie 14 Title
$yt_movie15_embed = "vjozkivYqxg"; // Youtube Movie 15 Embed Code
$yt_movie15_title = "Left 4 Dead 2: The Last Stand #14 - Full Campaign (Full HD)"; // Youtube Movie 15 Title

// LOCAL IP FIX
$fix_local_ip = "10.0.0.247";
$fix_local_countryip = "223.5.5.5";

/*
==================== DO NOT CHANGE ====================
*/

$site_template = "./";
$population_file = "../_source/population.csv";
$population_minkills = 12619;
$award_file = "awards.en.php";
$award_l4d2_file = "awards.l4d2.en.php";
$award_minplaytime = 60;
$award_minpointstotal = 0;
$award_minkills = 100;
$award_minheadshots = 100;
$award_minpoints = 1000;
$award_display_players = 5;
$award_cache_refresh = 60;
$lastonlineformat = "M d, Y g:ia";
$showplayerflags = 0;
$game_version = 0;

/*
==================== DO NOT CHANGE ====================
*/

?>
