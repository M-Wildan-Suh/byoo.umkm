@props(['title', 'name', 'value', 'defaultvalue', 'xModel'=> null])
<div class="w-full">
    <div class="flex flex-col gap-2 text-sm sm:text-base font-medium">
        <label for="{{$name}}" class=" font-semibold">{{$title}}</label>
        <div class="grid grid-cols-2 gap-3">
            @foreach ($value as $item)
                <div class="flex flex-row gap-2 items-center">
                    <input 
                        type="radio" 
                        class="text-[#ff7100] ring-0 focus:ring-[#ff7100] checked:ring-[#ff7100]" 
                        name="{{$name}}" 
                        id="{{$name}}" 
                        @if ($xModel)
                            {{ $xModel ? 'x-model='.$xModel : '' }} 
                            x-bind:value="{{ $xModel ? '' : $defaultvalue }}" 
                        @endif
                        value="{{$item['value']}}" 
                        @if ($item['value'] == $defaultvalue || $loop->first && !$defaultvalue) checked @endif
                    >
                    <label for="{{$name}}">{{$item['label']}}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
