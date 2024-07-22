// Get the form elements
const resetForm = document.getElementById('resetForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmPasswordInput = document.getElementById('confirmPassword');
const submitButton = document.getElementById('submitButton');
const loadingSpinner = document.getElementById('loading');
const errorContainer = document.getElementById('errorContainer');
const successMessage = document.getElementById('successMessage');

// Add event listeners
resetForm.addEventListener('submit', handleFormSubmission);
emailInput.addEventListener('input', validateEmail);
passwordInput.addEventListener('input', validatePassword);
confirmPasswordInput.addEventListener('input', validateConfirmPassword);

// Function to handle form submission
function handleFormSubmission(event) {
  event.preventDefault();
  loadingSpinner.style.display = 'block';
  submitButton.disabled = true;

  // Get the form data
  const email = emailInput.value.trim();
  const password = passwordInput.value.trim();
  const confirmPassword = confirmPasswordInput.value.trim();

  // Check if the passwords match
  if (password !== confirmPassword) {
    showError('Passwords do not match');
    return;
  }

  // Send the request to the server
  fetch('reset_password.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: `email=${email}&password=${password}`,
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      showSuccess('Password reset successfully!');
    } else {
      showError(data.error);
    }
  })
  .catch(error => {
    showError('An error occurred. Please try again later.');
  })
  .finally(() => {
    loadingSpinner.style.display = 'none';
    submitButton.disabled = false;
  });
}

// Function to validate the email input
function validateEmail() {
  const emailValue = emailInput.value.trim();
  if (emailValue === '') {
    emailInput.setCustomValidity('Please enter your email, student number, or registration number.');
  } else {
    emailInput.setCustomValidity('');
  }
}

// Function to validate the password input
function validatePassword() {
  const passwordValue = passwordInput.value.trim();
  if (passwordValue.length < 8) {
    passwordInput.setCustomValidity('Password must be at least 8 characters long.');
  } else {
    passwordInput.setCustomValidity('');
  }
}

// Function to validate the confirm password input
function validateConfirmPassword() {
  const confirmPasswordValue = confirmPasswordInput.value.trim();
  if (confirmPasswordValue !== passwordInput.value.trim()) {
    confirmPasswordInput.setCustomValidity('Passwords do not match');
  } else {
    confirmPasswordInput.setCustomValidity('');
  }
}

// Function to show an error message
function showError(message) {
  errorContainer.style.display = 'block';
  errorContainer.textContent = message;
}

// Function to show a success message
function showSuccess(message) {
  successMessage.style.display = 'block';
  successMessage.textContent = message;
}