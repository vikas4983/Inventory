<form action="{{ $url }}" method="DELETE">
    <input type="hidden" id="id" name="id" value="{{ $objectData->id }}">
    @csrf
    @method('DELETE')
    <button data-id="{{ $objectData->id }}"type="button" title={{ __('titles.delete') }}
        class="deleteBtn  btn btn-outline-secondary btn-pill">
        <i class="mdi mdi-delete"></i>
    </button>
</form>
