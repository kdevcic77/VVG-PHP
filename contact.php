<?php
print '
	<div class="container">
	<h1>Contact Us</h1>
		<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2785.829296867453!2d16.07171361584297!3d45.71446127910472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47667e543ebb2c65%3A0xe159703d90972cf3!2sVeleu%C4%8Dili%C5%A1te+Velika+Gorica!5e0!3m2!1sen!2shr!4v1511689913070" width=100% height="400" frameborder="0" style="border:0" allowfullscreen>
						</iframe>
		</div>
		<div class="form">
		<form action="send-contact.php" id="contact_form" name="contact_form" method="POST">
			<label for="fname">First Name:</label>
			<input type="text" id="fname" name="firstname" placeholder="Enter your first name..." required>
			
			<label for="lname">Last Name:</label>
			<input type="text" id="lname" name="lastname" placeholder="Enter your last name..." required>
				
			<label for="email">E-mail Address:</label>
			<input type="email" id="email" name="email" placeholder="Enter your email address..." required>

			<label for="country">Country:</label>
			<select name="country" id="country">
				<option value="">Please select your country</option>';
				$query  = "SELECT * FROM countries";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '<option value="' . $row['country_code'] . '">' . $row['country_name'] . '</option>';
				}
			print '
			</select>

			<label for="subject">Subject:</label>
			<textarea id="subject" name="subject" placeholder="Enter your message..." style="height:200px"></textarea>

			<input type="submit" value="Send contact form">
		</form>
		</div>
	</div>';
?>