<form method="POST" action="{{ route('pin-number.update') }}">
    @method('PUT')
    @csrf
    <div class="form-control">
        <label class="label">
            <span class="label-text">You don't have Pin Number create first!</span>
        </label>
        <label class="input-group">
            <input type="password" placeholder="Pin Number" id="pinNumber" name="pin_number"
                class="input input-bordered w-full" value="{{ $user->account->pin_number }}" />
            <span class="label-text"><input type="checkbox" id="showPinNumber" class="toggle" /></span>
        </label>
        @error('pin_number')
            <label class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
            </label>
        @enderror
    </div>
    <div class="form-control mt-6">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>
@push('custom-scripts')
    <script type="text/javascript">
        var pinNumber = document.getElementById('pinNumber');
        var showPinNumber = document.getElementById('showPinNumber');

        showPinNumber.addEventListener('change', function() {
            if (this.checked) {
                pinNumber.setAttribute('type', 'text');
            } else {
                pinNumber.setAttribute('type', 'password');
            }
        });
    </script>
@endpush
