const loading = document.querySelector('#loading')
const body = document.querySelector('body')

loading.addEventListener('click', () => {
  const username = document.querySelector('#username')
  const password = document.querySelector('#password')

  let usernameValid = validar(username.value)
  let passwordValid = validar(password.value)

  let usernameValue = username.value
  let passwordValue = password.value

  if (!(usernameValid == 0)) {
    if (!(passwordValid == 0)) {
      if (usernameValue.length >= 5 && passwordValue.length >= 8) {
        body.classList.add('loadingShow')
      }
    }
  }
})

function validar(i) {
  let result = i.replace(/ /gi, '')

  return result.length
}
