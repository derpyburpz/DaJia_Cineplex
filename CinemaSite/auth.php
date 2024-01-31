<?php
session_start();

$db = new mysqli('localhost', 'f31ee', 'f31ee', 'cinema');

// Check form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['psw'];

    $error_message = '';

    // Check email validity
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format";
        echo "<script>alert('$error_message');</script>";
        return;
    }

    // PW length check
    if (strlen($password) < 8) {
        $error_message = "Password should be at least 8 characters";
        echo "<script>alert('$error_message');</script>";
        return;
    }

    // Register new user
	if (isset($_POST['register'])) {
		$stmt = $db->prepare("SELECT * FROM customers WHERE Email = ?");
		$stmt->bind_param("s", $email);
		$stmt->execute();

		$result = $stmt->get_result();

		// Existing user
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
		
				$_SESSION['email'] = $email;
				$_SESSION['CustomerID'] = $user['CustomerID'];
				header('Location: index.php');
				exit;		
			} else {
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

		// Existing user
		if ($result->num_rows > 0) {
		$user = $result->fetch_assoc();

		// Verify password
		if (password_verify($password, $user['Password'])) {
			// Store sesh deets
			$_SESSION['email'] = $email;
			$_SESSION['CustomerID'] = $user['CustomerID'];
			header('Location: index.php');
			exit;
		} else {
			// Incorrect password
			// echo "Incorrect password";
			// exit;
			$error_message = "Incorrect password";
		}
		
		} else {
		// User don't exist
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

<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
        }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
        }
        
    function signOut() {
        fetch('signout.php')
        .then(response => response.text())
        .then(data => {
            if (data === 'success') {
                location.reload();
            } else {
                console.error('Error:', data);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
    function openProfile() {
        window.location.href = "profilepage.php";
    }
</script>