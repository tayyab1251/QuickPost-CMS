<div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="ri-group-line"></i> All Users</h5>
                    <?php
                    
                    require '../db-config.php';
                    if($conn) {
                        $users =  "SELECT * FROM `users` ";
                        $result = mysqli_query($conn , $users);

                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                $userID = $row['user_id'];
                                $userName = $row['username'];
                                $userEmail = $row['user_email'];
                                $userImage = $row['user_image'];

                                // displaying users in table
                                echo '
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Dummy Data for Now -->
                                            <tr>
                                                <td>'.$userID.'</td>
                                                <td>'.$userName.'</td>
                                                <td>'.$userEmail.'</td>
                                                <td>
                                                    <a href="profile.php?user_id=<?php echo $userID?>" class="btn btn-sm btn-info"><i class="ri-eye-line"></i> View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>';
                            }
                        }
                    }
                    
                    ?>

                </div>
            </div>