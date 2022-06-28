<?php
include_once ENTITIES . 'AdminModel.php';
include_once ENTITIES . 'EmployeeModel.php';

class MainModel extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	function getAllEmployees()
	{
		$employees = [];
		try {
			$query = $this->db->connect()->prepare("SELECT * FROM EMPLOYEES");
			$query->execute();
			while ($row = $query->fetch()) {
				$employee = new EmployeeModel();
				$employee->employee_id = $row['employee_id'];
				$employee->name = $row['name'];
				$employee->last_name = $row['last_name'];
				$employee->email = $row['email'];
				$employee->gender_id = $row['gender_id'];
				$employee->age = $row['age'];
				$employee->phone_number = $row['phone_number'];
				$employee->avatar = $row['avatar'];
				$employee->position = $row['position'];
				array_push($employees, $employee);
			}
			return $employees;
		} catch (PDOException $e) {
			$e = 'Database could not be fetched';
		}
	}


	function getEmployeeByID($employee_id)
	{
		$query = $this->db->connect()->prepare("SELECT * FROM EMPLOYEES WHERE EMPLOYEE_ID = : employee_id;");
		try {

			$employee = new EmployeeModel();
			$query->execute(['employee_id' => $employee_id]);
			$employee = new EmployeeModel();

			$row = $query->fetch();
			$employee->employee_id = $row['employee_id'];
			$employee->name = $row['name'];
			$employee->last_name = $row['last_name'];
			$employee->email = $row['email'];
			$employee->gender_id = $row['gender_id'];
			$employee->age = $row['age'];
			$employee->phone_number = $row['phone_number'];
			$employee->avatar = $row['avatar'];
			$employee->position = $row['position'];

			return $employee;
		} catch (PDOException $e) {
			$e = 'Database could not be fetched';
		}
	}


	function insertEmployee($data)
	{
		$result = "OK";
		try {
			//Insert data into DB
			$query = $this->db->connect()->prepare('INSERT INTO EMPLOYEES (name, last_name, email, gender_id, age, phone_number, avatar, position) VALUES(:name, :last_name, :email, :gender_id, :age, phone_number, :avatar, :position)');
			$query->execute(['name' => $data['name'], 'last_name' =>$data['last_name'], 'email' => $data['email'], 'gender_id' => $data['gender_id'], 'age' => $data['age'], 'phone_number' => $data['phone_number'], 'avatar' => $data['avatar'], 'position' => $data['position'] ]);
			return $result;
		} catch (PDOException $e) {
			if ($e->errorInfo[1] == 1062) {
				return $result = "This email already exists";
			} else {
				return $result = "Database error";
			}
		}
	}

	function updateEmployee($employee)
	{
		$query = $this->db->connect()->prepare("UPDATE EMPLOYEES SET name = :name,last_name = :last_name, email = :email, gender_id = :gender_id, age = :age, phone_number = :phone_number, avatar = :avatar, position = :position WHERE employee_id = :employee_id");

		try {
			$query->execute([
				'employee_id' => $employee['employee_id'],
				'name' => $employee['name'],
				'last_name' => $employee['last_name'],
				'email' => $employee['email'],
				'gender_id' => $employee['gender_id'],
				'age' => $employee['age'],
				'phone_number' => $employee['phone_number'],
				'avatar' => $employee['avatar'],
				'position' => $employee['position']
			]);
			return true;
		} catch (PDOException $e) {
			return false;
		}
	}
}
