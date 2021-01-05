<?php 

include './header.php'; 
include './config.php'; 
include './database.php'; 

?>

<?php 
  $db = new Database();
  $query = "SELECT * FROM tbl_user";
  $read = $db->selectorRead($query);
?>

<?php 
  if(isset($_GET['msg'])){
    echo "<span style='color: green;'>".$_GET['msg']."</span>";
  }
?>

<?php
  if(isset($_GET['delmsg'])){
    echo "<span style='color: green;'>".$_GET['delmsg']."</span>";
  }
?>


<table class="table ml-3 text-center">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Skill</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php if($read){?>
        <?php while($row = $read->fetch_assoc()){?>
                <tr>
                <th scope="row"><?php echo $row['id']?></th>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['skill']?></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-info btn-sm">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
                </tr>
        <?php }?>
    <?php } else{?>
        <p>Data not Found!!!</p>
    <?php }?>    
  </tbody>
</table>

<a href="create.php" class="btn btn-info btn-sm">Create</a>
<a href="index.php" class="btn btn-danger btn-sm">Read</a>

<?php include './footer.php'; ?>

