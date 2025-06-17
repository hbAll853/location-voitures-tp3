{{ include('layouts/header.php', {title: 'Modifier le client'}) }}
<h1>Modifier le client</h1>
<form action="{{ base }}/customer/update" method="post">
    <input type="hidden" name="id" value="{{ customer.id }}">
    <label>Prénom: <input type="text" name="first_name" value="{{ customer.first_name }}"></label><br>
    <label>Nom: <input type="text" name="last_name" value="{{ customer.last_name }}"></label><br>
    <label>Email: <input type="email" name="email" value="{{ customer.email }}"></label><br>
    <label>Téléphone: <input type="text" name="phone" value="{{ customer.phone }}"></label><br>
    <button type="submit">Modifier</button>
</form>
{{ include('layouts/footer.php') }}
