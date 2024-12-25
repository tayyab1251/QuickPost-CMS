<?php

session_start();
if(!isset($_SESSION['loginStatus'])){
    header("Location: login.php");
    exit();
}

require '../db-config.php';
if ($conn) {
    $users =  "SELECT * FROM `users` WHERE user_id = $_SESSION[userId] ";
    $result = mysqli_query($conn, $users);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $userID = $row['user_id'];
            $userName = $row['username'];
            $userEmail = $row['user_email'];
            $userImage = $row['user_image'];

            // displaying users in table
            echo '                       
            <div class="col-md-3">
                <div class="sidebar bg-light rounded p-4">
                    <!-- User Info -->
                    <div class="d-flex align-items-center mb-4">
                        <img src="./profile_images/'.$userImage.'" alt="User Avatar" class="rounded-circle" style="width: 80px; height: 80px;">
                        <div class="ms-3">
                            <h5 class="mb-0">'.$userName.'</h5>
                            <p class="text-muted mb-0">'.$userEmail.'</p>
                        </div>
                    </div>

                    <!-- Sidebar Links -->
                    <h5 class="text-center mb-4">User Menu</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a class="nav-link active" href="dashboard.php"><i class="ri-dashboard-line"></i> Dashboard</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="profile.php"><i class="ri-user-3-line"></i> Profile</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="settings.php"><i class="ri-settings-3-line"></i> Settings</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="activity.php"><i class="ri-history-line"></i> Recent Activity</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" href="logout.php"><i class="ri-logout-box-line"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>';
        }
    }
}

?>
