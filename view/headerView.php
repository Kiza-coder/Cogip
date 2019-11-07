<header>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <img src="assets/img/Cogip_Logo.svg" alt="logo-cogip" class="img-fluid navbar-Brand">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="?value=home" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="?value=invoices" class="nav-link">Invoices</a></li>
            <li class="nav-item"><a href="?value=companies" class="nav-link">Companies</a></li>
            <li class="nav-item"><a href="?value=contacts" class="nav-link">Contacts</a></li>
            <?php if (($_SESSION['rights'] != 1) && ($_SESSION['rights'] != 2) && ($_SESSION['rights'] != 3)){
                echo '<li class="nav-item"><a href="?value=login" class="nav-link">Login</a></li>';
                
            } else if($_SESSION["rights"] == 1)
            {
                echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Admin</a>
                            <div class="dropdown-menu dropdown-menu-right bg-light">
                                <a class="dropdown-item nav-item-link" href="?value=user">Dashboard</a>
                                <a class="dropdown-item nav-item-link" href="?option_create=contact">New contact</a>
                                <a class="dropdown-item nav-item-link" href="?option_create=invoice">New invoice</a>
                                <a class="dropdown-item nav-item-link" href="?option_create=company">New company</a>
                            </div>
                        </li>';
                
            }
            
            else if($_SESSION["rights"] == 2){
                echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Admin</a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="?option_create=contact">New contact</a>
                                <a class="dropdown-item" href="?option_create=invoice">New invoice</a>
                                <a class="dropdown-item" href="?option_create=company">New company</a>
                            </div>
                        </li>';
            } else {
                
            }
            ?>
        </ul>
    </nav>
</header>