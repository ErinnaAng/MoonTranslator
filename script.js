// JS For the Search Bar in Novel.html Page
document.addEventListener('DOMContentLoaded', function () {
    var input = document.getElementById('novelSearch');
    var list = document.querySelector('.list');
    var searchResultsContainer = document.getElementById('searchResults');

    input.addEventListener('input', function () {
        var searchTerm = input.value.toLowerCase();
        var articles = list.querySelectorAll('.article');

        // Clear previous search results
        searchResultsContainer.innerHTML = '';

        // Create a document fragment to improve performance
        var fragment = document.createDocumentFragment();

        // Counter to limit the number of displayed results
        var counter = 0;

        // Loop through each article
        articles.forEach(function (article) {
            var title = article.querySelector('h3 a').textContent.toLowerCase();

            if (title.includes(searchTerm)) {
                // If found, create a clone of the article
                var clone = article.cloneNode(true);

                // Add a class to the cloned element
                clone.classList.add('smaller-size');

                // Append it to the fragment
                fragment.appendChild(clone);

                // Increment the counter
                counter++;

                // Limit the number of displayed results
                if (counter >= 5) {
                    return;
                }
            }
        });

        // Append the fragment to the search results container
        searchResultsContainer.appendChild(fragment);

        // Show or hide the search results container based on the search term
        searchResultsContainer.style.display = searchTerm ? 'block' : 'none';
    });
});

// JS For the Login Popup in index.php Page
//if we click the login button, the popup will appear
document.getElementById('login').addEventListener('click', function () {
    document.querySelector('.popupL').style.display = 'flex';
})
//if we click the close button, the popup will disappear
document.getElementById('closeL').addEventListener('click', function () {
    document.querySelector('.popupL').style.display = 'none';
})

// Automatically close alert after 5 seconds
document.addEventListener('DOMContentLoaded', function () {
    var alertPopup = document.getElementById('alertPopup');
    if (alertPopup) {
        setTimeout(function () {
            alertPopup.style.display = 'none';
        }, 5000); // 5000 milliseconds = 5 seconds
    }
});

// JS For the Sign Up Popup in index.php Page
//if we click the sign up button, the popup will appear
document.getElementById('signup').addEventListener('click', function () {
    document.querySelector('.popupS').style.display = 'flex';
})

//if we click the close button, the popup will disappear
document.getElementById('closeS').addEventListener('click', function () {
    document.querySelector('.popupS').style.display = 'none';
})

// Module for input validation Sign Up
function validateform() {
    var isValid = true;
    var nameInput = document.getElementById("name").value;
    var emailInput = document.getElementById("email").value;
    var passwordInput = document.getElementById("password").value;
    var confirmPasswordInput = document.getElementById("Cpassword").value;

    if (nameInput === "") {
        isValid = false;
        alert("Name cannot be empty");
    }

    var emailPattern = /\S+@\S+\.\S+/;
    if (!emailPattern.test(emailInput)) {
        isValid = false;
        alert("Invalid email address");
    }

    var passwordPattern = /^(?=.*[0-9])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/;
    if (!passwordPattern.test(passwordInput)) {
        isValid = false;
        alert("Password must be at least 8 characters long and contain at least one uppercase letter and one number");
    }

    if (confirmPasswordInput === "") {
        isValid = false;
        alert("Confirm Password cannot be empty");
    }

    if (isValid) {
        alert("Form submitted successfully!");
        window.location.href('homeUser.php');
    }

    return isValid; // Return the isValid value to allow or prevent form submission
}
