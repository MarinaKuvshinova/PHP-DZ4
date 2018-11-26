<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if(isset($_SESSION['name']) ):?>
                    <li <?=($_GET['page']==1) ? "class='active'":""?>><a href="index.php?page=1">Home</a></li>
                    <li <?=($_GET['page']==2) ? "class='active'":""?>><a href="index.php?page=2">Upload</a></li>
                    <li <?=($_GET['page']==3) ? "class='active'":""?>><a href="index.php?page=3">Gallery</a></li>
                <?php else:?>
                    <li <?=($_GET['page']==1) ? "class='active'":""?>><a href="index.php?page=1">Home</a></li>
                    <li <?=($_GET['page']==4) ? "class='active'":""?>><a href="index.php?page=4">Registration</a></li>
                <?php endif;?>
            </ul>
            <form class="navbar-form navbar-right" method="post">
                    <?php if(!(isset($_SESSION['name']))):?>
                        <?php
                            if(isset($_POST['loginBtn']))
                            {
                                loginFunction($_POST[loginIn],$_POST[passwordIn]);
                                $class = $_SESSION['inError']?'has-error':'';
                                echo "<div class='form-group $class'>";
                            }
                            else echo "<div class='form-group'>";?>
                            <input name="loginIn" type="text" class="form-control" placeholder="Login">
                            <input name="passwordIn" type="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" name="loginBtn" class="btn btn-default">Login</button>
                    <?php else:?>
                        <button type="submit" name="logoutBtn" class="btn btn-default">Logout</button>
                    <?php endif;?>
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>