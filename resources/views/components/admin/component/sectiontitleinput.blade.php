@props(['value', 'placeholder', 'name', 'submit'])
<div class="flex flex-row w-full border border-transparent focus-within:border-byolink-3 focus-within:ring-1 focus-within:ring-black rounded-md">
    <input type="text" id="{{$name}}" name="{{$name}}" placeholder="{{$placeholder}}" value="{{$value}}" class="flex-grow text-sm sm:text-base rounded-l-md border border-r-0 border-byolink-1 focus:ring-0 focus:border-none bg-neutral-100">
    <button class=" text-sm sm:text-base py-2 px-3 border border-byolink-2 border-l-0 bg-byolink-2 text-white rounded-r-md hover:bg-black hover:border-black duration-300">{{$submit ?? 'Ganti' }}</button>
</div>