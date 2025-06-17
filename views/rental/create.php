{{ include('layouts/header.php', {title: 'Ajouter une location'}) }}
<h1>Ajouter une location</h1>
{% if errors %}
    <ul>
    {% for error in errors %}
        <li>{{ error }}</li>
    {% endfor %}
    </ul>
{% endif %}
<form action="{{ base }}/rental/store" method="post">
    <label>ID Voiture: <input type="number" name="car_id" value="{{ rental.car_id|default('') }}"></label><br>
    <label>ID Client: <input type="number" name="customer_id" value="{{ rental.customer_id|default('') }}"></label><br>
    <label>ID Employé: <input type="number" name="employee_id" value="{{ rental.employee_id|default('') }}"></label><br>
    <label>Date début: <input type="date" name="start_date" value="{{ rental.start_date|default('') }}"></label><br>
    <label>Date fin: <input type="date" name="end_date" value="{{ rental.end_date|default('') }}"></label><br>
    <label>Prix total: <input type="number" step="0.01" name="total_price" value="{{ rental.total_price|default('') }}"></label><br>
    <button type="submit">Enregistrer</button>
</form>
{{ include('layouts/footer.php') }}
