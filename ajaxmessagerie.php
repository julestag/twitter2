<?php
$conv = [
    1 => [
        ['conv' => 'user 1', 'message' => 'sava'],
        ['conv' => 'user 2', 'message' => 'bien et toi ?'],
    ],
    2 => [
        ['conv' => 'user 1', 'message' => 'Yo'],
        ['conv' => 'user 3', 'message' => 'salut'],
    ]
];
$idconv = isset($_GET['discussion']) ? $_GET['discussion'] : 1;
foreach ($conv[$idconv] as $message) {
    echo '<div class="bg-white p-4 rounded shadow">';
    echo '<p><strong>' . $message['conv'] . ':</strong> ' . $message['message'] . '</p>';
    echo '</div>';
}
