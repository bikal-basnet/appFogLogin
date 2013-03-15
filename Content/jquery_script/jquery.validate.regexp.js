// jquery.validate.regexp.js
// Created By : Bikal Basnet, 2013-March-13
// This js file contains the method regex. It is used for the validation of a field against the regular expression.


//This function has been extracted into the js file, for  the reusability concern
$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        var check = false;
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
);
