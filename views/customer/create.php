{{ include('layouts/header.php', {title: 'Ajouter un client'}) }}
<h1>Ajouter un client</h1>
{% if errors %}
    <ul>
    {% for error in errors %}
        <li>{{ error }}</li>
    {% endfor %}
    </ul>
{% endif %}
<form action="{{ base }}/customer/store" method="post">
    <label>Prénom: <input type="text" name="first_name" value="{{ customer.first_name|default('') }}"></label><br>
    <label>Nom: <input type="text" name="last_name" value="{{ customer.last_name|default('') }}"></label><br>
    <label>Email: <input type="email" name="email" value="{{ customer.email|default('') }}"></label><br>
    <label>Téléphone: <input type="text" name="phone" value="{{ customer.phone|default('') }}"></label><br>
    <button type="submit">Enregistrer</button>
</form>
{{ include('layouts/footer.php') }}
