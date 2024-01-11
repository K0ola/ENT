<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Emploi du temps MMI</title>
</head>
<body>

<div class="container">
    <?php
    // Initialisation des tableaux pour les jours et les mois.
    $jours = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
    $mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    // Récupération du groupe sélectionné et de la semaine actuelle depuis l'URL.
    $selectedGroup = $_GET['group'] ?? '';
    $currentWeek = $_GET['week'] ?? 0;

    // Chargement des données d'événements depuis un fichier JSON.
    $jsonFile = "data.json";
    $jsonData = file_get_contents($jsonFile);
    $response = json_decode($jsonData, true);

    // Calcul des dates de début et de fin de la semaine courante.
    $time = $currentWeek == 0 ? strtotime("2024-01-01") : strtotime("2024-01-01 +{$currentWeek} weeks");
    $dayOfWeek = date('w', $time);
    $startDate = $dayOfWeek == 1 ? $time : strtotime('last Monday', $time);
    $endDate = strtotime("next Sunday", $startDate);

    $today = date('Y-m-d');

    // Création d'un tableau pour organiser les événements par jour.
    $eventsByDay = [];

    foreach ($response as $event) {
        $eventStart = strtotime(date('Y-m-d', $event['start']));
        if ($eventStart < $startDate || $eventStart > $endDate) {
            continue;
        }

        if ($selectedGroup && (!isset($event['group']) || !in_array($selectedGroup, $event['group']))) {
            continue;
        }

        $dateKey = date('Y-m-d', $eventStart);
        $formattedDay = $jours[date('w', $eventStart)] . ' ' . date('d', $eventStart) . ' ' . $mois[date('n', $eventStart) - 1] . ' ' . date('Y', $eventStart);

        if (!isset($eventsByDay[$dateKey])) {
            $eventsByDay[$dateKey] = ['formattedDate' => $formattedDay, 'events' => []];
        }

        $eventsByDay[$dateKey]['events'][] = [
            'title' => $event['title'] ?? 'Cours non spécifié',
            'groupFormat' => $event['groupFormat'],
            'start' => $event['start'],
            'startTimeFormatted' => date('H:i', $event['start']),
            'end' => date('H:i', $event['end']),
            'location' => isset($event['location']) ? implode(', ', $event['location']) : 'Lieu non spécifié',
            'trainer' => isset($event['trainer']) ? $event['trainer'] : null
        ];
    }

    // Tri des événements par date.
    ksort($eventsByDay);

    // Calcul du numéro de la semaine pour affichage
    $weekNumber = date('W', $startDate);
    $firstDayOfWeek = $jours[date('w', $startDate)] . ' ' . date('d', $startDate) . ' ' . $mois[date('n', $startDate) - 1];

    // Affichage des boutons de navigation entre les semaines avec le numéro de la semaine.
    echo '<div class="week-navigation">';
    echo '<a href="?week=' . ($currentWeek - 1) . '&group=' . $selectedGroup . '" class="nav-button">&lt; Semaine ' . ($weekNumber-1) . '</a> ';
    echo 'Semaine ' . $weekNumber . ' - ' . $firstDayOfWeek;
    echo '<a href="?week=' . ($currentWeek + 1) . '&group=' . $selectedGroup . '" class="nav-button">Semaine ' . ($weekNumber+1) . ' &gt;</a>';
    echo '</div>';

    // Affichage des boutons de sélection de groupe.
    echo '<div class="group-buttons">';
    echo '<a href="?group=A">TPA</a> ';
    echo '<a href="?group=B">TPB</a> ';
    echo '<a href="?group=C">TPC</a> ';
    echo '<a href="?group=D">TPD</a> ';
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