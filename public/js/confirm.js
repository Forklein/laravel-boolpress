const deleteForm = document.querySelectorAll('.delete-form');
deleteForm.forEach(form => {
    form.addEventListener('submit', e => {
        e.preventDefault();
        const confirm = window.confirm('Are you sure you want to delete this form?');
        if (confirm) e.target.submit();
    })
})