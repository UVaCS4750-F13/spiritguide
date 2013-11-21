<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo "The Spirit Guide" ?>
	</title>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	<?php
		echo $this->Html->script('jquery-1.9.1'); 
		echo $this->Html->script('jquery-ui-1.10.3.custom');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('bootstrap-responsive');
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('style');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container-outer">
		<div id="container-inner">
			<div class="navbar navbar-nav">
				<div class="navbar-inner">
					<?php echo $this->Html->link('The Spirit Guide', '/', array('class'=>'brand')); ?>
						<ul class="nav">
							<li id="ingredient-tab"><?php echo $this->Html->link('Ingredients',
								array('controller' => 'ingredients', 'action' => 'index')); ?>
							</li>
							<li id="cocktail-tab"><?php echo $this->Html->link('Cocktails',
								array('controller' => 'cocktails', 'action' => 'index')); ?>
							</li>
							<li id="cocktail-tab"><?php echo $this->Html->link('Development',
								array('controller' => 'pages', 'action' => 'display')); ?>
							</li>
						</ul>
						<ul class="nav pull-right">
						<form class="navbar-search pull-left">
 							<input type="text" class="search-query" placeholder="Search">
						</form>
						<?php
							if(is_null($this->Session->read('Auth.User'))) {
  								echo '<li>'.$this->Html->link('Login', 
  									array('controller'=>'users', 'action'=>'login')).'</li>'; 
							} else { ?>
								<li class="dropdown">
        							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Session->read('Auth.User.display_name') ?></a>
        							<ul class="dropdown-menu">
          								<li><a href="#">Profile</a></li>
          								<li><a href="#">Favorites</a></li>
          								<li><a href="#">Inventory</a></li>
          								<li class="divider"></li>
          								<li><?php echo $this->Html->link('Logout', 
  											array('controller'=>'users', 'action'=>'logout')); ?>
  										</li>
        							</ul>
     							</li> <?php
							} ?>
		
					</ul>
				</div>
			</div>
			<div id="content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>
</body>
</html>
