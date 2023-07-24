<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.layouts.seo')
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    @include('templates.layouts.css')
    @yield('css')
</head>

<body>
    @include('templates.layouts.header')
    @if (Auth::check())
        @if (Auth::user()->role == 'user')
            <input type="hidden" class="user_id" value="{{ Auth::user()->id }}">
        @endif
    @endif
    @yield('content')

    @include('templates.layouts.footer')
    @include('templates.layouts.js')
    @yield('js')

</body>

<script>
    const user_id = document.querySelector('.user_id')?.value;
    const cartBox = document.querySelector('.cartBox');
    const offCanvas = document.querySelector('.offcanvas-body');
    // const addToFavBtn = document.querySelectorAll('.addToFavBtn');
    const data = {
        'user_id' : user_id
    }

    const emptyCart = () => {
        const div = document.createElement('div');
        div.classList.add('empty-cart', 'p-3')
        div.innerHTML = `
                <div class=" border p-3 relative">
                    <div class=" d-flex flex-column gap-2">
                        <h1 class=" fs-5 fw-bold small text-center">Your Cart is Empty</h1>
                        <a href="{{ route('products') }}" class="btn btn-dark">Continue Shopping</a>
                    </div>
                </div>
                `;
        offCanvas.append(div);
    }

    const continueCheckOut = () => {
        const emptyCart = document.querySelector('.empty-cart');
        if(emptyCart){
            Swal.fire({
                title: 'Your Cart is Empty',
                text: 'Please add items to your cart.',
                icon: 'warning',
                confirmButtonText: 'OK',
                customClass: {
                  confirmButton: 'btn btn-primary'
                }
            });
        }else{
            const random = Math.floor(Math.random() * 10000000000);
            const orderList = [];
            const orderCode = 'VB'+'_' + random ;
            const cart = document.querySelectorAll('.item-in-cart');
            const totalQty = document.querySelector('#cartCount').innerText;
            cart.forEach(function(row) {
              const productId = row.querySelector('.product_id').value;
              const qty = row.querySelector('.cart-quantity').value;
              const total = row.querySelector('.cart-cost').innerHTML;

              orderList.push({
                'user_id': user_id,
                'product_id': productId,
                'quantity': qty,
                'total_price': total,
                'order_code': orderCode,
              });
            });
            localStorage.setItem('orderList',JSON.stringify(orderList));
            localStorage.setItem('orderCode',orderCode);
            updateTotalCost();
            window.location.href = "{{ route('user.checkout') }}";
        }
    }

    const updateTotalQuantity = () => {
        const total =  [...document.querySelectorAll('.cart-quantity')].reduce((preV,curV) =>{
            return preV + parseFloat(curV.value);
        },0);
        document.querySelector('#cartCount').innerHTML = total;
        // document.querySelector('#mobileCartCount').innerHTML = total;
        // document.querySelectorAll('.cart-count').forEach((el) => {
        //     console.log(el);
        //     el.innerText = total;
        // })
    }

    const updateTotalCost = () =>{
        const total =  [...document.querySelectorAll('.cart-cost')].reduce((preV,curV) =>{
            return preV + parseFloat(curV.innerHTML);
        },0)
        document.querySelector('#subTotal').innerHTML = total + " Kyats";
        localStorage.setItem("total_price", total);
    }


    let quantityTotal = 0;
    function getCarts(){
        axios.post('/getCarts', {
            data
        })
        .then(function(response) {
            const data = response?.data;
            if(response?.data?.length > 0){
                RemoveEmptyInCart();
                for (let i = 0; i < response?.data?.length ; i++) {
                    quantityTotal += data[i]?.quantity;
                    document.querySelector('#cartCount').innerText = quantityTotal;
                    const div = document.createElement('div');
                    div.classList.add('item-in-cart', 'p-3')
                    div.innerHTML = `
                            <div class=" card border p-3 relative">
                                <div class=" d-flex flex-column gap-2">
                                    <div class="card-img-container">
                                        <img src="/dbImg/products/${data[i]?.product_image}" width="100" height="100" class="card-item-img">
                                    </div>
                                    <p class=" fw-bold small">${data[i]?.product_name}</p>
                                    <small>${data[i]?.color == null ? '' : data[i]?.color}</small>
                                </div>
                                <input type="hidden" value="${data[i]?.product_id}" class="product_id">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class=" col-5">
                                        <div class=" cart-item-quantity input-group input-group-sm">
                                            <button class="btn btn-dark" onclick='dec(event,${data[i]?.discount_price ? data[i]?.discount_price : data[i]?.original_price})'>
                                                <i class=" bi bi-dash pe-none"></i>
                                            </button>
                                            <input type="number" data-quantity="quantity" class="cart-quantity form-control text-center" value="${data[i]?.quantity}" max="${data[i]?.stock}">
                                            <button class="btn btn-dark" onclick='inc(event,${data[i]?.discount_price ? data[i]?.discount_price : data[i]?.original_price})'>
                                                <i class=" bi bi-plus pe-none"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class=" col-5">
                                        <p> <span class='cart-cost'>${data[i]?.discount_price ? data[i]?.discount_price : data[i]?.original_price  * data[i]?.quantity}</span> Kyats</p>
                                    </div>
                                </div>
                                <div class=" position-absolute  " style="top:10px;right:10px">
                                    <button onclick="removeItem(event)" class="btn btn-outline-danger ">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </div>
                            </div>
                            `;
                    cartBox.append(div);
                    updateTotalCost();
                }
            }else{
                emptyCart();
            }
        })
        .catch(function(error) {
            console.log(error);
        });
    }

    function RemoveEmptyInCart(){
        const emptyDiv = document.querySelector('.empty-cart');
        emptyDiv?.remove();
    }

    if(user_id){
        getCarts();
        updateTotalQuantity();
        updateTotalCost();
    }else{
        emptyCart();
    }

    const addToCartBtns = document.querySelectorAll('.addToCartBtn');

    let cartCount = 0;
    document.addEventListener('click', e => {
        if (e.target.matches('.addToCartBtn')) {
            const container = e.target.closest('.own-card');
            const product_id = container.querySelector('.productId')?.value;
            const productName = container.querySelector('.product-name')?.innerText;
            const product_image = container.querySelector('.own-card-image')?.src;
            const product_color = container.querySelector('.color_name')?.value;
            const product_price = container.querySelector('.discount-price') ? container.querySelector(
                    '.discount-price').getAttribute('data-price') : container.querySelector('.current-price')
                .getAttribute('data-price');
            const user_id = document.querySelector('.user_id')?.value;
            const quantity = 1;

            const cartData = {
                'id': product_id,
                'title': productName,
                'price': product_price,
                'image': product_image,
                'quantity' : quantity,
                'color' : product_color ? product_color : ''
            }
            if (user_id !== undefined) {
                const data = {
                    'product_id': product_id,
                    'quantity': quantity,
                    'user_id': user_id,
                    'color' : product_color ? product_color : ''
                }
                axios.post('/addToCart', {
                        data
                    })
                    .then(function(response) {
                        console.log(response);
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }
            RemoveEmptyInCart();
            createItemInCart(cartData);
            cartCount++;
            addAnimate();
            // document.querySelector('#cartCount').innerHTML = cartCount;
            updateTotalQuantity();
        }

        if (e.target.matches('.addToFavBtn')) {
            const container = e.target.closest('.own-card');
            const product_id = container.querySelector('.productId')?.value;
            const user_id = document.querySelector('.user_id')?.value;

            const data = {
                'product_id': product_id,
                'user_id': user_id,
            }
            axios.post('/user/addToFav', {
                data
            })
            .then(function(response) {
                if(response?.data){
                    location.reload();
                }
            })
            .catch(function(error) {
                console.log(error);
            });
        }

        if (e.target.matches('.removeFavBtn')) {
            const container = e.target.closest('.own-card');
            const product_id = container.querySelector('.productId')?.value;
            const user_id = document.querySelector('.user_id')?.value;

            const data = {
                'product_id': product_id,
                'user_id': user_id,
            }
            axios.post('/user/removeFav', {
                data
            })
            .then(function(response) {
                if(response?.data?.status == 'true'){
                    location.reload();
                }
            })
            .catch(function(error) {
                console.log(error);
            });
        }
    })

    function addAnimate() {
        document.querySelector('#cartCount').classList.add('animate__flash');
        setTimeout(() => {
            document.querySelector('#cartCount').classList.remove('animate__flash');
        }, 1000);
    }


    window.inc = function (event,price){
        const currentCart = event.target.closest('.item-in-cart');
        const cartQuantity = currentCart.querySelector('.cart-quantity');
        const cartCost = currentCart.querySelector('.cart-cost');
        cartQuantity.valueAsNumber += 1;
        cartCost.innerHTML = (price * cartQuantity.valueAsNumber);
        const data = {
            'user_id' : user_id,
            'product_id' : currentCart.querySelector('.product_id').value,
            'quantity' : cartQuantity.valueAsNumber
        }
        if(user_id){
            axios.post('/addQuantity', {
                data
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            });
        }

        cartCount++;
        addAnimate();
        document.querySelector('#cartCount').innerHTML = cartCount;
        updateTotalQuantity();
        updateTotalCost();
    }

    window.dec = function (event,price){
        const currentCart = event.target.closest('.item-in-cart');
        const cartQuantity = currentCart.querySelector('.cart-quantity');
        const cartCost = currentCart.querySelector('.cart-cost');
        if(cartQuantity.valueAsNumber === 1){
            return;
        }else{
            cartQuantity.valueAsNumber -= 1;
        }
        cartCost.innerHTML = (price * cartQuantity.valueAsNumber);
        const data = {
            'user_id' : user_id,
            'product_id' : currentCart.querySelector('.product_id').value,
            'quantity' : cartQuantity.valueAsNumber
        }
        if(user_id){
            axios.post('/removeQuantity', {
                data
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            });
        }
        cartCount--;
        addAnimate();
        document.querySelector('#cartCount').innerHTML = cartCount;
        updateTotalQuantity();
        updateTotalCost();
    }
    window.removeItem = function(event){
        const currentCart = event.target.closest('.item-in-cart');
        currentCart.remove();
        const data = {
            'user_id' : user_id,
            'product_id' : currentCart.querySelector('.product_id').value
        }
        if(user_id){
            axios.post('/removeItem', {
                data
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            });
        }
        cartCount  = cartCount - currentCart.querySelector('.cart-quantity').valueAsNumber;
        addAnimate();
        // document.querySelector('#cartCount').innerHTML = cartCount;
        updateTotalCost();
        updateTotalQuantity();
    }

    window.clearCart = function(event){
        const currentCart = document.querySelector('.cartBox');
        currentCart.remove();
        const data = {
            'user_id' : user_id
        }
        if(user_id){
            axios.post('/clearCarts', {
                data
            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error);
            });
        }
        cartCount = 0;
        addAnimate();
        document.querySelector('#cartCount').innerHTML = cartCount;
        updateTotalCost();
    }

    const createItemInCart = ({
        id,
        title,
        price,
        image,
        quantity,
        color
    }) => {
        const div = document.createElement('div');
        div.classList.add('item-in-cart', 'p-3')
        div.innerHTML = `
                <div class=" card border p-3 relative">
                    <div class=" d-flex flex-column gap-2">
                        <div class="card-img-container">
                            <img src="${image}" width="100" height="100" class="card-item-img">
                        </div>
                        <p class=" fw-bold small">${title}</p>
                        <small>${color}</small>
                    </div>
                    <input type="hidden" value="${id}" class="product_id">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class=" col-5">
                            <div class=" cart-item-quantity input-group input-group-sm">
                                <button class="btn btn-dark" onclick='dec(event,${price})'>
                                    <i class=" bi bi-dash pe-none"></i>
                                </button>
                                <input type="number" data-quantity="quantity"  class="cart-quantity form-control text-center" value="${quantity}">
                                <button class="btn btn-dark" onclick='inc(event,${price})'>
                                    <i class=" bi bi-plus pe-none"></i>
                                </button>
                            </div>
                        </div>
                        <div class=" col-5">
                            <p> <span class='cart-cost'>${price}</span> Kyats</p>
                        </div>
                    </div>
                    <div class=" position-absolute  " style="top:10px;right:10px">
                        <button onclick="removeItem(event)" class="btn btn-outline-danger ">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </div>
                </div>
                `;
        cartBox.append(div)
        updateTotalCost();
    }

    const subscribeBtn = document.querySelector('.subscribeBtn');
    subscribeBtn?.addEventListener('click',function(){
        const subscribeForm = document.querySelector('#subscribe--form');
        const firstName = subscribeForm.querySelector('input[name="first_name"]').value;
        const lastName = subscribeForm.querySelector('input[name="last_name"]').value;
        const email = subscribeForm.querySelector('input[name="email"]').value;
        const phone = subscribeForm.querySelector('input[name="phone"]').value;

        const data = {
            'first_name' : firstName,
            'last_name' : lastName,
            'email' :  email,
            'phone' : phone,
        }
        axios.post('/subscribe', {
            data
        })
        .then(function(response) {
            if(response?.data?.status == 'success'){
                Swal.fire({
                    title: 'Success',
                    text: 'You have successfully subscribed!',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    customClass: {
                      confirmButton: 'btn btn-primary'
                    }
                });
                firstName = '';
                lastName = '';
                email = '';
                phone = '';
            }
        })
        .catch(function(error) {
            console.log(error);
        });

    })
</script>
</html>
