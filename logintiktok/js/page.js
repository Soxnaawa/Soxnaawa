
    function confirmLogout() {
        if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
            window.location.href = "logout.php";
        }
    }
