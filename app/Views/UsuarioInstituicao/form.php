<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Dados do Usuário</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <input type="hidden" name="usuarioId" value="<?php echo ($_GET["usuarioId"] != null) ? $_GET["usuarioId"] : $entidade["usuarioId"]; ?>">
       
            
            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="instituicaoId">Instituição</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="instituicaoId" id="instituicaoId" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($Instituicao as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["instituicaoId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                <label for="perfilId">Perfil</label>
                <select class="form-control select2" data-bs-toggle="select2" width="fit" name="perfilId" id="perfilId" required="required">
                    <option value="" disabled selected>Selecione</option>
                    <?php foreach ($Perfil as $item) : ?>
                        <option value="<?php echo $item["id"]; ?>" <?php echo (isset($entidade) and $item["id"] == $entidade["perfilId"]) ? 'selected="selected"' : ""; ?>><?php echo $item["nome"]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <div class="custom-control custom-switch">
                    <input class="custom-control-input" name="isCadastraUsuario" id="isCadastraUsuario" value="1" type="checkbox" <?php echo (isset($entidade) and '1' == $entidade["isCadastraUsuario"]) ? 'checked="checked"' : ""; ?>>
                    <label class="custom-control-label" for="isCadastraUsuario">Pode cadastrar novos usuários?</label>
                </div>
            </div>



        </div>
    </div>
</div>