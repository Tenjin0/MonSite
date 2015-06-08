<div>
	<h1>Premier test</h1>
	<p> <?= $title?></p>
	<p><?= $content ?></p>
</div>
<div>
	<h1>Deuxieme Test</h1>
	<p> <?= $this->vars['title'] ?> </p>
	<p> <?= $this->vars['content'] ?> /p>
</div>
<div>
	<h1>Troisieme Test</h1>
	<p> <?= $this->vars->title ?> </p>
	<p> <?= $this->vars->content ?> /p>
</div>
<pre><?= var_dump($this->vars)?></pre>
<p>Je suis dans test.php </p>