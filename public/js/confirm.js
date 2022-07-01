const deleteForm = document.getElementById('deleteForm');

deleteForm.addEventListener('submit', function (e) {
	var error = '';
	var choice = confirm('Are You Sure That You Want To Delete It ?');
	if (!choice) {
		e.preventDefault();
	} else {
		alert("Category Deleted Successfully");
	}
	if (error) {
		alert(error);
	}
});