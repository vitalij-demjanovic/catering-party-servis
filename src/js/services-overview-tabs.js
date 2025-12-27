const serviceTabButton = document.querySelectorAll('.service-tab-button');
const serviceTabContent = document.querySelectorAll('.services-content__item');

serviceTabButton.forEach(tab => {
  tab.addEventListener('click', () => {
    const id = tab.dataset.tab;

    serviceTabButton.forEach(t => t.classList.remove('active'));
    serviceTabContent.forEach(p => p.classList.remove('active'));

    tab.classList.add('active');
    const panel = document.querySelector(`.services-content__item[data-tab="${id}"]`);
    if (panel) panel.classList.add('active');
  });
});