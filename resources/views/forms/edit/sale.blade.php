 <form action="{{ route('sales.update', $objectdata->id) }}" method="post">
     @csrf
     @method('PATCH')
     <div class="row">
         <div class="form-group col-lg-4">
             <label for="customer_id" class="font-weight-medium">{{ __('labels.sale_customer_id') }}</label>
             <select name="customer_id" id="customer_id" value="{{ old('customer_id') }}"
                 class="form-control @error('customer_id') is-invalid @enderror" required>
                 <option value="" selected disabled>Select Customer</option>
                 @foreach ($data['customers'] as $customer)
                     <option value="{{ $customer->id }}" @if (old('customer_id', $objectdata->customer_id ?? '') == $customer->id) selected @endif>
                         {{ $customer->name }}
                     </option>
                 @endforeach
             </select>
             @error('customer_id')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-4">
             <label for="sale_date" class="font-weight-medium">{{ __('labels.sale_date') }}</label>
             <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date"
                 name="sale_date" value="{{ old('sale_date', $objectdata->sale_date ?? '') }}"
                 placeholder="{{ __('labels.sale_date_placeholder') }}" required>
             @error('sale_date')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-4">
             <label for="total" class="font-weight-medium">{{ __('labels.sale_total') }}</label>
             <input type="number" step="0.1" min="0" class="form-control @error('total') is-invalid @enderror"
                 id="total" name="total" value="{{ old('total', $objectdata->total ?? '') }}"
                 placeholder="{{ __('labels.sale_total_placeholder') }}" required>
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
