<div class="side-bar">
    <div class="logo-details">
        <i class='bx bx-meteor'></i>
        <span class="logo-name">Event Management</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="../admin/dashboard.php" class="<?php echo $dashboard; ?>">
                <i class='bx bx-grid-alt' ></i>
                <span class="links-name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="../venue/venue.php" class="<?php echo $venue; ?>">
                <i class='bx bx-send'></i>
                <span class="links-name">Venues</span>
            </a>
        </li>
        <li>
            <a href="../Event/event.php" class="<?php echo $event; ?>">
                <i class='bx bx-phone-call'></i>
                <span class="links-name">Event</span>
            </a>
        </li>
        <li>
        <a href="#" class="<?php echo $eventcalendar; ?>">
                <i class='bx bx-book-reader'></i>
                <span class="links-name">Events Calendar</span>
            </a>
        </li>
        <li>
            <a href="#" class="<?php echo $user; ?>">
                <i class='bx bx-group' ></i>
                <span class="links-name">Manage User</span>
            </a>
        </li>
        <li>
            <a href="#" class="<?php echo $settings; ?>">
                <i class='bx bx-cog'></i>
                <span class="links-name">Settings</span>
            </a>
        </li>
        <hr class="line">
        <li id="logout-link">
            <a href="../login/logout.php">
                <i class='bx bx-log-out'></i>
                <span class="links-name">Logout</span>
            </a>
        </li>
    </ul>
</div>