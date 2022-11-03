function loadTable() {
    fetch("php/load-table.php")
        .then((response) => response.json())
        .then((data) => {
            var tbody = document.getElementById("tbody");
            if (data["empty"]) {
                tbody.innerHTML =
                    '<tr><td colspan="6" align="center"><h3>No Record Found.</h3></td></tr>';
            } else {
                var tr = "";
                for (var i in data) {
                    tr += `<tr>
                      <td align="center">${data[i].Id}</td>
                      <td>${data[i].FirstName}</td>
                      <td>${data[i].TotalAmount}</td>
                      <td>${data[i].DueAmount}</td>
                      <td>${data[i].PaidAmount}</td>
                      <td align="center"><button class="edit-btn"  onclick="editRecord(${data[i].Id},'${data[i].FirstName}',${data[i].TotalAmount},${data[i].PaidAmount},${data[i].DueAmount})">Pay</button></td>             
                    </tr>`;
                }
                tbody.innerHTML = tr;
            }
        })
        .catch((error) => {
            show_message("error", "Can't Fetch Data");
        });
}
loadTable();

function show_message(type, text) {
    if (type == "error") {
        var message_box = document.getElementById("error-message");
    } else {
        var message_box = document.getElementById("success-message");
    }
    message_box.innerHTML = text;
    message_box.style.display = "block";
    setTimeout(function() {
        message_box.style.display = "none";
        window.location = "http://localhost/PartPaymentforEmployeebyhimanshuchauhan/";
    }, 1000);
}

// Open Add new student Modal Box
function addNewModal() {
    var addModal = document.getElementById("addModal");
    addModal.style.display = "block";
}

// Hide Modal Box / Popup Box
function hide_modal() {
    var addModal = document.getElementById("addModal");
    addModal.style.display = "none";

    var editModal = document.getElementById("modal");
    editModal.style.display = "none";

    show_message("error", "error");
    loadTable();
}

function editRecord(id, fname, tamount, pamount, due) {

    var editModal = document.getElementById("modal");
    editModal.style.display = "block";

    document.getElementById("edit-id").value = id;
    document.getElementById("edit-employee").value = fname;
    document.getElementById("edit-totalamount").value = tamount;
    document.getElementById("edit-paid").value = pamount;
    document.getElementById("edit-due").value = due;

    $(document).ready(function() {
        var val = $('#edit-due').val();
        if (val == '0') {
            $('#pay').attr('disabled', true);
        }

        // $('#close-btn').on('click', function() {
        //     show_message("error", "error");
        //     hide_modal();
        // })
    })

}

function modify_data() {
    var id = parseInt(document.getElementById("edit-id").value);
    var fname = document.getElementById("edit-employee").value;
    var totalamount = parseFloat(
        document.getElementById("edit-totalamount").value
    );
    var paid = parseFloat(document.getElementById("edit-paid").value);
    var due = parseFloat(document.getElementById("edit-due").value);
    var sum = parseFloat(document.getElementById("edit-sum").value);

    var formdata = {
        Id: id,
        fname: fname,
        totalamount: totalamount,
        paid: paid,
        due: due,
        sum: sum,
    };

    jsondata = JSON.stringify(formdata);

    fetch("php/fetch-update.php", {
            method: "PUT",
            body: jsondata,
            headers: {
                "Content-type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((result) => {
            if (result.update == "success") {
                show_message("success", "Payed successfully");
                loadTable();
                hide_modal();

            } else {
                show_message(
                    "error",
                    "Amount to be paid should not be zero, blank, negative or greater than due amount."
                );
                hide_modal();

            }
        })
        .catch((error) => {
            show_message(
                "error",
                "There is someproblem while paid : Server Problem."
            );
        });

}