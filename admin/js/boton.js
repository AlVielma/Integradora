const collapseButton = document.getElementById('collapseButton');
const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');

collapseButton.addEventListener('click', () => {
  sidebar.classList.toggle('active');
});

function checkWidth() {
  if (window.innerWidth <= 767) {
    collapseButton.classList.remove('hidden');
    sidebar.classList.remove('active');
  } else {
    collapseButton.classList.add('hidden');
    sidebar.classList.add('active');
  }
}

window.addEventListener('resize', checkWidth);
checkWidth();
