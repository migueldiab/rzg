    <hr>
  <?php foreach ($pager->getResults() as $post): ?>
    <div style="width: 80%">
       <?php echo $post->getTexto() ?>
    </div>
    <hr>
  <?php endforeach; ?>
