<?php

function foot($home, $login){

printf('<footer class="footer-distributed">

		

			<div class="footer-left">

				<p class="footer-links">
					<a href="%s">Home</a>
					·
					<a href="%s">My Contact</a> 
				</p>

				<p>Asim Ghosh &copy; 2018</p>
			</div>

		</footer>', $home, $login);


}


?>