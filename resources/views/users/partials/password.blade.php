
<div class="input-group mb-3 mt-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Senha:</span>
    </div>
    <input type="password" class="form-control" id="password" minlength="8" name="password" placeholder="Senha"
    {{ isset($user) ? '' : 'required' }}>
</div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Confirmar Senha:</span>
    </div>
    <input type="password" class="form-control" id="confirm_password" minlength="8" name="confirm_password" placeholder="Confirme Senha"
    {{ isset($user) ? '' : 'required' }}>
</div>


