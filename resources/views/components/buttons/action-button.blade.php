{{-- <button type="button" data-toggle="modal" data-id="{{ $objectData }}" data-url="{{ $url }}"
    data-title="{{ $title }}" data-target="#editModal-{{ $objectData->id }}"
    class="editBtn btn btn-sm btn-icon btn-outline dropbox btn-rounded-circle" title={{ __('titles.edit') }}>
    <i class="mdi mdi-pencil"></i>
</button> --}}

<form action="{{ $url }}" method="{{$method}}">
    <input type="hidden" id="id" name="id" value="{{ $objectData->id }}">
    @csrf
   
 <button data-id="{{ $objectData->id }}"type="button" title={{ __('titles.edit') }}
        class="editBtn btn btn-sm btn-icon btn-outline pinterest btn-rounded-circle">
        <i class="mdi mdi-pencil"></i>
    </button>
</form>


{{-- <x-modals.edit-modal :objectData="$objectData" :url="$url" :title="$title" /> --}}


