<div>
    @if(! empty($task))
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h2>Task Editing</h2>

            <div class="card-body">
                @error('description') <span class="error">- {{ $message }}</span> @enderror
                <form class="edit-task" wire:submit.prevent="submit">
                    <div class="form-group">
                        <input wire:model="description" class="form-text" type="text">
                        <button class="btn btn-todo">Update</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>