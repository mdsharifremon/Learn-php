<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Ajax With Fetch API</title>
  <style>
    /* th,td{text-align: center;} */
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h2 class="fw-bold text-primary">CRUD Application With Fetch API</h2>
        <input type="text" style="max-width:300px;" class="form-control" name="search" id="search" placeholder="Search">
      </div>
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center py-3">
          <h4>All Records</h4>
          <div id="message"></div>
          <button class='btn btn-primary' id="add-record" data-bs-target="#add-record-modal" data-bs-toggle="modal">Add Record</button>
        </div>

        <table class="table table-striped table-hover">
          <thead class='bg-primary text-light'>
            <tr>
              <th class="scope text-center">ID</th>
              <th class="scope">Name</th>
              <th class="scope">Class</th>
              <th class="scope">City</th>
              <th class="scope text-center" style="width:150px;">Action</th>
            </tr>
          </thead>
          <tbody id="output">

          </tbody>
        </table>
      </div>
    </div>
  </div>



  <!-- Add Record Modal -->
  <div class="modal fade" id="add-record-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-light">
          <h5 class="modal-title">Add New Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form" id="insert-form">
            <div class="form-group mb-3">
              <label for="fname">First Name</label>
              <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter Your First Name">
            </div>
            <div class="form-group mb-3">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Your Last Name">
            </div>
            <div class="form-group mb-3">
              <label for="class">Class</label>
              <select name="class" id="class" class="form-control form-select">
                <option selected disabled>Select your class</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="city">City</label>
              <select name="city" id="city" class="form-control form-select">
                <option selected disabled>Select your city</option>
              </select>
            </div>
            <div id="insert-err"></div>
            <button type="submit" class="btn btn-primary w-100 mt-2" id="saveInsertBtn">Save Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Edit Record Modal -->
  <div class="modal fade" id="edit-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success text-light">
          <h5 class="modal-title" id="exampleModalLabel">Update Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="form" id="update-form">
            <div class="form-group mb-3">
              <label for="name">Name</label>
              <input type="hidden" id="up-id">
              <input type="text" name="fname" id="up-fname" class="form-control" placeholder="Enter Your Name">
            </div>
            <div class="form-group mb-3">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="up-lname" class="form-control" placeholder="Enter Your Last Name">
            </div>
            <div class="form-group mb-3">
              <label for="class">Class</label>
              <select name="class" id="update-class" class="form-control form-select"></select>
            </div>
            <div class="form-group mb-3">
              <label for="city">City</label>
              <select name="city" id="update-city" class="form-control form-select"></select>
            </div>
            <div id="update-err"></div>
            <button type="submit" class="btn btn-success w-100 mt-2" id="saveUpdateBtn">Update Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="index.js"></script>
</body>

</html>