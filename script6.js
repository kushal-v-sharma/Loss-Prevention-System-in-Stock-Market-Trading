const form = document.querySelector('form');
const username = document.querySelector('#username');
const email = document.querySelector('#email');
const password = document.querySelector('#password');
const confirmPassword = document.querySelector('#confirm-password');

form.addEventListener('submit', e => {
  e.preventDefault();
  
  
  if (password.value !== confirmPassword.value) {
    alert('Passwords do not match');
  } else {
    alert(`Registered successfully! Welcome, ${username.value}!`);
  }
});
