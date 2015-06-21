<?php
	class ContactManager {
		public function getAllContacts () {
			global $sessionManager;
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
			$data = mysql_query($sql) or die(mysql_error());

			return $data;
		}

		public function addRecord ($first_name, $middle_name, $last_name) {
			global $sessionManager;
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

			return mysql_query($sql) or die(mysql_error());
		}

		public function addPhone ($CONTACT_ID, $location, $phone_number) {
			global $sessionManager;
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

			return mysql_query($sql) or die(mysql_error());
		}

		public function addEmail ($CONTACT_ID, $location, $email_address) {
			global $sessionManager;
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

			return mysql_query($sql) or die(mysql_error());
		}

		public function addAddress ($CONTACT_ID, $location, $street_number, $street_name, $street_type, $street_direction, $postal_code, $city, $province, $country) {
			global $sessionManager;
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

			return mysql_query($sql) or die(mysql_error());
		}

		public function addNote ($CONTACT_ID, $title, $note) {
			global $sessionManager;
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
			return mysql_query($sql) or die(mysql_error());
		}

		public function getPhone ($CONTACT_ID) {
			$sql = <<<EOD
	SELECT *
	FROM `contacts_phonenumber`
	WHERE `CONTACT_ID` = '$CONTACT_ID'
EOD;
			$data = mysql_query($sql) or die(mysql_error()); 
			
			return $data;
		}

		public function getAddress ($CONTACT_ID) {
			$sql = <<<EOD
	SELECT *
	FROM `contacts_address`
	WHERE `CONTACT_ID` = '$CONTACT_ID'
EOD;
			$data = mysql_query($sql) or die(mysql_error()); 
			
			return $data;
		}

		public function getEmail ($CONTACT_ID) {
			$sql = <<<EOD
	SELECT *
	FROM `contacts_email`
	WHERE `CONTACT_ID` = '$CONTACT_ID'
EOD;
			$data = mysql_query($sql) or die(mysql_error()); 
			
			return $data;
		}

		public function getNotes ($CONTACT_ID) {
			$sql = <<<EOD
SELECT
	*
FROM
	`contacts_notes`
WHERE
	`CONTACT_ID` = '$CONTACT_ID'
EOD;
			$data = mysql_query($sql) or die(mysql_error()); 
			
			return $data;
		}

		public function getName ($CONTACT_ID) {
			$sql = <<<EOD
	SELECT *
	FROM `contacts`
	WHERE `CONTACT_ID` = '$CONTACT_ID';
EOD;
			$data = mysql_query($sql) or die(mysql_error()); 
			
			return $data;
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