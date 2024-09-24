<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.html");
    exit();
}
// Affichage pour débogage
/*
echo '<pre>';
print_r($_SESSION);
echo '</pre>';*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stylepagedaccueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="../js/page.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    
   <style>
        .welcome-message {
            font-size: 24px;
            font-weight: bold;
            color: #c34182;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        .username {
            color: #c34182;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        .fc-toolbar-title {
            color: #c34182;
            font-size: 18px;
        }
        .fc-daygrid-day-number {
            color: #c34182;
        }
        .fc-event {
            background-color: #c34182;
            border: none;
        }
        /* Couleur des boutons de navigation */
.fc-prev-button, .fc-next-button, .fc-today-button {
    color: #c34182; /* Couleur rose pour les boutons de navigation */
}

/* Couleur du titre du calendrier */
.fc-toolbar-title {
    color: #FF69B4; /* Couleur rose pour le titre du calendrier */
}

/* Couleur des jours et des événements dans le calendrier */
.fc-daygrid-day-number {
    color: #FF69B4; /* Couleur rose pour les numéros de jour */
}

/* Couleur de la bordure des boutons de navigation */
.fc-button {
    border-color: #FF69B4; /* Bordure rose pour les boutons */
}

/* Couleur de fond des boutons de navigation */
.fc-button-primary {
    background-color: #c34182; /* Couleur de fond rose clair pour les boutons */
}

/* Couleur du texte des boutons de navigation au survol */
.fc-button-primary:hover {
    background-color: #FF69B4; /* Couleur de fond rose pour les boutons au survol */
    color: #FFF; /* Texte blanc pour les boutons au survol */
}

/* Couleur des boutons de navigation actifs */
.fc-button-active {
    background-color:#c34182 ; /* Couleur de fond rose pour les boutons actifs */
    color: #FFF; /* Texte blanc pour les boutons actifs */
}

        .calendar-block {
           
 flex-direction: column; /* Organiser les éléments à l'intérieur du bloc */
 align-items: center; 
 margin-left:180px;
 background: rgba(255, 255, 255, 0.9);
 height: 620px;
 border-radius: 15px;
 box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
 width: 500px; /* Largeur fixe pour les blocs */
 visibility: visible;
        }
        #calendar {
            max-width: 100%;
            margin-top: 20px;
        }
        /* Styles pour le carousel */
        .carousel-container {
    max-width: 600px; /* Largeur souhaitée pour le carrousel */
    margin: 20px auto; /* Centrer horizontalement */
    overflow: hidden; /* Pour les coins arrondis */
    position: relative; /* Positionnement pour les boutons */
    border-radius: 10px;
    margin-left:100px;
}

.carousel {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.carousel-inner {
    display: flex;
    width: 100%;
}

.carousel-item {
    min-width: 100%;
    box-sizing: border-box;
}

.carousel-item img {
    width: 100%;
    border-radius: 10px;
}

.carousel-control-prev,
.carousel-control-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    padding: 10px;
    cursor: pointer;
}

.carousel-control-prev {
    left: 10px;
}

.carousel-control-next {
    right: 10px;
}
    </style>
</head>
<body>
<nav>
    <div class="navbar">
        <a href="pagedaccueil.php">Home</a>
        <a href="mesnotes.php">Mes Notes</a>
        <a href="">Settings</a>
        <a href="#" class="logout-btn" onclick="confirmLogout()">Logout</a>
    </div>
</nav>
<div class="user-block">
    <i class="fas fa-user"></i>
    <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
</div>

<h1 class="welcome-message" id="welcome">
    <!-- Le texte va s'afficher ici -->
</h1> 
<div class="blocks-container">
    <div class="info-block">
        <i class="fas fa-info-circle"></i>
        <div>
            <h2>Description</h2>
            <p id="description"><?php echo htmlspecialchars($_SESSION['description'] ?? 'Aucune description disponible.'); ?></p>
        </div>
    </div>
    <div class="info-block">
    <i class="fa fa-birthday-cake" aria-hidden="true"></i>
        <div>
            <h2>Date de naissance</h2>
            <p id="ddn"><?php echo htmlspecialchars($_SESSION['datenaissance'] ?? 'Date de naissance non disponible.'); ?></p>
        </div>
    </div>
    <div class="info-block">
        <i class="fas fa-pen"></i>
        <div>
            <h2>Ajouter une Note</h2>
            <form action="ajouter_note.php" method="POST">
                <textarea name="note" placeholder="Ajouter une note..." required></textarea>
                <button type="submit">Enregistrer</button>
            </form>
        </div>
    </div>
    <div class="carousel-container">
    <div class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/hijab.jpg" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="../img/hijab2.jpg" alt="Image 2">
            </div>
            <!-- Ajoute d'autres images si nécessaire -->
        </div>
        <button class="carousel-control-prev">&#10094;</button>
        <button class="carousel-control-next">&#10095;</button>
    </div>
</div>

    <div class="info-block calendar-block combined-animation">
        <i class="fas fa-calendar-alt"></i>
        <div>
            <h2>Mon Calendrier</h2>
            <div id="calendar"></div>
        </div>
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                {
                    title: 'Exemple événement',
                    start: '2024-09-10',
                    end: '2024-09-12',
                    color: '#FFB6C1'
                }
            ]
        });

        calendar.render();
    });

    function confirmLogout() {
        Swal.fire({
            title: 'Êtes-vous sûr(e) ?',
            text: "Vous allez être déconnecté(e).",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FF69B4',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, déconnecter !',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../login.html";
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        var welcomeElement = document.getElementById('welcome');
        var descriptionElement = document.getElementById('description');
        var dobElement = document.getElementById('ddn');
        var usernameText = "<?php echo htmlspecialchars($_SESSION['username']); ?>";
        var descriptionText = "<?php echo htmlspecialchars($_SESSION['description'] ?? 'Aucune description disponible.'); ?>";
        var dobText = "<?php echo htmlspecialchars($_SESSION['datenaissance'] ?? 'Date de naissance non disponible.'); ?>";
        var fullText = `Bienvenue, `;
        var i = 0; 
        var j = 0; 

        function typeWelcomeText() {
            if (i < fullText.length) {
                welcomeElement.innerHTML += fullText.charAt(i);
                i++;
                setTimeout(typeWelcomeText, 200);
            } else {
                typeUsernameText();
            }
        }

        function typeUsernameText() {
            if (j < usernameText.length) {
                var usernameSpan = document.createElement('span');
                usernameSpan.classList.add('username');
                usernameSpan.textContent = usernameText.charAt(j);
                welcomeElement.appendChild(usernameSpan);
                j++;
                setTimeout(typeUsernameText, 600);
            }   
        }
        typeWelcomeText();
    });

    
    document.addEventListener('DOMContentLoaded', function() {
        const prevButton = document.querySelector('.carousel-control-prev');
        const nextButton = document.querySelector('.carousel-control-next');
        const carouselInner = document.querySelector('.carousel-inner');
        const items = document.querySelectorAll('.carousel-item');
        let index = 0;

        function showSlide(newIndex) {
            if (newIndex >= items.length) {
                index = 0;
            } else if (newIndex < 0) {
                index = items.length - 1;
            } else {
                index = newIndex;
            }
            const offset = -index * 100;
            carouselInner.style.transform = `translateX(${offset}%)`;
        }

        prevButton.addEventListener('click', function() {
            showSlide(index - 1);
        });

        nextButton.addEventListener('click', function() {
            showSlide(index + 1);
        });

        // Optionnel : Ajouter une fonction pour faire défiler automatiquement
        setInterval(() => {
            showSlide(index + 1);
        }, 5000); // Change d'image toutes les 5 secondes
    
    });

    document.addEventListener('DOMContentLoaded', function() {
    // Initialisation du calendrier
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
            {
                title: 'Exemple événement',
                start: '2024-09-10',
                end: '2024-09-12',
                color: '#FFB6C1'
            }
        ]
    });
    calendar.render();

    // Initialisation de l'animation GSAP pour les info-blocks
    gsap.from('.info-block', {
        opacity: 0,
        y: 50,
        duration: 1,
        stagger: 0.3,
        ease: "power2.out"
    });

    // Intersection Observer pour déclencher l'animation du calendrier
    const calendarBlock = document.querySelector('.calendar-block');
    
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Déclencher l'animation du calendrier ici
                gsap.from('#calendar', {
                    opacity: 0,
                    y: 50,
                    duration: 1,
                    ease: "power2.out"
                });
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1 // Déclencher l'animation lorsque 10% du calendrier est visible
    });

    observer.observe(calendarBlock);
});


</script></body>
</html>
