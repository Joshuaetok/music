<?php

// Check if USER session is not empty
if (!empty($_SESSION['USER'])) {
    // Unset and destroy the session
    unset($_SESSION['USER']);
    session_destroy();

    // Regenerate a new session ID if needed
    if (session_status() == PHP_SESSION_ACTIVE) {
        session_regenerate_id();
    }
}

// Redirect to the login page
redirect('login');
