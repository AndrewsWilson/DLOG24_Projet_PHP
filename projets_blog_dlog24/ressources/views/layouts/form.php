<h1 class="text-center mb-5"><?=$formTitle?></h1>
<div class="container">
    <form action="<?=$action?>" method="post" class=" mb-5 p-5 w-100 border" >
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">TITRE</span>
            <input type="text" name="title" class="form-control border focus-ring border" value="<?=$post['title'] ?? ''?>">
        </div>

        <div >
            <div class="input-group mb-3  justify-content-center" >
                <span class="input-group-text">Nom</span>
                <input type="text" name="name" class="border focus-ring"  value="<?=$post['name']?? ''?>">
                <span class="input-group-text">Pseudo</span>
                <input type="text" name="pseudo" class="border focus-ring"  value="<?=$post['pseudo']?? ''?>">
                <span class="input-group-text">Prénom</span>
                <input type="text" name="firstname" class="border focus-ring" value="<?=$post['firstname']?? ''?>">
            </div>
        </div>

        <div>
            <div class="input-group mb-3  justify-content-center" >
                <span class="input-group-text">Date de publication</span>
                <input type="text" name="start_date" class="border focus-ring" value="<?=$post['start_date']?? ''?>">
                <span class="input-group-text">Date de retrait</span>
                <input type="text" name="end_date" class="border focus-ring" value="<?=$post['end_date']?? ''?>">
            </div>
            <div>
                <select name="degree" id="pet-select" class="border focus-ring form-select form-select-md mb-3" >
                    <option value="<?=$post['degree']?? ''?>">--Modifier l'importance--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

        </div>

        <div class="form-floating mb-3">
            <textarea id="floatingTextarea2"  name="text"  placeholder="ecrire votre article ici" class="form-control" style="height: 200px"><?=$post['text']?? ''?></textarea>
            <label for="floatingTextarea2">Article</label>
        </div>
        <div class="d-flex justify-content-center">
            <?php
            if ($formTitle === "Poster un article"){
                ?>
                <input type="submit" name="envoyer" value="Envoyer" class="btn btn-primary btn-lg">
                <?php
            } else{
                ?>
                <input type="submit" name="modifier" value="modifier" class="btn btn-success btn-lg">
                <input type="submit" name="delete" value="suprimmer" class="ms-5 btn btn-danger btn-lg">
                <?php
            }
            ?>

        </div>
    </form>
</div>
