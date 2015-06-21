<?php
	require_once '../../views/_secureHead.php';

	if( isset ($sessionManager) && $sessionManager->isAuthorized () ) {
		$CONTACT_ID = request_isset ('contact_id');
		
		$phone_data = ContactManager::getPhone($CONTACT_ID);
		$address_data = ContactManager::getAddress($CONTACT_ID);
		$email_data = ContactManager::getEmail($CONTACT_ID);
		$notes_data = ContactManager::getNotes($CONTACT_ID);

		$names_data = ContactManager::getName($CONTACT_ID);		
		$first_name = $names_data['first_name'];
		$middle_name = $names_data['middle_name'];
		$last_name = $names_data['last_name'];

		$page_title = 'Details | Contacts';

		$views_to_load = array();
		$views_to_load[] = '_phone.php';
		$views_to_load[] = '_email.php';
		$views_to_load[] = '_address.php';
		$views_to_load[] = '_notes.php';
		
		include '../../views/_generic.php';
	}