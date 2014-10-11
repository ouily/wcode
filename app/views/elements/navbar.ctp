<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $this->Html->url('/'); ?>">W</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><?php echo $this->Html->link('Accueil', '/'); ?></li>
        <?php if(isset($authentified) && $role == "admin") { ?>
        <li><?php echo $this->Html->link('Publier un article', array('controller' => 'articles', 'action' => 'add', 'admin' => true)); ?></li>
        <?php } ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(!isset($authentified)) { ?>
          <li><?php echo $this->Html->link('Se connecter', array('controller' => 'users', 'action' => 'login')); ?></li>
        <?php } else { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#"><?php echo $this->Html->link('Voir profil', array('controller' => 'users', 'action' => 'show')); ?></a></li>
            <li class="divider"></li>
            <li><?php echo $this->Html->link('Se déconnecter', array('controller' => 'users', 'action' => 'logout', 'admin' => false)); ?></li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>