 <form action="{{ route('purchaseItems.update', $objectdata->id) }}" method="post">
     @csrf
     @method('PATCH')
     <div class="row">
         <div class="form-group col-lg-4">
             <label for="purchase_id" class="font-weight-medium">{{ __('labels.purchase_item_purchase_id') }}</label>
             <select name="purchase_id" id="purchase_id" value="{{ old('purchase_id') }}"
                 class="form-control @error('purchase_id') is-invalid @enderror" required>
                 <option value="" selected disabled>Select Purchase</option>
                 @foreach ($data['purchases'] as $purchase)
                     <option value="{{ $purchase->id }}" @if (old('purchase_id', $objectdata->purchase->id ?? '') == $purchase->id) selected @endif>
                         {{ $purchase->supplier->name }}
                     </option>
                 @endforeach
             </select>
             @error('purchase_id')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-4">
             <label for="product_id" class="font-weight-medium">{{ __('labels.purchase_item_product_id') }}</label>
             <select name="product_id" id="product_id" value="{{ old('product_id') }}"
                 class="form-control @error('product_id') is-invalid @enderror" required>
                 <option value="" selected disabled>Select Product</option>
                 @foreach ($data['products'] as $product)
                     <option value="{{ $product->id }}" @if (old('product_id', $objectdata->product->id ?? '') == $product->id) selected @endif>
                         {{ $product->name ?? '' }}</option>
                 @endforeach
             </select>
             @error('product_id')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-4">
             <label for="quantity" class="font-weight-medium">{{ __('labels.purchase_item_quantity') }}</label>
             <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                 name="quantity" value="{{old('quantity', $objectdata->quantity ?? '')}}" 
                 placeholder="{{ __('labels.purchase_item_quantity_placeholder') }}" required>
             @error('quantity')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-4">
             <label for="price" class="font-weight-medium">{{ __('labels.purchase_item_price') }}</label>
             <input type="number" step="0.1" min="0" class="form-control @error('price') is-invalid @enderror"
                 id="price" name="price" value="{{old('price', $objectdata->price ?? '')}}"
                 placeholder="{{ __('labels.purchase_item_price_placeholder') }}" required>
             @error('price')
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
