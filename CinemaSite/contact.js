document.getElementById('feedback-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var name = document.getElementById('name');
    var email = document.getElementById('email');
    var feedback = document.getElementById('feedback');

    var nameError = document.getElementById('nameError');
    var emailError = document.getElementById('emailError');
    var feedbackError = document.getElementById('feedbackError');

    if (!validateName()) {
        nameError.textContent = 'Invalid name!';
    } else {
        nameError.textContent = '';
    }

    if (!validateEmail()) {
        emailError.textContent = 'Invalid email!';
    } else {
        emailError.textContent = '';
    }

    if (!validateFeedback()) {
        feedbackError.textContent = 'Invalid feedback!';
    } else {
        feedbackError.textContent = '';
    }

    if (validateName() && validateEmail() && validateFeedback()) {
        document.getElementById('message').textContent = 'Thank you for your feedback!';
    }
});

// Validate name
function validateName() {
    var name = document.getElementById("name");
    var reg_name = /^[a-zA-Z ]{3,}$/;

    if (!reg_name.test(name.value)) {
        return false;
    } else {
        return true;
    }
}

// Validate email
function validateEmail() {
    var email = document.getElementById("email");
    var reg_email = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (!reg_email.test(email.value)) {
        return false;
    } else {
        return true;
    }
}

// Validate feedback
function validateFeedback() {
    var feedback = document.getElementById("feedback");

    if (feedback.value.trim() === "") {
        return false;
    } else if (feedback.value.split(" ").length > 300) {
        return false;
    } else {
        return true;
    }
}
