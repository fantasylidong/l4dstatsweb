<div class="card rounded-0">
	<div class="no-more-tables">
		<table class="table">
			<thead class="content-table-noborder bg-main">
				<tr>
					<td>排名</td>
					<td>玩家</td>
					<td>分数</td>
					<td>游玩时间</td>
					<td>最后上线</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($players as $player): ?><?php echo $player;?><?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<br />