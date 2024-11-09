<?php
include('header.php');
checkUser();  //function called
adminArea();
echo '<link rel="stylesheet" href="css/category.css">';

if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id']) && $_GET['id']>0){

    $id=get_safe_value($_GET['id']);
    mysqli_query($con,"delete from category where id=$id");
    echo "</br>data deleted</br>";
}
$res=mysqli_query($con,"select * from category order by id desc");
?>
<script>
    document.title="category";
    document.getElementById("category_link").classList.add('active');
</script>

<!-- doing CRUD operation -->
<?php
if(mysqli_num_rows($res)>0){ ?>

<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Category</h2>
                                <a href="manage_category.php">Add Category</a>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>


  <tr>
        
        <th>ID</th>
        <th>Name</th>
        <th></th>
    </tr>
    <?php 
  
    while($row=mysqli_fetch_assoc($res))
    {
        ?>
        <tr>
        
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td>
            <a href="manage_category.php?id=<?php echo $row['id'];?>">Edit</a>&nbsp;
            <a href="?type=delete&id=<?php echo $row['id'];?>">Delete</a>
        </td>
    </tr>
    
    <?php
    } ?>
   
</table>
<?php
    }else{
        echo "NO data found";
    }
    ?>
</div>
</div>
</div>
</div>
</div>
</div>

<?php
include('footer.php');
?>
