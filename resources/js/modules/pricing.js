export const currency = new Intl.NumberFormat('es-CL', {
    style: 'currency',
    currency: 'CLP',
    maximumFractionDigits: 0,
});

export function parseSelectedOptions(selectedOptions = []) {
    return selectedOptions.reduce((acc, entry) => {
        const separator = entry.indexOf(':');
        if (separator === -1) return acc;
        acc[entry.slice(0, separator).trim()] = entry.slice(separator + 1).trim();
        return acc;
    }, {});
}

export function getDefaultOptions(product) {
    return (product.options || []).map((option) => `${option.label}: ${option.values[0]}`);
}

export function findMatchingVariant(product, selectedOptions = []) {
    const optionMap = parseSelectedOptions(selectedOptions);
    if (!product.variants?.length) return null;

    return product.variants.find((variant) => (
        (!optionMap.Material || variant.material === optionMap.Material) &&
        (!optionMap.Medida || variant.medida === optionMap.Medida) &&
        (!optionMap.Cantidad || variant.cantidad === optionMap.Cantidad)
    )) || product.variants[0];
}

export function getPriceForOptions(product, selectedOptions = []) {
    if (product.quoteOnly || Number(product.price) <= 0) return 0;
    const optionMap = parseSelectedOptions(selectedOptions);
    const priority = optionMap.Prioridad || 'Normal 48 hrs';
    const variant = findMatchingVariant(product, selectedOptions);
    return variant?.prices?.[priority] ?? product.price;
}

export function getPriceLabel(product, selectedOptions = []) {
    const price = getPriceForOptions(product, selectedOptions);
    return price > 0 ? currency.format(price) : 'Cotizar';
}

export function getDetailOptions(container) {
    return [...container.querySelectorAll('[data-detail-option]')]
        .map((select) => `${select.name}: ${select.value}`);
}
