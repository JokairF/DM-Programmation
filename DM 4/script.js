document.addEventListener("DOMContentLoaded", function () {
  // Récupération du formulaire
  var form = document.querySelector("form");

  // Fonction de validation de l'identifiant
  function validateIdentifiant() {
    var identifiant = document.getElementById("identifiant").value;
    if (identifiant.trim() === "") {
      alert("L'identifiant est obligatoire.");
      return false;
    }
    return true;
  }

  // Fonction de validation du mot de passe
  function validatePassword() {
    var password = document.getElementById("password").value;
    if (password.length < 6) {
      alert("Le mot de passe doit comporter au moins 6 caractères.");
      return false;
    }
    return true;
  }

  // Fonction de validation des adresses e-mails
  function validateEmails() {
    var email = document.getElementById("email").value;
    var emailConfirm = document.getElementById("email-confirm").value;

    if (email.trim() === "" || emailConfirm.trim() === "") {
      alert("Les adresses e-mails sont obligatoires.");
      return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email) || !emailRegex.test(emailConfirm)) {
      alert("Veuillez entrer des adresses e-mails valides.");
      return false;
    }

    if (email !== emailConfirm) {
      alert("Les adresses e-mails ne correspondent pas.");
      return false;
    }

    return true;
  }

  // Fonction de validation du nom
  function validateNom() {
    var nom = document.getElementById("nom").value;
    if (nom.trim() === "") {
      alert("Le nom est obligatoire.");
      return false;
    }
    return true;
  }

  // Fonction de validation du prénom
  function validatePrenom() {
    var prenom = document.getElementById("prenom").value;
    if (prenom.trim() === "") {
      alert("Le prénom est obligatoire.");
      return false;
    }
    return true;
  }

  form.addEventListener("submit", function (event) {
    // Validation de l'identifiant, du mot de passe, des adresses e-mails, du nom et du prénom
    if (
      !validateIdentifiant() ||
      !validatePassword() ||
      !validateEmails() ||
      !validateNom() ||
      !validatePrenom()
    ) {
      // Blocage de l'envoi du formulaire si les conditions ne sont pas respectées
      event.preventDefault();
    }
  });
});
