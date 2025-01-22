@props(['name'])

@error($name)
    <small class="font-xs font-medium text-red-500">{{ $message }}</small>
@enderror
