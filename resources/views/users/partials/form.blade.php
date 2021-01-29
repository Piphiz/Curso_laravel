<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Nome:</span>
    </div>
    <input type="text" class="form-control" id="name" name="name" minlength="3" placeholder="Antonio Jesus" value="{{ $user->name ?? ''}}" required>
</div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Email:</span>
    </div>
    <input type="email" class="form-control" id="email" name="email" placeholder="123.456@hotmail.com" value="{{ $user->email ?? ''}}" required>
</div>
