<?php //debug($this->request->data) ?>
<div class="row">
    <h4>Formulaire de Connexion</h4> 
</div>
<!-- <div class="row"> -->
	<form class="form-inline" action="<?php echo  REFFERER.DS.'users/login/' ?>" method="POST">
		<div class="row">
			<div class="form-group">
				<?php  echo $this->form->email('email','Email',array('sronly'=>'sr-only','class'=>'input-sm','placeholder'=>'email@email.com')); ?>
			</div>
			<div class="form-group">
				<?php  echo $this->form->password('password','Password',array('sronly'=>'sr-only','class'=>'input-sm','placeholder'=>'password')); ?>
			</div>
		</div>
		<div class="row">
			<div class="form-group">	
				<?php  echo $this->form->checkbox('se souvenir de moi','se souvenir de moi',array() ); ?>
			</div>
		</div>
		<div class="row">
			<div class="form-group">	
			<button type="submit" class="btn btn-primary btn-xs">Se Connecter</button>
			</div>
		</div>
	</form>

	
