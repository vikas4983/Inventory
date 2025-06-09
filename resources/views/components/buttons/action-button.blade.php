<<<<<<< HEAD
<button type="button" data-toggle="modal" title="{{ __('titles.edit') }}" data-id="{{ $objectData }}" data-url="{{ $url }}"
    data-title="{{ $title }}" data-target="#editModal-{{ $objectData->id }}"
    class="btn btn-sm btn-icon btn-outline dropbox btn-rounded-circle" >
=======
<button type="button" data-toggle="modal" data-id="{{ $objectData }}" data-url="{{ $url }}"
    data-title="{{ $title }}" data-target="#editModal-{{ $objectData->id }}"
    class="btn btn-sm btn-icon btn-outline dropbox btn-rounded-circle" title="Edit">
>>>>>>> 599ec71143fb8d75b380f318177492c34c3c4bd5
    <i class="mdi mdi-pencil"></i>
</button>

<form action="{{$url}}" method="DELETE">
    <input type="hidden" id="id" name="id" value="{{$objectData->id}}">
    @csrf
    @method('DELETE')
<<<<<<< HEAD
    <button data-id="{{ $objectData->id }}"type="button" title="{{ __('titles.delete') }}"
=======
    <button data-id="{{ $objectData->id }}"type="button"
>>>>>>> 599ec71143fb8d75b380f318177492c34c3c4bd5
        class="deleteBtn btn btn-sm btn-icon btn-outline pinterest btn-rounded-circle">
        <i class="mdi mdi-delete"></i>
    </button>
</form>


<x-modals.edit-modal :objectData="$objectData" :url="$url" :title="$title" />
