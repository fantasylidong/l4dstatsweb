<div class="no-more-tables">
	<table class="table">
		<thead class="content-table-noborder bg-main">
			<tr>
				<td rowspan="2">地图</td>
				<td rowspan="2">游玩时间</td>
				<td rowspan="2">失败回合数量</td>
				<td colspan="2">分数</td>
				<td colspan="2">击杀数量</td>
			</tr>
			<tr>
				<td><img src="../_source/images/icon_infected.png" alt="infected"></td>
				<td><img src="../_source/images/icon_survivors.png" alt="survivors"></td>
				<td><img src="../_source/images/icon_infected.png" alt="infected"></td>
				<td><img src="../_source/images/icon_survivors.png" alt="survivors"></td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($maps as $map): ?><?php echo $map;?><?php endforeach; ?>
		</tbody>
	</table>
</div>