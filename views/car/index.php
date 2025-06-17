{{ include('./layouts/header.php', {title: 'Liste des voitures'}) }}
<h1>Liste des voitures</h1>
<a href="{{ base }}/car/create">Ajouter une voiture</a>
<table>
    <thead>
        <tr>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Année</th>
            <th>Prix Journalier</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {% for car in cars %}
        <tr>
            <td>{{ car.brand }}</td>
            <td>{{ car.model }}</td>
            <td>{{ car.year }}</td>
            <td>{{ car.daily_price }}</td>
            <td>
                <a href="{{ base }}/car/edit?id={{ car.id }}">Modifier</a>
                <form action="{{ base }}/car/delete" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="{{ car.id }}">
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        {% endfor %}
    </tbody>
</table>
{{ include('./layouts/footer.php') }}
