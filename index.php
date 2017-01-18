<?php
	require_once '../../views/_secureHead.php';
	require_once '../../models/_header.php';
	require_once '../../models/_add.php';
	require_once '../../models/_table.php';

	if( isset ($sessionManager) && $sessionManager->isAuthorized () ) {
		$first_name			= request_isset ('first_name');
		$middle_name		= request_isset ('middle_name');
		$last_name			= request_isset ('last_name');
		
		$CONTACT_ID			= request_isset ('contact_id');
		$location			= request_isset ('location');
		$phone_number		= request_isset ('number');
		
		$street_number		= request_isset ('street_number');
		$street_name		= request_isset ('street_name');
		$street_type		= request_isset ('street_type');
		$street_direction	= request_isset ('street_direction');
		$postal_code		= request_isset ('postal_code');
		$city				= request_isset ('city');
		$province			= request_isset ('province');
		$country			= request_isset ('country');
		$title				= request_isset ('title');
		$note				= request_isset ('note');
		
		$email_address		= request_isset ('email_address');

		$frontend_debug = request_isset ('debug');

		switch ($page_action) {
			case 'add_contact' :
				$db_add_success	= ContactManager::addRecord ($first_name, $middle_name, $last_name);
				break;
			case 'contact_add_phone':
				$db_add_phone_success = ContactManager::addPhone ($CONTACT_ID, $location, $phone_number);
				break;
			case 'contact_add_email' :
				$db_add_email_success	= ContactManager::addEmail ($CONTACT_ID, $location, $email_address);
				break;
			case 'contact_add_addresss' :
				$db_add_address_success	= ContactManager::addAddress ($CONTACT_ID, $location, $street_number, $street_name, $street_type, $street_direction, $postal_code, $city, $province, $country);
			case 'contact_add_note' :
				$db_add_note_success = ContactManager::addNote ($CONTACT_ID, $title, $note);
		}
		
		$contacts_data = ContactManager::getAllContacts();
		
		$page_title = 'Contacts';
		
		$alt_menu = getAddButton();

		$addView = new AddView ('Add', 'add_contact');
		$addView->addRow ('first_name', 'Name', null, 'First');
		$addView->addRow ('middle_name', '', null, 'Middle');
		$addView->addRow ('last_name', '', null, 'Last');
	
		$views_to_load = array();
		$views_to_load[] = '../../views/_add.php';
		$views_to_load[] = '_contacts.php';
		
		include '../../views/_generic.php';
	}