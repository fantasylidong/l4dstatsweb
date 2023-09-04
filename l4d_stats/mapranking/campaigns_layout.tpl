<!doctype html>
<html lang="en">
	<head>
		<title><?php echo $site_name;?> | <?php echo $site_game;?> - <?php echo $page_heading;?></title>
			<?php include('../_source/header.php');?>
	<br/>
	<div class="row d-flex align-items-center">
		<div class="col-md-12 col-lg-12 text-left text-md-left mb-12 mb-md-0">
			<h1 class="text-left"><small><?php echo $page_heading;?></small></h1>
			<small><i class="fa fa-sitemap"></i>&nbsp;&nbsp;<a class="alink-main" href="<?php echo $site_url;?>"><?php echo $site_name;?></a>&nbsp;&nbsp;/&nbsp;&nbsp;<a class="alink-main" href="<?php echo $site_statsurl;?>"><?php echo $site_game;?></a>&nbsp;&nbsp;/&nbsp;&nbsp;<a class="alink-main" href="#"><?php echo $page_heading;?></a></small>
			<br /><br /><div class="bg-main" style="height: 5px;"></div>
		</div>
	</div>
	<br /><br />
		<form id="my-form" action="index.php" method="POST">
			<label for="anneversion">Anne版本:</label>
			<select name="anneversion" id="anneversion">
				<?php
      $query = "SELECT DISTINCT anneversion FROM l4d2stats.timedmaps";
      $result = mysql_query($query);
      while ($row = mysql_fetch_assoc($result)) {
        echo '<option value="' . $row['anneversion'] . '">' . $row['anneversion'] . '</option>';
				}
				?>
			</select>

			<label for="sinum">特感数量:</label>
			<select name="sinum" id="sinum">
				<?php
      $query = "SELECT DISTINCT sinum FROM l4d2stats.timedmaps ORDER BY sinum DESC";
      $result = mysql_query($query);
      while ($row = mysql_fetch_assoc($result)) {
        echo '<option value="' . $row['sinum'] . '">' . $row['sinum'] . '</option>';
				}
				?>
			</select>

			<label for="sitime">刷新间隔:</label>
			<select name="sitime" id="sitime">
				<?php
      $query = "SELECT DISTINCT sitime FROM l4d2stats.timedmaps ORDER BY sitime ASC";
      $result = mysql_query($query);
      while ($row = mysql_fetch_assoc($result)) {
        echo '<option value="' . $row['sitime'] . '">' . $row['sitime'] . '</option>';
				}
				?>
			</select>

			<label for="auto">自动刷特:</label>
			<select name="auto" id="auto">
				<?php
    $query = "SELECT DISTINCT auto FROM l4d2stats.timedmaps";
    $result = mysql_query($query);
    while ($row = mysql_fetch_assoc($result)) {
      $optionValue = $row['auto'];
      $optionText = ($optionValue == 1 ? '自动' : '固定');
      echo '<option value="' . $optionValue . '">' . $optionText . '</option>';
				}
				?>
			</select>

			<label for="usebuy">使用B数:</label>
			<select name="usebuy" id="usebuy">
				<?php
    $query = "SELECT DISTINCT usebuy FROM l4d2stats.timedmaps";
    $result = mysql_query($query);
    while ($row = mysql_fetch_assoc($result)) {
      $optionValue = $row['usebuy'];
      $optionText = ($optionValue == 1 ? '是' : '否');
      echo '<option value="' . $optionValue . '">' . $optionText . '</option>';
				}
				?>
			</select>

			<label for="finishplayernum">完成人数:</label>
			<select name="finishplayernum" id="finishplayernum">
				<?php
    $query = "SELECT DISTINCT players FROM l4d2stats.timedmaps";
    $result = mysql_query($query);
    while ($row = mysql_fetch_assoc($result)) {
      $optionValue = $row['players'];
      echo '<option value="' . $optionValue . '">' . $optionValue . '</option>';
				}
				?>
			</select>

			<input type="submit" name="submit" value="提交">
		</form>
		<!-- JavaScript 代码 -->
		<script>
			// 获取 HTML 表单元素
			const form = document.getElementById("my-form");

			// 创建新的 URL 对象，以获取 URL 上的查询参数
			const urlParams = new URLSearchParams(window.location.search);

			// 将查询参数放入数组对象中
			const queryParams = [];
			urlParams.forEach((value, key) => {
				queryParams.push(`${key}=${value}`);
			});

			// 创建新的 URL 对象，以获取您要将动态查询参数添加到的 base URL
			const baseUrl = new URL(form.action);

			// 将查询参数添加到 base URL 上
			queryParams.forEach((param) => {
				baseUrl.searchParams.append(param.split("=")[0], param.split("=")[1]);
			});

			// 设置表单 action，以包含动态查询参数的完整 URL
			form.action = baseUrl.href;
		</script>
	<?php echo $body;?>
	<br />
</div>
<?php include('../_source/footer.php');?>