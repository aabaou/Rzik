	<div class="sm2-bar-ui full-width fixed">

 <div class="bd sm2-main-controls">

  <div class="sm2-inline-texture"></div>
  <div class="sm2-inline-gradient"></div>

  <div class="sm2-inline-element sm2-button-element">
   <div class="sm2-button-bd">
    <a href="#play" class="sm2-inline-button sm2-icon-play-pause">Play / pause</a>
   </div>
  </div>

  <div class="sm2-inline-element sm2-inline-status">

   <div class="sm2-playlist">
    <div class="sm2-playlist-target">
     <!-- playlist <ul> + <li> markup will be injected here -->
     <!-- if you want default / non-JS content, you can put that here. -->
     <noscript><p>JavaScript is required.</p></noscript>
    </div>
   </div>

   <div class="sm2-progress">
    <div class="sm2-row">
    <div class="sm2-inline-time">0:00</div>
     <div class="sm2-progress-bd">
      <div class="sm2-progress-track">
       <div class="sm2-progress-bar"></div>
       <div class="sm2-progress-ball"><div class="icon-overlay"></div></div>
      </div>
     </div>
     <div class="sm2-inline-duration">0:00</div>
    </div>
   </div>

  </div>

  <div class="sm2-inline-element sm2-button-element sm2-volume">
   <div class="sm2-button-bd">
    <span class="sm2-inline-button sm2-volume-control volume-shade"></span>
    <a href="#volume" class="sm2-inline-button sm2-volume-control">volume</a>
   </div>
  </div>

  <div class="sm2-inline-element sm2-button-element">
   <div class="sm2-button-bd">
    <a href="#prev" title="Previous" class="sm2-inline-button sm2-icon-previous">&lt; previous</a>
   </div>
  </div>

  <div class="sm2-inline-element sm2-button-element">
   <div class="sm2-button-bd">
    <a href="#next" title="Next" class="sm2-inline-button sm2-icon-next">&gt; next</a>
   </div>
  </div>

  <div class="sm2-inline-element sm2-button-element">
   <div class="sm2-button-bd">
    <a href="#repeat" title="Repeat playlist" class="sm2-inline-button sm2-icon-repeat">&infin; repeat</a>
   </div>
  </div>

  <!-- not implemented -->
  <!--
  <div class="sm2-inline-element sm2-button-element disabled">
   <div class="sm2-button-bd">
    <a href="#shuffle" title="Shuffle" class="sm2-inline-button sm2-icon-shuffle">shuffle</a>
   </div>
  </div>
  -->

  <div class="sm2-inline-element sm2-button-element sm2-menu">
   <div class="sm2-button-bd">
    <a href="#menu" class="sm2-inline-button sm2-icon-menu">menu</a>
   </div>
  </div>

 </div>

 <div class="bd sm2-playlist-drawer sm2-element">

  <div class="sm2-inline-texture">
   <div class="sm2-box-shadow"></div>
  </div>

  <!-- playlist content is mirrored here -->

  <div class="sm2-playlist-wrapper">

    <ul class="sm2-playlist-bd">

     <!-- item with "download" link -->
	<footer class="footer">
    
    </footer>
	

	<!-- FIN BODY -->
		<script src="assets/js/tools.js" type="text/javascript" charset="utf-8"></script>
		<script src="assets/js/jquery.backstretch.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="assets/js/soundmanager2.js" type="text/javascript" charset="utf-8"></script>
		<script src="assets/js/bar-ui.js" type="text/javascript" charset="utf-8"></script>
		<script src="assets/js/script.js" type="text/javascript" charset="utf-8"></script>
		<script>
			$(document).ready(function () {
			    // All sides
			    var sides = ["left", "top", "right", "bottom"];
			    $("h1 span.version").text($.fn.sidebar.version);

			    // Initialize sidebars
			    for (var i = 0; i < sides.length; ++i) {
			        var cSide = sides[i];
			        $(".sidebar." + cSide).sidebar({side: cSide});
			    }

			    // Click handlers
			    $(".btn[data-action]").on("click", function () {
			        var $this = $(this);
			        var action = $this.attr("data-action");
			        var side = $this.attr("data-side");
			        $(".sidebar." + side).trigger("sidebar:" + action);
			        return false;
			    });
			});
		</script>
	</body>
</html>

<?php $mysqli->close(); ?>