const collapseButton = document.getElementById('collapseButton');
const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');

collapseButton.addEventListener('click', () => {
  sidebar.classList.toggle('active');
});

function checkWidth() {
  if (window.innerWidth <= 767) {
    collapseButton.classList.remove('hidden');
    content.style.transform = '';
  } else {
    collapseButton.classList.add('hidden');
    sidebar.classList.remove('active');
  }
}

window.addEventListener('resize', checkWidth);
checkWidth();
