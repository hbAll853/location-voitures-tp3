{{ include('layouts/header.php', {title: 'Modifier l\'employé'}) }}
<h1>Modifier l'employé</h1>
<form action="{{ base }}/employee/update" method="post">
    <input type="hidden" name="id" value="{{ employee.id }}">
    <label>Nom: <input type="text" name="name" value="{{ employee.name }}"></label><br>
    <label>Email: <input type="email" name="email" value="{{ employee.email }}"></label><br>
    <label>Rôle: <input type="text" name="role" value="{{ employee.role }}"></label><br>
    <button type="submit">Modifier</button>
</form>
{{ include('layouts/footer.php') }}
