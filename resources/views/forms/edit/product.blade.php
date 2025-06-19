 <form action="{{ route('products.update', $objectdata->id) }}" method="post">
     @csrf
     @method('PATCH')
     <div class="row">
         <div class="form-group col-lg-4">
             <label for="name" class="font-weight-medium">{{ __('labels.product_name') }}</label>
             <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                 placeholder="{{__('labels.product_name_placeholder')}}" value="{{ old('name', $objectdata->name ?? '') }}" required>
             @error('name')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-4">
             <label for="stock" class="font-weight-medium">{{ __('labels.stock') }}</label>
             <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                 name="stock" placeholder="{{__('labels.product_stock_placeholder')}}" value="{{ old('stock', $objectdata->stock ?? '') }}"
                 required>
             @error('stock')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-4">
             <label for="category_id">{{ __('labels.product_category') }}</label>
             <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id"
                 required>
                 <option value="" disabled selected>Select Category</option>
                 @foreach ($data['categories'] as $category)
                     <option value="{{ $category->id }}" @if (old('category_id', $objectdata->category_id ?? '') == $category->id) selected @endif>
                         {{ $category->name }}
                     </option>
                 @endforeach
             </select>
             @error('category_id')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>

         <div class="form-group col-lg-4">
             <label for="brand_id">{{ __('labels.product_brand') }}</label>
             <select class="form-control" name="brand_id" id="brand_id" required>
                 @foreach ($data['brands'] as $brand)
                     <option value="{{ $brand->id }}" @if (old('brand_id', $objectdata->brand_id ?? '') == $brand->id) selected @endif>
                         {{ $brand->name }}</option>
                 @endforeach
             </select>
             @error('brand_id')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>

         <div class="form-group col-lg-4">
             <label for="cost_price" class="font-weight-medium">{{ __('labels.product_buy') }}</label>
             <input type="number" step="0.01" min="0" class="form-control @error('cost_price') is-invalid @enderror"
                 id="cost_price" name="cost_price" placeholder="{{__('labels.product_buy_placeholder')}}"
                 value="{{ old('cost_price', $objectdata->cost_price ?? '') }}" required>
             @error('cost_price')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-4">
             <label for="selling_price" class="font-weight-medium">{{ __('labels.product_sell') }}</label>
             <input type="number" step="0.01" min="0" class="form-control @error('selling_price') is-invalid @enderror"
                 id="selling_price" name="selling_price" placeholder="{{__('labels.product_sell_placeholder')}}"
                 value="{{ old('selling_price', $objectdata->selling_price ?? '') }}" required>
             @error('selling_price')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
         <div class="form-group col-lg-12">
             <label for="description" class="font-weight-medium">{{ __('labels.product_description') }}</label>
             <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                 style="width: 100%; height: 90px;" name="description" placeholder="{{__('labels.product_description_placeholder')}}" required>{{ old('description', $objectdata->description ?? '') }}</textarea>
             @error('description')
                 <div class="invalid-feedback">
                     {{ $message }}
                 </div>
             @enderror
         </div>
     </div>
     
     <button type="submit" title="{{ __('titles.update') }}"
         class="btn btn-primary mr-5">{{ __('buttons.update') }}</button>
     <button type="button" title="{{ __('titles.cancel') }}"
         class="btn btn-danger" data-dismiss="modal">{{ __('buttons.cancel') }}</button>
 </form>
