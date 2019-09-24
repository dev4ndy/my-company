function onInit(event) {
    addEventToRemoveLogo();
}

/**
 * Clean input of old logo and hide the view
 */
function removeLogoImage() {
    // Find the input and set value
    document.getElementsByName('old_logo')[0].value = '';
    // Find the img tag and set attribute src
    document.getElementById('old-logo').setAttribute('src', '');
    // Hidden the logo-view
    const contentLogoView = document.getElementById('content-logo-view');
    const classNames = contentLogoView.className.concat(' d-none');
    contentLogoView.className = classNames;
}

/**
 * Add event to remove-button
 */
function addEventToRemoveLogo() {
    document.getElementById('remove-logo').addEventListener('click', removeLogoImage)
}

/**
 * Load all after the page load
 */
document.addEventListener('DOMContentLoaded', onInit);