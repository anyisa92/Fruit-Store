<?php include('header.php');?>
    <h3>Full Fruit Store</h3>

<?php
getAllFruit();
getuniquecategories();
?>

    <ul>
      <li href="#"><a><h4>Categories</h4></a></li>
    </ul>
      <?php
    fruitCategory();
      ?>

    <?php  include('includes/footer.php');  ?>
