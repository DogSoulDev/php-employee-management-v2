import gridConfig from "./gridConfig.js";

const getAllEmployees = "Main/getEmployeeList";
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

const addEmployee = async (employee) => {
  console.log(employee);
  const response = await fetch(`Main/insertEmployee/${employee}`, {
    method: 'POST',
    // body: JSON.stringify({
    //   employee_id: employee.employee_id,
    //   name: employee.name,
    //   last_name: employee.last_name,
    //   email: employee.email,
    //   gender_id: employee.gender_id,
    //   age: employee.age,
    //   phone_number: employee.street,
    //   avatar: employee.avatar,
    //   position: employee.position,
    // }),
  });
  const data = await response.text();
  console.log(data);
  // return data;
}

// const editEmployee = async (employee) => {
//   const response = await fetch(`Main/insertEmployee/${data.item}`);
//   const data = await response.json();
//   return data
// }

const deleteEmployee = async (employee_id) => {
  const response = await fetch(`Main/insertEmployee/${employee_id}`);
  // const data = await response.json();
  // return data;
}

async function callGrid() {
  $("#jsGrid").jsGrid({
    width: "100%",
    height: "600px",
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

    onItemInserting: function (data) {
      console.log(data);
      // addEmployee(data.item)
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

    onItemDeleting: function (data) {
      console.log(data.item);
      deleteEmployee(data.item.employee_id);
    }

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