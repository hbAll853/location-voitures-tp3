{{ include('layouts/header.php', {title: 'Liste des clients'}) }}
<h1>Liste des clients</h1>
<a href="{{ base }}/customer/create">Ajouter un client</a>
<table>
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {% for customer in customers %}
        <tr>
            <td>{{ customer.first_name }}</td>
            <td>{{ customer.last_name }}</td>
            <td>{{ customer.email }}</td>
            <td>{{ customer.phone }}</td>
            <td>
                <a href="{{ base }}/customer/edit?id={{ customer.id }}">Modifier</a>
                <form action="{{ base }}/customer/delete" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="{{ customer.id }}">
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        {% endfor %}
    </tbody>
</table>
{{ include('layouts/footer.php') }}
