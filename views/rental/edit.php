{{ include('layouts/header.php', {title: 'Modifier la location'}) }}
<h1>Modifier la location</h1>
<form action="{{ base }}/rental/update" method="post">
    <input type="hidden" name="id" value="{{ rental.id }}">
    <label>ID Voiture: <input type="number" name="car_id" value="{{ rental.car_id }}"></label><br>
    <label>ID Client: <input type="number" name="customer_id" value="{{ rental.customer_id }}"></label><br>
    <label>ID Employé: <input type="number" name="employee_id" value="{{ rental.employee_id }}"></label><br>
    <label>Date début: <input type="date" name="start_date" value="{{ rental.start_date }}"></label><br>
    <label>Date fin: <input type="date" name="end_date" value="{{ rental.end_date }}"></label><br>
    <label>Prix total: <input type="number" step="0.01" name="total_price" value="{{ rental.total_price }}"></label><br>
    <button type="submit">Modifier</button>
</form>
{{ include('layouts/footer.php') }}
