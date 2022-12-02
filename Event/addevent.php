<?php

    require_once '../tools/functions.php';
    require_once '../classes/event.class.php';

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
    //if the above code is false then code and html below will be executed

    //if add faculty is submitted
    if(isset($_POST['save'])){

        $event = new Event;
        //sanitize user inputs
        $event->client = htmlentities($_POST['client']);
        $event->address = htmlentities($_POST['address']);
        $event->phone_no = htmlentities($_POST['phone_no']);
        $event->event = htmlentities($_POST['event']);
        $event->schedule = ($_POST['schedule']);
        $event->type = htmlentities ($_POST['type']);
        $event->audience_capacity = htmlentities ($_POST['audience_capacity']);
        $event->payment_type = htmlentities ($_POST['payment_type']);
        $event->amount = htmlentities ($_POST['amount']);
        $event->status = 'Active';
        if(isset($_POST['status'])){
            $event->status = $_POST['status'];
        }
        if(validate_add_event($_POST)){
            if($event->add()){
                //redirect user to program page after saving
                header('location: event.php');
            }
        }
    }

    require_once '../tools/variables.php';
    $page_title = 'Forecast | Add Program';
    $event = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Add New Event</h3>
                <a class="back" href="event.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="addevent.php" method="post">
                    <label for="client">Client</label>
                    <input type="text" id="client" name="client" required placeholder="Enter Client Name" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_client($_POST)){
                    ?>
                                <p class="error">Name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>

                <label for="address">Address</label>
                    <input type="text" id="address" name="address" required placeholder="Enter Address" value="<?php if(isset($_POST['address'])) { echo $_POST['address']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_address($_POST)){
                    ?>
                                <p class="error">Address is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>


                <label for="phone_no">Phone Number</label>
                    <input type="number" id="phone_no" name="phone_no" required placeholder="Enter Phone number" value="<?php if(isset($_POST['phone_no'])) { echo $_POST['phone_no']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_phone_no($_POST)){
                    ?>
                                <p class="error">Phone number is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>

                <label for="event">Categories</label>
                    <select name="event" id="event">
                        <option value="None" <?php if(isset($_POST['categories'])) { if ($_POST['categories'] == 'None') echo ' selected="selected"'; } ?>>--Select--</option>
                        <option value="Birthdays" <?php if(isset($_POST['categories'])) { if ($_POST['categories'] == 'Birthdays') echo ' selected="selected"'; } ?>>Birthdays</option>
                        <option value="Weddings" <?php if(isset($_POST['categories'])) { if ($_POST['categories'] == 'Weddings') echo ' selected="selected"'; } ?>>Weddings</option>
                        <option value="Baptism" <?php if(isset($_POST['categories'])) { if ($_POST['categories'] == 'Baptism') echo ' selected="selected"'; } ?>>Baptism</option>
                        <option value="Reunions" <?php if(isset($_POST['categories'])) { if ($_POST['categories'] == 'Reunions') echo ' selected="selected"'; } ?>>Reunions</option>
                        <option value="Anniversay" <?php if(isset($_POST['categories'])) { if ($_POST['categories'] == 'Anniversary') echo ' selected="selected"'; } ?>>Anniversary</option>
                        <option value="None" <?php if(isset($_POST['categories'])) { if ($_POST['categories'] == 'None') echo ' selected="selected"'; } ?>>--Others--</option>
                    </select>
                    <?php
                        if(isset($_POST['save']) && !validate_event($_POST)){
                    ?>
                                <p class="error">Please select event from the dropdown.</p>
                    <?php
                        }
                    ?>

                    <label for="schedule">Schedule</label>
                    <input type="datetime-local" id="schedule" name="schedule" required value="<?php if(isset($_POST['schedule'])) { echo $_POST['schedule']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_schedule($_POST)){
                    ?>
                                <p class="error">Please select the date.</p>
                    <?php
                        }
                    ?>
                    
                    <label for="type">Type (Public/Private)</label>
                    <input type="text" id="type" name="type" required value="<?php if(isset($_POST['type'])) { echo $_POST['type']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_type($_POST)){
                    ?>
                                <p class="error">Please enter the type of event.</p>
                    <?php
                        }
                    ?>

                    <label for="audience_capacity">No. of Guests</label>
                    <input type="number" id="audience_capacity" name="audience_capacity" required placeholder="Enter number of Guests" value="<?php if(isset($_POST['audience_capacity'])) { echo $_POST['audience_capacity']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_audience_capacity($_POST)){
                    ?>
                                <p class="error">Capacity is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>

                <label for="payment_type">Type (Free/Payable)</label>
                    <input type="tinyint" id="payment_type" name="payment_type" required value="<?php if(isset($_POST['payment_type'])) { echo $_POST['payment_type']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_payment_type($_POST)){
                    ?>
                                <p class="error">Please enter payment type.</p>
                    <?php
                        }
                    ?>

                <label for="amount">Amount</label>
                    <input type="number" id="amount" name="amount" required placeholder="Enter amount" value="<?php if(isset($_POST['amount'])) { echo $_POST['amount']; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_amount($_POST)){
                    ?>
                                <p class="error">Amount is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>

                    <div>
                        <label for="status">Status</label><br>
                        <label class="container" for="Active">Active
                            <input type="radio" name="status" id="Active" value="Active" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Active') echo ' checked'; } ?>>
                            <span class="checkmark"></span><br><br>
                        </label>
                        <label class="container" for="Completed">Completed
                            <input type="radio" name="status" id="Completed" value="Completed" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Completed') echo ' checked'; } ?>>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <?php
                        if(isset($_POST['save']) && !validate_status($_POST)){
                    ?>
                                <p class="error">Please select program status.</p>
                    <?php
                        }
                    ?>
                    <input type="submit" class="button" value="Save Event" name="save" id="save">
                </form>
            </div>
        </div>
    </div>

<?php
    require_once '../includes/bottomnav.php';
    require_once '../includes/footer.php';
?>