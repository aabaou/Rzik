	<link rel="stylesheet" type="text/css" href="./assets/css/player.css">
	<footer class="footer">
	
	<div class="audio-player">
				
    	<div id="play-btn"></div>
    	<div class="audio-wrapper" id="player-container" href="javascript:;">
      	<audio id="player" ontimeupdate="initProgressBar()">
			  <source src="http://www.lukeduncan.me/oslo.mp3" type="audio/mp3">
			</audio>
    	</div>
    	<div class="player-controls scrubber">
		<div id="album-image">
			<img src="https://unsplash.it/50/50/?random"></img>
		</div>
		<p>Oslo <small>by</small> Holy Esque</p>
      	<span id="seekObjContainer">
			  <progress id="seekObj" value="0" max="1"></progress>
			</span>
      	<br>
      	<small style="float: left; position: relative; left: 15px;" class="start-time"></small>
      	<small style="float: right; position: relative; right: 20px;" class="end-time"></small>
		
    </div>
    
    </footer>
	

	<!-- FIN BODY -->
		<script src="assets/js/tools.js" type="text/javascript" charset="utf-8"></script>
		<script src="assets/js/script.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.sticky.js" type="text/javascript"></script> 
	</body>
</html>