<section class="email">
	<h1>Email Addresses</h1>
	<a href="#" class="add">Add</a>
	<form action="index.php" method="post">
		<input type="hidden" name="action" value="contact_add_email" />
		<input type="hidden" name="contact_id" value="<?php echo $CONTACT_ID; ?>" />
		
		<div class="add">
			<h2>Add</h2>
			<table>
				<tr>
					<th><label>Location</label></th>
					<td><input type="text" name="location" id="location" placeholder="Work" /></td>
				</tr>
				<tr>
					<th><label>Email address</label></th>
					<td><input type="text" name="email_address" id="email_address" placeholder="neil@global.com" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Save" />
					</td>
				</tr>
			</table>
		</div>
		<table>
<?php
		foreach ($email_data as $index => $record) {
?>
				<tr>
					<td><?php echo $record['location']; ?></td>
					<td><a href="mailto: <?php echo $record['email']; ?>"><?php echo $record['email']; ?></a></td>
				</tr>
<?php
		}
?>
		</table>
	</form>
</section>