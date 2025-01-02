<script src="/assets/js/movies-create-screen.js"></script>
<div class="flex justify-between rounded">
    <div class="flex-1 flex flex-col items-center justify-center bg-gray-900 max-w-[350px] mx-20 rounded cursor-pointer">
        <label for="image" class="w-full h-full flex flex-col items-center justify-center cursor-pointer">
            <img src="/icons/upload-simple.svg" alt="upload icon" class="mb-2">
            <span class="text-stone-400">Upload</span>
        </label>
        <input type="file" name="image" id="image" class="hidden">
    </div>
    <div class="flex-1">
        <h1 class="text-stone-400 font-bold px-4 py-2">
            New movie
        </h1>
        <form class="p-4 space-y-4" method="POST" action="/register-movie" enctype="multipart/form-data">
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
            
            <div class="flex flex-col relative">                    
                <div class="absolute inset-y-0 left-2 flex items-center">
                    <img src="icons/film-slate-white.svg" alt="email icon" class="w-4 h-4">
                </div>
                <input 
                    type="text"
                    name="title" 
                    class="border-gray-900 border-2 rounded-md bg-transparent text-sm focus:outline-none py-1 pl-8"
                    placeholder="Title"/>
            </div>

            <div class="flex gap-4">
                <div class="flex-[1] flex flex-col relative">
                    <label for="categories" class="sr-only">Category</label>
                    <select 
                        id="categories"
                        name="categories[]" 
                        class="custom-select bg-transparent border-gray-900 border-2 rounded-md text-sm focus:outline-none py-2 pl-3"
                        multiple>
                        <?php foreach ($categories as $key => $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="flex-[2] flex flex-col relative">
                    <label for="year_release" class="sr-only">Year</label>
                    <div class="relative">
                        <select 
                            id="year_release"
                            name="year_release" 
                            class="border-gray-900 border-2 rounded-md bg-transparent text-sm focus:outline-none py-2 pl-10 w-full">
                            <option value="" selected disabled>Year release</option>
                            <?php foreach (range(date('Y'), 1800) as $year): ?>
                                <option value="<?= $year ?>"><?= $year ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="absolute inset-y-0 left-2 flex items-center pointer-events-none">
                            <img src="icons/calendar-blank.svg" alt="calendar icon" class="w-4 h-4">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col relative">
                <textarea 
                    type="text"
                    name="description" 
                    class="border-gray-900 border-2 rounded-md bg-transparent text-sm focus:outline-none px-2 py-1"
                    rows="15"
                    placeholder="Description"></textarea>
            </div>

            <button 
                class="bg-transparent text-stone-400 px-4 py-1 rounded-md hover:bg-stone-800" 
                type="button" 
                onclick="window.history.back()">
                Cancel
            </button>

            <button 
                class="bg-purple-500 text-white px-4 py-1 rounded-md hover:bg-stone-800" 
                type="submit">
                Create
            </button>
        </form>
    </div>
</div>
