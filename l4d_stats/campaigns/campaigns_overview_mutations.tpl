<?php foreach ($arr_achievements as $achievement): ?><?php echo $achievement;?><?php endforeach;?>
<br />
<div class="card rounded-0">
	<div class="no-more-tables">
		<table class="table">
			<thead class="content-table-noborder bg-main">
				<tr>
					<td>地图</td>
					<td>游玩时间</td>
					<td>分数 (PPM)</td>
					<td>消灭的感染者</td>
					<td>重启</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($maps as $map): ?><?php echo $map;?><?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<br />