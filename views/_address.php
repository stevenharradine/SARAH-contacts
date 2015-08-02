<section class="address">
	<h1>Address</h1>
	<a href="#" class="add">Add</a>
	<form action="index.php" method="POST">
		<input type="hidden" name="action" value="contact_add_addresss" />
		<input type="hidden" name="contact_id" value="<?php echo $CONTACT_ID; ?>" />
		
		<div class="add">
			<h2>Add</h2>
			<table>
				<tr>
					<th><label for="location">Location:</label></th>
					<td><input type="text" name="location" id="location" /></td>
				</tr>
				<tr>
					<th><label for="street_number">Street number:</label></th>
					<td><input type="text" name="street_number" id="street_number" /></td>
				</tr>
				<tr>
					<th><label for="street_name">Street name:</label></th>
					<td><input type="text" name="street_name" /></td>
				</tr>
				<tr>
					<th><label for="street_type">Street type:</label></th>
					<td><input type="text" name="street_type" /></td>
				</tr>
				<tr>
					<th><label for="street_type">Street direction:</label></th>
					<td><input type="text" name="street_direction" /></td>
				</tr>
				<tr>
					<th><label for="postal_code">Postal code:</label></th>
					<td><input type="text" name="postal_code" /></td>
				</tr>
				<tr>
					<th><label for="city">City:</label></th>
					<td><input type="text" name="city" /></td>
				</tr>
				<tr>
					<th><label for="province">Province:</label></th>
					<td><input type="text" name="province" /></td>
				</tr>
				<tr>
					<th><label for="country">Country:</label></th>
					<td><input type="text" name="country" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="Save" /></td>
				</tr>
			</table>
		</div>
	</form>
<?php
		while (($row = mysql_fetch_array( $address_data )) != null) {
?>
		<p><?php echo $row['location']; ?></p>
		<p><?php echo $first_name; ?> <?php echo $last_name; ?></p>
		<p><?php echo $row['street_number']; ?> <?php echo $row['street_name']; ?> <?php echo $row['street_type']; ?> <?php echo $row['street_direction']; ?></p>
		<p><?php echo $row['city']; ?>, <?php echo $row['province']; ?> <?php echo $row['postal_code']; ?></p>
		<p><?php echo $row['country']; ?></p>
<?php
		}
?>
</section>