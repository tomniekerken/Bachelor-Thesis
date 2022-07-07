// characterInteger Form
const characterIntegerForm = document.querySelector('#characterInteger')
const characterIntegerSubmit = document.querySelector('#characterIntegerSubmit')

characterIntegerForm.addEventListener('submit', event => {
    event.preventDefault()
    characterIntegerNoValidation()
    characterIntegerWithValidation()
})

const phpApiCall = (method, paramUrl, data) => {
    const promise = new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest()
        xhr.open(method, `http://localhost/Bachelor-Thesis/PHP-API/${paramUrl}`)

        xhr.responseType = 'json'

        xhr.onload = () => {
            resolve(xhr.response)
        }

        xhr.send(JSON.stringify(data))
    })

    return promise
}

async function characterIntegerNoValidation() {
    let formData = new FormData(document.querySelector('#characterInteger'))

    let calls = 1
    let index = 5

    while (calls <= index) {
        phpApiCall('POST', 'characterIntegerNoValidation', {
            firstnameCi: formData.get('firstname-ci'),
            lastnameCi: formData.get('lastname-ci'),
            ageCi: formData.get('age-ci')
        }).then(responseData => {
            console.log(responseData)
        })

        calls++
    }
}

async function characterIntegerWithValidation() {
    let formData = new FormData(document.querySelector('#characterInteger'))

    let calls = 1
    let index = 5

    while (calls <= index) {
        phpApiCall('POST', 'characterIntegerWithValidation', {
            firstnameCi: formData.get('firstname-ci'),
            lastnameCi: formData.get('lastname-ci'),
            ageCi: formData.get('age-ci')
        }).then(responseData => {
            console.log(responseData)
        })

        calls++
    }
}

async function characterIntegerBoolean() {
    let formData = new FormData(document.querySelector('#characterIntegerBoolean'))

    phpApiCall('POST', 'characterIntegerBoolean', {
        firstnameCi: formData.get('firstname-ci'),
        lastnameCi: formData.get('lastname-ci'),
        ageCi: formData.get('age-ci')
    }).then(responseData => {
        console.log(responseData)
    })
}