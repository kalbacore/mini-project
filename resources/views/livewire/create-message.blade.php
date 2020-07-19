<div>
    <div class="mx-4 card bg-gray-100 max-w-md p-10 md:rounded-lg my-8 mx-auto">
        <form wire:submit.prevent="send">
            <div class="title">
                <h1 class="font-bold text-center">Create a message for the user</h1>
            </div>
            <div class="form mt-4">
                <div class="flex flex-col text-sm">
                    <label for="title" class="font-bold mb-2">Title</label>
                    <input wire:model.lazy="title" class=" appearance-none border border-gray-200 p-2 focus:outline-none focus:border-gray-500" type="text">
                </div>
                @error('title')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <div class="text-sm flex flex-col">
                    <label for="body" class="font-bold mt-4 mb-2">Body</label>
                    <textarea wire:model.lazy="body" class=" appearance-none w-full border border-gray-200 p-2 h-40 focus:outline-none focus:border-gray-500"></textarea>
                </div>
                @error('body')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="submit">
                <button type="submit" class=" w-full bg-blue-600 shadow-lg text-white px-4 py-2 hover:bg-blue-700 mt-8 text-center font-semibold focus:outline-none ">Send</button>
            </div>
        </form>
    </div>
</div>
