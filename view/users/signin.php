<div class="row">
    <h4>Formulaire de Connexion</h4> 
</div>
<!-- <div class="row"> -->
	<form class="form-inline" action="<?php echo  REFFERER.DS.'users/signin/' ?>" method="POST">
		<div class="formespace row">
			<div class=" form-group">
				<?php  echo $this->form->text('username','Username',array('sronly'=>'sr-only','class'=>'input-sm inputspace','placeholder'=>'pseudo')); ?>
			</div>
			<div class="form-group">
				<?php  echo $this->form->email('email','Email',array('sronly'=>'sr-only','class'=>'input-sm inputspace','placeholder'=>'email@email.com')); ?>
			</div>
		</div>

		<div class="formespace row">
			<div class="form-group">
				<?php  echo $this->form->password('password','Password',array('sronly'=>'sr-only','class'=>'input-sm inputspace','placeholder'=>'password')); ?>
			</div>
			<div class="form-group">
				<?php  echo $this->form->password('confirmpassword','Confirmpassword',array('sronly'=>'sr-only','class'=>'input-sm inputspace','placeholder'=>'confirm password')); ?>
			</div>
		</div>
		<div class="row">
			<div class="form-group">	
			<button type="submit" class="btn btn-primary btn-xs">S'inscrire</button>
			</div>
		</div>
	</form>