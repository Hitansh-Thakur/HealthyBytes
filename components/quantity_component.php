
    <button class="qty-btn-minus btn btn-primary rounded-left" type="button"><i class="fa fa-minus"></i></button>
    <input type="text" name="qty" value="1" class="input-qty form-control border-0 rounded-0 text-center"
        style="width:60px" />
    <button class="qty-btn-plus btn btn-primary rounded-right" type="button"><i class="fa fa-plus"></i></button>


<script>
    var incrementButton = document.querySelector('.qty-btn-plus');
    var decrementButton = document.querySelector('.qty-btn-minus');
    var inputField = document.querySelector('.input-qty');

    incrementButton.addEventListener('click', function () {
        inputField.value = parseInt(inputField.value) + 1;
    });

    decrementButton.addEventListener('click', function () {
        var quantity = parseInt(inputField.value);
        if (quantity > 1) {
            inputField.value = quantity - 1;
        }
    });

    inputField.addEventListener('keypress', function (e) {
        if (e.key === '-' || e.key === '+' || e.key === 'e' || e.key === '.') {
            e.preventDefault();
        }
    });

    inputField.addEventListener('paste', function (e) {
        e.preventDefault();
        var pasteData = e.clipboardData.getData('text/plain');
        if (!isNaN(pasteData)) {
            inputField.value = parseInt(pasteData);
        }
    });

    inputField.addEventListener('change', function () {
        if (isNaN(inputField.value)) {
            inputField.value = 1;
        }
    });
</script>