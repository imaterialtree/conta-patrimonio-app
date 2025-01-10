<div class="mb-3">
    <label for="{{ $attributes['id'] }}" class="form-label">{{ $slot }}</label>
    <input {{ $attributes->class(['form-control', 'is-invalid' => $errors->has($name)]) }} name="{{ $name }}">
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
