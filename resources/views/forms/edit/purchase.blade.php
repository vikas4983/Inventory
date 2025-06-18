 <form action="{{ route('purchases.update', $objectdata->id) }}" method="post">
     @csrf
     @method('PATCH')
     <div class="row">
         <div class="form-group col-lg-4">
             <label for="supplier_id">{{ __('labels.purchase_name') }}</label>
             <select class="form-control @error('supplier_id') is-invalid @enderror" name="supplier_id" id="supplier_id"
                 required>
                 <option value="" disabled selected>Select Supplier</option>
                 @foreach ($data['suppliers'] as $supplier)
                     <option value="{{ $supplier->id }}" @if (old('supplier_id', $objectdata->supplier_id ?? '') == $supplier->id) selected @endif>
                         {{ $supplier->name }}
                     </option>
                 @endforeach
             </select>
             @error('supplier_id')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-4">
             <label for="statuse_id">{{ __('labels.purchase_status') }}</label>
             <select class="form-control @error('statuse_id') is-invalid @enderror" name="statuse_id" id="statuse_id"
                 required>
                 <option value="" disabled selected>Select Purchase Status</option>
                 @foreach ($data['statuses'] as $status)
                     <option value="{{ $status->id }}" @if (old('status_id', $objectdata->status_id ?? '') == $status->id) selected @endif>
                         {{ $status->name }}
                     </option>
                 @endforeach
             </select>
             @error('status_id')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-4">
             <label for="purchase_date" class="font-weight-medium">{{ __('labels.purchase_date') }}</label>
             <input type="date" step="0.01" class="form-control @error('purchase_date') is-invalid @enderror"
                 id="purchase_date" name="purchase_date" placeholder="{{ __('labels.purchase_total_placeholder') }}"
                 value="{{ old('purchase_date', $objectdata->purchase_date ?? '') }}" required>
             @error('purchase_date')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-4">
             <label for="total" class="font-weight-medium">{{ __('labels.purchase_total') }}</label>
             <input type="number" step="0.01" class="form-control @error('total') is-invalid @enderror"
                 id="total" name="total" placeholder="{{ __('labels.purchase_total_placeholder') }}"
                 value="{{ old('total', $objectdata->total ?? '') }}" required>
             @error('total')
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
