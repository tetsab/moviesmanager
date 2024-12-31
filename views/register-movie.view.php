<div>
    <div class="border border-stone-700 rounded">
        <h1 class="border-b border-stone-700 text-stone-400 font-bold px-4 py-2">Register a movie:</h1>
        <form class="p-4 space-y-4" method="POST" action="/movie-create" enctype="multipart/form-data">
            <?php if ($validations = flash()->get('validations')): ?>
                <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2 text-sm font-bold">
                    <ul>
                        <li>Error!</li>
                    
                        <?php foreach ($validations as $validation): ?>
                            <li><?=$validation?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="flex flex-col">
                <label class="text-stone-400 ml-2 mb-1">Image</label>
                <input type="file" name="image" class="border-red-800 border-2 rounded-md bg-red-950 text-sm focus:outline-none px-2 py-1"/>
            </div>
            
            <div class="flex flex-col">                    
                <label class="text-stone-400 mb-1">Title</label>
                <input 
                    type="text"
                    name="title" 
                    class="border-red-800 border-2 rounded-md bg-red-950 text-sm focus:outline-none px-2 py-1"/>
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1">Author</label>
                <input 
                    type="text"
                    name="author"
                    class="border-red-800 border-2 rounded-md bg-red-950 text-sm focus:outline-none px-2 py-1"/>
            </div>

            <div class="flex flex-col">
                <label class="text-stone-400 mb-1">Description</label>
                <textarea 
                    type="text"
                    name="description" 
                    class="border-red-800 border-2 rounded-md bg-red-950 text-sm focus:outline-none px-2 py-1"></textarea>
            </div>
                
            <div class="flex flex-col">
                <label class="text-stone-400 ml-2 mb-1">Year release</label>
                <select 
                    name="year_release" 
                    class="border-red-800 border-2 rounded-md bg-red-950 text-sm focus:outline-none px-2 py-1">
                    <?php foreach (range(date('Y'), 1800) as $year): ?>
                        <option value="<?= $year ?>"><?= $year ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button 
                class="border-red-800 bg-red-950 text-stone-400 px-4 py-1 rounded-md border-2 hover:bg-stone-800" 
                type="submit">
                Send
            </button>
        </form>
    </div>
</div>
