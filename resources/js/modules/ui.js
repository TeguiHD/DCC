export function initMenu() {
    const toggle = document.querySelector('[data-menu-toggle]');
    const menu = document.getElementById('mobile-menu');
    if (!toggle || !menu) return;

    toggle.addEventListener('click', () => {
        const open = menu.classList.toggle('hidden') === false;
        toggle.setAttribute('aria-expanded', String(open));
    });
}

export function initHero() {
    const slides = [...document.querySelectorAll('[data-hero-slide]')];
    const dotsWrap = document.querySelector('[data-hero-dots]');
    if (slides.length < 2 || !dotsWrap) return;

    let index = 0;
    const dots = slides.map((_, dotIndex) => {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'h-2.5 w-2.5 rounded-md bg-white/40 transition';
        dot.setAttribute('aria-label', `Slide ${dotIndex + 1}`);
        dot.addEventListener('click', () => {
            index = dotIndex;
            render();
        });
        dotsWrap.appendChild(dot);
        return dot;
    });

    const render = () => {
        slides.forEach((slide, slideIndex) => slide.classList.toggle('is-active', slideIndex === index));
        dots.forEach((dot, dotIndex) => dot.classList.toggle('bg-yellow-300', dotIndex === index));
    };

    window.setInterval(() => {
        index = (index + 1) % slides.length;
        render();
    }, 5500);

    render();
}
