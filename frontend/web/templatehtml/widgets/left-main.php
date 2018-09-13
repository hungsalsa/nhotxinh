<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dầu nhớt castrol</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Dầu nhớt xe ga</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Dầu nhớt xe côn</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="phugia-tab" data-toggle="tab" href="#phugia" role="tab" aria-controls="phugia" aria-selected="false">Phụ gia chăm sóc</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <?php require('castrol.php'); ?>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <?php require('nhotga.php'); ?>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <?php require('nhotcon.php'); ?>
  </div>
  <div class="tab-pane fade" id="phugia" role="tabpanel" aria-labelledby="phugia-tab">
    <?php require('phugia.php'); ?>
  </div>
</div>