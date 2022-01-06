var editCategoryModal = document.getElementById('editCategoryModal')
editCategoryModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var catId = button.getAttribute('data-cat-id');
  var catName = button.getAttribute('data-cat-name');
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalCatId = editCategoryModal.querySelector('#catId')
  var modalCatName = editCategoryModal.querySelector('#catName')

  modalCatId.value = catId;
  modalCatName.value = catName;
})