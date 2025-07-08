<?php
namespace App\Providers;

class Logger
{
    public static function enregistrer()
    {
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'inconnue';
        $date = date('Y-m-d H:i:s');
        $username = $_SESSION['username'] ?? 'visiteur';
        $page = $_SERVER['REQUEST_URI'] ?? 'inconnue';

        $ligne = "$ip\t$date\t$username\t$page\n";

        if (!file_exists('logs')) {
            mkdir('logs', 0777, true);
        }

        file_put_contents('logs/journal.txt', $ligne, FILE_APPEND);
    }
}
