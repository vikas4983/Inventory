<div class="modal fade" id="editModal-{{ $objectData->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel-{{ $objectData->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="editModalLabel-{{ $objectData->id }}">
                    Edit {{ $title }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ $url }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">{{ __('labels.category_name') }} </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter Name" value="{{ old('name', $objectData->name ?? '') }}"
                            required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-5">
                        <div class="d-flex align-items-center">
                            <label class="font-weight-medium mb-0 mr-3">Status</label>
                            <div class="form-check form-check-inline mr-3">
                                <input class="form-check-input" type="radio" name="is_active" id="statusActive"
                                    value="1" {{ old('is_active', $objectData->is_active) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusActive">Active</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="is_active" id="statusInactive"
                                    value="0" {{ old('is_active', $objectData->is_active) == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusInactive">Inactive</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" title="{{__('titles.update')}}" class="btn btn-primary">{{__('buttons.update')}}</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" title="{{__('titles.cancel')}}" data-dismiss="modal">{{__('buttons.cancel')}}</button>
            </div>
        </div>
    </div>
</div>
