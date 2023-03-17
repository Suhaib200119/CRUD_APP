function confiermDeleteStd(student ,ref) { 
    Swal.fire({
        title: 'هل أنت متاكد',
        text: "لن تتمكن من التراجع عن هذا!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم احذفه'
      }).then((result) => {
        if (result.isConfirmed) {
            deleteStd(student,ref);
        }
      })
}

function deleteStd(student,ref) {
    // Make a request for a user with a given ID
axios.delete('/students/'+student)
.then(function (response) {
    ref.closest("tr").remove();
    alertAfterConfierm(response.data);
})
.catch(function (error) {
    alertAfterConfierm(error.response.data);
});

}

function alertAfterConfierm(data) {
Swal.fire({
    // position: 'top-end',
    icon: data.icon,
    title: data.title,
    showConfirmButton: false,
    timer: 1500
  })
}