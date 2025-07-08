<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ base }}/public/css/style.css">
</head>
<body>
    <header>
        <h1>{{ title }}</h1>
        <nav>
            <ul>
                <li><a href="{{ base }}/home">Accueil</a></li>
                <li><a href="{{ base }}/car">Voitures</a></li>
                <li><a href="{{ base }}/customer">Clients</a></li>
                <li><a href="{{ base }}/employee">Employés</a></li>
                <li><a href="{{ base }}/rental">Locations</a></li>
                <li><a href="{{ base }}/user/journal">Journal de bord</a></li>
            

                {% if session.username is defined %}
                    <li><a href="{{ base }}/logout">Déconnexion</a></li>
                    <li><a href="{{ base }}/user/envoyer-mail">Envoyer un Mail</a></li>

                {% else %}
                    <li><a href="{{ base }}/login">Connexion</a></li>
                {% endif %}
            </ul>

            {% if session.username is defined %}
                <span>Bonjour {{ session.username }}</span>
            {% endif %}
        </nav>
    </header>

    <main>
