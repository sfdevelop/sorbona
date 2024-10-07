$(document).ready(function () {

    let priceInputs = $('input[name="newPrice"], input[name="price"]');

    priceInputs.on('input', function () {
        let inputValue = $(this).val();

        // Заменяем запятые на точки
        inputValue = inputValue.replace(',', '.');

        // Оставляем только цифры и точки
        let cleanedValue = inputValue.replace(/[^0-9.]/g, '');

        // Проверяем количество точек
        let parts = cleanedValue.split('.');
        if (parts.length > 2) {
            cleanedValue = parts[0] + '.' + parts.slice(1).join('');
        }

        // Устанавливаем очищенное значение обратно в поле ввода
        $(this).val(cleanedValue);
    });
});