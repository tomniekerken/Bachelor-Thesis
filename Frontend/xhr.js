// characterInteger Form
const characterIntegerForm = document.querySelector('#characterInteger')
const characterIntegerSubmit = document.querySelector('#characterIntegerSubmit')

characterIntegerForm.addEventListener('submit', event => {
    event.preventDefault()
    characterInteger()
})

const sendHttpRequest = (method, url, data) => {
    const promise = new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest()
        xhr.open(method, url)

        xhr.responsseType = 'json'

        xhr.onload = () => {
            resolve(xhr.response)
        }

        xhr.send(JSON.stringify(data))
    })
    return promise
}

async function characterInteger() {
    var formData = new FormData(document.querySelector('#characterInteger'))

    const sendData = () => {
        sendHttpRequest('POST', 'http://localhost/Bachelor-Thesis/PHP-API/characterInteger', {
            firstname: formData.get('firstname-ci'),
            lastname: formData.get('lastname-ci'),
            age: formData.get('age-ci')
        }).then(responseData => {
            console.log(responseData, 'hello world')
        })
    }
}