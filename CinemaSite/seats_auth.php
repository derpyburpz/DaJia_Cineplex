<?php
session_start();

// Connect to the database
$db = new mysqli('localhost', 'f31ee', 'f31ee', 'cinema');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['psw'];

    $error_message = '';

    // Check if the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format";
        echo "<script>alert('$error_message');</script>";
        return;  // Stop the execution if the email is invalid
    }

    // Check if the password is valid
    if (strlen($password) < 8) {
        $error_message = "Password should be at least 8 characters";
        echo "<script>alert('$error_message');</script>";
        return;  // Stop the execution if the password is too short
    }

    // Check if we are registering a new user
	if (isset($_POST['register'])) {
		$stmt = $db->prepare("SELECT * FROM customers WHERE Email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();

		$result = $stmt->get_result();

		// If there's a user with this email
		if ($result->num_rows > 0) {
			$error_message = "Email already exists";
			echo "<script>alert('$error_message');</script>";
			return;
		} else {
			$hashed_password = password_hash($password, PASSWORD_DEFAULT);

			// New user
			$stmt = $db->prepare("INSERT INTO customers (Email, Password) VALUES (?, ?)");
			$stmt->bind_param("ss", $email, $hashed_password);

			if ($stmt->execute()) {
				$stmt = $db->prepare("SELECT CustomerID FROM customers WHERE Email = ?");
				$stmt->bind_param("s", $email);
				$stmt->execute();
				$result = $stmt->get_result();
				$user = $result->fetch_assoc();
		
				// Set session variables and redirect to home page
				$_SESSION['email'] = $email;
				$_SESSION['CustomerID'] = $user['CustomerID'];
				header('Location: index.php');
				exit;		
			} else {
				// Handle SQL error
				echo "Error: " . $stmt->error;
				exit;
			}
		}
	}

	else {
		// Login existing user
		$stmt = $db->prepare("SELECT * FROM customers WHERE Email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();

		$result = $stmt->get_result();

		// If there's a user with this email
		if ($result->num_rows > 0) {
		$user = $result->fetch_assoc();

		// Verify the password
		if (password_verify($password, $user['Password'])) {
			// Store sesh deets
			$_SESSION['email'] = $email;
			$_SESSION['CustomerID'] = $user['CustomerID'];
			header('Location: index.php');
			exit;
		} else {
			// Handle incorrect password
			// echo "Incorrect password";
			// exit;
			$error_message = "Incorrect password";
		}
		
		} else {
		// Handle no such user
		// echo "No such user";
		// exit;
		$error_message = "No such user";
		}
	}

	if ($error_message !== '') {
		echo "<script>alert('$error_message');</script>";
		}
	}
?>