<table class="table">
	<thead class="content-table-noborder bg-main">
		<tr>
			<td>游戏模式</td>
			<td>玩家</td>
			<td>分数</td>
			<td>游玩时间</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($online as $player): ?><?php echo $player; ?><?php endforeach; ?>
	</tbody>
</table>