<?php
include_once ENTITIES . 'AdminModel.php';

class LoginModel extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	function verifyLogin($email, $password)
	{
		try {
			$query = $this->db->connect()->prepare(
				"SELECT * FROM ADMINS WHERE EMAIL = :email AND PASSWORD = :password"
			);
			$query->execute(['email' => $email, 'password' => $password]);
			$row = $query->fetch();
			return $row;
		} catch (PDOException $e) {
			$e = 'Email incorrect';
		}
	}
}
