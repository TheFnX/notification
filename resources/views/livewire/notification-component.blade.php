<x-jet-dropdown id="teamManagementDropdown">
     <x-slot name="trigger">
         Notificaciones       
            {{-- <i class="fa fa-envelope"></i> --}}
            {{-- <span class="badge rounded-pill badge-notification bg-danger">1</span> --}}
            @if ($count)
                <span wire:click="markAsRead" class="badge rounded-pill bg-danger ms-2 ml-1" style="color: aliceblue">{{$count}}</span>                
            @endif
          
     </x-slot>
    
     <x-slot name="content">
         <!-- Team Management -->
         <div class="dropdown-header">
             {{ __('Manage Team') }}
         </div>
         
            @foreach ($notifications as $notification)
                <x-jet-dropdown-link href="{{$notification->data['url']}}" >
                    {{$notification->data['message']}}
                    <br>
                    <span class="text-xs font-weight-bold">{{$notification->created_at->diffForHumans()}}</span>
                </x-jet-dropdown-link>
                <hr>
            @endforeach    
     </x-slot>
</x-jet-dropdown>
