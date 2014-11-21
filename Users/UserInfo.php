<?php
// Incomplete
$userId = $_GET["UserId"];
if ($userId == "" or $userId == null){die();}
$url = "http://www.roblox.com/User.aspx?ID=".$userId;
$data = file_get_contents($url);
// Blurb
$startBlurb = strpos($data,'<div class="UserBlurb" style="margin-top: 10px; overflow-y: auto; max-height: 450px; ">
    ');
$endBlurb = strpos(substr($data,$startBlurb),'</div>');
$blurb = substr($data,$startBlurb,$endBlurb);
$blurb = substr($blurb,strlen('<div class="UserBlurb" style="margin-top: 10px; overflow-y: auto; max-height: 450px; ">
    '));
$blurb = str_replace("<br />","\n",$blurb);
// Friends
$startFriendStats = strpos($data,'<span id="ctl00_cphRoblox_rbxUserStatisticsPane_lFriendsStatistics">');
$endFriendStats = strpos(substr($data,$startFriendStats),'</span>');
$friends = substr($data,$startFriendStats,$endFriendStats);
$friends = substr($friends,strlen('<span id="ctl00_cphRoblox_rbxUserStatisticsPane_lFriendsStatistics">'));
// Forum Posts
$startForumPostStats = strpos($data,'<td class="statsValue"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lForumPostsStatistics" class="notranslate">');
$endForumPostStats = strpos(substr($data,$startForumPostStats),'</span></td>');
$forumPosts = substr($data,$startForumPostStats,$endForumPostStats);
$forumPosts = substr($forumPosts,strlen('<td class="statsValue"><span id="ctl00_cphRoblox_rbxUserStatisticsPane_lForumPostsStatistics" class="notranslate">'));
echo $blurb;
?>