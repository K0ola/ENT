function setTheme(theme) {
    const body = document.body;
    const title = document.getElementById('title');
  
    // Réinitialisation des classes pour supprimer les thèmes précédents
    body.classList.remove('blue', 'green', 'red', 'purple');
    
    // Ajout de la classe correspondant au thème choisi
    body.classList.add(theme);
    
    // Modification du texte pour correspondre au thème
    switch (theme) {
      case 'blue':
        title.textContent = 'Thème Bleu';
        break;
      case 'green':
        title.textContent = 'Thème Vert';
        break;
      case 'red':
        title.textContent = 'Thème Rouge';
        break;
      case 'purple':
        title.textContent = 'Thème Violet';
        break;
      default:
        title.textContent = 'Thème Changer';
        break;
    }
  }
  
