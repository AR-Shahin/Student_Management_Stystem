<?php if(isset($_SESSION['delete_student'])) { ?>
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
  <strong>Delete Student Successfully ! 
  </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;
    </span>
  </button>
</div>
<?php }?>
<?php if(isset($_SESSION['update_student'])) { ?>
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
  <strong>Update Student Successfully ! 
  </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;
    </span>
  </button>
</div>
<?php }?>
<?php if(isset($_SESSION['not_update_student'])) { ?>
<div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
  <strong>not Update Student  ! 
  </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;
    </span>
  </button>
</div>
<?php }?>
<h3 class="mt-3">All Students
</h3>
<?php
$sql = "SELECT * FROM `students_info` ORDER BY id DESC";
$result = mysqli_query($con,$sql);
?>
<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead>
      <tr class="bg-light">
       
        <th>Name
        </th>
        <th>Roll
        </th>
        <th>Class
        </th>
        <th>Advisor
        </th>
        <th>Address
        </th>
        <th>Actions
        </th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)){ ?>
      
      <tr>
      
        <td>
          <?=ucwords($row['name'])?>
        </td>
        <td>
          <?=$row['roll']?>
        </td>
        <td>
          <?=ucwords($row['class'])?>
        </td>
        <td>
          <?=strtoupper($row['advisor'])?>
        </td>
        <td>
          <?=$row['city']?>
        </td>
        <td class="text-center">
          <a href="Javascript: avoid(0)" class="btn btn-info btn-sm" data-toggle="modal" data-target="#<?=$row['id']?>">
            <i class="far fa-eye">
            </i> View
          </a>
          <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?=$row['id']?>">
            <i class="far fa-edit mr-1">
            </i> Edit
          </a>
          <a href="delete.php?id=<?= $row['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')">
            <i class="far fa-trash-alt mr-1">
            </i> Delete
          </a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<!-- VIEW PROFILE MODAL -->
<?php 
$sql = "SELECT * FROM `students_info ";
$result = mysqli_query($con,$sql);
while ($data = mysqli_fetch_assoc($result)){ ?>
<div class="modal fade" id="<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">View Profile of  &nbsp;
          <strong style="font-size:18px;color:#0c2461">' 
            <?=$data['name']?> '
          </strong>
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table  table-bordered ">
          <tr>
            <th>Name
            </th>
            <td>
              <?=$data['name']?>
            </td>
          </tr>
          <tr>
            <th>Class
            </th>
            <td>
              <?=ucwords($data['class'])?>
            </td>
          </tr>
          <tr>
            <th>Roll
            </th>
            <td>
              <?=$data['roll']?>
            </td>
          </tr>
          <tr>
            <th>City
            </th>
            <td>
              <?=ucwords($data['city'])?>
            </td>
          </tr>
          <tr>
            <th>Phone
            </th>
            <td>
              <?=$data['pnumber']?>
            </td>
          </tr>
          <tr>
            <th>Advisor
            </th>
            <td>
              <?=strtoupper($data['advisor']);?>
            </td>
          </tr>
          <tr>
            <th>GPA
            </th>
            <td>
              <?=$data['gpa']?>
            </td>
          </tr>
          <tr>
            <th>Image
            </th>
            <td class="text-center">
              <img src="student_images/<?=$data['image']?>" alt="" class="img-fluid w-50 img-thumbnail">
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
        </button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- EDIT PROFILE -->
<?php 
$sql = "SELECT * FROM `students_info ";
$result = mysqli_query($con,$sql);
while ($data = mysqli_fetch_assoc($result)){ ?>
<div class="modal fade" id="edit<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Profile of  &nbsp;
          <strong style="font-size:18px;color:#0c2461">' 
            <?=$data['name']?> '
          </strong>
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
          </span>
        </button>
      </div>
      <div class="modal-body">
        <form action="updatestu.php" class="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="sname">Name :
                </label>
                <input type="text" class="form-control" placeholder="Student name" name="studentName" id="sname" required value="<?=$data['name']?>">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="class">Class :
                </label>
                <input type="text" class="form-control" placeholder="Class" name="class" id="class" required value="<?=$data['class']?>" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="roll">Roll :
                </label>
                <input type="text" class="form-control" placeholder="Roll" name="roll" id="roll" required required value="<?=$data['roll']?>">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="Parents Number">Parents Number:
                </label>
                <input type="text" class="form-control" placeholder="Parents Number" name="pnum" id="Parents Number" required required value="<?=$data['pnumber']?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="sname">City :
                </label>
                <input type="text" class="form-control" placeholder="City" name="city" id="sname" required required value="<?=$data['city']?>">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="gpa">GPA :
                </label>
                <input type="text" class="form-control" placeholder="GPA" name="gpa" id="gpa" required required value="<?=$data['gpa']?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="sname">Advisor :
                </label>
                <input type="text" class="form-control" placeholder="Advisor" name="advisor" id="sname" required required value="<?=$data['advisor']?>">
                <input type="hidden" value="<?=$data['id']?>" name="id">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="sname">Image :
                </label>
                <input type="file" class="form-control"name="image" id="image" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-group">  
                <input type="submit" class="form-control btn btn-success" value="Update" name="up-btn">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
        </button>
      </div>
    </div>
  </div>
</div>
<?php }?>
