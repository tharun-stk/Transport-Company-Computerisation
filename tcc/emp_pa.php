<?php
session_start();
$f= $_SESSION['number'] ;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="assets/css/styles.css">

        <!-- =====BOX ICONS===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

        <title>SPEED TRANSPORT SERVICES</title>
    </head>
    <body style="background-color:grey">
        <!--===== HEADER =====-->
        <header class="l-header">
            <nav class="nav bd-grid">
                <div>
                    <a href="#" class="nav__logo">EMPLOYEE</a>
                </div>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#home" class="nav__link active">Home</a></li>
                        <li class="nav__item"><a href="addclient.php" class="nav__link">ADD CUSTOMER</a></li>
                        <li class="nav__item"><a href="order1.php" class="nav__link">PLACE ORDERS</a></li>
                        <li class="nav__item"><a href="truck_orders.php" class="nav__link">TRUCK ORDERS</a></li>
                        <li class="nav__item"><a href="index.html" class="nav__link">LOGOUT</a></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--===== HOME =====-->
            <section class="home bd-grid" id="home">
                <div class="home__data">
                    <h1 class="home__title">Hi<br>This is <span class="home__title-color">SPEED</span><br>TRANSPORT COMPANY</h1>
                    
                </div>

                

                
            </section>

        </main>

        <!--===== SCROLL REVEAL =====-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
    </body>
</html>