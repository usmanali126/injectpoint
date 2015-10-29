<?php /* <ul class="sub-nav" >
    <?php
    $full_name = $_SERVER['PHP_SELF'];
    $name_array = explode('/', $full_name);
    $count = count($name_array);
    $page_name = $name_array[$count - 1];
    ?>
    <li><a class="<?php echo ($page_name == 'where-to-buy.php') ? 'active' : ''; ?>" href="where-to-buy.php">WHERE TO BUY</a></li>
    <li><a class="<?php echo ($page_name == 'about.php') ? 'active' : ''; ?>" href="about.php">ABOUT US</a></li>
    <li><a class="<?php echo ($page_name == 'contact.php') ? 'active' : ''; ?>" href="contact.php">CONTACT US</a></li>
</ul> */?>
<nav class="navbar navbar-inverse" >
  <div class="container">
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
        <li><a href="card.php">New Card</a></li>
        <li><a href="record.php">Add Record</a></li>
        <li><a href="uc.php">Add UC</a></li>
        <li><a href="area.php">Add Area</a></li>
        <li class="dropdown"><a href="report.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Report <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="report.php">Date wise report</a></li>
            <li><a href="areareport.php">Area wise report</a></li>
          </ul></li>
      </ul>
      <form class="navbar-form navbar-left pull-right" role="search" id="hsearch" action="record.php" method="POST">
        <div class="form-group">
          <input type="text" form="hsearch" name="card_number" class="form-control" id="card_number" placeholder="Card Number">
        </div>
        <button type="submit" form="hsearch" name="search" class="btn btn-primary">Search</button>
      </form>
    <?php /*  <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul> */?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--<span onload="active_li();"></span>-->