<?php if(isset($this->request->data['idNews'])){
	$id  = $this->request->data['idNews'];
	}else{
		$id='';
	} ?>
<?php //var_dump($this->request->data) ?>
<form class="form-horizontal col-md-10"method="POST" action="<?php echo  REFFERER.DS.ADMIN.DS.'blog/edit/'.$id.'#main';?>">
	<div class="form-group">
		<legend>Article </legend>
	</div>
	<?php  
		if(isset($id)){
			echo $this->form->hidden('idNews',false); 
		}
	?>
	<div class="row">
		<div class="form-group">
			<?php  echo $this->form->text('title','Titre',array()); ?>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<?php  echo $this->form->textarea('content','Contenu',array('rows'=>10,'class'=>'toto')); ?>
		</div>
	</div>
	
	<div class="row">
    	<div class="form-group">

      		<?php  echo $this->form->checkbox('online','Mettre en ligne',array('class'=>'col-md-offset-10') ); ?>
    	</div>
  	</div>
  	<div class="row">
	  	<textarea display='hidden'></textarea>
	  	<div id=\"alert$name\" class=\"alert alert-block alert-danger\" style=\"display:none\">$messageError</div>
  	</div>

	<?php  //echo $this->form->checkbox('online','Mettre en ligne'); ?>
	<div class="form-group">
    	<button class="pull-right btn btn-default">Envoyer</button>
  	</div>

</form>
