<?php
session_start();

$currency = isset($_GET['currency']) ? $_GET['currency'] : 'RUB';
$_SESSION['currency'] = $currency;

$prices = [
    ['RUB' => 3295, 'USD' => 39.99], // Resident Evil 4 Gold Edition
    ['RUB' => 2795, 'USD' => 33.99], // Red Dead Redemption 2 Ultimate Edition
    ['RUB' => 845, 'USD' => 10.00],  // Warhammer 40,000 Rogue Trader
    ['RUB' => 615, 'USD' => 7.50],   // Hearts of Iron IV Cadet Edition
    ['RUB' => 275, 'USD' => 3.30],   // Little Nightmares II
    ['RUB' => 589, 'USD' => 7.00],   // Metro Exodus Gold Edition
    ['RUB' => 835, 'USD' => 10.00],  // Mafia II Definitive Edition
    ['RUB' => 1075, 'USD' => 12.50], // Dark Souls Remastered
    ['RUB' => 2795, 'USD' => 33.99], // Grand Theft Auto V Premium Edition
    ['RUB' => 875, 'USD' => 10.00],  // No Man's Sky
];

$pricesArray = [];
foreach ($prices as $price) {
    $pricesArray[] = $price[$currency];
}

echo json_encode($pricesArray);
?>
