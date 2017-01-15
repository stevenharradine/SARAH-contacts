<section class="phone">
	<h1>Phone numbers</h1>
	<a href="#" class="add">Add</a>
	<form action="index.php" method="post">
		<input type="hidden" name="action" value="contact_add_phone" />
		<input type="hidden" name="contact_id" value="<?php echo $CONTACT_ID; ?>" />
		
		<div class="add">
			<h2>Add</h2>
			<table>
				<tr>
					<th><label>Location:</label></th>
					<td><input type="text" name="location" id="location" placeholder="Cell" /></td>
				</tr>
				<tr>
					<th><label>Phone number:</label></th>
					<td><input type="text" name="number" id="number" placeholder="(555) 555-5555" /></td>
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
		foreach ($phone_data as $index => $record) {
?>
				<tr>
					<td><?php echo $record['location']; ?></td>
					<td><a href="tel: <?php echo $record['phonenumber']; ?>"><?php echo format_phone ($record['phonenumber']); ?></a></td>
					<td></td>
				</tr>
<?php
		}
?>
		</table>
	</form>
</section>