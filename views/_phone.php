<section class="phone">
	<h1>Phone numbers</h1>
	<a href="#" class="add">Add</a>
	<form action="index.php" method="post">
		<input type="hidden" name="action" value="contact_add_phone" />
		<input type="hidden" name="contact_id" value="<?php echo $CONTACT_ID; ?>" />
		
		<div class="add">
			<table>
				<tr>
					<td><input type="text" name="location" id="location" placeholder="Location" /></td>
					<td><input type="text" name="number" id="number" placeholder="Phone number" /></td>
					<td><input type="submit" value="Save" /></td>
				</tr>
			</table>
		</div>
		<table>
<?php
		while (($row = mysql_fetch_array( $phone_data )) != null) {
?>
				<tr>
					<td><?php echo $row['location']; ?></td>
					<td><a href="tel: <?php echo $row['phonenumber']; ?>"><?php echo format_phone ($row['phonenumber']); ?></a></td>
					<td></td>
				</tr>
<?php
		}
?>
		</table>
	</form>
</section>