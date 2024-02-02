<nav class="navbar navbar-expand-lg" style="background-color: #4bc4ea;">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="index.php" style="color : white;">PEE</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav nav-underline">
        <li class="nav-item">
          <a class="nav-link <?php if(isset($activeAliments)) echo $activeAliments ?>" href="aliments.php" style="color : white;">Aliments</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($activeCosmetiques)) echo $activeCosmetiques ?>" href="#" style="color : white;">Cosmétiques et produits d'hygiène</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($activeMenagers)) echo $activeMenagers ?>" href="#" style="color : white;">Produits ménagers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($activePoeles)) echo $activePoeles ?>" href="#" style="color : white;">Poêles antiadhésives</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($activeVetements)) echo $activeVetements ?>" href="#" style="color : white;">Vêtements de sports</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($activeBalcon)) echo $activeBalcon ?>" href="#" style="color : white;">Mon balcon / mon jardin</a>
        </li>
      </ul>
    </div>
  </div>
</nav>