{{ include('layouts/header.php', {title: 'Liste des locations'}) }}
<h1>Liste des locations</h1>
<a href="{{ base }}/rental/create">Ajouter une location</a>
<table>
    <thead>
        <tr>
            <th>ID Voiture</th>
            <th>ID Client</th>
            <th>ID Employé</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Prix total</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {% for rental in rentals %}
        <tr>
            <td>{{ rental.car_id }}</td>
            <td>{{ rental.customer_id }}</td>
            <td>{{ rental.employee_id }}</td>
            <td>{{ rental.start_date }}</td>
            <td>{{ rental.end_date }}</td>
            <td>{{ rental.total_price }}</td>
            <td>
                <a href="{{ base }}/rental/edit?id={{ rental.id }}">Modifier</a>
                <form action="{{ base }}/rental/delete" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="{{ rental.id }}">
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        {% endfor %}
    </tbody>
</table>
{{ include('layouts/footer.php') }}
