<div>
    <div class="mb-6 mt-4 ml-6">
        <div class="">
            <label for="search" class="text-gray-600">Recherchez une page : </label>
            <input type="text" name="search" placeholder="Entrez votre texte" wire:model.debounce.500ms="search" class="focus:ring-blue-500 focus:border-blue-500 pl-9 sm:text-sm border-gray-300 rounded-md">
        </div>
    </div>

    <table class="min-w-full">
        <thead>
            <x-table-header :direction="$orderDirection" name="name" :field="$orderField" class="table-cell">Nom de la page :</x-table-header>
            <x-table-header :direction="$orderDirection" name="status" :field="$orderField" class="">
                Statut :
            </x-table-header>
            <x-table-header :direction="$orderDirection" name="created_at" :field="$orderField" class="hidden md:table-cell">
                Date de publication :
            </x-table-header>
            <th
                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-700 uppercase tracking-wider">
                Action
            </th>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
            @foreach($websitepages as $websitepage)
                <tr>
                    <td
                        class=" md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-left">
                        {{ $websitepage->name }} 
                    </td>
                    <td
                        class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-left">
                        @if($websitepage->status == 0)<i class="material-icons">construction</i>@endif
                        @if($websitepage->status == 1)<i class="material-icons">save</i>@endif
                        @if($websitepage->status == 2)<i class="material-icons">schedule</i>@endif
                    </td>
                    <td
                        class="hidden md:table-cell  whitespace-nowrap text-sm text-gray-500 text-left">
                        @php if($websitepage->status == 1){
                                $disable = ["disabled" => "disabled"]; 
                                $date= $websitepage->created_at;
                            }elseif($websitepage->status == 0){
                                $disable = ["enabled" => "enabled"];
                                $date= null;
                            }elseif ($websitepage->status == 2) {
                                $disable = ["enabled" => "enabled"];
                                $date= date('Y-m-d', strtotime($websitepage->schedul));
                            }
                        @endphp
                        {!! Form::open(['route'=> ['websitepage.setDate',$websitepage->id], 'method'=>'PUT' ]) !!}
                        {{Form::date('date', $date, $disable)}}
                        <button type="submit"  
                            class=" order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-50 @if($websitepage->status == 1) bg-gray-400 @else bg-purple-400 hover:bg-purple-700 @endif  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 sm:order-1 sm:ml-3" 
                            @if($websitepage->status == 1) disabled style="pointer-events: none"@else  enabled @endif >
                            set
                        </button>
                        {!! Form::close() !!}
                    </td>
                    <td class="pr-6 ">
                        
                        <div class="relative flex justify-end items-center"
                        x-data=" { open: false }">
                            <button type="button"
                            @click="open = !open"
                                class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                id="project-options-menu-0" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open options</span>
                                <!-- Heroicon name: solid/dots-vertical -->
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                            </button>

                            <div 
                            x-show="open"
                            x-cloak
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                                class="mx-3 origin-top-right absolute right-7 top-0 w-48 mt-1 rounded-md shadow-lg z-10 bg-gray-50 ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 focus:outline-none"
                                role="menu" aria-orientation="vertical"
                                aria-labelledby="project-options-menu-0">
                                {{-- <div class="py-1" role="none">
                                    <span 
                                        wire:click="startEdit( {{$websitepage->id}} )"
                                        class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        Edit fast
                                    </span>
                                </div> --}}
                                <div class="py-1" role="none">
                                    <a href="{{ route('websitepage.edit',$websitepage->id)}}"
                                        class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem">
                                        <!-- Heroicon name: solid/pencil-alt -->
                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                            <path fill-rule="evenodd"
                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Edit
                                    </a>
                                
                                </div>
                                <div class="py-1" role="none">
                                    <a href="{{ route('websitepage.delete', $websitepage->id)}}"
                                        class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem">
                                        <!-- Heroicon name: solid/trash -->
                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                {{-- @if($editId == $websitepage->id)
                    <tr>
                        <livewire:page-form :page="$page" :key="$websitepage->id"/>
                    </tr>
                @endif --}}
            @endforeach
        </tbody>
    </table>
    {{$websitepages->links()}}
</div>
