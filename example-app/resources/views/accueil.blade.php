<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page D'Accueil</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1 300;1 400;1 500;1 600;1 700;1 800;1 900&display=swap');
/* vient de page.css*/
* {
    box-sizing: border-box;
    font-family: 'poppins', sans-serif;
}
/* Styles généraux */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

/* Styles pour l'entête */
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.menu-je-suis-container {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    flex-wrap: nowrap;
    height: 15px;
}

.menu {
    position: relative;
    display: inline-block;
    margin-right: 20px;
}



@keyframes reveal {
    from {
        transform: scaleX(0);
    }

    to {
        transform: scaleX(1);
    }
}

.menu-content {
    display: none;
    position: absolute;
    background-color: white;
    min-width: 160px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 5px;
    top: 40px;
    /* Adjusted to avoid overlap with the button */
}

.menu-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    border-bottom: 1px solid #ddd;
}

.menu-content a:hover {
    background-color: #f1f1f1;
}


/* vient de la page.css */
.slide {
    height: 100%;
    width: 200px;
    position: absolute;
    background-color: #fff;
    transition: 0.5s ease;
    transform: translateX(-180px);
}
.slide.show {
    transform: translateX(0);
    box-shadow: 0 0 0 15px rgba(0, 0, 0, 0.5);
}
/* sub menu commence ici */
.sub-menu {
    padding-left: 10px;
    display: none;
}
/* Styles pour les logos */
.logo1,
.logo2,
.logo3 {
    display: flex;
    align-items: center;
    margin-right: 20px;
}
.logo{
    margin-top: 10px;
}

.logo2 img,
.logo3 img {
    max-width: 100%;
    height: 90px;
}
.logo1 img {
    max-width: 100%;
    height: 55px;
   /* width: 150%;*/
    margin-left: 30px;
}
.logo img {
    /*max-width: 100%;*/
    height: 15px;
    width: 20px;
}
.logo4 {
    max-width: 300%;
    height: 100px;
}
.logo4 img {
    height: 300px;
    margin-top: 1%;
}

.footer-logo4 {
    display: flex;
    flex-direction: column;
    align-items: start;
    margin: 20px;
    margin-top: 10%;
}


.logo2 img {
    height: 110px;
}

.logo3 img {
    height: 94px;
}

/* Styles pour le titre */
h1 {
    text-align: center;
    font-family: "Quicksand", sans-serif;
    color: white;
    font-size: 4em;
    text-shadow: 0 0 5px #008a50, 0 0 5px #008a50;
    margin: 100px 0;
}
h2{
    text-align: center;
    font-family: "Quicksand", sans-serif;
    color: white;
    font-size: 2em;
    text-shadow: 0 0 5px #008a50, 0 0 5px #008a50;
    margin: 100px 0;
    margin-top: -5px;
}
/* Styles pour le container d'animation */
.animation-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    font-size: 1.5em;
    margin-top: 100px;
}

.word-block {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 150px;
    height: 150px;
    text-align: center;
}

.word-block legend {
    font-weight: bold;
    margin-bottom: 10px;
}

.word-block img {
    max-width: 100px;
    height: auto;
    margin: 0 auto;
}

/* Styles pour le footer */
footer {
    background-color: #23332c;
    color: white;
    padding: 20px 0;
    text-align: center;
    margin-top: 25%;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    padding: 0 20px;
}

.footer-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 20px;
}

.footer-section .logo3 img,
.footer-section .logo2 img {
    max-width: 100px;
    height: auto;
    margin: 10px;
}

.contact-info {
    text-align: center;
}

/* Media Queries pour les petits écrans */
@media (max-width: 768px) {
    .header {
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
    }

    .menu-je-suis-container {
        flex-direction: row;
        justify-content: center;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }

    .menu,
    .je-suis {
        margin-right: 0;
        margin-bottom: 10px;
        flex-direction: row;
        justify-content: center;
    }

    .logo img {
        height: 60px;
    }

    .logo1 img {
        height: 60px;
    }

    .logo2 img {
        height: 60px;
    }

    .logo3 img {
        height: 60px;
    }

    h1 {
        font-size: 2em;
    }

    .animation-container {
        font-size: 1em;
        margin-top: 10px;
    }

    .word-block {
        width: 100px;
        height: 100px;
        margin: 5px;
    }

    .word-block img {
        max-width: 60px;
    }

    footer .footer-container {
        flex-direction: column;
        padding: 0;
    }

    .footer-section {
        margin: 20px 0;
    }

    .footer-section .logo3 img,
    .footer-section .logo2 img {
        max-width: 60px;
    }
}

footer-section .contact-info {
    text-align: center;
}

.form-container {
    margin-top: 5px;
    padding-bottom: -30px;/*ma permis de faire monter le mdp oublier*/
}
h3{
    
    text-align: start;
font-family: "Quicksand", sans-serif;
color: white;
font-size: 2em;
text-shadow: 0 0 5px #008a50, 0 0 5px #008a50;
margin: 100px 0;
margin-top: -60px;
}
.form-group {
    margin-bottom: 70px;
    margin-top: -50px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
}

.form-group button {
    background-color: #008a50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-group button:hover {
    background-color: #005c32;
}

.container {
    width: 40%;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
   height: 450px;/*hauteur du bloc*/
}
.wrapper{
    display: flex;
}  

.photo-container {
    width: 50%;
    max-height: 200px; /* Ajustez la largeur selon vos besoins */
}

.photo-container img {
    max-width: 100%;
    height: 500px;
    width: 80%; /* fi la donn modifier 06/06*/
}



.reveal-text {
    display: inline-block;
    opacity: 0;
    animation: revealAnimation 1s forwards;
}

.reveal-text:nth-child(1) {
    animation-delay: 1s;
    /* Délai pour le premier mot */
}

.reveal-text:nth-child(2) {
    animation-delay: 1.5s;
    /* Délai pour le deuxième mot */
}

.reveal-text:nth-child(3) {
    animation-delay: 2s;
    /* Délai pour le troisième mot */
}

.reveal-text:nth-child(4) {
    animation-delay: 2.5s;
    /* Délai pour le quatrième mot */
}

.reveal-text:nth-child(5) {
    animation-delay: 3s;
    /* Délai pour le cinquième mot */
}

.reveal-text:nth-child(6) {
    animation-delay: 3.5s;
    /* Délai pour le sixième mot */
}

/* Ajoutez des règles pour les autres mots avec des délais appropriés */

@keyframes revealAnimation {
    from {
        opacity: 0;
        transform: translateY(20px);
        /* Translation vers le bas */
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}  
</style>
</head>
<body>
    <div class="header">
        <div class="menu">
            <label>
            <input type="checkbox" >
            <div class="toggle">
                <span class="top_line common"></span>
                <span class="middle_line common"></span>
                <span class="bottom_line common"></span>
            </div>
            <div class="slide">
                <ul>
                    <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>Accueil</a></li>
                    <li><a href="pagelien.php"><i class="fa fa-sticky-note" aria-hidden="true"></i> Formulaires</a></li>
                    <li>
                        <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Parametres</a>
                        <ul class="sub-menu">
                            <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Modifier Compte</a></li>
                            <ul class="sub-menu">
                                <li><a href="#"><i class="fa fa-key" aria-hidden="true"></i> Changer mot de passe</a></li>
                                <li><a href="#"><i class="fa fa-id-badge" aria-hidden="true"></i> Changer Identifiant</a></li>
                            </ul>
                            <li><a href="#"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer Compte</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-bell-slash" aria-hidden="true"></i> Se deconnecter</a></li>
                </ul>
            </div>
            </label>
            <script>
     document.addEventListener('DOMContentLoaded', (event) => {
         const toggle = document.querySelector('.toggle');
         const slide = document.querySelector('.slide');
         const links = document.querySelectorAll('.slide ul li a');
         toggle.addEventListener('mouseover', () => {
             slide.classList.add('show');
         });
         toggle.addEventListener('mouseout', () => {
             slide.classList.remove('show');
         });
         slide.addEventListener('mouseover', () => {
             slide.classList.add('show');
         });
         slide.addEventListener('mouseout', () => {
             slide.classList.remove('show');
         });
         links.forEach(link => {
             link.addEventListener('click', function(event) {
                 // Prevent default behavior for anchor links
                 event.preventDefault();
                 // Supprime la classe active de tous les liens
                 links.forEach(l => l.classList.remove('active'));
                 // Ajoute la classe active au lien cliqué
                 this.classList.add('active');
             });
         });
     });
 </script>
ody>
tml>
         </div>
        
        <div class="logo1">
            <img src="boa.png" alt="Logo1">
        </div>
        <div class="logo">
            <legend>SENEGAL <img src="drapeausen.jpg" alt="drapeausenegal"></legend>
        </div>
    </div>

    <h1><b>COCOTIER</b></h1>
    <div class="animation-container">
        <div class="word-block">
            <legend class="reveal-text">Collecte</legend>
            <img src="collecte.jpg" alt="Collecte Image">
        </div>
        <div class="word-block">
            <legend class="reveal-text">Consolidation</legend>
            <img src="consolidation.jpg" alt="Consolidation Image">
        </div>
        <div class="word-block">
            <legend class="reveal-text">Traitement</legend>
            <img src="traitement.jpg" alt="Traitement Image">
        </div>
        <div class="word-block">
            <legend class="reveal-text">Informatique</legend>
            <img src="informatique.jpg" alt="Informatique Image">
        </div>
        <div class="word-block">
            <legend class="reveal-text">Elaboration</legend>
            <img src="elaboration.jpg" alt="Elaboration Image">
        </div>
        <div class="word-block">
            <legend class="reveal-text">Rapports</legend>
            <img src="rapport.png" alt="Rapport Image">
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <div class="logo3">
                    <img src="boa.jpg" alt="Logo3">
                </div>
                <div class="contact-info">
                    <legend><i class="fa-solid fa-phone-volume"></i> Tél:(221) 33 865 64 64  </legend>
                    <legend><i class="fa-solid fa-location-dot"></i> Siège: BANK OF AFRICA-SENEGAL Immeuble Elan Route de Ngor, Zone 12 Quartier des Almadies,Dakar SENEGAL </legend>
                </div>
            </div>
            <div class="footer-section">
                <div class="logo2">
                    <img src="bceao.jpg" alt="Logo2">
                </div>
                <div class="contact-info">
                    <legend><i class="fa-solid fa-phone-volume"></i> Tél: 00 221 33 823 83 35 </legend>
                    <legend><i class="fa-solid fa-location-dot"></i> Siège : Avenue Abdoulaye Fadiga - 3108 Dakar - Sénégal </legend>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
