<td colspan="5">
    <form action="" wire:submit.prevent="save">
        <div class="field">
            <label for="name" class="block">Name</label>
            <div class="control">
                <input type="text" for="name" wire:model="page.name" class="focus:ring-pink-500 focus:border-pink-500 block w-full pl-9 sm:text-sm border-gray-300 rounded-md">
            </div>
            @error('page.name')
                <span class="help is-danger"></span>
            @enderror
            <div >
                <button type="submit" class=" focus:ring-blue-500 bg-purple-400 block w-1/6 mt-2 p-2 sm:text-sm border-gray-300 rounded-md">Sauvegarder</button>
            </div>
        </div>
    </form>
</td>
