<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/pages/gestion_comptes/styles/gestion_comptes.css">
    <title>Gestionnaire de comptes</title>
</head>
<body>
    <a href="/dashboard">Retour au dashboard</a>
    <h1>Gestionnaire de comptes</h1>
    
    
    <section id="liste_utilisateurs">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Login</th>
                    <th>Classe</th>
                    <th>Statut</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilisateurs as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['nom_utilisateur']); ?></td>
                        <td><?php echo htmlspecialchars($row['login']); ?></td>
                        <td><?php echo htmlspecialchars($row['classe_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['role_utilisateur']); ?></td>
                        <td><a href="/gestion-comptes&id=<?php echo $row['id_utilisateur']; ?>">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section id="add_account">
        <form action="/gestion-comptes" method="post">
        <label for="login">Login</label>
            <input type="text" name="login" id="login" required>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>

            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" required>

            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" required>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>

            <label for="role">Statut</label>
            <input type="texte" name="role" id="role" required>


            <input type="submit" value="Créer">
        

        </form>
    </section>
</body>
</html>
