<?php
/**
 * Sample layout
 */

use Core\Language;

?>


		<div class="container">
			<div class="row">
				<h2>Data passed</h2>
				<h3><?php echo $data['contact_input_email_subject'];?></h3>
				<h3><?php echo $data['contact_input_firstname'];?></h3>
				<h3><?php echo $data['contact_input_email'];?></h3>
				<h3><?php echo $data['contact_input_telephone'];?></h3>
				<h3><?php echo $data['contact_input_country'];?></h3>
				<h3><?php echo $data['contact_input_message'];?></h3>	
				<h3><?php echo $data['result'];?></h3>			
			</div>
		</div>
