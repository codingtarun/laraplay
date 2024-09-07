<div class="mb-3">
    <label for="{{$name}}" class="form-label">{{Str::ucfirst($name)}}</label>
    <input type="text" class="form-control is-invalid" id="{{$name}}" name="{{$name}}">
    <div class="invalid-feedback">
        Enter name
    </div>
</div>