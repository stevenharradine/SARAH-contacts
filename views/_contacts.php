<?php
		foreach ($contacts_data as $index => $record) {
?>
			<section class="contact" data-status="empty">
				<a class="contact" data-contact-id="<?php echo $record['CONTACT_ID']; ?>" href="details.php?contact_id=<?php echo $record['CONTACT_ID']; ?>"><?php echo $record['first_name']; ?> <?php echo $record['last_name']; ?></a>
				<div class="information">
					
				</div>
			</section>
<?php
		}