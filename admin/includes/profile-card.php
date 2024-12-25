<?php

require '../db-config.php';
if ($conn) {
    $users =  "SELECT * FROM `users`  WHERE user_id = $_SESSION[userId] ";
    $result = mysqli_query($conn, $users);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $userID = $row['user_id'];
            $userName = $row['username'];
            $userEmail = $row['user_email'];

            // displaying users in table
            echo '
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="ri-user-3-line"></i> Profile Overview</h5>
                    <p class="card-text">Here’s a summary of your profile and account activities.</p>
                    <div class="d-flex justify-content-between">
                        <span><strong>Name:</strong>'.$userName.'</span>
                        <span><strong>Email:</strong>'.$userEmail.'</span>
                    </div>
                    <a href="profile.php" class="btn btn-primary mt-3"><i class="ri-edit-line"></i> Edit Profile</a>
                </div>
            </div>';
        }
    }
}

?>


