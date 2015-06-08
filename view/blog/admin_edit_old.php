<?php if(isset($this->request->data)){
	$d  = $this->request->data;
	}
	//var_dump($this->request->data);
	?>

<form class="form-horizontal col-md-6"method="GET" action="<?php echo  REFFERER.DS.ADMIN.DS.'blog/edit/';?>">

	<div class="form-group">
		<legend>Editer un titre</legend>
	</div>

	<input class="form-control" type="hidden" name="<?= $d['title']?>" value="$value">
	
	<div class="row">
		<div class="form-group">
			<label for="text" class="col-md-3 control-label">Text : </label>
			<div class="col-md-9">
				<input id=\"div$name\" type="text" class="form-control" id="text">
			</div>
		</div>
	</div>

  <div class="row">
    <div class="form-group">
      <label for="textarea" class="col-md-3 control-label">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque risus ex, volutpat at nunc at, dignissim tempor tortor. Praesent hendrerit, mauris id finibus venenatis, metus enim porttitor tortor, ac pharetra dolor felis in leo. Proin blandit non ipsum non dignissim. Integer ut molestie ante, eget dictum tellus. Nulla id sapien ex. Maecenas lacinia aliquam sagittis. Sed ultricies facilisis elit, quis imperdiet diam ullamcorper vitae. Fusce urna mauris, interdum vitae erat a, elementum auctor erate.Pellentesque mauris quam, scelerisque eget congue in, pulvinar a massa. Sed vitae elit ac sapien luctus mattis. Suspendisse potenti. In vitae arcu ac ligula finibus scelerisque. Fusce fringilla imperdiet lectus, ac pellentesque velit euismod vitae. Morbi eu faucibus enim. Aliquam blandit lacus ex, nec suscipit ex fringilla in. Nulla consequat nibh vel feugiat gravida. Duis dictum, tellus non congue egestas, felis tortor tristique turpis, in dapibus justo purus nec urna. Sed et consectetur turpis. Nam commodo augue finibus malesuada eleifend. Etiam mi est, venenatis tincidunt convallis imperdiet, semper id erat. Aliquam leo est, aliquet ac odio vitae, semper feugiat ante. Integer iaculis vehicula lorem, et dictum nulla hendrerit in. Phasellus pharetra, ipsum id dapibus molestie, orci est dignissim augue, id congue sapien felis et lacus. Vivamus quis accumsan purus, gravida consequat tortor.Nunc molestie dolor eu interdum venenatis. Etiam ex nisi, efficitur id pellentesque ac, dignissim et quam. Integer pretium, urna et efficitur maximus, libero nisl facilisis ipsum, eget ultrices nunc mauris a massa. Aenean viverra ante magna, non faucibus odio faucibus eget. Duis at condimentum tellus. In mollis lectus eu ipsum ullamcorper, vel efficitur enim pretium. Phasellus gravida elementum eros in mattis. Maecenas consectetur, magna id suscipit aliquam, libero tellus hendrerit nisi, eget consectetur mi turpis a justo. Nulla magna nibh, condimentum porta mattis et, dignissim et nisi. Phasellus mattis nisl in nulla vulputate, sed tempor nisi egestas. Morbi facilisis a velit in tincidunt. Aliquam facilisis sollicitudin eros quis consectetur. Praesent sit amet leo quis lorem semper pulvinar quis vitae velit.Cras porttitor augue sed urna feugiat consequat sit amet nec libero. Duis urna augue, semper sed odio imperdiet, interdum ultricies urna. Quisque consequat risus purus, nec euismod dui laoreet et. Nam imperdiet ut odio quis hendrerit. Aenean dictum justo eget velit hendrerit euismod. In non velit vel elit dignissim porta in eu nisl. Vivamus ac quam lacinia, faucibus felis vel, tristique lorem. Donec non tempus quam. Aliquam tincidunt nunc id ligula consequat interdum. Vestibulum id tempus ex. Maecenas facilisis vehicula interdum. Proin non magna sapien. Ut non imperdiet arcu. Fusce convallis egestas nulla, at aliquet justo dictum ut. Integer et congue leo, et euismod purus. : </label>
      <div class="col-md-9">
        <input type="textarea" name="" class="form-control" id="textarea" rows="5">
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="form-group">
        <div class="checkbox ">
		    <label>
		      <input type="checkbox"> Se rappeler de moi...
		    </label>
    	</div>
  	</div>
  </div>
  <div class="form-group">
    <button class="pull-right btn btn-default">Envoyer</button>
  </div>

</form>