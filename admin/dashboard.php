<?php

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }
    //if the above code is false then html below will be displayed

    require_once '../tools/variables.php';
    $page_title = 'Event Management | Dashboard';
    $dashboard = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>
    
    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Events Category</div>
                    <div class="number">5</div>
                    <div class="indicator">
                        
                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-send cart'></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Events</div>
                    <div class="number">839</div>
                    <div class="indicator">
                        
                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-edit-alt cart two'></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Completed Events</div>
                    <div class="number">249</div>
                    <div class="indicator">
                        
                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-phone-call cart three'></i>
            </div>

            
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Monthly Income</div>
                    <div class="number">56,893</div>
                    <div class="indicator">
                        
                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                    </div>
                </div>
                <i class='bx bx-message-square-x cart four'></i>
            </div>

            <div class=task>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Categories</th>
                        <th>Start Date & Time</th>
                        <th>End Date</th>
                        <th>Venue</th>
                        <th>Status</th>
                        <?php
                            if($_SESSION['user_type'] == 'admin'){ 
                        ?>
                            <th class="action">Action</th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //create an array for list of programs, use session so we can access this anywhere
                        if(!isset($_SESSION['event'])){
                            $_SESSION['event'] = array(
                                "1" => array(
                                    "name" => 'Derriel 7TH Birthday',
                                    "categories" => 'Birthday Party',
                                    "start_date" => 'June 1, 2022',
                                    "end_date" => 'June 1, 2022',
                                    "venue" => 'Azurra Beach Resort',
                                    "status" => 'Completed'
                                ),
                                "2" => array(
                                    "name" => 'Regina 50TH Birthday',
                                    "categories" => 'Birthday Party',
                                    "start_date" => 'July 30, 2023',
                                    "end_date" => 'July 30, 2023',
                                    "venue" => 'Woodland Resort and Restaurant',
                                    "status" => 'Completed'
                                ),
                                "3" => array(
                                    "name" => 'Sam 18TH Birthday',
                                    "categories" => 'Birthday Party',
                                    "start_date" => 'November 23, 2022',
                                    "end_date" => 'November 23, 2022',
                                    "venue" => 'Santiago Resort',
                                    "status" => 'Active'
                            )
                                );
                        }

                        //We will now fetch all the records in the array using loop
                        //use as a counter, not required but suggested for the table
                        $i = 1;
                        //loop for each record found in the array
                        foreach ($_SESSION['event'] as $key => $value){ //start of loop
                    ?>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td><?php echo $i ?></td>
                            <td><?php echo $value['name']?></td>
                            <td><?php echo $value['categories'] ?></td>
                            <td><?php echo $value['start_date'] ?></td>
                            <td><?php echo $value['end_date'] ?></td>
                            <td><?php echo $value['venue'] ?></td>
                            <td><?php echo $value['status'] ?></td>
                            <?php
                                if($_SESSION['user_type'] == 'admin'){ 
                            ?>
                                <td>
                                    <div class="action">
                                        <a class="action-edit" href="#">Edit</a>
                                        <a class="action-delete" href="#">Delete</a>
                                    </div>
                                </td>
                            <?php
                                }
                            ?>
                        </tr>
                    <?php
                        $i++;
                    //end of loop
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
            

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>