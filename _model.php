<?php
	class ContactManager {
		public function get_link () {
			global $DB_ADDRESS;
			global $DB_USER;
			global $DB_PASS;
			global $DB_NAME;

			return $link = DB_Connect($DB_ADDRESS, $DB_USER, $DB_PASS, $DB_NAME);
		}
		public function getAllContacts () {
			global $sessionManager;
			$link = ContactManager::get_link();
			$USER_ID = $sessionManager->getUserId();

			$sql = <<<EOD
	SELECT *
	FROM `contacts`
	WHERE `USER_ID`='$USER_ID'
	ORDER BY last_name,
		first_name,
		middle_name
	ASC;
EOD;

			$contacts = array ();

			if ($result = $link->query($sql)) {
				while ( $row = $result->fetch_object() ) {
					$contacts[] = array (
						"CONTACT_ID" => $row->CONTACT_ID,
						"first_name" => $row->first_name,
						"middle_name" => $row->middle_name,
						"last_name" => $row->last_name,
					);
				}
			}

			return $contacts;
		}

		public function addRecord ($first_name, $middle_name, $last_name) {
			global $sessionManager;
			$link = ContactManager::get_link();
			$USER_ID = $sessionManager->getUserId();

			$sql = <<<EOD
	INSERT INTO `sarah`.`contacts` (
		`USER_ID`,
		`first_name`,
		`middle_name`,
		`last_name`
	) VALUES (
		$USER_ID,
		'$first_name',
		'$middle_name',
		'$last_name'
	);
EOD;

			return $link->query($sql);
		}

		public function addPhone ($CONTACT_ID, $location, $phone_number) {
			global $sessionManager;
			$link = ContactManager::get_link();
			$USER_ID = $sessionManager->getUserId();

			$sql = <<<EOD
	INSERT INTO `sarah`.`contacts_phonenumber` (
		`CONTACT_ID`,
		`location`,
		`phonenumber`
	) VALUES (
		'$CONTACT_ID',
		'$location',
		'$phone_number'
	);
EOD;

			return $link->query($sql);
		}

		public function addEmail ($CONTACT_ID, $location, $email_address) {
			global $sessionManager;
			$link = ContactManager::get_link();
			$USER_ID = $sessionManager->getUserId();

			$sql = <<<EOD
	INSERT INTO  `sarah`.`contacts_email` (
		`CONTACT_ID`,
		`location`,
		`email`
	) VALUES (
		'$CONTACT_ID',
		'$location',
		'$email_address'
	);
EOD;

			return $link->query($sql);
		}

		public function addAddress ($CONTACT_ID, $location, $street_number, $street_name, $street_type, $street_direction, $postal_code, $city, $province, $country) {
			global $sessionManager;
			$link = ContactManager::get_link();
			$USER_ID = $sessionManager->getUserId();

			$sql = <<<EOD
	INSERT INTO `sarah`.`contacts_address` (
		`CONTACT_ID`,
		`location`,
		`street_number`,
		`street_name`,
		`street_type`,
		`street_direction`,
		`postal_code`,
		`city`,
		`province`,
		`country`
	) VALUES (
		'$CONTACT_ID',
		'$location',
		'$street_number',
		'$street_name',
		'$street_type',
		'$street_direction',
		'$postal_code',
		'$city',
		'$province',
		'$country'
	);
EOD;

			return $link->query($sql);
		}

		public function addNote ($CONTACT_ID, $title, $note) {
			global $sessionManager;
			$link = ContactManager::get_link();
			$USER_ID = $sessionManager->getUserId();

			$sql = <<<EOD
	INSERT INTO `sarah`.`contacts_notes` (
		`CONTACT_ID`,
		`title`,
		`note`
	) VALUES (
		'$CONTACT_ID',
		'$title',
		'$note'
	);
EOD;

			$result = $link->query($sql);

			return $result;
		}

		public function getPhone ($CONTACT_ID) {
			$link = ContactManager::get_link();
			$sql = <<<EOD
	SELECT *
	FROM `contacts_phonenumber`
	WHERE `CONTACT_ID` = '$CONTACT_ID'
EOD;

			$phonenumbers = array ();

			if ($result = $link->query($sql)) {
				while ( $row = $result->fetch_object() ) {
					$phonenumbers[] = array (
						"location" => $row->location,
						"phonenumber" => $row->phonenumber,
					);
				}
			}

			return $phonenumbers;
		}

		public function getAddress ($CONTACT_ID) {
			$link = ContactManager::get_link();
			$sql = <<<EOD
	SELECT *
	FROM `contacts_address`
	WHERE `CONTACT_ID` = '$CONTACT_ID'
EOD;
			$addresses = array ();

			if ($result = $link->query($sql)) {
				while ( $row = $result->fetch_object() ) {
					$addresses[] = array (
						"location" => $row->location,
						"street_number" => $row->street_number,
						"street_name" => $row->street_name,
						"street_type" => $row->street_type,
						"street_direction" => $row->street_direction,
						"city" => $row->city,
						"province" => $row->province,
						"postal_code" => $row->postal_code,
						"country" => $row->country,
					);
				}
			}

			return $addresses;
		}

		public function getEmail ($CONTACT_ID) {
			$link = ContactManager::get_link();
			$sql = <<<EOD
	SELECT *
	FROM `contacts_email`
	WHERE `CONTACT_ID` = '$CONTACT_ID'
EOD;
			$emailaddresses = array ();

			if ($result = $link->query($sql)) {
				while ( $row = $result->fetch_object() ) {
					$emailaddresses[] = array (
						"location" => $row->location,
						"email" => $row->email,
					);
				}
			}

			return $emailaddresses;
		}

		public function getNotes ($CONTACT_ID) {
			$link = ContactManager::get_link();
			$sql = <<<EOD
SELECT
	*
FROM
	`contacts_notes`
WHERE
	`CONTACT_ID` = '$CONTACT_ID'
EOD;
			$notes = array ();

			if ($result = $link->query($sql)) {
				while ( $row = $result->fetch_object() ) {
					$notes[] = array (
						"title" => $row->title,
						"note" => $row->note,
					);
				}
			}

			return $notes;
		}

		public function getName ($CONTACT_ID) {
			$link = ContactManager::get_link();
			$sql = <<<EOD
	SELECT *
	FROM `contacts`
	WHERE `CONTACT_ID` = '$CONTACT_ID';
EOD;

//			$name = array ();

			if ($result = $link->query($sql)) {
				while ( $row = $result->fetch_object() ) {
					$name = array (
						"first_name" => $row->first_name,
						"middle_name" => $row->middle_name,
						"last_name" => $row->last_name,
					);
				}
			}

			return $name;
		}
		/*public function updateRecord ($id, $amount, $category, $store, $items, $date) {
			global $sessionManager;
			$USER_ID = $sessionManager->getUserId();

			$sql = <<<EOD
	UPDATE `sarah`.`spending`
	SET `amount` = '$amount',
		`category` = '$category',
		`store` = '$store',
		`items` = '$items',
		`date` = '$date'
	WHERE `SPENDING_ID`='$id'
	AND `USER_ID`='$USER_ID';
EOD;
			
			return mysql_query($sql) or die(mysql_error());
		}

		public function deleteRecord ($id) {
			global $sessionManager;
			$USER_ID = $sessionManager->getUserId();

			$sql = <<<EOD
	DELETE FROM `sarah`.`spending`
	WHERE `SPENDING_ID`='$id'
	AND `USER_ID`='$USER_ID';
EOD;

			return mysql_query($sql) or die(mysql_error());
		}

		public function getRecord ($id) {
			global $sessionManager;
			$USER_ID = $sessionManager->getUserId();

			$sql = <<<EOD
	SELECT *
	FROM `spending`
	WHERE `SPENDING_ID`='$id'
	AND `USER_ID`='$USER_ID';
EOD;
			$data = mysql_query($sql) or die(mysql_error());
			return mysql_fetch_array( $data );
		}*/
	}