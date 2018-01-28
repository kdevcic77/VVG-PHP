<?php 
	print '
	<div class="container">
	
	<div class="form">';
	
	if ($_POST['_action_'] == FALSE) {
		print '
		<h1>Registration Form</h1>
		<form action="" id="registration_form" name="registration_form" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			
			<label for="fname">First Name:</label>
			<input type="text" id="fname" name="firstname" placeholder="Enter your first name..." required>

			<label for="lname">Last Name:</label>
			<input type="text" id="lname" name="lastname" placeholder="Enter your last name..." required>
				
			<label for="email">Your E-mail:</label>
			<input type="email" id="email" name="email" placeholder="Enter your email address..." required>
			
			<label for="username">Username:<small>(Username must have min 6 and max 10 char)</small></label>
			<input type="text" id="username" name="username" pattern=".{6,10}" placeholder="Enter your username..." required><br>
			
									
			<label for="password">Password:<small>(Password must have min 6 char)</small></label>
			<input type="password" id="password" name="password" placeholder="Enter your password..." pattern=".{6,}" required>

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

			<input type="submit" value="Register">
		</form>';
	}
	else if ($_POST['_action_'] == TRUE) {
		
		$query  = "SELECT * FROM users";
		$query .= " WHERE email='" .  $_POST['email'] . "'";
		$query .= " OR username='" .  $_POST['username'] . "'";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if ($row['email'] == '' || $row['username'] == '') {
			$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
			
			$query  = "INSERT INTO users (firstname, lastname, email, username, password, country)";
			$query .= " VALUES ('" . $_POST['firstname'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['username'] . "', '" . $pass_hash . "', '" . $_POST['country'] . "')";
			$result = @mysqli_query($MySQL, $query);
			echo '<div class="container"><p class="poruka_OK">' . ucfirst(strtolower($_POST['firstname'])) . ' ' .  ucfirst(strtolower($_POST['lastname'])) . ', thank you for registration </p>
			<hr>
			</div>';
		}
		else {
			echo '<div class="container"><p class="poruka_BAD">User with this email or username already exist!</p><p class="poruka_OK">Try to register with different credentials!</p></div>';
		}
	}
	print '
	</div>
	</div>';
?>