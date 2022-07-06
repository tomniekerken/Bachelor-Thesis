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

        xhr.responseType = 'json'

        xhr.onload = () => {
            resolve(xhr.response)
        }

        xhr.send(JSON.stringify(data))
    })
    return promise
}

const characterInteger = () => {
    var formData = new FormData(document.querySelector('#characterInteger'))

    sendHttpRequest('POST', 'http://localhost/Bachelor-Thesis/PHP-API/characterInteger', {
        firstnameCi: formData.get('firstname-ci'),
        lastnameCi: formData.get('lastname-ci'),
        ageCi: formData.get('age-ci')
    }).then(responseData => {
        console.log(responseData)
    })

}