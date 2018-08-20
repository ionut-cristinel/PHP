<body>
    <div class="container">
        <nav class="navbar navbar-expand-md bg-primary navbar-dark">
            <a class="navbar-brand" href="<?php echo URL; ?>index/index">MVC PHP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL; ?>index/index">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Dashboard</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo URL; ?>mysql/index/1">MySQL</a>
                            <a class="dropdown-item" href="<?php echo URL; ?>mongodb/index">MongoDB</a>
                            <a class="dropdown-item" href="<?php echo URL; ?>json/index">JSON</a>
                            <a class="dropdown-item" href="<?php echo URL; ?>xml/index">XML</a>
                            <a class="dropdown-item" href="<?php echo URL; ?>text/index/1">Text</a>
                        </div>
                    </li>
                    
                    <?php if(Library\Session::get('connected') === FALSE): ?>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL; ?>user/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL; ?>user/create">Create Account</a>
                        </li> 
                    
                    <?php else: ?>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URL; ?>user/logout">Logout</a>
                        </li> 
                    
                    <?php endif; ?>
                    
                </ul>
            </div> 
        </nav>
        