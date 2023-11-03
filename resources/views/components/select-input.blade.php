@props(['disabled' => false])
@props(['value'])
@props(['options' => []])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    @if ($options)
        @foreach ($options as $option)
            <option value="{{ $option }} @if ($option === $value) selected @endif">{{ $option }}</option>
        @endforeach
    @else
        {{ $slot }}
    @endif    
</select>

