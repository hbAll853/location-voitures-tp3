{{ include('layouts/header.php', {title: 'Error'}) }}

<div class="container">
    <h2>Error</h2>
    <strong class="error">{{ message }}</strong>
    
    <div class="error-actions">
        <a href="{{ base }}/" class="btn">Retour à l'accueil</a>
    </div>
</div>

{{ include('layouts/footer.php') }}