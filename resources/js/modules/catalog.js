export function getCatalog() {
    const node = document.getElementById('catalog-data');
    if (!node) return [];

    try {
        return JSON.parse(node.textContent || '[]');
    } catch {
        return [];
    }
}

export function initCatalogFilters() {
    const cards = [...document.querySelectorAll('[data-product-card]')];
    if (!cards.length) return;

    const search = document.querySelector('[data-product-search]');
    const buttons = [...document.querySelectorAll('[data-filter-category]')];
    const empty = document.querySelector('[data-empty-products]');
    let category = buttons.find((button) => button.classList.contains('is-active'))?.dataset.filterCategory || 'all';

    const matchesCategory = (card) => (
        category === 'all' ||
        (category === 'ofertas' && card.dataset.offer === '1') ||
        card.dataset.category === category ||
        (card.dataset.secondary || '').split(' ').includes(category)
    );

    const render = () => {
        const term = (search?.value || '').trim().toLowerCase();
        let visible = 0;

        cards.forEach((card) => {
            const matchesSearch = !term || (card.dataset.search || '').includes(term);
            const show = matchesCategory(card) && matchesSearch;
            card.hidden = !show;
            if (show) visible += 1;
        });

        if (empty) empty.hidden = visible > 0;
    };

    buttons.forEach((button) => {
        button.addEventListener('click', () => {
            category = button.dataset.filterCategory;
            buttons.forEach((item) => item.classList.toggle('is-active', item === button));
            render();
        });
    });

    search?.addEventListener('input', render);
    render();
}
