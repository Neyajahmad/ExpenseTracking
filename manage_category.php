<?php
include('header.php');
checkUser();  //function called
adminArea();
$msg = "";
$category = "";
$label = "Add";
$id = 0;  // Initialize $id to 0

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $label = "Edit";
    $id = get_safe_value($_GET['id']);
    
    // Fix SQL query to fetch the category by id
    $res = mysqli_query($con, "SELECT * FROM category WHERE id = $id");
    $row = mysqli_fetch_assoc($res);
    
    // Check if the category exists
    if ($row) {
        $category = $row['name'];
    } else {
        $msg = "Category not found.";
    }
}

if (isset($_POST['submit'])) {
    $name = get_safe_value($_POST['name']);

    // Fix query to avoid conflicts with the same category name
    $res = mysqli_query($con, "SELECT * FROM category WHERE name = '$name' AND id != $id");
    if (mysqli_num_rows($res) > 0) {
        $msg = "Category already exists";
    } else {
        if ($id > 0) {
            // Update category
            mysqli_query($con, "UPDATE category SET name = '$name' WHERE id = $id");
        } else {
            // Insert new category
            mysqli_query($con, "INSERT INTO category (name) VALUES ('$name')");
        }
        
        // Redirect after successful submission
        redirect('category.php');
    }
}


?>
<script>
    document.title="Manage Category";
    document.getElementById("category_link").classList.add('active');
</script>


<br>
<br>
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2><?php echo $label?>Category</h2>
                                <a href="category.php">Back</a>
                                <div class="card-body card-block">
                                        <form class="form-horizontal" method="post">

                                       

                                
                                    </div>
                                    <div class="form-group">
    <label class="control-label mb-1">Category</label>
    <input type="text" name="name" required value="<?php echo $category?>" class="form-control" required>
</div>
           <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-info btn-block">
           </div>
            
   
    <div id="msg"><?php echo $msg?></div>
</form>

                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>

<?php echo $msg; ?>

<?php
include('footer.php');
?>
<div class="form-group">
    <label class="control-label mb-1">Item</label>
    <input type="text" name="item" required value="<?php echo $item?>" class="form-control" required>
</div>