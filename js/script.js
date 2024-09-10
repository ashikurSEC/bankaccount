const popupMessage = document.getElementById('popupMessage');
const message = '<?= isset($message) ? $message : ""; ?>';

    if (message) {
        popupMessage.classList.add('show');
        setTimeout(() => {
            popupMessage.classList.remove('show');
        }, 3000); 
    }

    