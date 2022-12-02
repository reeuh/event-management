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
    $event = new Event;
    //if add program is submitted
    if(isset($_POST['save'])){
        //sanitize user inputs
        $event->id = $_POST['id'];
        $event->client = htmlentities($_POST['client']);
        $event->address = htmlentities($_POST['address']);
        $event->phone_no = htmlentities($_POST['phone_no']);
        $event->event = htmlentities($_POST['event']);
        $event->schedule = htmlentities($_POST['schedule']);
        $event->type = htmlentities($_POST['type']);
        $event->audience_capacity = htmlentities($_POST['audience_capacity']);
        $event->payment_type = htmlentities($_POST['payment_type']);
        $event->amount = htmlentities($_POST['amount']);
        $program->status = 'Pending';
        if(isset($_POST['status'])){
            $program->status = $_POST['status'];
        }
        if(validate_add_event($_POST)){
            if($event->edit()){
                //redirect user to program page after saving
                header('location: event.php');
            }
        }
    }else{
        if ($event->fetch($_GET['id'])){
            $data = $event->fetch($_GET['id']);
            $event->id = $data['id'];
            $event->client = $data['client'];
            $event->address = $data['address'];
            $event->phone_no = $data['phone_no'];
            $event->event = $data['event'];
            $event->schedule = $data['schedule'];
            $event->type = $data['type'];
            $event->audience_capacity = $data['audience_capacity'];
            $event->payment_type = $data['payment_id'];
            $event->amount = $data['amount'];
            $event->status = $data['status'];
        }
    }

    require_once '../tools/variables.php';
    $page_title = 'Event | Update Event';
    $programs = 'active';

    require_once '../includes/header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';

?>
    <div class="home-content">
        <div class="table-container">
            <div class="table-heading form-size">
                <h3 class="table-title">Update Event</h3>
                <a class="back" href="event.php"><i class='bx bx-caret-left'></i>Back</a>
            </div>
            <div class="add-form-container">
                <form class="add-form" action="editevent.php" method="post">
                    <input type="text" hidden name="id" value="<?php echo $event->id; ?>">
                    <input type="text" hidden name="old-code" value="<?php echo $event->old_code; ?>">
                    
                    <label for="client">Client Name</label>
                    <input type="text" id="client" name="client" required placeholder="Enter Client Name" value="<?php if(isset($_POST['client'])) { echo $_POST['client']; } else { echo $event->client; }?>">
                    <?php
                        if(isset($_POST['save']) && !validate_client($_POST)){
                    ?>
                                <p class="error">Client Name is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required placeholder="Enter Client Address" value="<?php if(isset($_POST['address'])) { echo $_POST['address']; } else { echo $event->address; }?>">
                    <?php
                        if(isset($_POST['save']) && !validate_address($_POST)){
                    ?>
                                <p class="error">Client Address is invalid. Trailing spaces will be ignored.</p>
                    <?php
                        }
                    ?>
                   <label for="phone_no">Phone_No</label>
                    <input type="number" id="phone_no" name="phone_no" required value="<?php if(isset($_POST['phone_no'])) { echo $_POST['phone_no']; } else { echo $event->phone_no; }?>">

                    <label for="event">Event</label>
                    <select name="event" id="event">
                        <option value="None" <?php if(isset($_POST['event'])) { if ($_POST['event'] == 'None') echo ' selected="selected"'; } elseif ($event->event == 'None') echo ' selected="selected"'; ?>>--Select--</option>
                        <option value="Birthday" <?php if(isset($_POST['event'])) { if ($_POST['event'] == 'Birthday') echo ' selected="selected"'; } elseif ($event->event == 'Birthday') echo ' selected="selected"'; ?>>Birthday</option>
                        <option value="Wedding" <?php if(isset($_POST['event'])) { if ($_POST['event'] == 'Wedding') echo ' selected="selected"'; } elseif ($event->event == 'Wedding') echo ' selected="selected"'; ?>>Wedding</option>
                        <option value="Anniversary" <?php if(isset($_POST['event'])) { if ($_POST['event'] == 'Anniversary') echo ' selected="selected"'; } elseif ($event->event == 'Anniversary') echo ' selected="selected"'; ?>>Anniversary</option>
                        <option value="Christening" <?php if(isset($_POST['event'])) { if ($_POST['event'] == 'Christening') echo ' selected="selected"'; } elseif ($event->event == 'Christening') echo ' selected="selected"'; ?>>Christening</option>
                        <option value="Funeral" <?php if(isset($_POST['event'])) { if ($_POST['event'] == 'Funeral') echo ' selected="selected"'; } elseif ($event->event == 'Funeral') echo ' selected="selected"'; ?>>Funeral</option>
                   </select>
                    <?php
                        if(isset($_POST['save']) && !validate_event($_POST)){
                    ?>
                                <p class="error">Please select the occassion from the dropdown.</p>
                    <?php
                        }
                    ?>

                    <label for="schedule">Schedule</label>
                    <input type="datetime" id="schedule" name="schedule" required value="<?php if(isset($_POST['schedule'])) { echo $_POST['schedule']; } else { echo $event->schedule; } ?>">
                    <?php
                        if(isset($_POST['save']) && !validate_schedule($_POST)){
                    ?>
                                <p class="error">Please Enter Schedule</p>
                    <?php
                        }
                    ?>

                    <label for="type">Type (1-Public 2-Private)</label>
                    <input type="number" id="type" name="type" required value="<?php if(isset($_POST['type'])) { echo $_POST['type']; } else { echo $event->type; }?>">

                    <label for="audience_capacity">Audience Capacity</label>
                    <input type="number" id="audience_capacity" name="audience_capacity" required value="<?php if(isset($_POST['audience_capacity'])) { echo $_POST['audience_capacity']; } else { echo $event->audience_capacity; }?>">

                    <label for="payment_type">Payment Type (1-Free 2-Payable)</label>
                    <input type="number" id="payment_type" name="payment_type" required value="<?php if(isset($_POST['payment_type'])) { echo $_POST['payment_type']; } else { echo $event->payment_type; }?>">

                    <label for="amount">Amount</label>
                    <input type="number" id="amount" name="amount" required value="<?php if(isset($_POST['amount'])) { echo $_POST['amount']; } else { echo $event->amount; }?>">

                    <div>
                        <label for="status">Status</label><br>
                        <select name="status" id="status">
                        <option value="None" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'None') echo ' selected="selected"'; } elseif ($event->status == 'None') echo ' selected="selected"'; ?>>--Select--</option>
                        <option value="Pending" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Pending') echo ' selected="selected"'; } elseif ($event->status == 'Pending') echo ' selected="selected"'; ?>>Pending</option>
                        <option value="Confirmed" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Confirmed') echo ' selected="selected"'; } elseif ($event->status == 'Confirmed') echo ' selected="selected"'; ?>>Confirmed</option>
                        <option value="Cancelled" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Cancelled') echo ' selected="selected"'; } elseif ($event->status == 'Cancelled') echo ' selected="selected"'; ?>>Cancelled</option>
                 </select>
                    <?php
                        if(isset($_POST['save']) && !validate_status($_POST)){
                    ?>
                                <p class="error">Please select status from the dropdown.</p>
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