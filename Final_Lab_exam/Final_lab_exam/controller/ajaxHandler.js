const apiUrl = '../controller/userController.php';
const apiUrl2 = '../controller/employeeController.php';


// Signup
document.getElementById('signupForm')?.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData();
    formData.append('action', 'signup');
    formData.append('username', document.getElementById('username').value);
    formData.append('password', document.getElementById('password').value);

    fetch(apiUrl, { method: 'POST', body: formData })
        .then((response) => response.text())
        .then((responseText) => {
            alert(responseText);
            if (responseText.includes('successful')) {
                window.location.href = 'login.html';
            }
        })
        .catch((error) => {
            alert('Error: ' + error);
        });
});


// Login
document.getElementById('loginForm')?.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData();
    formData.append('action', 'login');
    formData.append('username', document.getElementById('username').value);
    formData.append('password', document.getElementById('password').value);

    fetch('../controller/userController.php', { method: 'POST', body: formData })
        .then((response) => response.text())
        .then((responseText) => {
            alert(responseText);
            if (responseText.includes('successful')) {
                window.location.href = 'home.html';
            }
        })
        .catch((error) => {
            alert('Error: ' + error);
        });
});



// Register Employee
document.getElementById('registerEmployeeForm')?.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData();
    formData.append('action', 'register');
    formData.append('name', document.getElementById('name').value);
    formData.append('contact', document.getElementById('contact').value);
    formData.append('username', document.getElementById('username').value);
    formData.append('password', document.getElementById('password').value);

    fetch(apiUrl2, { method: 'POST', body: formData })
        .then(response => response.text())
        .then(alert);
});

// Update Employee
document.getElementById('updateEmployeeForm')?.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData();
    formData.append('action', 'update');
    formData.append('id', document.getElementById('id').value);
    formData.append('name', document.getElementById('name').value);
    formData.append('contact', document.getElementById('contact').value);
    formData.append('username', document.getElementById('username').value);
    formData.append('password', document.getElementById('password').value);

    fetch(apiUrl2, { method: 'POST', body: formData })
        .then(response => response.text())
        .then(alert);
});

// Delete Employee
document.getElementById('deleteEmployeeForm')?.addEventListener('submit', function (e) {
    e.preventDefault();

    const formData = new FormData();
    formData.append('action', 'delete');
    formData.append('id', document.getElementById('id').value);

    fetch(apiUrl2, { method: 'POST', body: formData })
        .then(response => response.text())
        .then(alert);
});

// Search Employee
document.getElementById('search')?.addEventListener('input', function () {
    const formData = new FormData();
    formData.append('action', 'search');
    formData.append('search', document.getElementById('search').value);

    fetch(apiUrl2, { method: 'POST', body: formData })
        .then(response => response.json())
        .then(data => {
            const resultsDiv = document.getElementById('searchResults');
            resultsDiv.innerHTML = '';
            data.forEach(employee => {
                resultsDiv.innerHTML += `<p>${employee.id} - ${employee.name} - ${employee.contact}</p>`;
            });
        });
});
