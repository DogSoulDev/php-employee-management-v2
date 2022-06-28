import gridConfig from "./gridConfig.js"

const getAllEmployees = "Main/getEmployeeList";
const insertEmployee = "Main/insertEmployee";
const updateEmployee = "Main/updateEmployee";
// const employeeUrl = `${mainPath}/employee.php`
//TODO review session logout
// const sessionHelperUrl = `${mainPath}/library/sessionHelper.php`

function showMessage(messageText, type) {
  $('#alertMessage').addClass(type).removeClass('hide').text(messageText)
}

function hideMessage(type) {
  setTimeout(function () {
    $('#alertMessage').removeClass(type).addClass('hide')
  }, 2000)
}

const getEmployeesList = async () => {
  const response = await fetch(getAllEmployees);
  const data = await response.json();
  return data
}

const addEmployee = async (item) => {
  const response = await fetch(insertEmployee);
  const data = await response.json();
  return data
}

const editEmployee = async (employee) => {
  const response = await fetch(updateEmployee(employee));
  const data = await response.json();
  return data
}


class employee {
  $employee_id;
  $name;
  $last_name;
  $email;
  $gender_id;
  $age;
  $phone_number;
  $avatar;
  $position;
}

async function callGrid() {
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "400px",
    inserting: true,
    editing: true,
    sorting: true,
    autoload: true,
    filtering: false,
    paging: true,
    pageSize: 10,
    pageButtonCount: 5,
    confirmDeleting: true,
    deleteConfirm: 'Do you really want to delete employee?',

    fields: gridConfig,

    controller: {
      loadData: getEmployeesList,
    },

    onItemInserting: function (item) {
      console.log(item.item.name);
      $data = new employee();
      $data.$name = item.item.name;
      addEmployee(item.item);
    },

    onItemInserted: function () {
      showMessage('Employee Inserted', 'alert-success')
      hideMessage('alert-success')
    },

    onItemUpdating: function (item) {
      editEmployee(item.employee_id);
    },
    // rowClick: function (args) {
    //     window.location.assign(`${employeeUrl}?id=${args.item.id}`)
    // },


    // onItemUpdated: function () {
    //     showMessage('Employee Updated', 'alert-success')
    //     hideMessage('alert-success')
    // },

    // onItemDeleting: async function(args){
    //     $.ajax({
    //         type: 'POST',
    //         url: employeeControllerUrl,
    //         dataType: "json",
    //         data: ({
    //             action: 'delete',
    //             user: args.item
    //         }),
    //     })
    // },

    // onItemDeleted: function () {
    //     showMessage('Employee Deleted', 'alert-success')
    //     hideMessage('alert-success')
    // }
  });
}

callGrid();

// setInterval(() => {
//   $.ajax({
//     type: 'POST',
//     url: `${sessionHelperUrl}`,
//     success: function (data) {
//       if (data === "logout") {
//         location.assign("./../index.php")
//       }
//     }
//   })
// }, 10000)