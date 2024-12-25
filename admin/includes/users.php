<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <h5 class="card-title"><i class="ri-group-line"></i> All Users</h5>
        <?php
        require '../db-config.php';

        if ($conn) {
            $users = "SELECT * FROM `users`";
            $result = mysqli_query($conn, $users);

            if (mysqli_num_rows($result) > 0) {
                echo '
            <div class="table-responsive">
                <table class="table table-hover table-bordered shadow-sm">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profile</th>
                            <th class = "text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>';

                while ($row = mysqli_fetch_assoc($result)) {
                    $userID = $row['user_id'];
                    $userName = $row['username'];
                    $userEmail = $row['user_email'];
                    $userImage = $row['user_image'];
                    echo '
                <tr>
                    <td>' . $userID . '</td>
                    <td>' . $userName . '</td>
                    <td>' . $userEmail . '</td>
                    <td>
                        <img src="./profile_images/' . $userImage . '" alt="User Image" class="img-fluid rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                    </td>
                    <td>
                        <a href="profile.php?view=true&id='.$userID.'" class="btn btn-outline-info btn-sm">
                            <i class="ri-eye-line"></i> View
                        </a>
                        <a href="profile.php?edit=true&id='.$userID.'" class="btn btn-outline-success btn-sm">
                            <i class="ri-eye-line"></i> Edit
                        </a>
                        <a href="profile.php?delete=true&id='.$userID.'" class="btn btn-outline-danger btn-sm">
                            <i class="ri-eye-line"></i> Delete
                        </a>
                    </td>
                </tr>';
                }
                echo '
                    </tbody>
                </table>
            </div>';
            } else {
                // If no users
                echo '
            <div class="alert alert-warning text-center mt-4">
                <h4 class="alert-heading">No Users Found</h4>
                <p>It seems there are no users available at the moment. Check back later!</p>
            </div>';
            }
        }
        ?>


    </div>
</div>