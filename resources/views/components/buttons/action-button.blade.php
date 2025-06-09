<button type="button" data-toggle="modal" title="{{ __('titles.edit') }}" data-id="{{ $objectData }}" data-url="{{ $url }}"
    data-title="{{ $title }}" data-target="#editModal-{{ $objectData->id }}"
    class="btn btn-sm btn-icon btn-outline dropbox btn-rounded-circle" >
    <i class="mdi mdi-pencil"></i>
</button>

<form action="{{$url}}" method="DELETE">
    <input type="hidden" id="id" name="id" value="{{$objectData->id}}">
    @csrf
    @method('DELETE')
    <button data-id="{{ $objectData->id }}"type="button" title="{{ __('titles.delete') }}"
        class="deleteBtn btn btn-sm btn-icon btn-outline pinterest btn-rounded-circle">
        <i class="mdi mdi-delete"></i>
    </button>
</form>


<x-modals.edit-modal :objectData="$objectData" :url="$url" :title="$title" />
