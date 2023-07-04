@extends('templates.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-lg-6">
                <h4>Delivery Details</h4>
                <div class="row">
                    <div class="col-lg-10">
                        <div class="my-2">
                            <input type="text" name="name" id="name" class="form-control rounded-0 py-3" placeholder="Enter Name">
                            <small id="name-error" class="text-danger"></small>
                        </div>
                        <div class="my-2">
                            <input type="text" name="email" id="email" class="form-control rounded-0 py-3" placeholder="Email">
                            <small id="email-error" class="text-danger"></small>
                        </div>
                        <div class="my-2">
                            <input type="text" name="address" id="address" placeholder="Enter Address" class="form-control rounded-0 py-3">
                            <small id="address-error" class="text-danger"></small>
                        </div>
                        <div class="my-2">
                            <input type="text" name="phone" id="phone" placeholder="Phone(09xxxxx)" class="form-control rounded-0 py-3">
                            <small id="phone-error" class="text-danger"></small>
                        </div>
                        <div class="my-2">
                            <textarea name="note" id="note" placeholder="Enter Message(Optional)" class="form-control" cols="30" rows="10"></textarea>
                            <small id="note-error" class="text-danger"></small>
                        </div>
                        <button class="continueBtn btn btn-dark rounded-0 py-2">Continue to payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    const nameInput = document.querySelector('#name');
    const emailInput = document.querySelector('#email');
    const addressInput = document.querySelector('#address');
    const phoneInput = document.querySelector('#phone');
    const noteInput = document.querySelector('#note');
    const continueBtn = document.querySelector('.continueBtn');

    continueBtn.addEventListener('click', function() {
        const name = nameInput.value.trim();
        const email = emailInput.value.trim();
        const address = addressInput.value.trim();
        const phone = phoneInput.value.trim();
        const note = noteInput.value.trim();

        // Reset previous errors
        clearErrors();

        if (name === '') {
            displayError('name', 'Please enter your name');
        }

        if (email === '') {
            displayError('email', 'Please enter your email');
        } else if (!isValidEmail(email)) {
            displayError('email', 'Please enter a valid email address');
        }

        if (address === '') {
            displayError('address', 'Please enter your address');
        }

        if (phone === '') {
            displayError('phone', 'Please enter your phone number');
        } else if (!isValidPhone(phone)) {
            displayError('phone', 'Please enter a valid phone number');
        }

        if (name !== '' && email !== '' && isValidEmail(email) && address !== '' && phone !== '' && isValidPhone(phone)) {
            const data = {
                'name': name,
                'email': email,
                'address': address,
                'phone': phone,
                'note': note
            };
            localStorage.setItem("deliveryAddress", JSON.stringify(data));
            location.href = '/user/payments';
        }
    });

    function displayError(inputName, message) {
        const errorElement = document.querySelector(`#${inputName}-error`);
        errorElement.innerText = message;
    }

    function clearErrors() {
        const errorElements = document.querySelectorAll('[id$="-error"]');
        errorElements.forEach(element => {
            element.innerText = '';
        });
    }

    function isValidEmail(email) {
        // Basic email validation using regular expression
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function isValidPhone(phone) {
        // Basic phone number validation using regular expression
        const phoneRegex = /^(09|\+959)\d{8}$/;
        return phoneRegex.test(phone);
    }
</script>
@endsection
