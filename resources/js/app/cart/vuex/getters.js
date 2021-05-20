export const getItems = (state) => {
    return state.cart.items;
}
export const delivery = (state) => {
    return state.cart.items.product.restaurant.delivery_fees;
}
