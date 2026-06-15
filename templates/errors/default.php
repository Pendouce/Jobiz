
  <?php require_once APP_ROOT . "/templates/header.php"; ?>

    <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto">
       <?php /** @var App\Controller\ErrorController $errorMessage */ ?>
        <h1 class="text-red-600 font-bold"><?=$errorMessage?></h1>
      </div>
    </section>

  <?php require_once APP_ROOT . "/templates/footer.php"; ?>