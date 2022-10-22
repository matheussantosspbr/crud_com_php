const body = document.querySelector('body')
const formInput = document.querySelector('#formInput')
const inputHidden = document.querySelector('#inputHidden')

function editar(e, id) {
  body.classList.add('formShow')
  formInput.placeholder = e
  inputHidden.value = id
}

function closeForm() {
  body.classList.remove('formShow')
}
