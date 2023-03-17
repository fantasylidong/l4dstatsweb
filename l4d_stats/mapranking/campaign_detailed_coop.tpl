<div class="no-more-tables">
	<table class="table">
		<thead class="content-table-noborder bg-main">
		<tr>
			<td>名次</td>
			<td>完成时间</td>
			<td>难度</td>
			<td>Anne版本</td>
			<td>完成人员</td>
		</tr>
		</thead>
		<tbody>
		<?php foreach($rank as $key => $value) { ?>
		<tr>
			<td><?php echo $value; ?></td>
			<td><?php echo $time[$key]; ?></td>
			<td><?php echo $difficult[$key]; ?></td>
			<td><?php echo $Anne版本; ?></td>
			<td><?php echo $完成人员[$key]; ?></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
