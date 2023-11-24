@props(['disabled' => false])
@props(['value'])
@props(['options' => []])
@props(['selected' => []])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!} multiple>
    @if ($options)
        @foreach ($options as $option)
            <option value="{{ $option->id }}" @selected($selected->contains($option->id))>{{ $option->title }}</option>
        @endforeach
    @else
        {{ $slot }}
    @endif  
</select>
