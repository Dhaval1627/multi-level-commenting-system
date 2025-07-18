<form wire:submit.prevent="submit" class="mb-3">
    <div class="mb-2">
        <textarea wire:model.defer="content" class="form-control" placeholder="{{ $parent ? 'Reply...' : 'Add a comment...' }}"></textarea>
        @error('content')
        <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
</form>
