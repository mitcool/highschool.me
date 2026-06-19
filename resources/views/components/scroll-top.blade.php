<a href="#page-top" class="scroll-to-top" data-scroll-top aria-label="Go to top">
    <i class="fas fa-angle-up" aria-hidden="true"></i>
</a>

<script>
    (function () {
        const buttons = document.querySelectorAll('[data-scroll-top]');

        if (!buttons.length) {
            return;
        }

        const toggleButtons = function () {
            const isVisible = window.scrollY > 200;

            buttons.forEach(function (button) {
                button.classList.toggle('is-visible', isVisible);
            });
        };

        buttons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });

        toggleButtons();
        window.addEventListener('scroll', toggleButtons, { passive: true });
    })();
</script>
