{{ include('layouts/header.php', {title: 'Login'})}}
<div class="container">
    {% if errors is defined %}
    <div class="error">
        <ul>
            {% for error in errors %}
                <li>{{ error }}</li>
            {% endfor %}
        </ul>
    </div>
    {% endif %}
    <form method="post">
        <h2>Login</h2>
        <label>Username
            <input type="text" name="username" value="{{ user.username }}">
        </label>
        <label>Password
            <input type="password" name="password">
        </label>
        <input type="submit" class="btn" value="Login">
    </form>
    <a href="{{ base }}/user/create">Vous n'avez pas de compte ? créer un compte</a>

</div>
{{ include('layouts/footer.php')}}