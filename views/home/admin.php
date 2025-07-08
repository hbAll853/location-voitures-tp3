<!-- views/home/admin.php -->
<?php include __DIR__ . '/../partials/header.php'; ?>

<main class="container">
  <h1>Tableau de bord administrateur</h1>
  <p>Bienvenue, <?php echo $_SESSION['username']; ?> !</p>

  <ul>
    <li>Total des voitures : ...</li>
    <li>Total des clients : ...</li>
    <li>Total des employés : ...</li>
    <li>Total des locations : ...</li>
  </ul>
</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
