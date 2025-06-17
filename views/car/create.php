{{ include('./layouts/header.php', {title: 'Ajouter une voiture'}) }}
<h1>Ajouter une voiture</h1>
{% if errors %}
    <ul>
    {% for error in errors %}
        <li>{{ error }}</li>
    {% endfor %}
    </ul>
{% endif %}
<form action="{{ base }}/car/store" method="post">
    <label>Marque: <input type="text" name="brand" value="{{ car.brand|default('') }}"></label><br>
    <label>Modèle: <input type="text" name="model" value="{{ car.model|default('') }}"></label><br>
    <label>Année: <input type="number" name="year" value="{{ car.year|default('') }}"></label><br>
    <label>Prix Journalier: <input type="number" step="0.01" name="daily_price" value="{{ car.daily_price|default('') }}"></label><br>
    <button type="submit">Enregistrer</button>
</form>
{{ include('./layouts/footer.php') }}
