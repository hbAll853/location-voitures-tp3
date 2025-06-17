{{ include('layouts/header.php', {title: 'Ajouter un employé'}) }}
<h1>Ajouter un employé</h1>
{% if errors %}
    <ul>
    {% for error in errors %}
        <li>{{ error }}</li>
    {% endfor %}
    </ul>
{% endif %}
<form action="{{ base }}/employee/store" method="post">
    <label>Nom: <input type="text" name="name" value="{{ employee.name|default('') }}"></label><br>
    <label>Email: <input type="email" name="email" value="{{ employee.email|default('') }}"></label><br>
    <label>Rôle: <input type="text" name="role" value="{{ employee.role|default('') }}"></label><br>
    <button type="submit">Enregistrer</button>
</form>
{{ include('layouts/footer.php') }}
