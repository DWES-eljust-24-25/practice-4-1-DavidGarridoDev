<?php
//In this script, place the functions
session_start();

function validateContactForm() {
    $errors = [];

    // Validate first name
    if (empty($_POST['firstname'])) {
        $errors[] = 'First name is required.';
    }

    // Validate last name
    if (empty($_POST['lastname'])) {
        $errors[] = 'Last name is required.';
    }

    // Validate phone
    if (empty($_POST['phone']) || !preg_match('/^\+?[0-9]{10,15}$/', $_POST['phone'])) {
        $errors[] = 'A valid phone number is required.';
    }

    // Validate email
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email address is required.';
    }

    return $errors;
}