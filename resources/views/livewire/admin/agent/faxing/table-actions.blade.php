<div class="flex space-x-1 justify-around">
    <button wire:click="showByMe({{ $id }})" class="p-1 text-green-600 hover:bg-green-600 hover:text-white rounded">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
    </button>
    
    @if(!$status)
        <button wire:click="CheckASDone({{ $id }})" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
            <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 456.556 456.556" style="enable-background:new 0 0 456.556 456.556;" xml:space="preserve">
                <g>
                    <path d="M228.278,456.556C102.403,456.556,0,354.153,0,228.278S102.403,0,228.278,0c42.641,0,84.233,11.834,120.287,34.228   c6.301,3.91,8.232,12.19,4.322,18.492c-3.917,6.301-12.197,8.246-18.492,4.322c-31.794-19.751-68.49-30.185-106.117-30.185   c-111.065,0-201.422,90.36-201.422,201.422S117.213,429.7,228.278,429.7c111.062,0,201.422-90.36,201.422-201.422   c0-22.324-3.623-44.243-10.77-65.147c-2.399-7.015,1.35-14.652,8.365-17.051c7.029-2.385,14.652,1.35,17.051,8.365   c8.099,23.709,12.211,48.551,12.211,73.834C456.556,354.153,354.153,456.556,228.278,456.556z"/>
                    <path d="M228.278,305.727c-3.406,0-6.7-1.294-9.193-3.644L111.66,201.17c-5.406-5.077-5.672-13.575-0.594-18.981   c5.078-5.399,13.575-5.679,18.981-0.587l97.092,91.206L403.564,63.371c4.77-5.672,13.246-6.399,18.918-1.616   c5.672,4.777,6.399,13.246,1.616,18.918L238.545,300.951c-2.371,2.818-5.805,4.539-9.484,4.756   C228.803,305.72,228.537,305.727,228.278,305.727z"/>
                </g>
            </svg>
        </button>
        <a href="{{ route('agent.faxing.edit', [$id]) }}" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">
            <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 52.001 52.001" style="enable-background:new 0 0 52.001 52.001;" xml:space="preserve">
                <path d="M47.743,41.758L33.955,26.001l13.788-15.758c2.343-2.344,2.343-6.143,0-8.486    c-2.345-2.343-6.144-2.342-8.486,0.001L26,16.91L12.743,1.758C10.4-0.584,6.602-0.585,4.257,1.757    c-2.343,2.344-2.343,6.143,0,8.486l13.788,15.758L4.257,41.758c-2.343,2.343-2.343,6.142-0.001,8.485    c2.344,2.344,6.143,2.344,8.487,0L26,35.091l13.257,15.152c2.345,2.344,6.144,2.344,8.487,0    C50.086,47.9,50.086,44.101,47.743,41.758z"/>
            </svg>
        </a>
    @endif
</div>
