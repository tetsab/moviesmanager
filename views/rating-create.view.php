<!-- Rating Modal -->
<div id="rating-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-white">Rate Movie</h3>
            <button onclick="closeModal()" class="text-white text-xl font-bold">✖</button>
        </div>
        <form action="/rating-create" method="POST" id="rating-form">
            <input name="movie_id" type="hidden" value="<?=$movie->id?>"/>
            <div class="mb-4">
                <label for="rating" class="block text-gray-300 font-semibold">Rating</label>
                <select 
                    id="rating" 
                    name="rating" 
                    class="w-full bg-gray-700 text-white rounded-lg px-3 py-2">
                    <option value="1">⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="5">⭐⭐⭐⭐⭐</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="review" class="block text-gray-300 font-semibold">Review</label>
                <textarea 
                    id="review" 
                    name="review" 
                    class="w-full bg-gray-700 text-white rounded-lg px-3 py-2"
                    rows="4" placeholder="Write your review..."></textarea>
            </div>
            <div class="flex justify-end space-x-4">
                <button 
                    type="button" 
                    onclick="closeModal()" 
                    class="px-4 py-2 bg-gray-600 text-white rounded-lg">
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="px-4 py-2 bg-purple-600 text-white font-bold rounded-lg hover:bg-purple-700">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
