<?php

require('helpers.php');

$is_auth = rand(0, 1);

$user_name = 'Zodiac'; // укажите здесь ваше имя

$page_name = 'Имя страницы'; //Добавлена переменная - имя страницы

$categories = ["Доски и лыжи","Крепления","Ботинки","Одежда","Инструменты","Разное"]; // Добавлен массив с категориями

$all_advt = [ //Добавлен двумерный массив с товарами; название скорректировано snake_case способом
    [
        'title' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '10999',
        'img' => 'img/lot-1.jpg',
        'expiration' => '2022-04-29'
    ],
    [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '159999',
        'img' => 'img/lot-2.jpg',
        'expiration' => '2022-04-30'
    ],
    [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => '8000',
        'img' => 'img/lot-3.jpg',
        'expiration' => '2022-05-01'
    ],
    [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => '10999',
        'img' => 'img/lot-4.jpg',
        'expiration' => '2022-05-02'
    ],
    [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => '7500',
        'img' => 'img/lot-5.jpg',
        'expiration' => '2022-05-03'
    ],
    [
        'title' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => '5400',
        'img' => 'img/lot-6.jpg',
        'expiration' => '2022-05-04'
    ]
];

/* Функция для форматирования суммы и добавления к ней знака рубля */ 
function edit_lot_cost($lot_cost) {
    $lot_cost = ceil($lot_cost);
    if ($lot_cost >= 1000) {
        return number_format($lot_cost, 0, ',', ' ') . " ₽";
    }
    elseif ($lot_cost < 1000) {
        return ($lot_cost . " ₽");
    }
};

/* Функция для подсчета оставшегося времени */
function expiration_time($expiration_date) {
    $cur_date = date("Y-m-d H:i:s"); /* Для проверки добавления класса заменял H на какой-нибудь час поближе к истечению срока */
    $diff_seconds = strtotime($expiration_date) - strtotime($cur_date);
    $diff_minutes = floor($diff_seconds / 60 % 60);
    $diff_hours = floor($diff_seconds / 3600); 
        if ($diff_seconds <= 3600) {
            ?> <div class="timer--finishing"><?
            return str_pad($diff_hours, 2, "0", STR_PAD_LEFT) . ":" . 
            str_pad($diff_minutes % 60, 2, "0", STR_PAD_LEFT) . ":" . 
            str_pad($diff_seconds % 60, 2, "0", STR_PAD_LEFT);
        }
        return str_pad($diff_hours, 2, "0", STR_PAD_LEFT) . ":" . 
        str_pad($diff_minutes % 60, 2, "0", STR_PAD_LEFT) . ":" . 
        str_pad($diff_seconds % 60, 2, "0", STR_PAD_LEFT);
};

$page_content = include_template(
    'main.php', 
        [
            'all_advt' => $all_advt, 
            'categories' => $categories
        ]); 
$layout_content = include_template(
    'layout.php', 
        [
            'is_auth' => $is_auth, 
            'user_name' => $user_name, 
            'page_name' => $page_name, 
            'page_content' => $page_content, 
            'categories' => $categories
        ]); 
print($layout_content);
