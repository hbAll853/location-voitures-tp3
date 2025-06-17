{{ include('layouts/header.php', {title: 'Détails de l\'employé'}) }}

<h1>Détails de l'employé</h1>

<div class="card">
    <h2>{{ employee.name }}</h2>
    
    <div class="details">
        <p><strong>Nom:</strong> {{ employee.name }}</p>
        <p><strong>Email:</strong> {{ employee.email }}</p>
        <p><strong>Rôle:</strong> {{ employee.role }}</p>
        {% if employee.hire_date %}
        <p><strong>Date d'embauche:</strong> {{ employee.hire_date }}</p>
        {% endif %}
    </div>
    
    <div class="actions">
        <a href="{{ base }}/employee/edit?id={{ employee.id }}" class="btn btn-primary">Modifier</a>
        <form action="{{ base }}/employee/delete" method="post" style="display:inline;">
            <input type="hidden" name="id" value="{{ employee.id }}">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé?')">Supprimer</button>
        </form>
        <a href="{{ base }}/employee" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>

{{ include('layouts/footer.php') }}