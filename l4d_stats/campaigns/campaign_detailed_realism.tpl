<div class="no-more-tables">
	<table class="table">
		<thead class="content-table-noborder bg-main">
			<tr>
				<td>难度</td>
				<td>游玩时间</td>
				<td>分数 (PPM)</td>
				<td>消灭的感染者</td>
				<td>重启</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>普通</td>
				<td><?php echo $playtime[0];?></td>
				<td><?php echo $points[0];?> (<?php echo $ppm[0];?>)</td>
				<td><?php echo $kills[0];?></td>
				<td><?php echo $restarts[0];?></td>
			</tr>
			<tr>
				<td>高级</td>
				<td><?php echo $playtime[1];?></td>
				<td><?php echo $points[1];?> (<?php echo $ppm[1];?>)</td>
				<td><?php echo $kills[1];?></td>
				<td><?php echo $restarts[1];?></td>
			</tr>
			<tr>
				<td>专家</td>
				<td><?php echo $playtime[2];?></td>
				<td><?php echo $points[2];?> (<?php echo $ppm[2];?>)</td>
				<td><?php echo $kills[2];?></td>
				<td><?php echo $restarts[2];?></td>
			</tr>
			<tr>
				<td class="alink-link2">总计:</td>
				<td class="alink-link2"><?php echo $playtime[3];?></td>
				<td class="alink-link2"><?php echo $points[3];?> (<?php echo $ppm[3];?>)</td>
				<td class="alink-link2"><?php echo $kills[3];?></td>
				<td class="alink-link2"><?php echo $restarts[3];?></td>
			</tr>
		</tbody>
		</tbody>
	</table>
</div>