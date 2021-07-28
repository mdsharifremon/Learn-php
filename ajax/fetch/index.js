const addBtn = document.querySelector("#add-record");
const tableMsg = document.querySelector("#message");
const insertError = document.querySelector("#insert-err");
const updateError = document.querySelector("#update-err");
const insertForm = document.querySelector("#insert-form");
const updateForm = document.querySelector("#update-form");
let   insertModal = document.querySelector("#add-record-modal");
	  insertModal = new bootstrap.Modal(insertModal);
let   updateModal = document.querySelector("#edit-modal");
      updateModal = new bootstrap.Modal(updateModal);
const updateCitySelect = document.querySelector("#update-city");
const updateClassSelect = document.querySelector("#update-class");
const updateFname = document.querySelector("#up-fname");
const updateLname = document.querySelector("#up-lname");

// function for load student record in table on page load
function loadTable() {
	fetch("php/load-table.php")
		.then((response) => response.json())
		.then((data) => {
			var tbody = document.getElementById("output");
			if (data["empty"]) {
				tbody.innerHTML =
					'<tr><td colspan="5" align="center"><h3>No Record Found.</h3></td></tr>';
			} else {
				let tr = "";
				data.forEach((row) => {
					tr += `<tr>
		            <td align="center">${row.sid}</td>
		            <td>${row.fname} ${row.lname}</td>
		            <td>${row.class_name}</td>
		            <td>${row.city_name}</td>
		            <td align="center">
					   <button class="btn btn-sm btn-warning mx-1 edit-btn" data-bs-toggle="modal" data-bs-target="#edit-modal" onclick="editData(${row.sid})">Edit</button>
		               <button class="btn btn-sm btn-danger mx-1 delete-btn" onclick="deleteDate(${row.sid})">Delete</button>
					</td>
		          </tr>`;
				});
				tbody.innerHTML = tr;
			}
		})
		.catch((error) => {
			let errMsg = document.getElementById("message");
			show_msg("warning", error.message, errMsg);
		});
}
loadTable(); // Load Student Record on Page opening

// Fetch Class & City to insert
addBtn.addEventListener("click", function () {
	let citySelect = document.querySelector("#city");
	let classSelect = document.querySelector("#class");
	fetch_city(citySelect);
	fetch_class(classSelect);
});
// Fetch City
function fetch_city(citySelect) {
	fetch("php/fetch-city.php")
		.then((res) => res.json())
		.then((data) => {
			let cities = "";
			if (data["empty"]) {
				cities += "<option>No city found</option>";
			} else {
				cities += "<option value='0' disabled selected>Select your city</option>";
				data.forEach((row) => {
					cities += `<option value="${row.city_id}">${row.city_name}</option>`;
				});
			}
			citySelect.innerHTML = cities;
		})
		.catch((err) => {
			show_msg("danger", err.message, insertError);
		});
}
	// Fetch Class
function fetch_class(classSelect) {

	fetch("php/fetch-class.php")
		.then((response) => response.json())
		.then((classData) => {
			let classes = "";
			if (classData["empty"]) {
				classes += "<option>No class found</option>";
			} else {
				classes += "<option value='0' disabled selected>Select your class</option>";
				classData.forEach((row) => {
				   classes += `<option value="${row.class_id}">${row.class_name}</option>`;
				});
			}
			classSelect.innerHTML = classes;
		})
		.catch((err) => {
			show_msg("danger", err.message, insertError);
		});
}

// Insert Data To Database
insertForm.addEventListener('submit', function (e) {
	e.preventDefault();
	let fname = document.querySelector('#fname').value;
	let lname = document.querySelector('#lname').value;
	let city  = document.querySelector('#city').value;
	let className = document.querySelector('#class').value;

	if (fname === '' || lname === '' || city === 0 || className === 0) {
		show_msg('danger', "Fill up all the fields", insertError);
		return false;
	} else {
		let formData = {
			fname,
			lname,
			city,
			class: className
		}

		fetch('php/insert.php', {
			method: 'POST',
			body : JSON.stringify(formData),
			headers: { "Content-Type": "application/json" }
		}).then(response => response.json())
			.then(data => {
				if (data.insert == 'success') {
					show_msg("success", "Data Inserted Successfully", tableMsg);
					loadTable();
					this.reset();
					insertModal.hide();

				} else {
					show_msg('danger', 'Insert data failed', tableMsg);
					// hideModal(insertModal);
				}
			})
			.catch(err => show_msg('danger', err.message, insertError))
		
	}
})

function editData(id){
	let sid = {
		id : id,
	}
	fetch('php/load-update-data.php', {
		method: 'POST',
		body: JSON.stringify(sid),
		headers: { "Content-Type": "application/json"},
	})
		.then(response => response.json())
		.then(data => {
			if (data.empty == 'empty') {
				show_msg("warning", "no data found to update", updateError);
			} else {
				updateFname.value = data[0].fname;
				updateLname.value = data[0].lname;
				document.getElementById('up-id').value = data[0].sid;
				let cityId = data[0].city;
				let classId = data[0].class;
                //Fetch City
				fetch("php/fetch-city.php")
					.then((response) => response.json())
					.then((cityData) => {
						let cities = "";
						if (cityData["empty"]) {cities += "<option>No city found</option>";
						} else {
							let citySelected = '';
							cityData.forEach((row) => {
								if (row.city_id == cityId) {
									citySelected = "selected";
								} else {
									citySelected = "";
								}
								cities += `<option value="${row.city_id}" ${citySelected}>${row.city_name}</option>`;
							});
						}
						updateCitySelect.innerHTML = cities;
					})
					.catch((err) => {
						show_msg("danger", err.message, insertError);
					});
				
				//Fetch Class
				fetch("php/fetch-class.php")
					.then((response) => response.json())
					.then((classData) => {
						let classes = "";
						if (classData["empty"]) {
							classes += "<option>No class found</option>";
						} else {
							let classSelected = "";
							classData.forEach((row) => {
								if (row.class_id == classId) {
									classSelected = "selected";
								} else {
									classSelected = "";
								}
								classes += `<option value="${row.class_id}" ${classSelected}>${row.class_name}</option>`;
							});
						}
						updateClassSelect.innerHTML = classes;
					})
					.catch((err) => {
						show_msg("danger", err.message, insertError);
					});

			}
		})
		.catch(err => show_msg("warning", err.message, tableMsg));
}

// Insert Data To Database
updateForm.addEventListener('submit', function (e) {
	e.preventDefault();
	let sid = document.getElementById("up-id").value;
	let fname = document.querySelector("#up-fname").value;
	let lname = document.querySelector('#up-lname').value;
	let city = document.querySelector("#update-city").value;
	let className = document.querySelector("#update-class").value;

	if (fname === '' || lname === '' || city === '0' || className === '0') {
		show_msg('danger', "Fill up all the fields", updateError);
		return false;
	} else {
		let formData = {
			sid,
			fname,
			lname,
			city,
			class: className
		};
		let jsonData = JSON.stringify(formData);
		console.log(jsonData);
		fetch("php/fetch-update.php", {
			method: "PUT",
			body: jsonData,
			headers: {
				"Content-type": "application/json",
			},
		})
			.then((response) => response.json())
			.then((result) => {
				if (result.update == "success") {
					show_msg("success", "Data Updates Successfully", tableMsg);
					loadTable();
					updateModal.hide();
				} else {
					show_msg("danger", "Update data failed", tableMsg);
				}
			})
			.catch((err) => show_msg("danger", err.message, updateError));
	}
})










//show error / success message
function show_msg(type, msg, parent) {
	parent.innerHTML = `<div class='alert alert-${type} my-1 py-2 alert-dismissible fade show' role='alert'>
                <strong>${msg}</strong>
               <button type='button' style='height:0.1em;' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>`;
	let hide = document.querySelector(".alert-dismissible");
	setTimeout(function () {
		hide.remove();
	}, 8000);
}



