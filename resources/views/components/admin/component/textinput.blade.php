@props(['title', 'placeholder', 'name', 'value', 'xModel' => null])

<div class="w-full">
    <div class="flex flex-col gap-2 text-sm sm:text-base font-medium">
        <label for="{{ $name }}">{{ $title }}</label>
        <input 
            type="text" 
            id="{{ $name }}" 
            name="{{ $name }}" 
            placeholder="{{ $placeholder }}" 
            @if ($xModel)
                {{ $xModel ? 'x-model='.$xModel : '' }} 
                x-bind:value="{{ $xModel ? '' : $value }}" 
            @endif
            value="{{ $value }}" 
            class="text-sm sm:text-base font-normal rounded-md border border-byolink-1 focus:ring-byolink-3 focus:border-byolink-3 bg-neutral-100">
    </div>
</div>
