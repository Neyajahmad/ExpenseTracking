<?php
include('header.php');
checkUser();  // function called
userArea();

// Add the CSS link here if it's not in header.php
echo '<link rel="stylesheet" href="css/expense-style.css">';

if (isset($_GET['type']) && $_GET['type'] == 'delete' && isset($_GET['id']) && $_GET['id'] > 0) {
    $id = get_safe_value($_GET['id']);
    mysqli_query($con, "DELETE FROM expense WHERE id = $id");
    echo "<p class='message'>Data deleted successfully</p>";
}

$res = mysqli_query($con, "SELECT expense.*, category.name FROM expense, category WHERE expense.category_id = category.id AND expense.added_by = '" . $_SESSION['UID'] . "' ORDER BY expense_date ASC");
?>
<script>
    document.title="Expense";
    document.getElementById("expense_link").classList.add('active');
</script>
<br>
<br>
<br><br>
<div class="container">


<h2>Expense</h2>
<a href="manage_expense.php">Add Expense</a>
<br>


    <?php if (mysqli_num_rows($res) > 0) { ?>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Details</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['item']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['details']; ?></td>
                        <td><?php echo $row['added_on']; ?></td>
                        <td>
                            <a href="manage_expense.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a>
                            <a href="?type=delete&id=<?php echo $row['id']; ?>" class="btn delete">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "<p class='message'>No data found.</p>";
    } ?>
</div>

<?php include('footer.php'); ?>
