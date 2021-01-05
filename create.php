<?php 
include 'header.php'; 
include "config.php";
include "database.php";
?>


<?php 

$db = new Database();

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link,$_POST['name']);
    $email = mysqli_real_escape_string($db->link,$_POST['email']);
    $skill = mysqli_real_escape_string($db->link,$_POST['skill']);

    if($name=='' && $email='' && $skill=''){
        $error = "Field must not be empty";
    } else{
        $query = "INSERT INTO tbl_user(name, email, skill) 
        Values('$name', '$email', '$skill')";
        $create =  $db->insert( $query );
    }
}


?>

<?php 
 if(isset($error)){
     echo "<span style='color:red;'>".$error."</span>";
 }
?>


<form action="" method="post">
  <table class="table">
      <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Skill</th>
          </tr>
      </thead>
      <tbody>
          <tr>
              <td>
                  <div class="form-group">
                      <input type="text" class="form-control" name="name" placeholder="Enter name....">
                  </div>
              </td>
              <td>
                  <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Enter email.....">
                  </div>
              </td>
              <td>
                  <div class="form-group">
                      <input type="text" class="form-control" name="skill" placeholder="Enter skill....">
                  </div>
              </td>
          </tr>
          
      </tbody>
     
  </table>
  
 <button type="submit" name="submit" class="btn btn-sm btn-info ml-1" value="Submit">Submit</button>
 <button type="reset" name="reset" class="btn btn-sm btn-warning ml-1 text-white">Reset</button>
          
</form>
<?php include 'footer.php'; ?>