<link rel="stylesheet" href="src/pages/dashboard/styles/agenda.css">
<?php

$jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'];
$mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

if ($_SESSION["class"] == 5) {
    $selectedGroup = "A";
} elseif ($_SESSION["class"] == 6) {
    $selectedGroup = 'B';
}elseif ($_SESSION["class"] == 6) {
    $selectedGroup = 'B';
} elseif ($_SESSION["class"] == 7) {
    $selectedGroup = 'C';
} elseif ($_SESSION["class"] == 8) {
    $selectedGroup = 'D';
}
$currentDay = $_GET['day'] ?? date('Y-m-d');

$jsonFile = "src/pages/agenda/data.json";
$jsonData = file_get_contents($jsonFile);
$response = json_decode($jsonData, true);

$startDate = strtotime($currentDay);
$endDate = $startDate;

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
    $formattedDay = $jours[date('w', $eventStart)] . ' ' . date('d', $eventStart) . ' ' . $mois[date('n', $eventStart) - 1];

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

// Trier par date
ksort($eventsByDay);

// Boutons de navigation pour le jour précédent et le jour suivant
echo '<div class="navigation">';
echo '<a href="?day=' . (date('Y-m-d', strtotime("-1 day", $startDate))) . '&group=' . $selectedGroup . '">Jour précédent</a> ';
echo '<a href="?day=' . (date('Y-m-d', strtotime("+1 day", $startDate))) . '&group=' . $selectedGroup . '">Jour suivant</a> ';
echo '</div>';


foreach ($eventsByDay as $dayInfo) {
    echo "<div class='day'>" . $dayInfo['formattedDate'] . "</div>";
    echo "<table class='timetable'>";

    // Trier les événements de la journée par heure de début
    usort($dayInfo['events'], function($a, $b) {
        return strtotime($a['startTimeFormatted']) - strtotime($b['startTimeFormatted']);
    });

    foreach ($dayInfo['events'] as $event) {
        echo "<tr class='matiere'>";
        echo "<td><div class='time-slot'>" . $event['startTimeFormatted'] . " - " . $event['end'] . "</div></td>";
        echo "<td>" . $event['title'] . " - " . $event['groupFormat'] . "<br>Lieu: " . $event['location'];
        if (!empty($event['trainer'])) {
            echo "<br>Professeur: " . $event['trainer'];
        }
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

?>