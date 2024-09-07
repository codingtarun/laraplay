<div class="mb-3">
    <label for="inputEmail" class="form-label">{{Str::ucfirst($name)}}</label>
    <input type="email" class="form-control is-invalid" id="{{$name}}" aria-describedby="inputEmailHelp">
    <div class="invalid-feedback">
        Enter email ID
    </div>
</div>