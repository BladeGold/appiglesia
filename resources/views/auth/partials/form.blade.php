<div class="input-group mb-3">
    <input id="name" required type="text" autocapitalize="sentences" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Nombres">
    <div class="input-group-append">
        <div class="input-group-text">
            <ion-icon name="person-sharp"></ion-icon>
        </div>
    </div>
    <div class="input-group">
        <span class=""> <strong class="name text-danger fs-6 fst-italic"> </strong> </span>
    </div>
    @error('name')
    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
    @enderror
</div>
<div class="input-group mb-3">
    <input id="last_name" required type="text" autocapitalize="sentences" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus placeholder="Apellidos">
    <div class="input-group-append">
        <div class="input-group-text">
            <ion-icon name="person-sharp"></ion-icon>
        </div>
    </div>
    <div class="input-group">
        <span class=""> <strong class="last_name text-danger fs-6 fst-italic"> </strong> </span>
    </div>
    @error('last_name')
    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
    @enderror
</div>
<div class="input-group mb-3">
    <input id="email" required type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Correo">
    <div class="input-group-append">
        <div class="input-group-text">
            <ion-icon name="mail-sharp"></ion-icon>
            
        </div>
    </div>
    <div class="input-group">
        <span class=""> <strong class="email text-danger fs-6 fst-italic"> </strong> </span>
    </div>
    @error('email')
    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
    @enderror
</div>
<div class="input-group mb-3">
    <input id="password"  required type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Contraseña">
    <div class="input-group-append">
        <div class="input-group-text">
            <ion-icon name="lock-closed-sharp"></ion-icon>
        </div>
    </div>
    <div class="input-group">
        <span class=""> <strong class="password text-danger fs-6 fst-italic"> </strong> </span>
    </div>
    @error('password')
    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
    @enderror
</div>
<div class="input-group mb-3">
    <input id="password-confirm" required type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Repetir Contraseña">
    <div class="input-group-append">
        <div class="input-group-text">
            <ion-icon name="lock-closed-sharp"></ion-icon>
        </div>
    </div>
</div>
<input type="hidden" name="rol" value="Usuario">