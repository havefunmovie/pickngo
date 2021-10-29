<div class="flex space-x-1 justify-around">
    <button wire:click="showByMe({{ $id }})" class="p-1 text-green-600 hover:bg-green-600 hover:text-white rounded">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 12a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
    </button>

    <button wire:click="followUp({{ $id }})" class="p-1 text-green-600 hover:bg-green-600 hover:text-white rounded">
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

    <button wire:click="reship({{ $id }})" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
        <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M20.944 12.979c-.489 4.509-4.306 8.021-8.944 8.021-2.698 0-5.112-1.194-6.763-3.075l1.245-1.633c1.283 1.645 3.276 2.708 5.518 2.708 3.526 0 6.444-2.624 6.923-6.021h-2.923l4-5.25 4 5.25h-3.056zm-15.864-1.979c.487-3.387 3.4-6 6.92-6 2.237 0 4.228 1.059 5.51 2.698l1.244-1.632c-1.65-1.876-4.061-3.066-6.754-3.066-4.632 0-8.443 3.501-8.941 8h-3.059l4 5.25 4-5.25h-2.92z" clip-rule="evenodd"/></svg>
    </button>

{{--    <button wire:click="deleteByMe({{ $id }})" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">--}}
{{--        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>--}}
{{--    </button>--}}
</div>
