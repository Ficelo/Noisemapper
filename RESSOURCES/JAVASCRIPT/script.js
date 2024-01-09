const stars = document.querySelectorAll('.star');
const averageRatingElement = document.getElementById('averageRating');
let ratings = [];

stars.forEach(star => {
    star.addEventListener('click', () => {
        const rating = parseInt(star.getAttribute('data-rating'));
        ratings.push(rating);

        // Envoyer les évaluations à un script PHP
        fetch('process.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ ratings }),
        })
        .then(response => response.json())
        .then(data => {
            averageRatingElement.textContent = `Note moyenne: ${data.averageRating.toFixed(2)}`;
        })
        .catch(error => console.error('Erreur:', error));
    });
});

function displayMessage(message) {
    var messageContainer = document.getElementById("message-container");
    messageContainer.innerHTML = '<p>' + message + '</p>';
}

document.addEventListener('DOMContentLoaded', function () {
    const themeSwitch = document.getElementById('theme-switch');
    const themePreferenceField = document.getElementById('theme_preference');
    const messageContainer = document.getElementById('message-container');

    // Initialisation du texte en fonction de l'état initial du commutateur
    messageContainer.innerText = themeSwitch.checked ? 'Thème sombre activé.' : 'Thème clair';

    themeSwitch.addEventListener('change', function () {
        if (this.checked) {
            // Si le switch est activé, la valeur est 1
            messageContainer.innerText = 'Thème sombre ';
            themePreferenceField.value = '1';
        } else {
            // Si le switch est désactivé, la valeur est 0
            messageContainer.innerText = 'Thème clair';
            themePreferenceField.value = '0';
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    function showTab(tabName) {
        const tabs = document.querySelectorAll('.tabs li');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.classList.remove('active');
        });

        tabContents.forEach(content => {
            content.style.display = 'none';
        });

        const activeTab = document.querySelector('.tabs a[href="#' + tabName + '"]').parentNode;
        const activeContent = document.getElementById(tabName);

        activeTab.classList.add('active');
        activeContent.style.display = 'block';
    }

    // Afficher l'onglet actif au chargement de la page
    const initialTab = document.querySelector('.tabs li.active a').getAttribute('href').substring(1);
    showTab(initialTab);

    // Ajout d'un gestionnaire d'événements aux onglets
    const tabs = document.querySelectorAll('.tabs li');
    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            const tabName = this.querySelector('a').getAttribute('href').substring(1);
            showTab(tabName);
        });
    });
});

