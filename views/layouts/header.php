<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="<?= APP_BASE_URL ?>/resources/js/main.js"></script>
    <title>Vakantiehuisje</title>
</head>

<body style="margin-top: 5rem;">

<nav class="fixed-top navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= APP_BASE_URL ?>">Vakantiehuisjes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
      </li>
      <?php if (isset($_SESSION['user'])){ ?>
            <a href="<?= APP_BASE_URL ?>/house/add" class="nav-item nav-link active">Vakantiehuisje toevoegen</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $_SESSION['user']['first_name']; ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?= APP_BASE_URL ?>/bookings/overview">Mijn boekingen</a>
                    <a class="dropdown-item" href="<?= APP_BASE_URL ?>/house/overview">Mijn vakantiehuisjes</a>
                    <a class="dropdown-item" href="<?= APP_BASE_URL ?>/account">Mijn account</a>
                    <a class="dropdown-item" href="<?= APP_BASE_URL ?>/logout">Uitloggen</a>
                    </div>
                </li>
        <?php if ($_SESSION['user']['role'] == 'admin'){?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin Panel
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?= APP_BASE_URL ?>/admin/reviews">Reviews af/goedkeuren</a>
            </div>
          </li>
         <?php 
        }
                
        } else { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=APP_BASE_URL?>/login">Inloggen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=APP_BASE_URL?>/register">Registreren</a>
        </li>
        <?php }?>
    </ul>
  </div>
</nav>

                
                
