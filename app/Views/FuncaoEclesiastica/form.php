<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0"></h5>
    </div>
    <div class="card-body">
        <div class="row">




            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="nome">Nome*</label>
                <input class="form-control " id="nome" name="nome" maxlength="100" value="<?php echo (isset($entidade)) ? $entidade["nome"] : ""; ?>" type="text" placeholder="" required="required">
            </div>         



        </div>
    </div>
</div>