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
    $page_title = 'Events by Isabella | Home';
    $dashboard = 'active';

    require_once '../includes/header.php';
    ?>

<header>
    <div class="container">
        <div class="label">
            <span class="system-name">Event Management System</span>
        </div>

        <nav>
            <ul class="menu">
            <li><a href="../client/home.html">Home</a></li>
              <li><a href="../client/venue.php">Venue</a></li>
              <li><a href="../client/about.html">About</a></li>
              <li><a href="../login/logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
<div class="homecontent">
        <div class="container">  
          <h1>Events by Isabella</h1>
        </div>
      </div>
    </main>

    <section class="sections">
      <div class="container">
        
        <div class="col">
          <h2>Upcoming Events</h2>
        </div>
        
      </div>
    </section>

    <footer>
      <div class="container">
        <p>&copy; Events by Isabella | Ayala Zamboanga City | 0905 188 4862</p>
      </div>
    </footer>
</main>
</body>
</html>