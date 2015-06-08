<?php //var_dump(ADMIN); ?>
<?php //var_dump(Rooter::$prefixes); ?>
<h3>Gestion des articles </h3>

<div class="row">
	<label class="col-md-4"for="inserer">Insertion d'un nouvelle article  </label><a id ="inserer" href="<?php echo  REFFERER.DS.ADMIN.DS.'blog/edit/' ?>" class="col-md-1 btn btn-primary btn-xs">
                    Inserer
                </a>
<div class="row">
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titre</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($news as $k => $v): ?>
				<tr>
					<td><?php echo $v['idNews'] ?></td>
					<td><?php echo $v['title'] ?></td>
					<td>
						<a href="<?php echo 'edit/'. $v['idNews'] ?>">Editer</a>
						<a href="<?php echo 'delete/'.$v['idNews']?>" onclick="return confirm('Voulez vous vraiment supprimer ?')">Supprimer</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
