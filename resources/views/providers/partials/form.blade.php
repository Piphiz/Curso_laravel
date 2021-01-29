<div class="row mt-5">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nome do fornecedor</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Google" value="{{ $provider->name ?? ''}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="123.456@hotmail.com" value="{{ $provider->email ?? ''}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="(XX) XXXXX-XXXX" pattern="[0-9]{2} [0-9]{4-5}-[0-9]{4}" value="{{ $provider->phone ?? ''}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Status da empresa</label>
        <div class="col-md-3">
            <select class="form-select" id="active" name="active" required>
                <option {{ (isset($provider) && $provider->active) ? 'selected' : '' }} value="1">Ativa</option>
                <option {{ (isset($provider) && $provider->active != 1) ? 'selected' : '' }} value="0">Desativada</option>
            </select>
        </div>
    </div>
</div>

