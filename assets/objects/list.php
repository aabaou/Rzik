<?php

	class liste{


		public static function piste($img){

			$res = '<div class="col-md-12 piste">
				<div class="col-md-4"><img src="assets/img/'.$img.'" alt=""></div>
				<div class="col-md-8"></div>
			</div>';

			return $res;
		}

	}


?>