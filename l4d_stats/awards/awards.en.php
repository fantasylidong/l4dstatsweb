<?php

/****************************************************************************

   LEFT 4 DEAD (2) PLAYER STATISTICS ©2019-2020 PRIMEAS.DE
   BASED ON THE PLUGIN FROM MUUKIS MODIFIED BY FOXHOUND FOR SOURCEMOD

 - https://forums.alliedmods.net/showthread.php?p=2678290#post2678290
 - https://www.primeas.de/

****************************************************************************/

//ini_set('display_errors',1);
//error_reporting(E_ALL);
error_reporting(0);

$award_ppm = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是拿分效率最高的玩家，每分钟获取 <b>%s 分</b>.</h6>";
$award_time = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 在服务器组上玩了最长的时间，时长为 <b>%s </b>.</h6>";
$award_second = "<a class=\"alink-link2 text-left\" href=\"../ranking/%s\">%s</a> 来到 %s 名，数据为 <b>%s</b>.";
$award_kills = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是感染者毁灭者，共消灭 <b>%s 感染者</b>.</h6>";
$award_headshots = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 瞄准僵尸头部第一名，总计 <b>%s 个爆头</b>.</h6>";
$award_ratio = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是爆头King，有着夸张的百分之 <b>%s的 爆头率</b>.</h6>";
$award_melee_kills = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是厨艺精湛的刽子手，用近战杀害了 <b>%s 个小僵尸</b>.</h6>";
$award_killsurvivor = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 掌控了生还者，造成了 <b>%s 名</b> 幸存者死亡.</h6>";
$award_killinfected = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 消灭了最多的小僵尸，共 <b>%s 只</b> .</h6>";
$award_killhunter = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是最擅长处理hunter的人，共消灭了 <b>%s Hunter</b> .</h6>";
$award_killsmoker = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是禁烟王者，共消灭了 <b>%s Smoker</b> .</h6>";
$award_killboomer = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 手最快， <b>%s Boomer被快速点掉</b> .</h6>";
$award_killspitter = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 最讨厌流口水的怪 ，已经杀了 <b>%s 只Spitter 了 </b>.</h6>";
$award_killjockey = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 最讨厌被骑，已经消灭 <b>%s Jockey</b> .</h6>";
$award_killcharger = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 最讨厌被撞，已经干掉 <b>%s 只Charger</b> .</h6>";
$award_pills = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 最具分享精神，分享给队友 <b>%s颗药丸</b>.</h6>";
$award_medkit = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 希望有个医疗箱，给队友用了with <b>%s 急救包</b>.</h6>";
$award_hunter = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是Hunter救火大师 ，救了<b>%s 个被扑队友</b>.</h6>";
$award_smoker = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是Smoker救火大师 ，救了<b>%s 个被拉队友</b>.</h6>";
$award_jockey = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是Jockey救火大师 ，救了<b>%s 个被骑队友</b>.</h6>";
$award_charger = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是Charger救火大师 ，救了<b>%s 个被锤队友</b>.</h6>";
$award_protect = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 保护你的屁股<b>%s 次</b>.</h6>";
$award_revive = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是救人最多的人，当你需要他时，他总会在你身边，共拉起 <b>%s 个队友</b>.</h6>";
$award_rescue = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是营救大师，拯救了 <b>%s 名队友</b>.</h6>";
$award_campaigns = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是逃脱大师! 总共完成 <b>%s 张地图</b>.</h6>";
$award_tankkill = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 火力全开，和队友一起消灭了 by <b> %s 个 Tank </b>.</h6>";
$award_tankkillnodeaths = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 携带超级火力，队友0死亡消灭 <b>%s 个Tank </b>.</h6>";
$award_allinsafehouse = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是团结领袖，带领所有生还者全部到达安全室 <b>%s 次</b>.</h6>";
$award_friendlyfire = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是黑枪王。在他游戏进程中总共产生 <b>%s 次黑枪</b>.</h6>";
$award_teamkill = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 看样子要被Ban了，队友都被他杀了 <b>%s 次了</b>.</h6>";
$award_fincap = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 很不友好，黑倒了队友 <b>%s 次</b>.</h6>";
$award_left4dead = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 会看着你死亡， 已经看着<b>%s 个队友死在眼前</b>.</h6>";
$award_letinsafehouse = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是真内鬼，已经放了<b>%s 个感染者进入了安全室</b>.</h6>";
$award_witchdisturb = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 不是个绅士，已经骚扰了<b>%s 只Witches了</b>.</h6>";
$award_pounce_nice = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是Hunter使用高手，完成 <b>%s 次扑</b>.</h6>";
$award_pounce_perfect = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是Hunter使用大师，完成 <b>%s 次完美扑</b>.</h6></b>.</h6>";
$award_perfect_blindness = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是个画家， 用Boomer完成 <b>%s 次完美喷</b>.</h6>";
$award_infected_win = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 对生还者造成最大困扰，当感染者胜利<b>%s 次</b>.</h6>";
$award_bulldozer = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是最具杀伤力的Tank， 给生还者造成大量伤害 <b> %s 次</b>.</h6>";
$award_survivor_down = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 给生还者造成最大困扰，制伏了生还者 <b>%s 次</b>.</h6>";
$award_ledgegrab = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 最擅长让生还者挂边躲避伤害，造成 <b>%s 次生还者挂边</b>.</h6>";
$award_matador = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是近战刀牛大师， <b>%s 被刀的牛只想哭</b>.</h6>";
$award_witchcrowned = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 了解怎么解决女人，秒了 <b>%s 个妹</b>.</h6>";
$infected_tanksniper = "<h6><a class=\"alink-link2\" href=\"../ranking/%s\">%s</a> 是坦克狙击手，一个石头砸到 <b>%s 生还者</b>.</h6>";

?>
