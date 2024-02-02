const menuItem = document.querySelectorAll('.item-menu');

const selectLink = (event) => {
    menuItem.forEach((item) => {
        item.classList.remove('ativo');
    });
    event.target.classList.add('ativo');
};

menuItem.forEach((item) => {
    item.addEventListener('click', selectLink);
});
