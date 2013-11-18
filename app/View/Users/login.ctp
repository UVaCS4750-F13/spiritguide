<script type="text/javascript">
    j$s(function {
        $('#tabs').tab();
    });
</script> 

<div class="row">
  <div class="span12">
 		<div class="" id="loginModal">
      <div class="modal-header">
        <h3>Have an Account?</h3>
      </div>
      <div class="modal-body">
        <div class="well">
          <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
            <li><a href="#register" data-toggle="tab">Create Account</a></li>
          </ul>
          <div id="account" class="tab-content">
            <div class="tab-pane active" id="login">
              <?php echo $this->Form->create('User', array('action' => 'login')); ?>
              <fieldset>
                <?php echo $this->Form->input('username', array('label' => false, 'placeHolder' => 'Username')); ?>
                <?php echo $this->Form->input('password', array('label' => false, 'placeHolder' => 'Password')); ?>
              </fieldset>
              <?php echo $this->Form->end(array('label' => 'Login', 'class' => 'btn btn-primary')); ?>            
            </div>
          <div id="register" class="tab-pane">
            <form id="tab">
              <input type="text" value="" class="input-xlarge" placeHolder="Username"><br>
              <input type="text" value="" class="input-xlarge" placeHolder="Password"><br>
              <input type="text" value="" class="input-xlarge" placeHolder="Display Name"><br>
              <input type="text" value="" class="input-xlarge" placeHolder="Email">
              <div>
                <button class="btn btn-primary">Create Account</button>
              </div>
            </form> 
          </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>