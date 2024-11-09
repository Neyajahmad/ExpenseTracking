<?php
include('header.php');
checkUser();  // Ensure user is logged in
adminArea();  // Ensure admin access
$msg = "";
$username = "";
$password = "";
$role = 'user';  // Default role is 'user'
$label = "Add";
$id = 0;  // Initialize $id to 0

// If editing an existing user, fetch the user details by id
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $label = "Edit";
    $id = get_safe_value($_GET['id']);
    
    // Query to fetch the user by id
    $res = mysqli_query($con, "SELECT * FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($res);
    
    // Check if the user exists
    if ($row) {
        $username = $row['username'];
        $password = $row['password'];  // This will be the hashed password
        $role = $row['role'];  // Fetch the current role
    } else {
        $msg = "User not found.";
    }
}

// Handle form submission for adding/updating users
if (isset($_POST['submit'])) {
    $username = get_safe_value($_POST['username']);
    $password = get_safe_value($_POST['password']);
    $role = 'user';  // Ensure that only users are added (no admins)

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Query to check for existing username conflict
    $res = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND id != $id");
    if (mysqli_num_rows($res) > 0) {
        $msg = "Username already exists.";
    } else {
        if ($id > 0) {
            // Update user details with the hashed password
            mysqli_query($con, "UPDATE users SET username = '$username', password = '$hashed_password', role = '$role' WHERE id = $id");
        } else {
            // Insert new user with the hashed password
            mysqli_query($con, "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')");
        }
        
        // Show the success message instead of redirecting
        $msg = "Thank you! User created successfully.";
    }
}
?>
<script>
    document.title="Manage Users";
    document.getElementById("users_link").classList.add('active');
</script>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2><?php echo $label ?> User</h2>
                    <a href="users.php">Back</a>
                    <div class="card-body card-block">
                        <form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label class="control-label mb-1">Username</label>
                                <input type="text" name="username" required value="<?php echo $username ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Password</label>
                                <input type="password" name="password" required value="<?php echo $password ?>" class="form-control" required>
                            </div>

                            <br>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Submit" class="btn btn-lg btn-info btn-block">
                            </div>
                            <div id="msg"><?php echo $msg ?></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
