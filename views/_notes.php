<section class="notes">
	<h1>Notes</h1>
	<a href="#" class="add">Add</a>
	<form action="index.php" method="post">
		<input type="hidden" name="action" value="contact_add_note" />
		<input type="hidden" name="contact_id" value="<?php echo $CONTACT_ID; ?>" />
		
		<div class="add">
			<h2>Add</h2>
			<table>
				<tr>
					<th><label for="title">Title:</label></th>
					<td><input type="text" name="title" id="title" placeholder="aug 4th meeting" /></td>
				</tr>
				<tr>
					<th><label for="note">Note:</label></th>
					<td><textarea name="note" id="note" placeholder="Get flow charts from Stark"></textarea></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Save" /></td>
				</tr>
			</table>
		</div>
	</form>
	
	<div>
<?php
		while (($row = mysql_fetch_array( $notes_data )) != null) {
			$title = $row['title'];
			$note = $row['note'];
?>
			<div>
				<h2><?php echo $row['title']; ?></h2>
				<p><?php echo $row['note']; ?></p>
			</div>
<?php
		}
?>
	</div>
</section>