<!-- views/home/client.php -->
<?php include __DIR__ . '/../partials/header.php'; ?>

<main class="container">
  <h1>Bienvenue sur votre espace client</h1>
  <p>Bonjour, <?php echo $_SESSION['username']; ?> !</p>
</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
