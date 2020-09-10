<?php
  $contentFromAPI = file_get_contents("https://api.magicthegathering.io/v1/cards?contains=multiverseId&pageSize=10");
  $contentDecoded = json_decode( $contentFromAPI );
  // debug($contentDecoded);
?>

<?php foreach ($contentDecoded as $array => $objectsArray): ?>

  <?php foreach ($objectsArray as $card): ?>
  <div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
      <a href="#"> <img class="card-img-top" src="<?= $card->imageUrl ?>" alt=""></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#"> <?= $card->name ?> </a>
        </h4>
        <p class="card-text"> <?= $card->originalText ?></p>
      </div>
      <div class="card-footer">
        <small class="text-muted"> <?= $card->type ?></small>
      </div>
    </div>
  </div>
  <?php endforeach; ?>

<?php endforeach; ?>

</div>
      <!-- /.row -->
      
    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
