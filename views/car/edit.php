{{ include('./layouts/header.php', {title: 'Modifier la voiture'}) }}
<h1>Modifier la voiture</h1>
<form action="{{ base }}/car/update" method="post">
    <input type="hidden" name="id" value="{{ car.id }}">
    <label>Marque: <input type="text" name="brand" value="{{ car.brand }}"></label><br>
    <label>Modèle: <input type="text" name="model" value="{{ car.model }}"></label><br>
    <label>Année: <input type="number" name="year" value="{{ car.year }}"></label><br>
    <label>Prix Journalier: <input type="number" step="0.01" name="daily_price" value="{{ car.daily_price }}"></label><br>
    <button type="submit">Modifier</button>
</form>
{{ include('./layouts/footer.php') }}
