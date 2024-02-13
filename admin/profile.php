<?php include('includes/admin_header.php'); ?>
<?php include('includes/admin_sidenav.php'); ?>

        

<!-- Main content -->
<main class="admin__main">
    <h2 class="mb-2">Kalendar</h2>
    <div class="dashboard__item dashboard__item--full">
        <div class="">
        <form action="" class="form">
            <div class="row gap-1">
                <div class="form__group col-3-md col-6-xs">
                    <label class="form__label">Ime</label>
                    <input class="form__input" type="text" class="form__input" placeholder="Naslov">
                </div>
                
                <div class="form__group col-3-md col-6-xs">
                    <label class="form__label">Prezime</label>
                    <input class="form__input" type="text" class="form__input" placeholder="Podnaslov">
                </div>
                <div class="form__group col-3-md col-6-xs">
                    <label class="form__label">Korisnicko ime</label>
                    <input class="form__input" type="text" class="form__input" placeholder="Tags">
                </div>
                <div class="form__group col-3-md col-6-xs">
                    <label class="form__label">Email</label>
                    <input class="form__input" type="text" class="form__input" placeholder="Tags">
                </div>
            </div>
            <div class="form__group">
                <lable class="form__label">Fotografija</lable>
                <input name="post_image" type="file" class="form__input" placeholder="Foto...">
            </div>
            <div class="row gap-1">
                <div class="form__group col-6-md col-6-xs">
                    <label for="" class="form__label">Role</label>
                    <select name="" id="" class="form__select">
                        <option value="1" class="form__option">Admin</option>
                        <option value="1" class="form__option">Video</option>
                        <option value="1" class="form__option">Foto + Video</option>
                    </select>
                </div>
                <div class="form__group col-6-md col-6-xs">
                    <label for="" class="form__label">Status</label>
                    <select name="" id="" class="form__select">
                        <option value="1" class="form__option">Aktivan</option>
                        <option value="1" class="form__option">Video</option>
                        <option value="1" class="form__option">Foto + Video</option>
                    </select>
                </div>
            </div>
            <div class="row gap-1 ">
                <div class="form__group col-6-md col-6-xs">
                <label for="" class="form__label">Lozinka</label>
                <input name="post_image" type="password" class="form__input">
                </div>
            </div>
            <div class="row gap-1 ">
                <div class="form__group">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</main>



<?php include('includes/admin_footer.php'); ?>
        