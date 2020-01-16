/* My arrays */

function chooseCategory () { // Adds the category selector
    let instructionsR = document.querySelector('.test');
    let wordCategoryTitle = document.createElement('h2');
    wordCategoryTitle.className = 'className';
    wordCategoryTitle.innerHTML = 'innerHTML';
    instructionsR.appendChild(wordCategoryTitle);
    }

chooseCategory();