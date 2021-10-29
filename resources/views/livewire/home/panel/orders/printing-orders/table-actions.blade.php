<div class="flex space-x-1 justify-around">
    <button wire:click="printing_detail({{ $id }})" class="p-1 text-green-600 hover:bg-green-600 hover:text-white rounded">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
    </button>

    <button wire:click="reship({{ $id }})" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
        <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M20.944 12.979c-.489 4.509-4.306 8.021-8.944 8.021-2.698 0-5.112-1.194-6.763-3.075l1.245-1.633c1.283 1.645 3.276 2.708 5.518 2.708 3.526 0 6.444-2.624 6.923-6.021h-2.923l4-5.25 4 5.25h-3.056zm-15.864-1.979c.487-3.387 3.4-6 6.92-6 2.237 0 4.228 1.059 5.51 2.698l1.244-1.632c-1.65-1.876-4.061-3.066-6.754-3.066-4.632 0-8.443 3.501-8.941 8h-3.059l4 5.25 4-5.25h-2.92z" clip-rule="evenodd"/></svg>
    </button>
{{-- 
    <button wire:click="followUp({{ $id }})" class="p-1 text-pink-600 hover:bg-pink-600 hover:text-white rounded">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5" fill="currentColor" viewBox="0 0 512 512">
                    <path fill-rule="evenodd"  d="M325.478,433H79c-27.019,0-49-21.981-49-49c0-27.019,21.981-49,49-49h96c43.561,0,79-35.439,79-79
                        c0-43.561-35.439-79-79-79h-52.478c0.963,4.854,1.478,9.867,1.478,15s-0.515,10.146-1.478,15H175c27.019,0,49,21.981,49,49
                        s-21.981,49-49,49H79c-43.561,0-79,35.439-79,79c0,43.561,35.439,79,79,79h246.478c-0.963-4.854-1.478-9.867-1.478-15
                        S324.515,437.854,325.478,433z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd"  d="M401,401c-25.916,0-47,21.084-47,47s21.084,47,47,47s47-21.084,47-47S426.916,401,401,401z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd"  d="M143,17H47c-8.284,0-15,6.716-15,15c0,12.389,0,102.939,0,115.469C13.42,153.745,0,171.329,0,192
                c0,25.916,21.084,47,47,47s47-21.084,47-47c0-20.671-13.42-38.255-32-44.531V111h81c8.284,0,15-6.716,15-15V32
                C158,23.716,151.284,17,143,17z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd"  d="M401,49c-61.206,0-111,49.794-111,111c0,33.051,14.399,63.844,39.626,85.015l58.01,113.797
                c5.556,10.899,21.173,10.898,26.728,0l58.01-113.797C497.601,223.844,512,193.051,512,160C512,98.794,462.206,49,401,49z M401,207
                c-25.916,0-47-21.084-47-47s21.084-47,47-47s47,21.084,47,47S426.916,207,401,207z" clip-rule="evenodd"/>
            </svg>
    </button>

    <button wire:click="printing({{ $id }})" class="p-1 text-gray-600 hover:bg-gray-600 hover:text-white rounded">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 482.5 482.5" style="enable-background:new 0 0 482.5 482.5;" xml:space="preserve" class="w-5 h-5" fill="currentColor" viewBox="0 0 512 512">
            <g>
                <g>
                    <path d="M399.25,98.9h-12.4V71.3c0-39.3-32-71.3-71.3-71.3h-149.7c-39.3,0-71.3,32-71.3,71.3v27.6h-11.3    c-39.3,0-71.3,32-71.3,71.3v115c0,39.3,32,71.3,71.3,71.3h11.2v90.4c0,19.6,16,35.6,35.6,35.6h221.1c19.6,0,35.6-16,35.6-35.6    v-90.4h12.5c39.3,0,71.3-32,71.3-71.3v-115C470.55,130.9,438.55,98.9,399.25,98.9z M121.45,71.3c0-24.4,19.9-44.3,44.3-44.3h149.6    c24.4,0,44.3,19.9,44.3,44.3v27.6h-238.2V71.3z M359.75,447.1c0,4.7-3.9,8.6-8.6,8.6h-221.1c-4.7,0-8.6-3.9-8.6-8.6V298h238.3    V447.1z M443.55,285.3c0,24.4-19.9,44.3-44.3,44.3h-12.4V298h17.8c7.5,0,13.5-6,13.5-13.5s-6-13.5-13.5-13.5h-330    c-7.5,0-13.5,6-13.5,13.5s6,13.5,13.5,13.5h19.9v31.6h-11.3c-24.4,0-44.3-19.9-44.3-44.3v-115c0-24.4,19.9-44.3,44.3-44.3h316    c24.4,0,44.3,19.9,44.3,44.3V285.3z"/>
                    <path d="M154.15,364.4h171.9c7.5,0,13.5-6,13.5-13.5s-6-13.5-13.5-13.5h-171.9c-7.5,0-13.5,6-13.5,13.5S146.75,364.4,154.15,364.4    z"/>
                    <path d="M327.15,392.6h-172c-7.5,0-13.5,6-13.5,13.5s6,13.5,13.5,13.5h171.9c7.5,0,13.5-6,13.5-13.5S334.55,392.6,327.15,392.6z"/>
                    <path d="M398.95,151.9h-27.4c-7.5,0-13.5,6-13.5,13.5s6,13.5,13.5,13.5h27.4c7.5,0,13.5-6,13.5-13.5S406.45,151.9,398.95,151.9z"/>
                </g>
            </svg>
    </button> --}}
</div>