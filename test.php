<?php include __DIR__.'/assets/parts/header.php' ?>



<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<div id="users">

<!-- class="search" automagically makes an input a search field. -->
  <input class="search" placeholder="Search" />
<!-- class="sort" automagically makes an element a sort buttons. The date-sort value decides what to sort by. -->
  <button class="sort" data-sort="name">
    Sort
  </button>

<!-- Child elements of container with class="list" becomes list items -->
  <ul class="list">
    <li>
<!-- The innerHTML of children with class="name" becomes this items "name" value -->
      <h3 class="name">Jonny Stromberg</h3>
      <p class="born">1986</p>
    </li>
    <li>
      <h3 class="name">Jonas Arnklint</h3>
      <p class="born">1985</p>
    </li>
    <li>
      <h3 class="name">Martina Elm</h3>
      <p class="born">1986</p>
    </li>
    <li>
      <h3 class="name">Gustaf Lindqvist</h3>
      <p class="born">1983</p>
    </li>
  </ul>

</div>


<script>

  var options = {
    valueNames: [ 'name', 'born' ]
  };

  var userList = new List('users', options);

</script>


		<!-- FIN BODY -->


<?php include __DIR__.'/assets/parts/footer.php' ?>

<script>
  $playlist = $('div.sm2-playlist-wrapper ul.sm2-playlist-bd');
  $playlist.load('assets/ws/playlist.php');
</script>
<script src="assets/js/player.js" type="text/javascript" charset="utf-8"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/soundmanagerv2/soundmanagerv2.js"