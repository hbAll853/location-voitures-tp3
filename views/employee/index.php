{{ include('layouts/header.php', {title: 'Liste des employés'}) }}
<h1>Liste des employés</h1>
<a href="{{ base }}/employee/create">Ajouter un employé</a>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {% for employee in employees %}
        <tr>
            <td>{{ employee.name }}</td>
            <td>{{ employee.email }}</td>
            <td>{{ employee.role }}</td>
            <td>
                <a href="{{ base }}/employee/edit?id={{ employee.id }}">Modifier</a>
                <form action="{{ base }}/employee/delete" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="{{ employee.id }}">
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        {% endfor %}
    </tbody>
</table>
{{ include('layouts/footer.php') }}
