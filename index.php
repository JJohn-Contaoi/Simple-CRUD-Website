<?php
  include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>PHP and MySQL CRUD</title>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="" target="_blank" >COMPSC 116</a>
    </div>
  </nav>
  <br><br><br>

  <div class="container">
    <div class="row">
      <div class="col-md-12 card">
        <div>
          <div class="head-title">
            <h4 class="text-center">CRUD Operation with PHP, MySQL, and Bootstrap</h4>
            <hr>
          </div>
          <div class="col-md-3 float-left add-new-button">
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModal">
              <i class="fas fa-plus"></i> Add New Record
            </a>
          </div>
          
          <br><br><br>
          <table class="table table-striped">
            <thead class="bg-secondary text-white">
              <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Skills</th>
                <th>Program</th>
                <th>View</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
 <!-- insert script here for 4b -->
  <?php

      $sql = "SELECT * FROM tbl_student";
      $result = mysqli_query($conn, $sql);

    if($result)
    {
      while($row = mysqli_fetch_assoc($result)){
    ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['firstname']; ?></td>
        <td><?php echo $row['lastname']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['skills']; ?></td>
        <td><?php echo $row['program']; ?></td>
        <td>
          <button type="button" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i> Update </button>
        </td>
        <td>
          <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i> View </button>
        </td>
        <td>
          <button type="button" class="btn btn-danger deleteBtn"> <i class="fas fa-trash-alt"></i> Delete </button>
        </td>
      </tr>
    <?php
      }
    }else{
      echo "<script> alert('No Record found');</script>";
    }

  ?>            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- MODALS -->

  <!-- ADD RECORD MODAL -->
  <div class="modal fade" id="addModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add New Record</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="insert.php" method="POST">
            <div class="form-group">
              <label for="title">First Name</label>
              <input type="text" name="firstname" class="form-control" placeholder="Enter first name" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Last Name</label>
              <input type="text" name="lastname" class="form-control" placeholder="Enter last name" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Address</label>
              <input type="text" name="address" class="form-control" placeholder="Enter address" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Skills</label>
              <input type="text" name="skills" class="form-control" placeholder="Enter skills" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="title">Program</label>
              <input type="text" name="program" class="form-control" placeholder="Enter Program" maxlength="50"
                required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="insertData">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- VIEW MODAL -->
  <div class="modal fade" id="viewModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-info text-white">
          <h5 class="modal-title">View Record Information</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>First Name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewFirstname"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Last Name:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewLastname"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Address:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewAddress"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Skills:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewSkills"></div>
            </div>
            <div class="col-sm-5 col-xs-6 tital " >
              <strong>Program:</strong>
            </div>
            <div class="col-sm-7 col-xs-6 ">
              <div id="viewProgram"></div>
            </div>          
          </div>
          <br>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- UPDATE MODAL -->
  <div class="modal fade" id="updateModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Edit Record</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="update.php" method="POST">
            <input type="hidden" name="updateId" id="updateId">
            <div class="form-group">
              <label for="title">First Name</label>
              <input type="text" name="updateFirstname" id="updateFirstname" class="form-control" placeholder="Enter first name" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Last Name</label>
              <input type="text" name="updateLastname" id="updateLastname" class="form-control" placeholder="Enter last name" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Address</label>
              <input type="text" name="updateAddress" id="updateAddress" class="form-control" placeholder="Enter address" maxlength="50"
                required>
            </div>
            <div class="form-group">
              <label for="title">Skills</label>
              <input type="text" name="updateSkills" id="updateSkills" class="form-control" placeholder="Enter skills" maxlength="50" required>
            </div>
            <div class="form-group">
              <label for="title">Program</label>
              <input type="text" name="updateProgram" id="updateProgram" class="form-control" placeholder="Enter Program" maxlength="50"
                required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" name="updateData">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- DELETE MODAL -->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="delete.php" method="POST">

          <div class="modal-body">

            <input type="hidden" name="deleteId" id="deleteId">

            <h4>Are you sure want to delete?</h4>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" name="deleteData">Yes</button>
        </div>

        </form>
      </div>
    </div>
  </div>

  <script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

<!-- insert script here to toggle update button -->
<script>
  $(document).ready(function(){
    $('.updateBtn').on('click', function(){

      $('#updateModal').modal('show');

      // table row data.
      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
          return $(this).text();
      }).get();
      
      console.log(data);

      $('#updateId').val(data[0]);
      $('#updateFirstname').val(data[1]);
      $('#updateLastname').val(data[2]);
      $('#updateAddress').val(data[3]);
      $('#updateSkills').val(data[4]);
      $('#updateProgram').val(data[5]);

      });
  });
</script> 

<!-- insert script here to toggle view button -->
<script>
  $(document).ready(function(){
    $('.viewBtn').on('click', function(){

      $('#viewModal').modal('show');

      // table row data.
      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function(){
          return $(this).text();
      }).get(); 
      
      console.log(data);

      $('#viewFirstname').text(data[1]);
      $('#viewLastname').text(data[2]);
      $('#viewAddress').text(data[3]);
      $('#viewSkills').text(data[4]);
      $('#viewProgram').text(data[5]);

      });

  });
</script> 

<!-- insert script here to toggle delete button -->
<script>
  $(document).ready(function(){
    $('.deleteBtn').on('click', function(){
      $('#deleteModal').modal('show');

      // table row
      $tr= $(this).closest('tr');

      var data = $tr.children("td").map(function(){
          return $(this).text();
      }).get();
      
      console.log(data);

      $('#deleteId').val(data[0]);

      });
  });
</script>  
</body>

</html>