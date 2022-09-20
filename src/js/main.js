;(function ($) {
    const app = {
        init: function () {
            $('.product-select-current').on('click', function () {
                $('.product-select-dropdown').toggleClass('active');
            });

            $('.product-select-item').on('click', app.handleProductSelect);

            //hide dropdown when click outside
            $(document).on('click', function (e) {
                if (!$(e.target).closest('.product-select').length) {
                    $('.product-select-dropdown').removeClass('active');
                }

                e.stopPropagation();
            });

            $('.mp-submit').on('click', app.handleFormSubmit);

        },

        handleFormSubmit: function (e) {
            const $form = $(this).closest('form');
            const $input = $form.find('input[name="mp_source_id"]');
            const sourceId = $input.val();

            const email = $form.find('input[name="mp_email"]').val();

            if (!sourceId) {
                $('.product-error').addClass('active');

                e.preventDefault();
            } else {
                $('.product-error').removeClass('active');
            }

            const isEmailValid = app.validateEmail(email);

            if (!email || !isEmailValid) {
                $('.email-error').addClass('active');

                e.preventDefault();
            } else {
                $('.email-error').removeClass('active');
            }
        },

        handleProductSelect: function () {
            const $this = $(this);
            const $current = $('.current-selection');
            const $dropdown = $('.product-select-dropdown');

            $current.html($this.html());
            $dropdown.removeClass('active');

            $('.product-select-item').removeClass('active');
            $this.addClass('active');

            const id = $this.data('id');
            $('input[name="mp_source_id"]').val(id);
        },

        validateEmail: function (email) {
            const re = /\S+@\S+\.\S+/;
            return re.test(email);
        }
    }

    $(document).on('ready', app.init);

})(jQuery);