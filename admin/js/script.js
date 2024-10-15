//start:sidebar

 //Sidebar functions
  const sidebar = document.getElementById('sidebar');
  const toggleSidebar = document.getElementById('toggleSidebar');
  const sidebarText = document.querySelectorAll('.sidebar-text');

  toggleSidebar.addEventListener('click' , () => {
    sidebar.classList.toggle('w-64');
    sidebar.classList.toggle('w-16');

    // Toggle text visibility
    sidebarText.forEach(text => {
      text.classList.toggle('hidden');
    });
  });
//end:sidebar

//start:add User

const openButton = document.getElementById('open-popup-btn');
const popupFormContainer = document.getElementById('popup-form-container');
const closeButton = document.getElementById("closeBtn");

openButton.addEventListener('click', () => {
  popupFormContainer.classList.remove('hidden');
});

closeButton.addEventListener('click', () => {
    popupFormContainer.classList.add('hidden');
})

popupFormContainer.addEventListener('click', (e) => {
  if (e.target === popupFormContainer) {
    popupFormContainer.classList.add('hidden');
  }
});
//end:add User
