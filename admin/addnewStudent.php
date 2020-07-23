<?php
   if(!isset($_SESSION['success-login'])){
    header('location:../404.php');
} ?>
<h3 class="mt-2">Add New Student</h3>
<hr>
<div class="form-content" style="min-height:550px;">
<form action="store.php" class="mt-3 border p-2" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-6">
        <div class="form-group">
           <label for="sname">Name :</label>
            <input type="text" class="form-control" placeholder="Student name" name="studentName" id="sname" required>
        </div>
    </div>
       <div class="col-6">
        <div class="form-group">
           <label for="class">Class :</label>
            <input type="text" class="form-control" placeholder="Class" name="class" id="class" required>
        </div>
    </div>
</div>
<div class="row">
 
     <div class="col-6">
        <div class="form-group">
           <label for="roll">Roll :</label>
            <input type="text" class="form-control" placeholder="Roll" name="roll" id="roll" required>
        </div>
    </div>
        <div class="col-6">
        <div class="form-group">
           <label for="Parents Number">Parents Number:</label>
            <input type="text" class="form-control" placeholder="Parents Number" name="pnum" id="Parents Number" required>
        </div>
    </div>
</div>
<div class="row">

       <div class="col-6">
        <div class="form-group">
           <label for="sname">City :</label>
            <input type="text" class="form-control" placeholder="City" name="city" id="sname" required>
        </div>
    </div>
        <div class="col-6">
        <div class="form-group">
           <label for="gpa">GPA :</label>
            <input type="text" class="form-control" placeholder="GPA" name="gpa" id="gpa" required>
        </div>
    </div>
</div>

<div class="row">

        <div class="col-6">
        <div class="form-group">
           <label for="sname">Advisor :</label>
            <input type="text" class="form-control" placeholder="Advisor" name="advisor" id="sname" required>
        </div>
    </div>
      <div class="col-6">
        <div class="form-group">
           <label for="sname">Image :</label>
            <input type="file" class="form-control"name="image" id="image" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="form-group">  
        <input type="submit" class="form-control btn btn-info" value="Submit" name="btn">
        </div>
    </div>
</div>
</form>
 <?php if(isset($_SESSION['add_new_student'])) { ?>
<div class="alert alert-success alert-dismissible text-center fade show mt-3" role="alert">
  <strong>Inserted Successfully!!!</strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>

 <?php if(isset($_SESSION['not_new_student'])) { ?>
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
  <strong>something wrong</strong>.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
 <?php if(isset($_SESSION['roll_exits'])) { ?>
<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
  <strong>Roll exists : )</strong> Enter unique Roll . . .
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php }?>
</div>

