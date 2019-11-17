$(function () {
    const NAME_MAX_LENGTH = 20
    const MIDDLE_INITIAL_MAX_LENGTH = 1
    const USERNAME_MAX_LENGTH = 30
    const USERNAME_MIN_LENGTH = 3
    const PASSWORD_MAX_LENGTH = 30
    const PASSWORD_MIN_LENGTH = 6

    // Regex for email validationg from HTML spec
    // Taken from https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/email#Validation
    const EMAIL_REGEX = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/
    const ALPHABETIC_REGEX = /^[a-zA-Z]*$/
    // Includes underscores
    const ALPHANUMERIC_REGEX = /^[a-zA-Z0-9_]*$/

    // Registration form event handler
    $('#signup').submit(function (e) {
        e.preventDefault()
        if (validateForm()) {
            var formData = new FormData(this)
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1])
            }
        }
    })

    function validateName() {
        var firstName = new String($('#firstName').val())
        var middleInitial = new String($('#middleInitial').val())
        var lastName = new String($('#lastName').val())
        var errorText = $('#nameError')

        if (firstName.length <= 0 || firstName.length > NAME_MAX_LENGTH) {
            errorText.text('First Name must be within 1-20 characters long')
            return false
        } else if (middleInitial.length <= 0 || middleInitial.length > MIDDLE_INITIAL_MAX_LENGTH) {
            errorText.text('Middle Initial must be no more than 1 character long')
            return false
        } else if (lastName.length <= 0 || lastName.length > NAME_MAX_LENGTH) {
            errorText.text('Last Name must be within 1-20 characters long')
            return false
        } else if (!ALPHABETIC_REGEX.test(firstName)) {
            errorText.text('First Name must be alphabetic')
            return false
        } else if (!ALPHABETIC_REGEX.test(middleInitial)) {
            errorText.text('Middle Initial must be alphabetic')
            return false
        } else if (!ALPHABETIC_REGEX.test(lastName)) {
            errorText.text('Last Name must be alphabetic')
            return false
        } else {
            errorText.text('')
            return true
        }
    }

    function validateEmail() {
        var email = new String($('#email').val())
        var errorText = $('#emailError')

        if (!EMAIL_REGEX.test(email)) {
            errorText.text('Invalid email address')
            return false
        } else {
            errorText.text('')
            return true
        }
    }

    function validateUsername() {
        var username = new String($('#username').val())
        var errorText = $('#usernameError')

        if (username.length < USERNAME_MIN_LENGTH || username.length > USERNAME_MAX_LENGTH) {
            errorText.text('Username must be 3-30 characters long')
            return false
        } else if (!ALPHANUMERIC_REGEX.test(username)) {
            errorText.text('Username must contain only alphanumeric characters and underscores')
            return false
        } else {
            errorText.text('')
            return true
        }
    }

    function validatePassword() {
        var password = new String($('#password').val())
        var confirmPassword = new String($('#confirmPassword').val())
        var errorText = $('#passwordError')

        if (password.length < PASSWORD_MIN_LENGTH || password.length > PASSWORD_MAX_LENGTH) {
            errorText.text('Password must be 6-30 characters long')
            return false
        } else if (password.valueOf != confirmPassword.valueOf) {
            errorText.text('Password and Confirm Password must match')
            return false
        } else {
            errorText.text('')
            return true
        }
    }

    function validateTOS() {
        var tosCheck = $('#tosCheck').prop('checked')
        var errorText = $('#tosError')

        if (!tosCheck) {
            errorText.text('You must agree to the User Agreement and Privacy Policy')
            return false
        } else {
            errorText.text('')
            return true
        }
    }

    function validateForm() {
        var valid = true
        // Go through each validation step to ensure each runs and their errors are shown
        // If this was all in one if statement no steps would run after the first step to fail
        if (!validateName()) {
            valid = false
        } if (!validateEmail()) {
            valid = false
        } if (!validateUsername()) {
            valid = false
        } if (!validatePassword()) {
            valid = false
        } if (!validateTOS()) {
            valid = false
        } return valid
    }

})