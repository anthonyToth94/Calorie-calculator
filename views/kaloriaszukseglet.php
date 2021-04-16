<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalória kalkulátor</title>

    <!-- Bootstrap CMS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
   <div class="card w-25 m-auto p-3"> <!-- card style  width 25%  margin auto padding 3 -->
        <form action="/kaloriaszukseglet" method="GET">
            <label for="kg">Hany kg?</label>
            <input type="number" class="form-control mb-2" name="kg" id="kg" value="<?php echo $kg ?>">  <!-- margin bottom 2 -->
            <label for="szandek">Mi a szándéka?</label>
            <select name="szandek" class="form-control mb-2">      <!-- margin bottom 2 -->
                <?php foreach ($kaloriaszukseglet[3] as $nevek) { ?>
                    <option value="<?php  echo $nevek['neve'] ?>" <?php echo $szandek === $nevek['neve'] ? 'selected' : '' ?>>
                        <?php echo $nevek['leiras'] ?>
                    </option>
                    <? } ?>
            </select>

            <select name="testtipus" class="form-control mb-2">      <!-- margin bottom 2 -->
                <?php foreach ($kaloriaszukseglet[4] as $nevek) { ?>
                    <option value="<?php  echo $nevek['neve'] ?>" <?php echo $testTipus === $nevek['neve'] ? 'selected' : '' ?>>
                        <?php echo $nevek['leiras'] ?>
                    </option>
                    <? } ?>
            </select>
            <input type="submit" class="btn btn-dark form-control mb-3">
        </form>

        <h4> <?php echo 'Kalória szükséglet: '.$kaloria ?></h4> 

        <p class="bg-dark text-white p-2"> <?php echo 'Fehérje kcal: '.$feherjeKaloriaban ?> </p> 
        <p class="bg-dark text-white p-2"> <?php echo 'Szénhidrat kcal: '.$szenhidratKaloriaban ?> </p> 
        <p class="bg-dark text-white p-2"> <?php echo 'Zsír kcal: '.$zsirKaloriaban ?> </p>

        <p class="bg-secondary text-white p-2"> <?php echo 'Fehérje gramm: '.$gFehejre ?> </p> 
        <p class="bg-secondary text-white p-2"> <?php echo 'Szénhidrat gramm: '.$gSzenhidrat ?> </p> 
        <p class="bg-secondary text-white p-2"> <?php echo 'Zsír gramm: '.$gZsir ?> </p>
   </div>
</body>
</html>