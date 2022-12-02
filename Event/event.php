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
    $page_title = 'Event | Show Programs';
    $event = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>

    <div class="home-content">
        <div class="table-container">
            <div class="table-heading">
                <h3 class="table-title">List of Events</h3>


                <?php
                    if($_SESSION['type'] == 'admin'){ 
                ?>
                    <a href="addevent.php" class="button">Add New Event</a>
                <?php
                    }
                ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Address</th>
                        <th>Phone_no</th>
                        <th>Event</th>
                        <th>Schedule</th>
                        <th>Type</th>
                        <th>No. of Guests</th>
                        <th>Payment_type</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <?php
                            if($_SESSION['type'] == 'admin'){ 
                        ?>
                            <th class="action">Action</th>
                        <?php
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once '../classes/event.class.php';

                        $event = new Event();
                        //We will now fetch all the records in the array using loop
                        //use as a counter, not required but suggested for the table
                        $i = 1;
                        //loop for each record found in the array
                        foreach ($event->show() as $value){ //start of loop
                    ?>
                        <tr>
                            <!-- always use echo to output PHP values -->
                            <td><?php echo $i ?></td>
                            <td><?php echo $value['client']?></td>
                            <td><?php echo $value['address'] ?></td>
                            <td><?php echo $value['phone_no'] ?></td>
                            <td><?php echo $value['event'] ?></td>
                            <td><?php echo $value['schedule'] ?></td>
                            <td><?php echo $value['type'] ?></td>
                            <td><?php echo $value['audience_capacity'] ?></td>
                            <td><?php echo $value['payment_type'] ?></td>
                            <td><?php echo $value['amount'] ?></td>
                            <td><?php echo $value['status'] ?></td>
                            <?php
                                if($_SESSION['type'] == 'admin'){ 
                            ?>
                                <td>
                                    <div class="action">
                                        <a class="action-edit" href="editevent.php?id=<?php echo $value['id'] ?>">Edit</a>
                                        <a class="action-delete" href="delete_event.php?id=<?php echo $value['id'] ?>">Delete</a>
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
    
<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>

<!--
<div id="delete-dialog" class="dialog" title="Delete Event">
    <p><span>Are you sure you want to delete the selected record?</span></p>
</div>

<script>
    $(document).ready(function() {
        $("#delete-dialog").dialog({
            resizable: false,
            draggable: false,
            height: "auto",
            width: 400,
            modal: true,
            autoOpen: false
        });
        $(".action-delete").on('click', function(e) {
            e.preventDefault();
            var theHREF = $(this).attr("href");

            $("#delete-dialog").dialog('option', 'buttons', {
                "Yes" : function() {
                    window.location.href = theHREF;
                },
                "Cancel" : function() {
                    $(this).dialog("close");
                }
            });

            $("#delete-dialog").dialog("open");
        });
    });
</script>