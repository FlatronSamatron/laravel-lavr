@props([
        'label',
        'name',
        'defaultValue' => '',
        'type' => 'text'
])

<div>
    <label>
        {{ $label }}
        <input type="text" name={{$name}} value={{$errors->any() ? old($name) : $defaultValue}}>
    </label>
    @error('title')
        <div style="color:red">{{ $message }}</div>
    @enderror
</div>