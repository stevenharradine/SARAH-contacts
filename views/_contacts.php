<?php
		while (($row = mysql_fetch_array( $contacts_data )) != null) {
?>
			<section class="contact" data-status="empty">
				<a class="contact" data-contact-id="<?php echo $row['CONTACT_ID']; ?>" href="details.php?contact_id=<?php echo $row['CONTACT_ID']; ?>"><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></a>
				<div class="information">
					
				</div>
			</section>
<?php
		}