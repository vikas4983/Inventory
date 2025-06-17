 <form action="{{ route('statuses.update', $objectdata->id) }}" method="post">
     @csrf
     @method('PATCH')
     <div class="row">
         <div class="form-group col-lg-12">
             <label for="name" class="font-weight-medium">{{ __('labels.status_name') }}</label>
             <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                 placeholder="{{__('labels.status_name_placeholder')}}" value="{{ old('name', $objectdata->name ?? '') }}" required>
             @error('name')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
     </div>
     <button type="submit" title="{{ __('titles.update') }}"
         class="btn btn-primary mr-5">{{ __('buttons.update') }}</button>
     <button type="button" title="{{ __('titles.cancel') }}" class="btn btn-danger"
         data-dismiss="modal">{{ __('buttons.cancel') }}</button>
 </form>
