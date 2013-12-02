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

	<script>
function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("content").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("content").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?q="+str,true);
xmlhttp.send();
}
</script>

</head>

<body>
	<div id="container-outer">
		<div id="container-inner">
			<div class="navbar navbar-nav">
				<div class="navbar-inner">
					<?php echo $this->Html->link('The Spirit Guide', '/', array('class'=>'brand')); ?>
						<ul class="nav">
							<li class="dropdown" id="ingredient-tab">
        							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ingredients</a>
        							<ul class="dropdown-menu">
          								<li><?php echo $this->Html->link('All Ingredients', 
  											array('controller'=>'ingredients', 'action'=>'index')); ?>
  										</li>
  										<li><?php echo $this->Html->link('Alcohols', 
  											array('controller'=>'ingredients', 'action'=>'index_alcohols')); ?>
  										</li>
          								<li><?php echo $this->Html->link('Mixers', 
  											array('controller'=>'ingredients', 'action'=>'index_mixers')); ?>
  										</li>
        							</ul>
     							</li>
							<li id="cocktail-tab"><?php echo $this->Html->link('Cocktails',
								array('controller' => 'cocktails', 'action' => 'index')); ?>
							</li>
						</ul>
						<ul class="nav pull-right">

						<?php echo $this->Form->create('Cocktail', array('div' => false, 'controller' => 'cocktails', 'action' => 'filter_search', 'class' => 'navbar-search pull-left')); ?>
    					<?php echo $this->Form->input('search', array('div' => false, 'type' => 'text', 'class' => 'search-query', 'placeholder' => 'Search', 'label' => false)); ?>
    					<?php echo $this->Form->end(); ?>
						<?php
							if(is_null($this->Session->read('Auth.User'))) {
  								echo '<li>'.$this->Html->link('Login', 
  									array('controller'=>'users', 'action'=>'login')).'</li>'; 
							} else { ?>
								<li class="dropdown">
        							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Session->read('Auth.User.display_name') ?></a>
        							<ul class="dropdown-menu">
          								<li><?php echo $this->Html->link('Favorites', 
  											array('controller'=>'users', 'action'=>'favorites', $this->Session->read('Auth.User.user_id'))); ?>
  										</li>
          								<li><?php echo $this->Html->link('Inventory', 
  											array('controller'=>'users', 'action'=>'inventory', $this->Session->read('Auth.User.user_id'))); ?>
  										</li>
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
