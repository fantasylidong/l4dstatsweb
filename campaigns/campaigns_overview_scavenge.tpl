<?php foreach ($arr_achievements as $achievement): ?><?php echo $achievement;?><?php endforeach;?>
<br />
<div class="card rounded-0">
	<div class="no-more-tables">
		<table class="table">
			<thead class="content-table-noborder bg-main">
				<tr>
					<td rowspan="2">难度</td>
					<td rowspan="2">游玩时间</td>
					<td rowspan="2">输的次数</td>
					<td colspan="2">分数</td>
					<td colspan="2">消灭的小僵尸</td>
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
</div>
<br />