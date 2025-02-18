 // Animate SMK N 1 BANTUL text from below
 window.onload = function() {
    const title = document.getElementById('main-title');
    setTimeout(() => {
        title.classList.add('show');
    }, 500); // Delay for better effect

    // Typewriter effect
    const typingText = "Sekolah Pusat Keunggulan sektor Ekonomi Kreatif";
    const typingSpeed = 100; // Speed of typing in milliseconds
    const pauseDuration = 2000; // Duration to pause before repeating in milliseconds
    let index = 0;

    function typeWriter() {
        const typewriterElement = document.getElementById("typing-text");

        // Type the text one character at a time
        if (index < typingText.length) {
            typewriterElement.innerHTML += typingText.charAt(index);
            index++;
            setTimeout(typeWriter, typingSpeed);
        } else {
            // After typing is complete, wait and then restart
            setTimeout(() => {
                typewriterElement.innerHTML = ""; // Clear the text
                index = 0; // Reset index
                typeWriter(); // Restart the typing
            }, pauseDuration);
        }
    }
    typeWriter();
};

// Show elements on scroll
function handleScroll() {
    const elements = document.querySelectorAll('.fade-in');
    elements.forEach((el) => {
        const rect = el.getBoundingClientRect();
        // Check if the element is within the viewport
        if (rect.top < window.innerHeight - 100) {
            el.classList.add('show');
        }
    });
}

// Add scroll event listener
window.addEventListener('scroll', handleScroll);
// Trigger handleScroll once to ensure any already visible elements get shown
handleScroll();