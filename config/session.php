<?php
// Démarrer la session de manière sécurisée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_regenerate_id();
}
