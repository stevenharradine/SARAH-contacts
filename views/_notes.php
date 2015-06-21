<section class="notes">
	<h1>Notes</h1>
	<a href="#" class="add">Add</a>
	<form action="index.php" method="post">
		<input type="hidden" name="action" value="contact_add_note" />
		<input type="hidden" name="contact_id" value="<?php echo $CONTACT_ID; ?>" />
		
		<div class="add">
			<input type="text" name="title" id="title" placeholder="Title" />
			<textarea name="note" id="note"></textarea>
			<input type="submit" value="Save" />
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