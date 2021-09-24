<?php

$age = 25;

if ($age >= 0 && $age <= 14) { // Check age for child
    echo "Çocuk";
} elseif ($age >= 15 && $age <= 24) { // Check age for teenager
    echo "Genç";
} elseif ($age >= 25 && $age <= 64) { // Check age for adult
    echo "Yetişkin";
} elseif ($age > 64) { // Check age for older
    echo "Yaşlı";
} else { // Check for invalid value
    echo "Lütfen sadece pozitif değerler giriniz!";
}
