<h3><?php _e('Historical Comment Count'); ?></h3>
<p>
	The following is the number of approved comments on this blog over the last few months.
</p>
	<table class="widefat" style="width: 80%;">
		<tr>
			<td><strong>Year-Month</strong></td>
			<td><strong>Comments</strong></td>
		</tr>
		<?php
			foreach($numbers as $key=>$value)
			{
				?>
				<tr>
					<td><?php echo $key; ?></td>
					<td><?php echo $value['count']; ?></td>
				</tr>
				<?php
			}
		?>
	</table>
