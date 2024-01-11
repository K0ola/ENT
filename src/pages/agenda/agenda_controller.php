    <?php
    session_start();
    require_once('src/model.php');
    $userModel = new UserModel();

    if (!isset($_SESSION['login'])) {
        header('Location: /connexion');
        exit();
    }


    // Initialisation des tableaux pour les jours et les mois.
    $jours = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
    $mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

    // Récupération du groupe sélectionné et de la semaine actuelle depuis l'URL.
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

    $currentWeek = $_GET['week'] ?? 1;


    // Chargement des données d'événements depuis un fichier JSON.
    $jsonFile = "src/pages/agenda/data.json";
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

    require_once('agenda_view.php');