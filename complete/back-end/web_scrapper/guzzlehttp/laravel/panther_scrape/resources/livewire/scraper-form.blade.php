<div>
    <h2 class="text-3xl font-bold">Enter url to scrape</h2>
    <form method="post" class="mt-4" wire:submit.prevent="scrape">
        <div class="flex flex-col mb-4">
            <label class="mb-2 uppercase font-bold text-lg text-grey-darkest">Url</label>
            <input type="text" class="border border-gray-400 py-2 px-3 text-grey-darkest placeholder-gray-500" name="url" id="url" placeholder="Url..." />
            <button type="submit" class="block bg-red-400 hover:bg-teal-dark text-lg mx-auto p-4 rounded mt-3">Add to queue</button>
        </div>
    </form>
</div>
