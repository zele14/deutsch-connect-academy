<script>
function updateLinks(lang) {
    try {
        document.getElementById('home-link').href = `index.html?lang=${lang}`;
        document.getElementById('about-link').href = `about.html?lang=${lang}`;
        document.getElementById('services-link').href = `services.html?lang=${lang}`;
        document.getElementById('booking-link').href = `booking.html?lang=${lang}`;
        document.getElementById('materials-link').href = `materials.html?lang=${lang}`;
        document.getElementById('contact-link').href = `contact.html?lang=${lang}`;
        document.getElementById('blog-link').href = `blog.html?lang=${lang}`;
    } catch (error) {
        console.error('Error updating links:', error);
    }
}

// Automatically update the links based on the current language
window.onload = function() {
    try {
        const urlParams = new URLSearchParams(window.location.search);
        const lang = urlParams.get('lang') || 'en'; // Default to English if lang is not set
        updateLinks(lang);

        // Set the correct option in the language dropdown
        const languageSelect = document.getElementById('language-select');
        if (languageSelect) {
            languageSelect.value = lang;
        }
    } catch (error) {
        console.error('Error on window load:', error);
    }
};

// Handle language switch
function switchLanguage(lang) {
    try {
        updateLinks(lang);
        const url = new URL(window.location.href);
        url.searchParams.set('lang', lang);
        window.location.href = url.toString();
    } catch (error) {
        console.error('Error switching language:', error);
    }
}
</script>
