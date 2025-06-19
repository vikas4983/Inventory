<form action="{{ $url }}" method="{{ $method }}">
    <input type="hidden" id="id" name="id" value="{{ $objectData->id }}">
    @csrf
    <button type="button" data-toggle="modal" data-id="{{ $objectData }}" data-url="{{ $url }}"
        data-title="{{ $title }}" data-target="#editModal-{{ $objectData->id }}"
        class="editBtn  btn btn-outline-info btn-pill" title={{ __('titles.edit') }}>
        <i class="mdi mdi-pencil"></i>
    </button>
</form>
<x-modals.edit-modal :objectData="$objectData" :url="$url" :title="$title" :modalSize="$modalSize" />
