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