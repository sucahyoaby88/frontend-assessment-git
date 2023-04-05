<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Order</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/order/create.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <h5 class="title-page">Create Order</h5>
        <div class="card">
            <div class="card-body">
                <div class="row user">
                    <div class="col-3">
                        <h6 class="title-submenu">Detail</h6>
                    </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col-md-8" id="field-name">
                                <div class="form-group">
                                    <label for="name" class="form-label required">Name</label>
                                    <select name="name" id="name" class="form-select"
                                        onchange="validateName();">
                                        @if ($employees)
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee['id'] }}">{{ $employee['employee_name'] }}
                                                </option>
                                            @endforeach
                                        @endif
                                        @if (!$employees)
                                            <option value="">No data available</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" id="field-distribution-center">
                                <div class="form-group mt-4">
                                    <label for="distribution-center" class="form-label required">Distribution
                                        Center</label>
                                    <select name="distribution-center" id="distribution-center" class="form-select"
                                        onchange="validateShowProducts();">
                                        <option value="">No data available</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-100 d-none d-md-block"></div>
                            <div class="col-md-6" id="field-payment-type" hidden>
                                <div class="form-group mt-4">
                                    <label for="payment-type" class="form-label required">Payment Type</label>
                                    <select name="payment-type" id="payment-type" class="form-select">
                                        <option value="" disabled selected>Payment Type</option>
                                        <option value="Cash H+1">Cash H+1</option>
                                        <option value="Cash H+3">Cash H+3</option>
                                        <option value="Cash H+7">Cash H+7</option>
                                        <option value="Transfer H+1">Transfer H+1</option>
                                        <option value="Transfer H+3">Transfer H+3</option>
                                        <option value="Transfer H+7">Transfer H+7</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" id="field-expiration-date" hidden>
                                <div class="form-group mt-4">
                                    <label for="expiration-date" class="form-label required">Expiration Date</label>
                                    <input type="date" name="expiration-date" id="expiration-date"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8" id="field-notes" hidden>
                                <div class="form-group mt-4">
                                    <label for="notes" class="form-label">Notes</label>
                                    <textarea name="notes" id="notes" rows="4" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row products mt-4" id="products" hidden>
                    <hr>
                    <div class="col-3">
                        <h6 class="title-submenu">Products</h6>
                    </div>
                    <div class="col-9">
                        <div class="list-products">
                            <div class="detail-product mb-4">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="product-name" class="form-label required">Product</label>
                                            <select name="product-name" id="product-name"
                                                class="form-select product-name">
                                                <option value="" disabled selected>Product Name</option>
                                                @if ($products)
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product['product_name'] }}">
                                                            {{ $product['product_name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="unit" class="form-label required">Unit</label>
                                            <select name="unit" id="unit" class="form-select unit">
                                                <option value="" disabled selected>Unit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mt-4">
                                            <label for="quantity" class="form-label required">Quantity</label>
                                            <input type="number" name="quantity" id="quantity"
                                                class="form-control quantity" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group mt-4">
                                            <label for="price" class="form-label required">Price</label>
                                            <input type="number" name="price" id="price"
                                                class="form-control price" min="1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-4">
                                            <label for="total-price" class="form-label required">Total price</label>
                                            <input type="number" name="total-price" id="total-price"
                                                class="form-control total-price" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 offset-6">
                                        <hr>
                                        <div class="row fw-bold">
                                            <div class="col-6">
                                                <label for="total-nett-price">Total Nett Price</label>
                                            </div>
                                            <div class="col-6">
                                                <label for="amount-total-nett-price"
                                                    class="float-end total-nett-price" id="total-nett-price">0</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-warning btn-add-product"
                                    onclick="addProduct()">NEW ITEM +</button>
                            </div>
                            <div class="col-6 offset-6 mt-3">
                                <div class="row fw-bold">
                                    <div class="col-6">
                                        <label for="total-all-price">Total</label>
                                    </div>
                                    <div class="col-6">
                                        <label for="amount-total-all-price" class="float-end"
                                            id="total-all-price">0</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="card-footer-order text-end">
                    <button type="button" class="btn btn-outline-secondary btn-cancel">CANCEL</button>
                    <button type="button" class="btn btn-success btn-confirm" disabled>CONFIRM</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function validateName() {
            name = $('#name').val()
            $('#distribution-center').empty()

            if (name != "") {
                $('#distribution-center').append(
                    `<option value="DC Tangerang">DC Tangerang</option>
                    <option value="DC Cikarang">DC Cikarang</option>`
                )

                validateShowProducts()
            }

            if (name == "") {
                $('#distribution-center').append(
                    `<option value="">No data available</option>`
                )
            }
        }

        function validateShowProducts() {
            name = $('#name').val()
            distribution_center = $('#distribution-center').val()

            if (name != "" &&
                distribution_center != "") {
                $('#field-payment-type').attr("hidden", false)
                $('#field-expiration-date').attr("hidden", false)
                $('#field-notes').attr("hidden", false)
                $('#products').attr("hidden", false)
            }
        }

        function totalAllPrice() {
            total_all_price = 0
            $('.total-price').each(function() {
                total_all_price = parseInt($(this).val()) + total_all_price
            })
            $('#total-all-price').text(toRP(total_all_price))
        }

        function toRP(number) {
            if (typeof number != 'undefined' && "" != number) {
                let nominal = number.toString().split("").reverse().join("").match(/\d{1,3}/g)
                return (nominal = nominal.join(".").split("").reverse().join(""))
            }
            return 0
        }

        function addProduct() {
            detail_product = $('.detail-product').last()
            if (detail_product.find('.delete-product').length != 0) {
                detail_product.clone().appendTo('.list-products')
            }
            if (detail_product.find('.delete-product').length == 0) {
                detail_product.clone().prepend(`<i class="fa-solid fa-circle-minus delete-product" style="color: #ff0000;"></i>`).appendTo('.list-products')
            }
            $('.btn-confirm').attr('disabled', true)
        }

        function validateAllInput() {
            $('.btn-confirm').attr('disabled', true)
            check_input = true
            check_select = true

            $('input').each(function() {
                if ($(this).val() == "" ||
                    $(this).val() == null) {
                    check_input = false
                }
            })
            $('select').each(function() {
                if ($(this).val() == "" ||
                    $(this).val() == null) {
                    check_select = false
                }
            })

            if (check_input && check_select) {
                $('.btn-confirm').attr('disabled', false)
            }
        }

        $(document).ready(function() {
            today = new Date().toISOString().split("T")[0]
            $('#expiration-date').attr('min', today)

            $(document).on('change', '.product-name', function() {
                product_name = $(this).val()
                unit = $(this).closest('.detail-product').find('.unit')
                unit.empty()
                $(this).closest('.detail-product').find('.quantity').val('')
                $(this).closest('.detail-product').find('.price').val('')

                if (product_name != "") {
                    $.get('{{ route('get_products') }}',
                        function(respon) {
                            $.each(respon, function(key, value) {
                                if (value.product_name == product_name) {
                                    $.each(this.units, function(key, value) {
                                        unit.append(
                                            `<option value="${value.name}">${value.name}</option>`
                                        )
                                    })
                                }
                            })
                        })
                }

                if (product_name == "") {
                    unit.append(
                        `<option value="">No data available</option>`
                    )
                }
            })

            $(document).on('change', '.unit', function() {
                product_name = $(this).closest('.detail-product').find('.product-name').val()
                unit = $(this).val()
                price = $(this).closest('.detail-product').find('.price')
                price.val('')

                if (product_name != "" &&
                    unit != "") {
                    $.get('{{ route('get_products') }}',
                        function(respon) {
                            $.each(respon, function(key, value) {
                                if (value.product_name == product_name) {
                                    $.each(this.units, function(key, value) {
                                        if (value.name == unit) {
                                            price.val(value.price)
                                        }
                                    })
                                }
                            })
                        }
                    )
                }
            })

            $(document).on('input', '.quantity', function() {
                price = $(this).closest('.detail-product').find('.price').val()
                quantity = $(this).val()
                total_price = $(this).closest('.detail-product').find('.total-price')
                total_nett_price = $(this).closest('.detail-product').find('.total-nett-price')
                total_price.val('')
                total_nett_price.text(0)
                $('#total-all-price').text(0)

                if (price > 0 &&
                    price != null &&
                    quantity > 0 &&
                    quantity != null) {
                    total_price.val(price * quantity)
                    total_nett_price.text(toRP(price * quantity))
                    totalAllPrice()
                }
            })

            $(document).on('input', '.price', function() {
                price = $(this).val()
                quantity = $(this).closest('.detail-product').find('.quantity').val()
                total_price = $(this).closest('.detail-product').find('.total-price')
                total_nett_price = $(this).closest('.detail-product').find('.total-nett-price')
                total_price.val('')
                total_nett_price.text(0)
                $('#total-all-price').text(0)

                if (price > 0 &&
                    price != null &&
                    quantity > 0 &&
                    quantity != null) {
                    total_price.val(price * quantity)
                    total_nett_price.text(toRP(price * quantity))
                    totalAllPrice()
                }
            })

            $(document).on('input', 'input', function() {
                validateAllInput()
            })

            $(document).on('change', 'select', function() {
                validateAllInput()
            })

            $(document).on('click', '.delete-product', function() {
                detail_product = $(this).closest('.detail-product')
                total_price = parseInt($(this).closest('.detail-product').find('.total-price').val())
                total_all_price = 0
                $('.total-price').each(function() {
                    total_all_price = parseInt($(this).val()) + total_all_price
                })  

                if (total_price != null &&
                    !isNaN(total_price)) {
                        $('#total-all-price').text(toRP(total_all_price - total_price))
                }
                detail_product.remove()
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
