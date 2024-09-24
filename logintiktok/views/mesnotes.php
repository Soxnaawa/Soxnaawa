<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.html");
    exit();
}

$user = "root";
$database = "notesapp";
$db_adress = "localhost";
$mdp = "";

$conn = new mysqli($db_adress, $user, $mdp, $database);
if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

$username = $_SESSION['username'];

// Requête pour récupérer les notes de l'utilisateur
$sql = "SELECT * FROM notes WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Notes</title>
    <link rel="stylesheet" href="../css/stylepagedaccueil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #FFF0F5;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .notes-container {
            margin-top: 100px; /* Pour éviter le chevauchement avec la navbar */
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-around;
        }
        .note-card {
            background-color: #FF69B4;
            color: white;
            padding: 20px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .note-card h2 {
            font-size: 20px;
        }
        
    /* Style pour le texte */
    .welcome-message {
        font-size: 24px;
        font-weight: bold;
        color: #c34182;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    .username {
        color: #c34182; /* Couleur pour le nom d'utilisateur */
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
 /* Menu contextuel */
 .context-menu {
            display: none;
            position: absolute;
            background-color:#FF69B4 ;
            border: 1px solid #FF69B4;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 150px;
        }
        .context-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .context-menu ul li {
            padding: 10px;
            cursor: pointer;
        }
        .context-menu ul li:hover {
            background-color:#c34182 ;
            color: #FFF;
        }
    </style>
</head>
<body>
<nav class="navbar">
    <a href="pagedaccueil.php">Home</a>
    <a href="mesnotes.php">Mes Notes</a>
    <a href="settings.php">Settings</a>
    <a href="#" class="logout-btn" onclick="confirmLogout()">Logout</a>
</nav>
<div class="user-block">
    <i class="fas fa-user"></i>
    <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
</div>
<h1 class="welcome-message" id="welcome">
    <!-- Le texte va s'afficher ici -->
</h1> 
<div class="notes-container">
    <?php
   
        while ($row = $result->fetch_assoc()) {
            echo '<div class="note-card" data-id="' . htmlspecialchars($row['id']) . '">';
            echo '<p>' . htmlspecialchars($row['note']) . '</p>';
            echo '<div class="context-menu" id="context-menu-' . htmlspecialchars($row['id']) . '">';
            echo '<ul>';
            echo '<li onclick="editNote(' . htmlspecialchars($row['id']) . ')">Modifier</li>';
            echo '<li onclick="deleteNote(' . htmlspecialchars($row['id']) . ')">Supprimer</li>';
            echo '</ul>';
            echo '</div>';
            echo '</div>';
    }

    ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Vous allez être déconnecté.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FF69B4', // Couleur rose pour le bouton de confirmation
            cancelButtonColor: '#d33', // Couleur rouge pour le bouton d'annulation
            confirmButtonText: 'Oui, déconnecter !',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../login.html";
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
    var welcomeElement = document.getElementById('welcome');
    var descriptionElement = document.getElementById('description');
    var dobElement = document.getElementById('ddn');
    var usernameText = "<?php echo htmlspecialchars($_SESSION['username']); ?>";
   
    var fullText = `Bienvenue, `;
    var i = 0; // Pour "Bienvenue, "
    var j = 0; // Pour le nom d'utilisateur

    // Vider les éléments avant de démarrer l'animation
    welcomeElement.innerHTML = '';

    // Fonction pour écrire "Bienvenue, " lettre par lettre
    function typeWelcomeText() {
        if (i < fullText.length) {
            welcomeElement.innerHTML += fullText.charAt(i);
            i++;
            setTimeout(typeWelcomeText, 200); // Délai entre chaque lettre de "Bienvenue"
        } else {
            typeUsernameText(); // Après "Bienvenue, ", on commence à écrire le nom d'utilisateur
        }
    }

    // Fonction pour écrire le nom d'utilisateur lettre par lettre avec la couleur lightpink
    function typeUsernameText() {
        if (j < usernameText.length) {
            var usernameSpan = document.createElement('span');
            usernameSpan.classList.add('username');
            usernameSpan.textContent = usernameText.charAt(j);
            welcomeElement.appendChild(usernameSpan);
            j++;
            setTimeout(typeUsernameText, 600); // Délai entre chaque lettre du nom d'utilisateur
        }   
    }
    typeWelcomeText();
});   

 // Fonction pour afficher le menu contextuel
 function showContextMenu(event, noteId) {
        event.preventDefault();
        var contextMenu = document.getElementById('context-menu-' + noteId);
        contextMenu.style.display = 'block';
        contextMenu.style.top = event.clientY + 'px';
        contextMenu.style.left = event.clientX + 'px';
    }

    // Fonction pour masquer le menu contextuel
    function hideContextMenu() {
        var contextMenus = document.querySelectorAll('.context-menu');
        contextMenus.forEach(function(menu) {
            menu.style.display = 'none';
        });
    }

    // Événement de clic droit
    document.querySelectorAll('.note-card').forEach(function(noteCard) {
        noteCard.addEventListener('contextmenu', function(event) {
            var noteId = this.getAttribute('data-id');
            showContextMenu(event, noteId);
        });
    });

    // Événement de clic pour masquer le menu contextuel
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.context-menu')) {
            hideContextMenu();
        }
    });
// Fonction pour modifier une note
function editNote(noteId) {
    Swal.fire({
        title: 'Modifier la note',
        input: 'textarea',
        inputLabel: 'Nouvelle note',
        inputValue: document.querySelector('[data-id="' + noteId + '"] p').textContent,
        inputPlaceholder: 'Entrez la nouvelle note ici...',
        inputAttributes: {
            'aria-label': 'Entrez la nouvelle note ici...'
        },
        showCancelButton: true,
        confirmButtonColor: '#FF69B4',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Modifier',
        cancelButtonText: 'Annuler',
        inputValidator: (value) => {
            if (!value) {
                return 'Vous devez écrire quelque chose !';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            var newNote = result.value;
            // Envoyer la requête pour modifier la note
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'modifier_note.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.querySelector('[data-id="' + noteId + '"] p').textContent = newNote;
                }
            };
            xhr.send('id=' + noteId + '&note=' + encodeURIComponent(newNote));
        }
    });
}


    // Fonction pour supprimer une note
    function deleteNote(noteId) {
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Vous allez supprimer cette note.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FF69B4',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, supprimer !',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'supprimer_note.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.querySelector('[data-id="' + noteId + '"]').remove();
                        hideContextMenu();
                    }
                };
                xhr.send('id=' + noteId);
            }
        });
    }
</script>

</body>
</html>
