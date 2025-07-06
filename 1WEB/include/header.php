<?php 
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<header class="content-nav">
  <div class="contrainer-header">
    <div class="button">
      <button class="nav-toggle" aria-label="menu de navigation">
        <i class="fa-solid fa-bars style-icon"></i>
      </button>
      <button class="darkmode-toggle" aria-label="Mode sombre">
        <i class="fa-solid fa-moon"></i>
      </button>
    </div>
    <div class="nav-menu">
      <nav class="nav-bar">
        <div class="list-all">
          <div class="nav-list">
            <a href="../index.php" class="nav-link<?php if($currentPage == 'index.php') echo ' active';?>">Accueil</a>
          </div>
          <div class="nav-list">
            <a href="/1WEB/pages/Adoption.php" class="nav-link<?php if($currentPage == 'Adoption.php') echo ' active';?>">Adoption</a>
          </div>
          <div class="nav-list">
            <a href="/1WEB/pages/lassociation.php" class="nav-link<?php if($currentPage == 'lassociation.php') echo ' active';?>">L'Association</a>
          </div>
        </div>
        <div class="search-container">
          <button class="search-toggle" aria-label="Rechercher">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
          <input type="text" class="search-bar" placeholder="Rechercher..." />
        </div>
      </nav>
    </div>
    <div class="nav-logo">
      <div class="logo-content">
        <h2>Lov<i class="fa-solid fa-paw"></i>DOG</h2>
      </div>
    </div>
    <div class="social-links">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-linkedin-in"></i></a>
    </div>
  </div>
</header>
