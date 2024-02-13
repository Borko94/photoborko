<h3 class="mb-2">Dodaj novi blog post</h3>
<form action="" class="form">
    <div class="row gap-1">
        <div class="form__group col-4-md col-12-xs">
            <label class="form__label">Naslov</label>
            <input class="form__input" type="text" class="form__input" placeholder="Naslov">
        </div>
        
        <div class="form__group col-4-md col-12-xs">
            <label class="form__label">Podnaslov</label>
            <input class="form__input" type="text" class="form__input" placeholder="Podnaslov">
        </div>
        <div class="form__group col-4-md col-12-xs">
            <label class="form__label">Tags</label>
            <input class="form__input" type="text" class="form__input" placeholder="Tags">
        </div>
    </div>
    <div class="form__group">
        <lable class="form__label">Post Fotografija</lable>
        <input name="post_image" type="file" class="form__input" placeholder="Foto...">
    </div>
    <div class="row gap-1">
        <div class="form__group col-6-md col-12-xs">
            <label for="" class="form__label">Kategorija</label>
            <select name="" id="" class="form__select">
                <option value="1" class="form__option">Wedding</option>
                <option value="1" class="form__option">Dva</option>
                <option value="1" class="form__option">Treasesd</option>
            </select>
        </div>
        <div class="form__group col-6-md col-12-xs">
            <label for="" class="form__label">Status</label>
            <select name="" id="" class="form__select">
                <option value="1" class="form__option">Wedding</option>
                <option value="1" class="form__option">Dva</option>
                <option value="1" class="form__option">Treasesd</option>
            </select>
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group col-12-xs">
        <label for="" class="form__label">Sadržaj</label>
        <textarea name="" id="" cols="30" rows="10" class="form__textarea" placeholder="Sadržaj"></textarea>
        </div>
    </div>
    <div class="row gap-1 ">
        <div class="form__group">
            <button class="btn btn-success" type="submit">Submit</button>
        </div>
    </div>
</form>