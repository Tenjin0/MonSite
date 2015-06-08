<h1>Liste des news</h1>
<div>
	<ul>
		<?php foreach ($news as $key => $value) { ?>
			<?php  var_dump($value); ?>
		<li>
			<a href="<?php echo "http://localhost/MonSite". '/pages/view/'.$value['idNews'] ?>"><?=$value['title']?>  </a>
		</li>
		<?php  } ?>
	</ul>
	
</div>
