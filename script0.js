const form = document.querySelector('form');
const username = document.querySelector('#username');
const password = document.querySelector('#password');

form.addEventListener('submit', e => {
  e.preventDefault();
  
  
  if (username.value === 'admin' && password.value === 'password') {
    alert('Welcome, admin!');
    
  } else {
    alert('Invalid username or password');
  }
});
