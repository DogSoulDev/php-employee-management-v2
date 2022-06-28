<?php

class MainController extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function defaultMethod()
    {
        $this->view->render('main/index');
    }

    function getEmployeeList()
    {
        $employees = $this->model->getAllEmployees();
        echo json_encode($employees);
    }

    function getEmployee($employee_id)
    {
        $employee = $this->model->getEmployeeByID($employee_id);
        echo json_encode($employee);
    }

    function updateEmployee($data){
        $this->model->updateEmployee($data);
    }

    function insertEmployee($data){
        // $employee = new EmployeeModel();
        // // $employee->employee_id = $data['employee_id'];
        // print_r($data);
        // $employee->name = $data['name'];
        // $employee->last_name = $data['last_name'];
        // $employee->email = $data['email'];
        // $employee->gender_id = $data['gender_id'];
        // $employee->age = $data['age'];
        // $employee->phone_number = $data['phone_number'];
        // $employee->avatar = $data['avatar'];
        // $employee->position = $data['position'];
        // $this->model->insertEmployee($employee);
        print_r($data);
    }

  
}
