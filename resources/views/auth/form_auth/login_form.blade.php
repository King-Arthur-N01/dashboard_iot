<form method="POST" action="{{ route('login') }}">
@csrf
    <div class="form-group mb-3">
        <label for="nik">NIK</label>
        <input name="nik" id="nik" placeholder="Masukkan NIK Anda" type="number" inputmode="numeric" pattern="[0-9]*" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input name="password" id="password" placeholder="Masukkan Password" type="password" class="form-control">
    </div>
    <div class="position-relative form-check mb-2">
        <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
        <label for="exampleCheck" class="form-check-label">Keep me logged in</label>
    </div>
    <div class="divider row"></div>
    <div class="d-flex align-items-center justify-content-between">
        <a href="javascript:void(0);" class="btn btn-link p-0">Recover Password</a>
        <button type="submit" class="btn btn-primary btn-lg">Login to Dashboard</button>
    </div>
</form>

