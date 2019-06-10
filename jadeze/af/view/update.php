<?php require 'header.php'; ?>

<section>
  <div class="container">
    <div class="row">
      <form name="UpdateForm" method="post" action="">

          <label>Update een school:</label><br/>
          <input type="number" name="SelectId" value="<?php echo $school["id"];?>"</br>
          <input type="number" name="UpdateID"  value="<?php echo $school["ID"];?>"><br/>
          <input type="text" name="UpdateSchool" value="<?php echo $school["Naam"];?>"> <br/>
          <input type="submit" name="update" value="Update">

      </form>
    </div>
  </div>

<?php require 'footer.php'; ?>
