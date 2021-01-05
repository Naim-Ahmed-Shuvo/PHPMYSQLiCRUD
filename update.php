<?php 
include 'header.php'; 
include "config.php";
include "database.php";
?>


<?php 

  $db = new Database();

  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_user WHERE id=$id";
  $getData = $db->selectorRead($query)->fetch_assoc();

  if(isset($_POST['submit'])){
      $name = mysqli_real_escape_string($db->link,$_POST['name']);
      $email = mysqli_real_escape_string($db->link,$_POST['email']);
      $skill = mysqli_real_escape_string($db->link,$_POST['skill']);

      if($name==''&& $email=''&& $skill=''){
          $error = "Field must not be empty";
      } else{
          $query = "UPDATE  tbl_user SET name='$name' , email='$email', skill='$skill'
           WHERE id=$id";
          $create =  $db->update( $query );
      }
  }


?>


<?php 
 if(isset($error)){
     echo "<span style='color:red;'>".$error."</span>";
 }
?>


<form action="update.php?id=<?php echo $id;?>" method="post">
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
                      <input type="text" class="form-control" name="name" value="<?php echo $getData['name']?>">
                  </div>
              </td>
              <td>
                  <div class="form-group">
                      <input type="email" class="form-control" name="email" value="<?php echo $getData['email']?>">
                  </div>
              </td>
              <td>
                  <div class="form-group">
                      <input type="text" class="form-control" name="skill" value="<?php echo $getData['skill']?>">
                  </div>
              </td>
          </tr>
          
      </tbody>
     
  </table>
  
 <button type="submit" name="submit" class="btn btn-sm btn-info ml-1" value="Submit">Update</button>
 <a href="index.php"  class="btn btn-sm btn-warning ml-1 text-white">Back</a>
          
</form>
<?php include 'footer.php'; ?>
