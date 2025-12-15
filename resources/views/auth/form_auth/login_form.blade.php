<form method="POST" action="{{ route('login') }}">
@csrf
    <div class="form-row">
        <div class="col-md-6">
            <div class="position-relative form-group"><label for="exampleNik" class="">NIK</label><input name="nik" id="nik" placeholder="NIK" type="number" class="form-control"></div>
        </div>
        <div class="col-md-6">
            <div class="position-relative form-group"><label for="examplePassword" class="">Password</label><input name="password" id="password" placeholder="Password" type="password"class="form-control"></div>
        </div>
    </div>
    <div class="position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Keep me logged in</label></div>
    <div class="divider row"></div>
    <div class="d-flex align-items-center">
        <div class="ml-auto"><a href="javascript:void(0);" class="btn-lg btn btn-link">Recover Password</a>
            <button class="btn btn-primary btn-lg">Login to Dashboard</button>
        </div>
    </div>
</form>
