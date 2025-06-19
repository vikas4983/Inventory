<form action="{{ route('customers.update', $objectdata->id) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="name" class="font-weight-medium">{{ __('labels.customer_name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                placeholder="{{ __('labels.customer_name_placeholder') }}"
                value="{{ old('name', $objectdata->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-lg-6">
            <label for="email" class="font-weight-medium">{{ __('labels.customer_email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" placeholder="{{ __('labels.customer_email_placeholder') }}"
                value="{{ old('email', $objectdata->email ?? '') }}" required>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-lg-6">
            <label for="phone" class="font-weight-medium">{{ __('labels.customer_phone') }}</label>
            <input type="number" step="0.01" min="0" class="form-control @error('phone') is-invalid @enderror"
                id="phone" name="phone" placeholder="{{ __('labels.customer_phone_placeholder') }}"
                value="{{ old('phone', $objectdata->phone ?? '') }}" required>
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group col-lg-6">
            <label for="address" class="font-weight-medium">{{ __('labels.customer_address') }}</label>
            <input type="text" step="0.01" min="0" class="form-control @error('address') is-invalid @enderror"
                id="address" name="address" placeholder="{{ __('labels.customer_address_placeholder') }}"
                value="{{ old('address', $objectdata->address ?? '') }}" required>
            @error('address')
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
