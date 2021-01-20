<h1><?=ucfirst($title)?></h1>
<div class="row">
  <?php foreach($events as $event) : 
      $event['media_paths'] = explode(',', $event['media_paths']);
    ?>
  <div class="card m-3" style="width: 18rem;">
    <img class="card-img-top" width="300" height="250" src="<?=base_url('assets/'.$event['media_paths'][0])?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><strong><?=$event['title']?></strong></h5>
      <p class="card-text"><?=substr(htmlspecialchars_decode($event['description']),0,100)?>.</p>
      <h5 class="card-title">Price:- <strong><?=$event['price']?>/-</strong></h5>
      <a href="#" class="btn btn-primary">Book Band</a>
    </div>
  </div>
  <?php endforeach; ?>
</div>