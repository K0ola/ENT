<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/root.css">
    <link rel="stylesheet" href="src/layout/styles/nav.css">
    <link rel="stylesheet" href="src/layout/styles/theme.css">
    <link rel="stylesheet" href="src/pages/agenda/styles.css">
	<link rel="icon" href="src/assets/outils/Univ_eiffel.svg"/>
    <title>Emploi du temps</title>
</head>
<body>
    <?php require_once 'src/layout/nav.php'; ?>
<div class="container">
    <?php
    // Affichage des boutons de navigation entre les semaines avec le numéro de la semaine.
    echo '<div class="week-navigation">';
    echo '<a href="?week=' . ($currentWeek - 1) . '&group=' . $selectedGroup . '" class="nav-button">&lt; Semaine ' . ($weekNumber-1) . '</a> ';
    echo 'Semaine ' . $weekNumber . ' - ' . $firstDayOfWeek;
    echo '<a href="?week=' . ($currentWeek + 1) . '&group=' . $selectedGroup . '" class="nav-button">Semaine ' . ($weekNumber+1) . ' &gt;</a>';
    echo '</div>';

    // Début de la structure du tableau pour l'affichage de l'emploi du temps.
    echo '<table class="timetable">';

    // Création des en-têtes de colonne avec les jours de la semaine (Lundi à Vendredi).
    echo '<tr>';
    for ($i = 0; $i < 5; $i++) { // Lundi (0) à Vendredi (4)
        $currentDay = strtotime("+$i day", $startDate);
        $formattedDay = $jours[date('w', $currentDay)] . ' ' . date('d', $currentDay) . ' ' . $mois[date('n', $currentDay) - 1] . ' ' . date('Y', $currentDay);
        echo "<th>" . $formattedDay . "</th>";
    }
    echo '</tr>';

    // Création des cellules pour chaque jour avec les événements correspondants.
    echo '<tr>';
    for ($i = 0; $i < 5; $i++) { // Lundi (0) à Vendredi (4)
        $currentDay = strtotime("+$i day", $startDate);
        $dateKey = date('Y-m-d', $currentDay);
        $isToday = $dateKey === $today ? " today" : "";
        echo "<td class='day-column$isToday'>";
        if (isset($eventsByDay[$dateKey])) {
            // Tri des événements par heure de début.
            usort($eventsByDay[$dateKey]['events'], function ($a, $b) {
                return strtotime($a['startTimeFormatted']) - strtotime($b['startTimeFormatted']);
            });

            // Affichage des événements pour chaque jour.
            foreach ($eventsByDay[$dateKey]['events'] as $event) {
                echo "<div class='event'>";
                echo "<div class='time-slot'>" . $event['startTimeFormatted'] . " - " . $event['end'] . "</div>";
                echo "<div class='title'>" . $event['title'] . "</div>";
                echo "<div class='details'>Groupe: " . $event['groupFormat'] . "<br>Lieu: " . $event['location'];
                if (!empty($event['trainer'])) {
                    echo "<br>Professeur: " . $event['trainer'];
                }
                echo "</div>";
                echo "</div>";
            }
        }
        echo "</td>";
    }
    echo '</tr>';
    echo '</table>';
    ?>
</div>

    
</body>
</html>