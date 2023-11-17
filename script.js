// JS For the Login Popup in Home.html Page
//if we click the login button, the popup will appear
document.getElementById('login').addEventListener('click', function () {
    document.querySelector('.popupL').style.display = 'flex';
})

//if we click the close button, the popup will disappear
document.getElementById('closeL').addEventListener('click', function () {
    document.querySelector('.popupL').style.display = 'none';
})

// JS For the Sign Up Popup in Home.html Page
//if we click the sign up button, the popup will appear
document.getElementById('signup').addEventListener('click', function () {
    document.querySelector('.popupS').style.display = 'flex';
})

//if we click the close button, the popup will disappear
document.getElementById('closeS').addEventListener('click', function () {
    document.querySelector('.popupS').style.display = 'none';
})

//JS For Validate User in Regis menu
function validate() {
    if(document.Formfill.Username.value==''){
        document.getElementById('error').innerHTML = "Username must be filled";
        return false;
    }
    else if (document.Formfill.Email.value==''){
        document.getElementById('error').innerHTML = "Email must be filled";
        return false;
    }
    else if (document.Formfill.Email.value==''){
        document.getElementById('error').innerHTML = "Email must be filled";
        return false;
    }
    else if (document.Formfill.Password.value==''){
        document.getElementById('error').innerHTML = "Password must be filled";
        return false;
    }
}


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
                // If found, create a clone of the article and append it to the fragment
                var clone = article.cloneNode(true);
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
