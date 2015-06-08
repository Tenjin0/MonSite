<?php foreach ($news as $key => $value): ?>
	<h2><?php  echo $value['title']?></h2>
	<p class="thumbnail"><?= $this->texte_resume_html($value['content'],200);?></p>	
	<p><a href="<?php echo REFFERER.'/blog/view/'. $value['idNews']; ?>">Lire la suite &rarr;</a></p>
<?php endforeach ?>
<nav>
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php for ($i=1; $i <= $pages; $i++): ?>
    
    	<li <?php if($i == $this->request->page){ echo "class=active"; } ?>><a href="?page=<?php echo $i; ?>"><?= $i ?></a></li>
    <?php endfor; ?>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>