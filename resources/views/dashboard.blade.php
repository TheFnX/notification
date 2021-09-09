<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>   
    <div class="row justify-content-center px-4"> 
        <div class="card shadow-sm w-75 ">                 
            <div class="card-body">            
                <form action="{{route('messages.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <x-jet-label>
                            Asunto
                        </x-jet-label> 

                        <x-jet-input type="text" placeholder="Ingrese el asunto" name="subject" value="{{old('subject')}}" /> 

                        <x-jet-input-error for="subject"></x-jet-input-error> 
                        
                    </div>
                    <div class="mb-4">
                        <x-jet-label>
                            Mensaje
                        </x-jet-label> 
                        <textarea class="form-control" placeholder="Escriba su mensaje" name="body" rows="4">{{old('body')}}</textarea>                        
                        <x-jet-input-error for="body"></x-jet-input-error>                        
                    </div>
                    <div class="mb-4">
                        <x-jet-label>
                            Destinatario
                        </x-jet-label> 
                        <select name="to_user_id" class="form-control">
                            <option value="" {{old('to_user_id') ? '' : 'selected' }} disabled>Selecione un usuario</option>

                            @foreach ($users as $user)
                                <option {{old('to_user_id') == $user->id ? 'selected' : '' }} value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="to_user_id"></x-jet-input-error> 
                    </div>
                    <x-jet-button> 
                        Enviar
                    </x-jet-button> 
                </form>
            </div>  
        </div>    
    </div>    
    {{-- <div class="py-12"> 
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">                 
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">            
                Hola mundo
            </div>  
        </div>    
    </div>     --}}
</x-app-layout>